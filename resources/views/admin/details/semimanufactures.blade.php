@php use App\Models\Unit;@endphp
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
                        <h6 class="m-0 font-weight-bold text-primary">Полуфабрикат</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Название : {{ $item['title'] }}</li>
                            <li class="list-group-item">Описание : {{ $item['description'] }}</li>
                            <li class="list-group-item">Единица измерения : {{Unit::find($item['unit_id'])->title}}</li>
                        </ul>
                        <div class="card mb-4">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    @php
                                        $semimanufactureProducts = $item->semimanufactureProducts()->get();
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
                                        @foreach($semimanufactureProducts as $semimanufactureProduct)
                                            @php
                                                $a = \App\Actions\SemimanufactureProductAction::run($item['id'],$semimanufactureProduct->product()->first()->id);

                                                if($semimanufactureProduct['count'] <= $a['count']){
                                                    $price = ceil($a['sum']/$a['count'] * 100) / 100;
                                                }
                                                else{
                                                    $price = 0;
                                                }

                                                $totalSum += ($semimanufactureProduct['count']*$price);
                                            @endphp
                                            <tr>
                                                <td>{{ $semimanufactureProduct->product()->first()->title }}</td>
                                                <td>{{ $semimanufactureProduct['count'] .' ' . $semimanufactureProduct->product()->first()->unit()->first()->title}}</td>
                                                <td>{{ $price }} р.</td>
                                                <td>{{ ceil($semimanufactureProduct['count'] * $price * 100) / 100 }} р.</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="row justify-content-end">
                                <div class="col-auto mb-2">
                                    <button class="btn btn-success btn-block" id="btn-edit"
                                            data-id="{{$item['id']}}"
                                            onclick=" window.location.href = '{{route('semimanufactures.edit', ['id' => $item['id']])}}'">
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

        //delete func
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
                        window.location.href = '{{route('semimanufactures.index')}}';
                    },
                    error: function (error) {
                        alert('Error deleting entity.');
                    }
                });
            }
        });
    </script>
@endsection
