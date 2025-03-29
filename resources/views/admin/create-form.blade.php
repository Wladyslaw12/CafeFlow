@php use App\Models\Tag; @endphp
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
                        <h6 class="m-0 font-weight-bold text-primary">Создание {{$model['name']}}</h6>
                    </div>
                    <div class="card-body">
                        <form id="edit-form" method="POST"
                              action="{{ route('admin.'.strtolower($model['name']).'.store') }}">
                            @csrf
                            @foreach(config('admin.models.'.$model['name'].'.fields.form') as $feild)
                                @if($feild == 'role')
                                    <div class="form-group">
                                        <label for="{{$feild}}">{{$feild}}</label>
                                        <select name="{{$feild}}" id="{{$feild}}" class="form-control">
                                            @foreach(['user', 'admin', 'blocked'] as $val)
                                                <option value="{{$val}}">
                                                    {{$val}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @elseif($feild == 'attributes')
                                    <div class="form-group">
                                        <label for="{{$feild}}[]">{{$feild}}</label>
                                        <select name="{{$feild}}[]" id="{{$feild}}" class="form-control" multiple>
                                            @foreach(\App\Models\Attribute::get() as $attribute)
                                                <option value="{{$attribute->id}}">
                                                    {{$attribute->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @elseif($feild == 'tags')
                                    <div class="form-group">
                                        <label for="{{$feild}}[]">{{$feild}}</label>
                                        <select name="{{$feild}}[]" id="{{$feild}}" class="form-control" multiple>
                                            @foreach(Tag::get() as $tag)
                                                <option value="{{$tag->id}}">
                                                    {{$tag->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="{{$feild}}">{{$feild}}</label>
                                        <input type="text" class="form-control" id="{{$feild}}" name="{{$feild}}">
                                    </div>
                                @endif
                            @endforeach

                            <button type="submit" class="btn btn-primary">Добавить</button>
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
