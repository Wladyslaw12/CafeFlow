@extends('admin.admin-layout')
@section('styles')
    <link href="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
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
                        <h6 class="m-0 font-weight-bold text-primary">Редактирование Клиента</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit-form" method="POST"
                              action="{{ route('clients.update', ['id' => $item['id']]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$item['name']}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                       pattern="\+375\d{9}"
                                       maxlength="13"
                                       oninvalid="setCustomValidity('Введите номер в формате +375XXXXXXXXX')"
                                       value="{{$item['phone']}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="card_number">Номер карты</label>
                                <input type="number" class="form-control" id="card_number" name="card_number" value="{{$item['card_number']}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <a href="{{ route('clients.index') }}"
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
