@extends('admin.admin-layout')
@section('styles')
    <link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Расписание работы</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('schedules.update', ['id' => $data['user_id']])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            @php
                                $days = [
                                   1 => 'Понедельник',
                                   2 => 'Вторник',
                                   3 => 'Среда',
                                   4 => 'Четверг',
                                   5 => 'Пятница',
                                   6 => 'Суббота',
                                   7 => 'Воскресенье'
                                ];
                            @endphp

                            <table class="table table-bordered">
                                <thead class="thead-light">
                                <tr>
                                    <th>День недели</th>
                                    <th>Начало работы</th>
                                    <th>Окончание работы</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($days as $dayId => $dayName)
                                    <tr>
                                        <td>{{ $dayName }}</td>
                                        <td>
                                            <input type="time" name="schedule[{{ $dayId }}][start_time]" class="form-control"
                                                   value="{{ old("schedule.$dayId.start_time", isset($data[$dayId]['start_time']) ? \Carbon\Carbon::parse($data[$dayId]['start_time'])->format('H:i') : '') }}">
                                        </td>
                                        <td>
                                            <input type="time" name="schedule[{{ $dayId }}][end_time]" class="form-control"
                                                   value="{{ old("schedule.$dayId.end_time", isset($data[$dayId]['end_time']) ? \Carbon\Carbon::parse($data[$dayId]['end_time'])->format('H:i') : '') }}">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Сохранить расписание</button>
                            <a href="{{ route('employees.show', ['id' => $data['user_id']]) }}" class="btn btn-secondary">Отмена</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
