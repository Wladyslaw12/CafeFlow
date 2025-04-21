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
                        <h6 class="m-0 font-weight-bold text-primary">Создание списания</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('write_offs.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="document_number">Номер документа</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        id="document_number"
                                        name="document_number"
                                        value="{{ old('document_number') }}"
                                        required
                                >
                            </div>

                            <div class="form-group">
                                <label for="status">Статус</label>
                                <select
                                        class="form-control"
                                        id="status"
                                        name="status"
                                        required
                                >
                                    <option value="Проведено" {{ old('status') === 'Проведено' ? 'selected' : '' }}>
                                        Проведено
                                    </option>
                                    <option value="Не проведено" {{ old('status') === 'Не проведено' ? 'selected' : '' }}>
                                        Не проведено
                                    </option>
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
                                {{-- В случае ошибки валидации можно добавить здесь строки из old('products', []) --}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <button type="button" class="btn btn-secondary" id="add-product-btn">
                                            <i class="fas fa-plus"></i> Добавить продукт
                                        </button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                            <button type="submit" class="btn btn-primary">Добавить</button>
                            <a href="{{ route('write_offs.index') }}" class="btn btn-secondary">Отмена</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Шаблон строки --}}
    <table style="display: none;">
        <tbody>
        <tr id="product-row-template">
            <td>
                <select name="products[__INDEX__][product_id]" class="form-control" required>
                    <option value="">Выберите продукт</option>
                    @foreach(\App\Models\Product::query()
                             ->where('establishment_id', auth()->user()->establishment_id)
                             ->get() as $product)
                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input
                        type="number"
                        name="products[__INDEX__][count]"
                        class="form-control"
                        min="0.01"
                        step="0.01"
                        required
                        value="{{ old('products.'.__INDEX__.'.count') }}"
                >
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
            if (e.target.closest('.remove-product-btn')) {
                e.target.closest('tr').remove();
            }
        });

        document.querySelector('#products-table tbody').addEventListener('change', function(e) {
            if (e.target.matches('select[name^="products["]')) {
                const val = e.target.value, selects = document.querySelectorAll('#products-table tbody select[name^="products["]');
                let count = 0;
                selects.forEach(s => s.value === val && count++);
                if (count > 1) {
                    alert('Этот продукт уже добавлен.');
                    e.target.value = '';
                }
            }
        });
    </script>
@endsection
