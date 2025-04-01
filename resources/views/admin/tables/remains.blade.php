@php use App\Models\Unit;@endphp
@extends('admin.admin-layout')
@section('styles')
    <link href="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <h1 class="h3 mb-2 text-gray-800">Остатки</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID продукта</th>
                        <th>Название продукта</th>
                        <th>Количество остатка</th>
                        <th>Сумма</th>
                        <th>Последняя поставка</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID продукта</th>
                        <th>Название продукта</th>
                        <th>Количество остатка</th>
                        <th>Сумма</th>
                        <th>Последняя поставка</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($data as $item)
                        <tr id="data-string" data-id="{{$item['product']['id']}}">
                            <td>{{$item['product']['id']}}</td>
                            <td>{{$item['product']['title']}}</td>
                            <td>{{$item['count'] . ' ' . Unit::find($item['product']['unit_id'])->title}}</td>
                            <td>{{$item['sum']}}</td>
                            <td>{{$item['lastDeliver']->format('d.m.Y')}}</td>
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
@endsection
