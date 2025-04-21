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
                        <h6 class="m-0 font-weight-bold text-primary">Редактирование продукта</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit-form" method="POST"
                              action="{{ route('products.update', ['id' => $item['id']]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title', $item['title']) }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" class="form-control" id="description" name="description"
                                       value="{{ old('description', $item['description']) }}">
                            </div>
                            <div class="form-group">
                                <label for="unit_id">Единица измерения</label>
                                <select name="unit_id" id="unit_id" class="form-control">
                                    @foreach(\App\Models\Unit::get() as $val)
                                        <option value="{{ $val->id }}"
                                                {{ old('unit_id', $item['unit_id']) == $val->id ? 'selected' : '' }}>
                                            {{ $val->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proteins">Белки</label>
                                        <input type="number" class="form-control form-control-sm" id="proteins" name="proteins"
                                               value="{{ old('proteins', $item['proteins']) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fats">Жиры</label>
                                        <input type="number" class="form-control form-control-sm" id="fats" name="fats"
                                               value="{{ old('fats', $item['fats']) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="carbohydrates">Углеводы</label>
                                        <input type="number" class="form-control form-control-sm" id="carbohydrates" name="carbohydrates"
                                               value="{{ old('carbohydrates', $item['carbohydrates']) }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <a href="{{ route('products.index') }}"
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
