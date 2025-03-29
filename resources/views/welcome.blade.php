<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absolut - Управление бизнесом</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2A4365;
            --accent-color: #4A5568;
        }

        body {
            background: #F7FAFC;
            padding: 2rem 0;
        }

        .header {
            background: var(--primary-color);
            color: white;
            padding: 3rem 0;
            margin-bottom: 3rem;
        }

        .section-title {
            color: var(--primary-color);
            border-left: 4px solid var(--accent-color);
            padding-left: 1rem;
            margin: 2.5rem 0;
        }

        .feature-card {
            border: none;
            border-radius: 0.5rem;
            transition: transform 0.3s;
            background: white;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .accordion-button:not(.collapsed) {
            background: rgba(42, 67, 101, 0.05);
            color: var(--primary-color);
        }
    </style>
</head>
<body>
<!-- Шапка -->
<div class="header">
    <div class="container">
        <h1 class="display-4 mb-0">
            <i class="fas fa-chart-line me-2"></i>Absolut — система управления бизнесом
        </h1>
    </div>
</div>

<div class="container">
    <!-- Часто задаваемые вопросы -->
    <h2 class="section-title h3">Часто задаваемые вопросы</h2>
    <div class="accordion mb-5">
        <div class="accordion-item feature-card">
            <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    Для каких бизнесов подходит Absolut?
                </button>
            </h3>
            <div id="faq1" class="accordion-collapse collapse show">
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

        <!-- Добавьте остальные вопросы по аналогии -->
    </div>

    <!-- Советы для начинающих -->
    <h2 class="section-title h3">Советы для начинающих</h2>
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="feature-card p-4">
                <h4 class="mb-3">
                    <i class="fas fa-book-open me-2 text-primary"></i>Работа с меню
                </h4>
                <ul class="list-styled">
                    <li>Создавайте категории блюд</li>
                    <li>Добавляйте фото и описания</li>
                    <li>Контролируйте остатки ингредиентов</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="feature-card p-4">
                <h4 class="mb-3">
                    <i class="fas fa-warehouse me-2 text-primary"></i>Складской учёт
                </h4>
                <ul class="list-styled">
                    <li>Учет поставок и списаний</li>
                    <li>Автоматизация инвентаризации</li>
                    <li>Контроль сроков годности</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Система лояльности -->
    <h2 class="section-title h3">Программа лояльности</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="feature-card p-4 text-center">
                <div class="mb-3">
                    <i class="fas fa-star fa-2x text-warning"></i>
                </div>
                <h5>Бонусные баллы</h5>
                <p class="text-muted">Начисление баллов за покупки</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-card p-4 text-center">
                <div class="mb-3">
                    <i class="fas fa-percent fa-2x text-success"></i>
                </div>
                <h5>Персональные скидки</h5>
                <p class="text-muted">Индивидуальные предложения для клиентов</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-card p-4 text-center">
                <div class="mb-3">
                    <i class="fas fa-gift fa-2x text-danger"></i>
                </div>
                <h5>Подарочные карты</h5>
                <p class="text-muted">Выпуск и отслеживание карт</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>