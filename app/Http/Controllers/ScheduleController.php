<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $data = User::query()->where('establishment_id', '=', auth()->user()->establishment_id)->get();

        return view('admin.tables.schedule',
            compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Schedule::query()->where('user_id', '=', $id)->get();
        $datka=[];
        foreach ($data as $d) {
            $datka[$d->day_id] = $d;
        }
        $datka['user_id'] = $id;

        return view('admin.edit.schedule',['data' => $datka]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $schedule = $request->input('schedule');

        for($i = 1; $i<=count($schedule); $i++)
        {
            $a = Schedule::query()->where('user_id', '=', $id)
                ->where('day_id', '=', $i)->first();
            if($a){
                $a->update(['start_time' => $schedule[$i]['start_time'], 'end_time' => $schedule[$i]['end_time']]);
            }
            elseif($schedule[$i]['start_time'] != null && $schedule[$i]['end_time'] != null){
                Schedule::query()->create(['day_id'=>$i,'user_id' => $id, 'start_time' => $schedule[$i]['start_time'], 'end_time' => $schedule[$i]['end_time']]);
            }
        }
        return to_route('employees.show', [ 'id' => $id ]);
    }
}
