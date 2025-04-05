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
                        <h6 class="m-0 font-weight-bold text-primary">Создание поставки</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('delivers.store') }}">
                            @csrf
                            <!-- Поля поставки -->
                            <div class="form-group">
                                <label for="document_number">Номер документа</label>
                                <input type="number" class="form-control" id="document_number" name="document_number" required>
                            </div>
                            <div class="form-group">
                                <label for="supplier_id">Поставщик</label>
                                <select class="form-control" id="supplier_id" name="supplier_id" required>
                                    @foreach(\App\Models\Supplier::get() as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_status">Статус оплаты</label>
                                <select class="form-control" id="payment_status" name="payment_status" required>
                                    <option value="Оплачен">Оплачен</option>
                                    <option value="Не оплачен">Не оплачен</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Комментарий</label>
                                <textarea class="form-control" id="comment" name="comment"></textarea>
                            </div>

                            <hr>
                            <h5>Продукты</h5>
                            <table class="table table-bordered" id="products-table">
                                <thead class="thead-light">
                                <tr>
                                    <th>Продукт</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
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
                            <a href="{{ route('delivers.index') }}" class="btn btn-secondary">Отмена</a>
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
                <input type="number" name="products[__INDEX__][price]" class="form-control" min="0" step="0.01" required>
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

        // Обработчик изменения для select-элементов продуктов
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
                    alert('Этот продукт уже добавлен в поставку.');
                    e.target.value = ''; // Сбросить выбор для нового select-а
                }
            }
        });
    </script>
@endsection
