@php use App\Models\Unit;@endphp
@extends('admin.admin-layout')
@section('styles')
    <link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Инвентаризация продуктов</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-success float-right" onclick="inventoryCheck()">
                <i class="fas fa-check"></i> Провести инвентаризацию
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID продукта</th>
                        <th>Название продукта</th>
                        <th>Ожидаемый остаток</th>
                        <th>Фактическое количество</th>
                        <th>Разница</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID продукта</th>
                        <th>Название продукта</th>
                        <th>Ожидаемый остаток</th>
                        <th>Фактическое количество</th>
                        <th>Разница</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($data as $item)
                        <tr data-id="{{ $item['product']['id'] }}">
                            <td>{{ $item['product']['id'] }}</td>
                            <td>{{ $item['product']['title'] }}</td>
                            <td class="expected">{{ $item['count'] . ' ' . Unit::find($item['product']['unit_id'])->title }}</td>
                            <td>
                                <input type="number" class="form-control actual" value="{{ $item['count'] }}" data-id="{{ $item['product']['id'] }}">
                            </td>
                            <td class="difference"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin-assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/demo/datatables-demo.js') }}"></script>

    <script>
        function inventoryCheck() {
            document.querySelectorAll('tbody tr').forEach(function(row) {
                const expectedText = row.querySelector('.expected').textContent.trim();
                const expectedValue = parseFloat(expectedText.split(' ')[0]) || 0;

                const actualInput = row.querySelector('.actual');
                const actualValue = parseFloat(actualInput.value) || 0;

                const diff = actualValue - expectedValue;
                const differenceCell = row.querySelector('.difference');

                const diffFormatted = diff.toFixed(2);

                if (diff === 0) {
                    differenceCell.textContent = "Сходится";
                    differenceCell.style.color = "green";
                } else if (diff > 0) {
                    differenceCell.textContent = "+" + diffFormatted;
                    differenceCell.style.color = "orange";
                } else {
                    differenceCell.textContent = diffFormatted;
                    differenceCell.style.color = "red";
                }
            });
            alert('Инвентаризация проведена.');
        }
    </script>
@endsection
