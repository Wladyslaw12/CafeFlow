@php use App\Models\BlogPost;use App\Models\Product;use App\Models\User; @endphp
@extends('admin.admin-layout')
@section('styles')
    <link href="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{$model['name']}}</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach(config('admin.models.'.$model['name'].'.fields.show') as $field)
                                @if($field == 'attributes')
                                    <li class="list-group-item">{{$field}}
                                        : {{implode(', ',Product::find($model['data']['id'])->attributes()->pluck('name')->toArray())}}</li>
                                @elseif($field == 'tags')
                                    <li class="list-group-item">{{$field}}
                                        : {{implode(', ',BlogPost::find($model['data']['id'])->tags()->pluck('name')->toArray())}}</li>
                                @else
                                    <li class="list-group-item">{{$field}} : {{$model['data'][$field]}}</li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="mt-4">
                            <div class="row justify-content-end">
                                <div class="col-auto mb-2">
                                    <button class="btn btn-success btn-block" id="btn-edit"
                                            data-id="{{$model['data']['id'] }}"
                                            onclick=" window.location.href = '{{route('admin.'.strtolower($model['name']).'.edit', ['id' => $model['data']['id']])}}'">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-danger btn-block" id="btn-delete"
                                            data-id="{{$model['data']['id'] }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let urlsSource = "{{ url(request()->getPathInfo()) }}";
        let index = urlsSource.lastIndexOf('/')
        const urls = urlsSource.slice(0, index);

        const token = $('meta[name="csrf-token"]').attr('content');

        //delete func
        $(document).on('click', '#btn-delete', function () {
            let id = $(this).data('id'); // Получить ID сущности

            if (confirm("Are you sure you want to delete this entity?")) {
                $.ajax({
                    url: urls + `/${id}`, // URL маршрута
                    type: 'DELETE', // Метод запроса
                    data: {
                        "_token": token // CSRF-токен
                    },
                    success: function (response) {
                        alert(response.success); // Уведомление об успешном удалении
                        window.location.href = '{{route('admin.'.strtolower($model['name']).'.index')}}';
                    },
                    error: function (error) {
                        alert('Error deleting entity.'); // Обработка ошибок
                    }
                });
            }
        });
    </script>
@endsection
