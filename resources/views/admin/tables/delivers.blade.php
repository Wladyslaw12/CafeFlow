@php use App\Models\Supplier; use App\Actions\DeliverAction;@endphp
@extends('admin.admin-layout')
@section('styles')
    <link href="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
        #data-string:hover {
            background: #f6f6f6;
        }
    </style>
@endsection
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Поставки</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success float-right"
                    onclick="window.location.href = '{{route('delivers.create')}}'">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Номер документа</th>
                        <th>Дата и время</th>
                        <th>Поставщик</th>
                        <th>Сумма</th>
                        <th>Статус оплаты</th>
                        <th>Комментарий</th>
                        <th id="actions">Действия</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Номер документа</th>
                        <th>Дата и время</th>
                        <th>Поставщик</th>
                        <th>Сумма</th>
                        <th>Статус оплаты</th>
                        <th>Комментарий</th>
                        <th id="actions">Действия</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($data as $item)
                        <tr id="data-string" data-id="{{$item['id']}}"
                            ondblclick=" window.location.href = '{{route('delivers.show', ['id' => $item['id']])}}'" title="Дважды кликните, чтобы открыть">
                            <td>{{$item['id']}}</td>
                            <td>{{'№'.$item['document_number']}}</td>
                            <td>{{\Carbon\Carbon::parse($item['created_at'])->format('d.m.Y H:i')}}</td>
                            <td>{{Supplier::find($item['suppliers_id'])->title}}</td>
                            <td>{{DeliverAction::run($item['id'])['sum'] . ' р.'}}</td>
                            <td>{{$item['payment_status']}}</td>
                            <td>{{$item['comment']}}</td>
                            <td id="actions">
                                <div class="row justify-content-center">
                                    <div class="col-auto mb-2">
                                        <button class="btn btn-success btn-block" id="btn-edit"
                                                data-id="{{$item['id'] }}"
                                                onclick=" window.location.href = '{{route('delivers.edit', ['id' => $item['id']])}}'">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-danger btn-block" id="btn-delete"
                                                data-id="{{$item['id'] }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('admin-assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/demo/datatables-demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        const urls = "{{ url(request()->getPathInfo()) }}"
        const token = $('meta[name="csrf-token"]').attr('content');

        $(document).on('click', '#btn-delete', function () {
            let id = $(this).data('id');

            if (confirm("Подтвердите удаление")) {
                $.ajax({
                    url: urls + `/${id}`,
                    type: 'DELETE',
                    data: {
                        "_token": token
                    },
                    success: function (response) {
                        alert('Удаление прошло успешно');
                        location.reload();
                    },
                    error: function (error) {
                        alert('Error deleting entity.');
                    }
                });
            }
        });
    </script>
@endsection
