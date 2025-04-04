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
                        <h6 class="m-0 font-weight-bold text-primary">Списание</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">Номер документа : №{{ $item['document_number'] }}</li>
                            <li class="list-group-item">Статус : {{ $item['status'] }}</li>
                            <li class="list-group-item">Дата и время : {{ \Carbon\Carbon::parse($item['created_at'])->format('d.m.Y H:i') }}</li>
                        </ul>

                        <div class="card mb-4">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    @php
                                        $writeOffProducts = $item->writeOffProducts()->get();
                                        $totalSum = 0;
                                    @endphp
                                    <table class="table table-bordered mb-0" width="100%" cellspacing="0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Название</th>
                                            <th>Количество</th>
                                            <th>Себестоимость</th>
                                            <th>Сумма</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($writeOffProducts as $writeOffProduct)
                                            @php
                                                $price = round(\App\Actions\WriteOffProductAction::run($item['id'],$writeOffProduct->product()->first()->id )/$writeOffProduct['count'],2);

                                                $totalSum += ($writeOffProduct['count'] * $price);
                                            @endphp
                                            <tr>
                                                <td>{{ $writeOffProduct->product()->first()->title }}</td>
                                                <td>{{ $writeOffProduct['count'] .' ' . $writeOffProduct->product()->first()->unit()->first()->title}}</td>
                                                <td>{{ $price }} р.</td>
                                                <td>{{ $price * $writeOffProduct['count'] }} р.</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot class="thead-light">
                                        <tr>
                                            <th>Итого</th>
                                            <th></th>
                                            <th></th>
                                            <th>{{ $totalSum }} р.</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-auto mb-2">
                                <button class="btn btn-success btn-block" id="btn-edit"
                                        data-id="{{ $item['id'] }}"
                                        onclick="window.location.href = '{{ route('delivers.edit', ['id' => $item['id']]) }}'">
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

            if (confirm("Вы уверены, что хотите удалить?")) {
                $.ajax({
                    url: urls + `/${id}`, // URL маршрута
                    type: 'DELETE', // Метод запроса
                    data: {
                        "_token": token // CSRF-токен
                    },
                    success: function (response) {
                        alert('Удаление прошло успешно');
                        window.location.href = '{{route('write_offs.index')}}';
                    },
                    error: function (error) {
                        alert('Error deleting entity.'); // Обработка ошибок
                    }
                });
            }
        });
    </script>
@endsection
