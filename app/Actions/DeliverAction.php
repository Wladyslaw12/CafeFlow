<?php

namespace App\Actions;

use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\WriteOffProduct;
use Lorisleiva\Actions\Concerns\AsAction;

class DeliverAction
{
    use AsAction;

    public function handle(int $id): array
    {
        $deliverProducts = DeliverProduct::query()->where('deliver_id', $id)->get();

        $count = 0;
        $sum = 0;

        foreach ($deliverProducts as $deliverProduct) {
            $count += $deliverProduct['count'];
            $sum += $deliverProduct['price']*$deliverProduct['count'];
        }

        return ['count' => $count, 'sum' => $sum];
    }

}
