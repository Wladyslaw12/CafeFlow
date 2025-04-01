<?php

namespace App\Http\Controllers;

use App\Actions\RemainAction;
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
        $data = RemainAction::run();

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
