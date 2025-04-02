<?php

namespace App\Actions;

use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\WriteOffProduct;
use Lorisleiva\Actions\Concerns\AsAction;

class WriteOffAction
{
    use AsAction;

    public function handle(int $id): float
    {
        $writeOffProducts = WriteOffProduct::query()->where('write_off_id', $id)->get();

        $sum = 0.0;

        foreach ($writeOffProducts as $writeOffProduct) {
            $deliveredProducts = DeliverProduct::query()->where('product_id','=',$writeOffProduct->product_id)->get();
            $writeOffCount = $writeOffProduct->count;

            foreach ($deliveredProducts as $deliveredProduct) {
                if($writeOffCount > 0 && $deliveredProduct['count'] > 0){
                    $deliveredProduct['count'] = $deliveredProduct['count'] - $writeOffCount;
                    if($deliveredProduct['count'] < 0){
                        $sum += $deliveredProduct['price'] * ($deliveredProduct['count'] + $writeOffCount);

                        $writeOffCount = 0 - $deliveredProduct['count'];
                        $deliveredProduct['count'] = 0;
                    }
                    else{
                        $sum += $deliveredProduct['price'] * $writeOffCount;
                        $writeOffCount = 0;
                    }
                }
            }

        }

        return $sum;
    }

}
