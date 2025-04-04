<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        $data = Supplier::query()->where('establishment_id', '=', auth()->user()->establishment_id)->get();

        return view('admin.tables.suppliers',
            compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create.suppliers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        $data = $request->validated();

        $data['establishment_id'] = auth()->user()->establishment_id;

        Supplier::query()->create(
            $data
        );

        return to_route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Supplier::find($id);
        return view('admin.details.suppliers', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Supplier::find($id);
        return view('admin.edit.suppliers', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierUpdateRequest $request, string $id)
    {
        Supplier::find($id)->update($request->validated());

        return to_route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::destroy($id);
    }
}
