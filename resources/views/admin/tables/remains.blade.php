@extends('admin.admin-layout')
@section('styles')
    <link href="{{asset('admin-assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .section-title {
            color: #2A4365;
            border-left: 4px solid #4A5568;
            padding-left: 1rem;
            margin: 2.5rem 0;
        }

        .accordion-item.feature-card {
            border: none;
            border-radius: 0.5rem;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 1rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .accordion-button {
            background-color: #fff;
            border: 1px solid #d3d3d3;
            color: #2A4365;
            font-weight: 600;
            border-radius: 0.5rem;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        .accordion-button:not(.collapsed) {
            background-color: #ffffff;
        }

        .accordion-item.feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .accordion-button:focus,
        .accordion-button:focus-visible {
            border: none;
            border-bottom: 1px solid #d3d3d3;
            border-radius: 0;
            box-shadow: none !important;
        }

    </style>
@endsection
@section('content')
    <!-- Часто задаваемые вопросы -->
    <h2 class="section-title h3">Часто задаваемые вопросы</h2>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq">
                    Для каких бизнесов подходит Cafe Flow?
                </button>
            </h3>
            <div id="faq" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-utensils me-2 text-muted"></i>Рестораны и кафе</li>
                        <li><i class="fas fa-beer me-2 text-muted"></i>Бары и пабы</li>
                        <li><i class="fas fa-coffee me-2 text-muted"></i>Кофейни</li>
                        <li><i class="fas fa-store me-2 text-muted"></i>Фудкорты</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Для каких бизнесов подходит Cafe Flow?
                </button>
            </h3>
            <div id="faq1" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-utensils me-2 text-muted"></i>Рестораны и кафе</li>
                        <li><i class="fas fa-beer me-2 text-muted"></i>Бары и пабы</li>
                        <li><i class="fas fa-coffee me-2 text-muted"></i>Кофейни</li>
                        <li><i class="fas fa-store me-2 text-muted"></i>Фудкорты</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Для каких бизнесов подходит Cafe Flow?
                </button>
            </h3>
            <div id="faq2" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-utensils me-2 text-muted"></i>Рестораны и кафе</li>
                        <li><i class="fas fa-beer me-2 text-muted"></i>Бары и пабы</li>
                        <li><i class="fas fa-coffee me-2 text-muted"></i>Кофейни</li>
                        <li><i class="fas fa-store me-2 text-muted"></i>Фудкорты</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Советы для начинающих -->
    <h2 class="section-title h3">Советы для начинающих</h2>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Для каких бизнесов подходит Cafe Flow?
                </button>
            </h3>
            <div id="faq3" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-utensils me-2 text-muted"></i>Рестораны и кафе</li>
                        <li><i class="fas fa-beer me-2 text-muted"></i>Бары и пабы</li>
                        <li><i class="fas fa-coffee me-2 text-muted"></i>Кофейни</li>
                        <li><i class="fas fa-store me-2 text-muted"></i>Фудкорты</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Для каких бизнесов подходит Cafe Flow?
                </button>
            </h3>
            <div id="faq4" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-utensils me-2 text-muted"></i>Рестораны и кафе</li>
                        <li><i class="fas fa-beer me-2 text-muted"></i>Бары и пабы</li>
                        <li><i class="fas fa-coffee me-2 text-muted"></i>Кофейни</li>
                        <li><i class="fas fa-store me-2 text-muted"></i>Фудкорты</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                    Для каких бизнесов подходит Cafe Flow?
                </button>
            </h3>
            <div id="faq5" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-utensils me-2 text-muted"></i>Рестораны и кафе</li>
                        <li><i class="fas fa-beer me-2 text-muted"></i>Бары и пабы</li>
                        <li><i class="fas fa-coffee me-2 text-muted"></i>Кофейни</li>
                        <li><i class="fas fa-store me-2 text-muted"></i>Фудкорты</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
