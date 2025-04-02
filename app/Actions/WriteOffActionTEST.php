<?php

namespace App\Actions;

use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\WriteOffProduct;
use Lorisleiva\Actions\Concerns\AsAction;

class WriteOffActionTEST
{
    use AsAction;

    public function handle(int $id): array {
        $writeOffProducts1 = WriteOffProduct::query()->where('write_off_id', $id)->get();

        dd($writeOffProducts1);
        foreach ($writeOffProducts1 as $writeOffProduct1) {
            $product =  Product::query()->where('id', '=', $writeOffProduct1->product_id)->first();
            $data=[];

            $deliverProducts = DeliverProduct::query()->where('product_id', $product->id)->get();
            $writeOffProducts = WriteOffProduct::query()->where('product_id', $product->id)->get();
            dump($product);

            $writeOffCount=0;

            foreach ($writeOffProducts as $writeOffProduct) {
                $writeOffCount += $writeOffProduct['count'];
            }
            dump('vk '.$writeOffCount);
            $count = 0;
            $sum = 0;

            foreach ($deliverProducts as $deliverProduct) {
                dump('foreach');
                if($writeOffCount > 0 && $deliverProduct['count'] > 0){
                    $deliverProduct['count'] = $deliverProduct['count'] - $writeOffCount;
                    if($deliverProduct['count'] < 0){
                        $momentCount = $deliverProduct['count'] + $writeOffCount;
                        $count += $momentCount;
                        $sum += $deliverProduct['price']*$momentCount;

                        $writeOffCount = 0 - $deliverProduct['count'];
                        dump('vk2 ' . $writeOffCount);
                        $deliverProduct['count'] = 0;
                    }
                    else{
                        $count += $writeOffCount;
                        $sum += $deliverProduct['price']*$writeOffCount;

                        $writeOffCount = 0;
                    }
                }

                dump('{',$deliverProduct->product_id,$count, $sum, '}');

            }

            $data[]=['product' => $product, 'count' => $count, 'sum' => $sum];

        }
        dd($data);

    }


}
