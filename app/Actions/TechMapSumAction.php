<?php

namespace App\Actions;

use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\TechnicalMap;
use App\Models\TechnicalMapProduct;
use App\Models\WriteOffProduct;
use Lorisleiva\Actions\Concerns\AsAction;

class TechMapSumAction
{
    use AsAction;

    public function handle(int $id): float
    {
        $techMapProducts = TechnicalMapProduct::query()->where('technical_map_id', '=', $id)->get();

        $sum = 0.0;

        foreach ($techMapProducts as $techMapProduct) {

            $deliveredProducts = DeliverProduct::query()->where('product_id','=',$techMapProduct['product_id'])->get();
            $writeOffCount = $techMapProduct['count'];

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
