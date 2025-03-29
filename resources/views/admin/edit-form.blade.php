@php use App\Models\Product;use App\Models\User; @endphp
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
                        <h6 class="m-0 font-weight-bold text-primary">Редактирование {{$model['name']}}</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit-form" method="POST"
                              action="{{ route('admin.'.strtolower($model['name']).'.update', ['id' => $model['data']['id']]) }}">
                            @csrf
                            @method('PATCH')

                            @foreach(config('admin.models.'.$model['name'].'.fields.form') as $feild)
                                @if($feild == 'role')
                                    <div class="form-group">
                                        <label for="{{$feild}}">{{$feild}}</label>
                                        <select name="{{$feild}}" id="{{$feild}}" class="form-control">
                                            @foreach(['user', 'admin', 'blocked'] as $val)
                                                @if($model['data'][$feild] == $val)
                                                    <option value="{{$val}}" selected>
                                                        {{$val}}
                                                    </option>
                                                @else
                                                    <option value="{{$val}}">
                                                        {{$val}}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @elseif($feild == 'attributes')
                                @elseif($feild == 'tags')
                                @else
                                    <div class="form-group">
                                        <label for="{{$feild}}">{{$feild}}</label>
                                        <input type="text" class="form-control" id="{{$feild}}" name="{{$feild}}"
                                               value="{{$model['data'][$feild]}}">
                                    </div>
                                @endif
                            @endforeach


                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <a href="{{ route('admin.'.strtolower($model['name']).'.index') }}"
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
