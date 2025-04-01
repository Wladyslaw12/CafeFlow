<?php

namespace App\Http\Controllers;

use App\Models\Deliver;
use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\User;
use App\Models\WriteOffProduct;
use Illuminate\Http\Request;

class RemainController extends Controller
{
    public function index()
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

//        dd($data);
        return view('admin.tables.remains',
            compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd('store');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('destroy');
    }
}
