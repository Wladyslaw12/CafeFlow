<?php

namespace App\Http\Controllers;

use App\Actions\RemainAction;
use App\Http\Requests\WriteOffRequest;
use App\Http\Requests\WriteOffUpdateRequest;
use App\Models\User;
use App\Models\WriteOff;
use App\Models\WriteOffProduct;
use Illuminate\Http\Request;

class WriteOffController extends Controller
{
    public function index()
    {
        $data = WriteOff::query()->where('establishment_id', '=', auth()->user()->establishment_id)->get();

        return view('admin.tables.write_offs',
            compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create.write_offs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WriteOffRequest $request)
    {
        $data = [
            'document_number' => $request->input('document_number'),
            'status' => $request->input('status'),
            'establishment_id' => auth()->user()->establishment_id
        ];

        $writeOff = WriteOff::query()->create(
            $data
        );
$products = RemainAction::run();
        foreach ($request->input('products') as $product) {
            foreach ($products as $productik) {
                if($productik['product']->id == $product['product_id']){
                    if($product['count']>$productik['count']){
                        return to_route('write_offs.create')->withErrors(['error' => 'На складе недостаточно продукта '.$productik['product']->title.' для списания']);
                    }
                }
            }
            WriteOffProduct::query()->create([
                'product_id' => $product['product_id'],
                'write_off_id' => $writeOff->id,
                'count' => $product['count'],
                'establishment_id' => auth()->user()->establishment_id,
            ]);
        }

        return to_route('write_offs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = WriteOff::find($id);
        return view('admin.details.write_offs', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = WriteOff::find($id);
        return view('admin.edit.write_offs', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WriteOffUpdateRequest $request, string $id)
    {
        $data = [
            'document_number' => $request->input('document_number'),
            'status' => $request->input('status'),
        ];

        WriteOffProduct::query()->where('write_off_id', '=',$id)->delete();

        WriteOff::query()->find($id)->update(
            $data
        );

        $products = RemainAction::run();
        foreach ($request->input('products') as $product) {
            foreach ($products as $productik) {
                if($productik['product']->id == $product['product_id']){
                    if($product['count']>$productik['count']){
                        return to_route('write_offs.edit')->withErrors(['error' => 'На складе недостаточно продукта '.$productik['product']->title.' для списания']);
                    }
                }
            }
            WriteOffProduct::query()->create([
                'product_id' => $product['product_id'],
                'write_off_id' => $id,
                'count' => $product['count'],
                'establishment_id' => auth()->user()->establishment_id,
            ]);
        }
        return to_route('write_offs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        WriteOff::destroy($id);
    }
}
