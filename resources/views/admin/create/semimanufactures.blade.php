@extends('admin.admin-layout')
@section('styles')
    <link href="{{ asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Создание полуфабриката</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('semimanufactures.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                            <div class="form-group">
                                <label for="unit_id">Единица измерения</label>
                                <select class="form-control" id="unit_id" name="unit_id" required>
                                    @foreach(\App\Models\Unit::get() as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr>
                            <h5>Продукты</h5>
                            <table class="table table-bordered" id="products-table">
                                <thead class="thead-light">
                                <tr>
                                    <th>Продукт</th>
                                    <th>Количество</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <button type="button" class="btn btn-secondary" id="add-product-btn">
                                            <i class="fas fa-plus"></i> Добавить продукт
                                        </button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                            <button type="submit" class="btn btn-primary">Добавить</button>
                            <a href="{{ route('semimanufactures.index') }}" class="btn btn-secondary">Отмена</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table style="display: none;">
        <tbody>
        <tr id="product-row-template">
            <td>
                <select name="products[__INDEX__][product_id]" class="form-control" required>
                    <option value="">Выберите продукт</option>
                    @foreach(\App\Models\Product::query()->where('establishment_id', auth()->user()->establishment_id)->get() as $product)
                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="products[__INDEX__][count]" class="form-control" min="1" required>
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-product-btn">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        let productIndex = 0;

        document.getElementById('add-product-btn').addEventListener('click', function() {
            let template = document.getElementById('product-row-template').cloneNode(true);
            template.removeAttribute('id');
            template.style.display = '';

            template.innerHTML = template.innerHTML.replace(/__INDEX__/g, productIndex);
            productIndex++;
            document.querySelector('#products-table tbody').appendChild(template);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.closest('.remove-product-btn')) {
                e.target.closest('tr').remove();
            }
        });

        document.querySelector('#products-table tbody').addEventListener('change', function(e) {
            if (e.target && e.target.matches('select[name^="products["]')) {
                const selectedValue = e.target.value;
                if (selectedValue === '') return;

                let duplicateCount = 0;
                document.querySelectorAll('#products-table tbody select[name^="products["]').forEach(function(select) {
                    if (select.value === selectedValue) {
                        duplicateCount++;
                    }
                });

                if (duplicateCount > 1) {
                    alert('Этот продукт уже добавлен.');
                    e.target.value = '';
                }
            }
        });
    </script>
@endsection
