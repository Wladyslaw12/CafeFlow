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
                        <h6 class="m-0 font-weight-bold text-primary">Сотрудник</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Имя : {{$item['name']}}</li>
                            <li class="list-group-item">Электронная почта : {{$item['email']}}</li>
                            <li class="list-group-item">Должность : {{$item->role()->first()->title}}</li>
                        </ul>
                        <div class="mt-4">
                            <div class="row justify-content-end">
                                <div class="col-auto mb-2">
                                    <button class="btn btn-primary btn-block" id="btn-schedule"
                                            data-id="{{$item['id']}}"
                                            onclick=" window.location.href = '{{route('schedules.edit', ['id' => $item['id']])}}'">
                                        <i class="fas fa-calendar-check"></i>
                                    </button>
                                </div>
                                <div class="col-auto mb-2">
                                    <button class="btn btn-success btn-block" id="btn-edit"
                                            data-id="{{$item['id']}}"
                                            onclick=" window.location.href = '{{route('employees.edit', ['id' => $item['id']])}}'">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-danger btn-block" id="btn-delete"
                                            data-id="{{$item['id']}}">
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

        $(document).on('click', '#btn-delete', function () {
            let id = $(this).data('id');

            if (confirm("Вы уверены, что хотите удалить?")) {
                $.ajax({
                    url: urls + `/${id}`,
                    type: 'DELETE',
                    data: {
                        "_token": token
                    },
                    success: function (response) {
                        alert('Удаление прошло успешно');
                        window.location.href = '{{route('employees.index')}}';
                    },
                    error: function (error) {
                        alert('Error deleting entity.');
                    }
                });
            }
        });
    </script>
@endsection
