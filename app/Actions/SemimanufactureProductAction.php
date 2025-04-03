<?php

namespace App\Actions;

use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\SemimanufactureProduct;
use App\Models\TechnicalMap;
use App\Models\TechnicalMapProduct;
use App\Models\WriteOffProduct;
use Lorisleiva\Actions\Concerns\AsAction;

class SemimanufactureProductAction
{
    use AsAction;

    public function handle(int $semimanufactureId, int $productId): float
    {
        $techMapProduct = SemimanufactureProduct::query()
            ->where('semimanufacture_id', '=' ,$semimanufactureId)->firstWhere('product_id', '=', $productId);

        $sum = 0.0;

        $deliveredProducts = DeliverProduct::query()->where('product_id','=',$productId)->get();
        $writeOffCount = $techMapProduct->count;

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

        return $sum;
    }

}
