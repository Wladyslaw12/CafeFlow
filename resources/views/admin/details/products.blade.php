@extends('admin.admin-layout')
@section('styles')
    <link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Товар</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Название : {{ $item['title'] }}</li>
                            <li class="list-group-item">Описание : {{ $item['description'] }}</li>
                            <li class="list-group-item">
                                Единица измерения : {{ $item->unit()->first()->title }}
                            </li>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="card shadow mb-3">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="small text-primary font-weight-bold text-uppercase mb-1">Белки</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        {{ $item['proteins'] ?? '—' }} г.
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-egg fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card shadow mb-3">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="small text-success font-weight-bold text-uppercase mb-1">Жиры</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        {{ $item['fats'] ?? '—' }} г.
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-drumstick-bite fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card shadow mb-3">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="small text-info font-weight-bold text-uppercase mb-1">Углеводы</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        {{ $item['carbohydrates'] ?? '—' }} г.
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-bread-slice fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <div class="mt-4">
                            <div class="row justify-content-end">
                                <div class="col-auto mb-2">
                                    <button class="btn btn-success btn-block" id="btn-edit"
                                            data-id="{{ $item['id'] }}"
                                            onclick="window.location.href = '{{ route('products.edit', ['id' => $item['id']]) }}'">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-danger btn-block" id="btn-delete"
                                            data-id="{{ $item['id'] }}">
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
        let index = urlsSource.lastIndexOf('/');
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
                        window.location.href = '{{ route('products.index') }}';
                    },
                    error: function (error) {
                        alert('Error deleting entity.'); 
                    }
                });
            }
        });
    </script>
@endsection
