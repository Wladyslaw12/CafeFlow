<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $data = Client::query()->where('establishment_id', '=', auth()->user()->establishment_id)->get();

        return view('admin.tables.clients',
            compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create.clients');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $data = $request->validated();

        $data['establishment_id'] = auth()->user()->establishment_id;

        Client::query()->create(
            $data
        );

        return to_route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Client::find($id);
        return view('admin.details.clients', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Client::query()->find($id);

        return view('admin.edit.clients', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientUpdateRequest $request, string $id)
    {
        Client::find($id)->update($request->validated());

        return to_route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::destroy($id);
    }
}
