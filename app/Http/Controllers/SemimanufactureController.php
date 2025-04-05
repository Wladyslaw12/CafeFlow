<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemimanufactureRequest;
use App\Http\Requests\SemimanufactureUpdateRequest;
use App\Models\Semimanufacture;
use App\Models\SemimanufactureProduct;
use App\Models\User;
use Illuminate\Http\Request;

class SemimanufactureController extends Controller
{
    public function index()
    {
        $data = Semimanufacture::query()->where('establishment_id', '=', auth()->user()->establishment_id)->get();

        return view('admin.tables.semimanufactures',
            compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create.semimanufactures');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SemimanufactureRequest $request)
    {
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'unit_id' => $request->input('unit_id'),
            'establishment_id' => auth()->user()->establishment_id
        ];

        $semimanufacture = Semimanufacture::query()->create(
            $data
        );

        foreach ($request->input('products') as $product) {
            SemimanufactureProduct::query()->create([
                'product_id' => $product['product_id'],
                'semimanufacture_id' => $semimanufacture->id,
                'count' => $product['count'],
                'establishment_id' => auth()->user()->establishment_id,
            ]);
        }

        return to_route('semimanufactures.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Semimanufacture::find($id);
        return view('admin.details.semimanufactures', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Semimanufacture::query()->find($id);

        return view('admin.edit.semimanufactures', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SemimanufactureUpdateRequest $request, string $id)
    {
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'unit_id' => $request->input('unit_id'),
        ];

        SemimanufactureProduct::query()->where('semimanufacture_id', '=',$id)->delete();

        Semimanufacture::query()->find($id)->update(
            $data
        );

        foreach ($request->input('products') as $product) {
            SemimanufactureProduct::query()->create([
                'product_id' => $product['product_id'],
                'semimanufacture_id' => $id,
                'count' => $product['count'],
                'establishment_id' => auth()->user()->establishment_id,
            ]);
        }

        return to_route('semimanufactures.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Semimanufacture::destroy($id);
    }
}
