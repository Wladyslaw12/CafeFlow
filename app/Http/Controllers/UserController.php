<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::query()->where('establishment_id', '=', auth()->user()->establishment_id)->get();

        return view('admin.tables.employees',
            compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create.employees');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $data['establishment_id'] = auth()->user()->establishment_id;

        User::query()->create(
            $data
        );

        return to_route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = User::find($id);

        return view('admin.details.employees', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::find($id);

        return view('admin.edit.employees', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, string $id)
    {
        User::find($id)->update($request->validated());

        return to_route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
    }
}
