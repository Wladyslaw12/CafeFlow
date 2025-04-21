@extends('admin.admin-layout')
@section('styles')
    <link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
                        <h6 class="m-0 font-weight-bold text-primary">Создание товара</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit-form" method="POST"
                              action="{{ route('products.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        name="title"
                                        value="{{ old('title') }}"
                                        required
                                >
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea
                                        class="form-control"
                                        id="description"
                                        name="description"
                                        rows="3"
                                        required
                                >{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="unit_id">Единица измерения</label>
                                <select
                                        name="unit_id"
                                        id="unit_id"
                                        class="form-control"
                                        required
                                >
                                    <option value="">-- Выберите единицу --</option>
                                    @foreach(\App\Models\Unit::get() as $val)
                                        <option
                                                value="{{ $val->id }}"
                                                {{ old('unit_id') == $val->id ? 'selected' : '' }}
                                        >
                                            {{ $val->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="proteins">Белки</label>
                                        <input
                                                type="number"
                                                step="0.01"
                                                class="form-control form-control-sm"
                                                id="proteins"
                                                name="proteins"
                                                value="{{ old('proteins') }}"
                                                required
                                        >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="fats">Жиры</label>
                                        <input
                                                type="number"
                                                step="0.01"
                                                class="form-control form-control-sm"
                                                id="fats"
                                                name="fats"
                                                value="{{ old('fats') }}"
                                                required
                                        >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="carbohydrates">Углеводы</label>
                                        <input
                                                type="number"
                                                step="0.01"
                                                class="form-control form-control-sm"
                                                id="carbohydrates"
                                                name="carbohydrates"
                                                value="{{ old('carbohydrates') }}"
                                                required
                                        >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
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
