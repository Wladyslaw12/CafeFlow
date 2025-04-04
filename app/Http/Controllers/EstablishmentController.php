<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstablishmentUpdateRequest;
use App\Models\Establishment;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
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
        $item = Establishment::find($id);

        return view('admin.details.establishment', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Establishment::find($id);
        return view('admin.edit.establishment', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstablishmentUpdateRequest $request, string $id)
    {
        Establishment::find($id)->update($request->validated());

        return to_route('establishment.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Establishment::destroy($id);
    }
}
