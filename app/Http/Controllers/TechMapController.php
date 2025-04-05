<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechMapRequest;
use App\Http\Requests\TechMapUpdateRequest;
use App\Models\TechnicalMap;
use App\Models\TechnicalMapProduct;
use App\Models\User;
use Illuminate\Http\Request;

class TechMapController extends Controller
{
    public function index()
    {
        $data = TechnicalMap::query()->where('establishment_id', '=', auth()->user()->establishment_id)->get();

        return view('admin.tables.tech-maps',
            compact('data'));
    }

    public function create()
    {
        return view('admin.create.tech-maps');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechMapRequest $request)
    {
        if($request->input('products') == null){
            return back()->withErrors(['error' => 'Вы не выбрали ни одного товара']);
        }

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'unit_id' => $request->input('unit_id'),
            'establishment_id' => auth()->user()->establishment_id
        ];

        $technicalMap = TechnicalMap::query()->create(
            $data
        );

        foreach ($request->input('products') as $product) {
            TechnicalMapProduct::query()->create([
                'product_id' => $product['product_id'],
                'technical_map_id' => $technicalMap->id,
                'count' => $product['count'],
                'establishment_id' => auth()->user()->establishment_id,
            ]);
        }

        return to_route('tech-maps.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = TechnicalMap::find($id);
        return view('admin.details.tech-maps', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = TechnicalMap::query()->find($id);

        return view('admin.edit.tech-maps', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechMapUpdateRequest $request, string $id)
    {
        if($request->input('products') == null){
            return back()->withErrors(['error' => 'Вы не выбрали ни одного товара']);
        }

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'unit_id' => $request->input('unit_id'),
        ];

        TechnicalMapProduct::query()->where('technical_map_id', '=',$id)->delete();

        TechnicalMap::query()->find($id)->update(
            $data
        );

        foreach ($request->input('products') as $product) {
            TechnicalMapProduct::query()->create([
                'product_id' => $product['product_id'],
                'technical_map_id' => $id,
                'count' => $product['count'],
                'establishment_id' => auth()->user()->establishment_id,
            ]);
        }

        return to_route('tech-maps.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TechnicalMap::destroy($id);
    }
}
