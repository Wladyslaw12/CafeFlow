<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliverRequest;
use App\Http\Requests\DeliverUpdateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Deliver;
use App\Models\DeliverProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DeliverController extends Controller
{
    public function index()
    {
        $data = Deliver::query()->where('establishment_id', '=', auth()->user()->establishment_id)->get();

        return view('admin.tables.delivers',
            compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create.delivers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliverRequest $request)
    {
        if($request->input('products') == null){
            return back()->withErrors(['error' => 'Вы не выбрали ни одного товара']);
        }

        $data = [
            'suppliers_id' => $request->input('supplier_id'),
            'document_number' => $request->input('document_number'),
            'payment_status' => $request->input('payment_status'),
            'comment' => $request->input('comment'),
            'establishment_id' => auth()->user()->establishment_id
        ];

        $deliver = Deliver::query()->create(
            $data
        );

        foreach ($request->input('products') as $product) {
            DeliverProduct::query()->create([
                'product_id' => $product['product_id'],
                'deliver_id' => $deliver->id,
                'count' => $product['count'],
                'price' => $product['price'],
                'establishment_id' => auth()->user()->establishment_id,
            ]);
        }

        return to_route('delivers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Deliver::find($id);

        return view('admin.details.delivers', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Deliver::find($id);
        return view('admin.edit.delivers', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliverUpdateRequest $request, string $id)
    {
        if($request->input('products') == null){
            return back()->withErrors(['error' => 'Вы не выбрали ни одного товара']);
        }

        $data = [
            'suppliers_id' => $request->input('supplier_id'),
            'document_number' => $request->input('document_number'),
            'payment_status' => $request->input('payment_status'),
            'comment' => $request->input('comment'),
        ];

        DeliverProduct::query()->where('deliver_id', '=',$id)->delete();

        Deliver::query()->find($id)->update(
            $data
        );

        foreach ($request->input('products') as $product) {
                DeliverProduct::query()->create([
                    'product_id' => $product['product_id'],
                    'deliver_id' => $id,
                    'count' => $product['count'],
                    'price' => $product['price'],
                    'establishment_id' => auth()->user()->establishment_id,
                ]);
        }

        return to_route('delivers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Deliver::destroy($id);
    }
}
