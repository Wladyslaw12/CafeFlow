<?php

namespace App\Actions;

use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\SemimanufactureProduct;
use App\Models\TechnicalMap;
use App\Models\TechnicalMapProduct;
use App\Models\WriteOffProduct;
use Lorisleiva\Actions\Concerns\AsAction;

class SemimanufactureSumAction
{
    use AsAction;

    public function handle(int $id): float
    {
        $semimanufactureProducts = SemimanufactureProduct::query()->where('semimanufacture_id', '=', $id)->get();

        $sum = 0.0;

        foreach ($semimanufactureProducts as $semimanufactureProduct) {

            $deliveredProducts = DeliverProduct::query()->where('product_id','=',$semimanufactureProduct['product_id'])->get();
            $writeOffCount = $semimanufactureProduct['count'];

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
