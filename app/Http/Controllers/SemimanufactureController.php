<?php

namespace App\Http\Controllers;

use App\Models\Semimanufacture;
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
        $item = Semimanufacture::find($id);
        return view('admin.details.semimanufactures', compact('item'));
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
