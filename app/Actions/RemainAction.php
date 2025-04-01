<?php

namespace App\Actions;

use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\WriteOffProduct;
use Lorisleiva\Actions\Concerns\AsAction;

class RemainAction
{
    use AsAction;

    public function handle(): array
    {
            $estId = auth()->user()->establishment_id;

            $products = Product::where('establishment_id', $estId)->get();

            $data=[];

            foreach ($products as $product) {
                $deliverProducts = DeliverProduct::query()->where('product_id', $product->id)->get();
                $writeOffProducts = WriteOffProduct::query()->where('product_id', $product->id)->get();

                $writeOffCount=0;

                foreach ($writeOffProducts as $writeOffProduct) {
                    $writeOffCount += $writeOffProduct['count'];
                }

                $count = 0;
                $sum = 0;

                foreach ($deliverProducts as $deliverProduct) {
                    if($writeOffCount > 0 && $deliverProduct['count'] > 0){
                        $deliverProduct['count'] = $deliverProduct['count'] - $writeOffCount;
                        if($deliverProduct['count'] < 0){
                            $writeOffCount = 0 - $deliverProduct['count'];
                            $deliverProduct['count'] = 0;
                        }
                        else{
                            $writeOffCount = 0;
                        }
                    }
                    $count += $deliverProduct['count'];
                    $sum += $deliverProduct['price']*$deliverProduct['count'];
                }

                $data[]=['product' => $product, 'count' => $count, 'sum' => $sum, 'lastDeliver' => $deliverProducts->last()->created_at];

            }

        return $data;
    }

}
