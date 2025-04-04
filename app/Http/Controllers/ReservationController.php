<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Http\Requests\ReservationUpdateRequest;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $data = Reservation::query()->where('establishment_id', '=', auth()->user()->establishment_id)->get();

        return view('admin.tables.reservation',
            compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.create.reservation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request)
    {
        $data = $request->validated();

        $data['establishment_id'] = auth()->user()->establishment_id;

        Reservation::query()->create(
            $data
        );

        return to_route('reservations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Reservation::find($id);
        return view('admin.details.reservation', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Reservation::find($id);
        return view('admin.edit.reservation', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationUpdateRequest $request, string $id)
    {
        Reservation::find($id)->update($request->validated());

        return to_route('reservations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Reservation::destroy($id);
    }
}
