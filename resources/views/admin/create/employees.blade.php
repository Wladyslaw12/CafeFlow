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
                        <h6 class="m-0 font-weight-bold text-primary">Создание сотрудника</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit-form" method="POST"
                              action="{{ route('employees.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                >
                            </div>
                            <div class="form-group">
                                <label for="email">Электронная почта</label>
                                <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                >
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        name="password"
                                        {{-- обычно пароль не сохраняем через old --}}
                                >
                            </div>
                            <div class="form-group">
                                <label for="role_id">Роль</label>
                                <select name="role_id" id="role_id" class="form-control" required>
                                    <option value="">-- Выберите роль --</option>
                                    @foreach(\App\Models\Role::get() as $val)
                                        <option
                                                value="{{ $val->id }}"
                                                {{ old('role_id') == $val->id ? 'selected' : '' }}
                                        >
                                            {{ $val->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                            <a href="{{ route('employees.index') }}"
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
