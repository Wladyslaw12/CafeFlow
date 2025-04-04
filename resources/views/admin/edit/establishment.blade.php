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
                        <h6 class="m-0 font-weight-bold text-primary">Редактирование заведения</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit-form" method="POST"
                              action="{{ route('establishment.update', ['id' => $item['id']]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$item['title']}}">
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$item['address']}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       pattern="\+375\d{9}"
                                       maxlength="13"
                                       oninvalid="setCustomValidity('Введите номер в формате +375XXXXXXXXX')"
                                       value="{{$item['phone']}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="form_of_business_activity">Форма предпринимательской деятельности</label>
                                <select name="form_of_business_activity" id="form_of_business_activity" class="form-select" required>
                                    <option value="ООО" @if($item['form_of_business_activity'] == 'ООО')selected @endif>ООО</option>
                                    <option value="ОАО" @if($item['form_of_business_activity'] == 'ОАО')selected @endif>ОАО</option>
                                    <option value="ИП" @if($item['form_of_business_activity'] == 'ИП')selected @endif>ИП</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="owner_name">ФИО владельца</label>
                                <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{$item['owner_name']}}">
                            </div>
                            <div class="form-group">
                                <label for="founding_date">Дата создания</label>
                                <input type="date" class="form-control" id="founding_date" name="founding_date" value="{{$item['founding_date']}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <a href="{{ route('establishment.show', ['id' => $item['id']]) }}"
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
