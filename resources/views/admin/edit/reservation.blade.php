@extends('admin.admin-layout')
@section('styles')
    <link href="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Редактирование бронирования</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit-form" method="POST"
                              action="{{ route('reservations.update', ['id' => $item['id']]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="table_id">Номер столика</label>
                                <select name="table_id" id="table_id" class="form-control">
                                    @foreach(\App\Models\Table::get() as $val)
                                        <option value="{{ $val->id }}"
                                                {{ old('table_id', $item['table_id']) == $val->id ? 'selected' : '' }}>
                                            {{ $val->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="client_id">Клиент</label>
                                <select name="client_id" id="client_id" class="form-control">
                                    @foreach(\App\Models\Client::get() as $val)
                                        <option value="{{ $val->id }}"
                                                {{ old('client_id', $item['client_id']) == $val->id ? 'selected' : '' }}>
                                            {{ $val->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="reservation_date">Дата и время бронирования</label>
                                <input type="datetime-local" class="form-control" id="reservation_date" name="reservation_date"
                                       value="{{ old('reservation_date', \Carbon\Carbon::parse($item['reservation_date'])->format('Y-m-d\TH:i')) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <a href="{{ route('reservations.index') }}"
                               class="btn btn-secondary">Отмена</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
