@extends('admin.admin-layout')
@section('styles')
    <link href="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{$model['name']}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success float-right"
                    onclick="window.location.href = '{{route('admin.'.strtolower($model['name']).'.create')}}'">
                <i class="fas fa-plus"></i>
            </button>
            <button class="btn btn-primary float-right mr-2" id="export-btn">
                <i class="fas fa-file-export"></i>
            </button>
            <button class="btn btn-secondary float-right mr-2" id="print-btn">
                <i class="fas fa-print"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        @foreach(config('admin.models.'.$model['name'].'.fields.index') as $field)
                            <th>{{$field}}</th>
                        @endforeach
                        <th id="actions">Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        @foreach(config('admin.models.'.$model['name'].'.fields.index') as $field)
                            <th>{{$field}}</th>
                        @endforeach
                        <th id="actions">Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($model['data'] as $item)
                        <tr id="data-string" data-id="{{$item['id']}}"
                            ondblclick=" window.location.href = '{{route('admin.'.strtolower($model['name']).'.show', ['id' => $item['id']])}}'">
                            @foreach(config('admin.models.'.$model['name'].'.fields.index') as $field)
                                <td>{{$item[$field]}}</td>
                            @endforeach
                            <td id="actions">
                                <div class="row justify-content-center">
                                    <div class="col-auto mb-2">
                                        <button class="btn btn-success btn-block" id="btn-edit"
                                                data-id="{{$item['id'] }}"
                                                onclick=" window.location.href = '{{route('admin.'.strtolower($model['name']).'.edit', ['id' => $item['id']])}}'">
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
        $(document).on('click', '#print-btn', function () {
            var printContents = document.getElementById('dataTable');

            var elementsToRemove = printContents.querySelectorAll('#actions');
            elementsToRemove.forEach(element => {
                element.remove();
            });

            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents.outerHTML;

            window.print();

            document.body.innerHTML = originalContents;

            window.location.reload();
        });

        document.getElementById('export-btn').addEventListener('click', function () {
            const table = document.getElementById('dataTable');

            // Клонируем таблицу, чтобы удалить лишние элементы
            const clonedTable = table.cloneNode(true);

            // Удаляем <tfoot>
            const tfoot = clonedTable.querySelector('tfoot');
            if (tfoot) tfoot.remove();

            // Создаём новую книгу и лист
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.table_to_sheet(clonedTable);

            // Удаляем колонку "Actions"
            const actionColumn = Object.keys(ws).find(key => ws[key].v === 'Actions');
            if (actionColumn) {
                delete ws[actionColumn];
            }

            XLSX.utils.book_append_sheet(wb, ws, 'Data');
            XLSX.writeFile(wb, 'export.xlsx');
        });


        const urls = "{{ url(request()->getPathInfo()) }}"
        const token = $('meta[name="csrf-token"]').attr('content');

        //delete func
        $(document).on('click', '#btn-delete', function () {
            let id = $(this).data('id'); // Получить ID сущности

            if (confirm("Подтвердите удаление")) {
                $.ajax({
                    url: urls + `/${id}`, // URL маршрута
                    type: 'DELETE', // Метод запроса
                    data: {
                        "_token": token // CSRF-токен
                    },
                    success: function (response) {
                        alert(response.success); // Уведомление об успешном удалении
                        location.reload(); // Обновление страницы
                    },
                    error: function (error) {
                        alert('Error deleting entity.'); // Обработка ошибок
                    }
                });
            }
        });
    </script>
@endsection
