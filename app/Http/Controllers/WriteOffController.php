<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WriteOff;
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
        $item = WriteOff::find($id);
        return view('admin.details.write_offs', compact('item'));
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
        WriteOff::destroy($id);
    }
}
