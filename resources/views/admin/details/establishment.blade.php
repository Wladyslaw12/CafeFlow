@extends('admin.admin-layout')
@section('styles')
    <link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Карточка с информацией о заведении -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Информация о заведении</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Название:</strong> {{ $item['title'] }}
                            </li>
                            <li class="list-group-item">
                                <strong>Адрес:</strong> {{ $item['address'] }}
                            </li>
                            <li class="list-group-item">
                                <strong>Телефон:</strong> {{ $item['phone'] }}
                            </li>
                            <li class="list-group-item">
                                <strong>Форма предпринимательской деятельности:</strong> {{ $item['form_of_business_activity'] }}
                            </li>
                            <li class="list-group-item">
                                <strong>ФИО владельца:</strong> {{ $item['owner_name'] }}
                            </li>
                            <li class="list-group-item">
                                <strong>Дата создания:</strong> {{ \Carbon\Carbon::parse($item['founding_date'])->format('d.m.Y') }}
                            </li>
                        </ul>
                        @if(auth()->user()->role_id == 1)
                            <div class="mt-4">
                                <div class="row justify-content-end">
                                    <div class="col-auto mb-2">
                                        <button class="btn btn-success btn-block" id="btn-edit"
                                                data-id="{{$item['id']}}"
                                                onclick=" window.location.href = '{{route('establishment.edit', ['id' => $item['id']])}}'">
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
                        @endif
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

            if (confirm("Вы уверены, что хотите удалить заведение?")) {
                $.ajax({
                    url: urls + '/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": token
                    },
                    success: function (response) {
                        alert('Заведение удалено');
                        window.location.href = '{{ route('establishment.show', ['id' => auth()->user()->establishment_id]) }}';
                    },
                    error: function (error) {
                        alert('Ошибка при удалении заведения.');
                    }
                });
            }
        });
    </script>
@endsection
