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
    <h2 class="section-title h3">Часто задаваемые вопросы</h2>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq">
                    Для каких целей и бизнесов подходит Cafe Flow?
                </button>
            </h3>
            <div id="faq" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li>Для любых предприятий общественного питания (рестораны, бары, кафе, кофейни, столовые и др.) и магазинов.</li>
                        <li>Программа позволяет экономить время на внедрении, обучении персонала, ежедневной рутине, а также повышать прибыль за счет мощных инструментов маркетинга, за которые не нужно отдельно доплачивать.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Как мне связаться с поддержкой?
                </button>
            </h3>
            <div id="faq1" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li>В мессенджерах (WhatsApp, Telegram), по-телефону и почте.</li>
                        <li>На тарифах «Плюс» и «Индивидуальном» вы получите сопровождения персонального менеджера, который будет помогать по любым возникающим вопросам.</li>
                        <li><i class="fas fa-paper-plane me-2 text-muted"></i>Telegram: t.me/vladossvegdaryadom</li>
                        <li><i class="fas fa-phone me-2 text-muted"></i>Телефон: +375297982124</li>
                        <li><i class="fas fa-envelope me-2 text-muted"></i>Email: vlad.03.gostishchev@mail.ru</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <h2 class="section-title h3">Советы для начинающих</h2>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    Секреты настроек Cafe Flow
                </button>
            </h3>
            <div id="faq3" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li>
                            Система  предлагает множество тонких настроек, которые позволяют вам адаптировать интерфейс и навигацию под ваши конкретные нужды.
                        </li>
                        <li>
                            • Настройка навигации: Вы можете настроить навигацию в системе так, чтобы сотрудникам было проще работать, минимизируя количество кликов до нужных операций.
                        </li>
                        <li>
                            • Настройка внешнего вида: Изменяйте внешний вид и структуру системы, чтобы она соответствовала специфике вашей точки продаж — будь то ресторан, кафе или магазин.
                        </li>
                        <li>
                            Совет: Воспользуйтесь возможностью настраивать роли и права доступа для разных сотрудников, чтобы каждый имел доступ только к тем модулям, которые ему нужны. Это ускорит работу и повысит безопасность данных. Также настройте внешний вид дашбордов так, чтобы вы всегда видели наиболее важные для вас метрики на главной странице.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion mb-2">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                    Начните вести складской учет
                </button>
            </h3>
            <div id="faq4" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <ul class="list-unstyled">
                        <li>
                            Складской учет в системе позволяет вам точно контролировать движение товаров и минимизировать убытки, связанные с недостачами или лишними запасами.
                        </li>
                        <li>
                            • Почему это важно: Точный учет ингредиентов и товаров помогает предотвратить перерасход, избежать дефицита, а также лучше планировать закупки, что напрямую влияет на прибыль и стабильность бизнеса.
                        </li>
                        <li>
                            • Как это работает: В системе вы можете вести учет поставок, списаний, проводить инвентаризацию и следить за остатками в реальном времени.
                        </li>
                        <li>
                            Совет: Начните с базовой инвентаризации и заведите все ингредиенты и товары в систему. Используйте модуль для списаний и контроля остатков, чтобы в любой момент видеть реальную картину на складе. Это поможет вам избежать неожиданных ситуаций с нехваткой товаров, особенно в часы пик.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
