<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CafeFlow - Регистрация заведения</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome для иконок -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .logo-auth {
            display: block;
            margin: 0 auto 1.5rem;
            max-width: 180px;
            height: auto;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
        }

        .btn-primary {
            background: #667eea;
            border: none;
            padding: 12px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: #764ba2;
            transform: translateY(-2px);
        }

        .icon-input {
            position: relative;
        }

        .icon-input i.fa-building,
        .icon-input i.fa-map-marker-alt,
        .icon-input i.fa-phone,
        .icon-input i.fa-user,
        .icon-input i.fa-calendar {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            z-index: 2;
        }

        .input-icon {
            padding-left: 45px !important;
            padding-right: 45px !important;
        }
    </style>
</head>
<body class="d-flex align-items-center">
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="auth-card p-4">
                <img src="{{ asset('storage/images/logo.png') }}" alt="logo" class="logo-auth">
                <form action="{{ route('registerAction') }}" method="POST">
                    @csrf
                    <!-- Название заведения -->
                    <div class="mb-3 icon-input">
                        <i class="fas fa-building"></i>
                        <input id="title"
                               name="title"
                               type="text"
                               class="form-control input-icon"
                               placeholder="Название заведения"
                               required>
                    </div>

                    <!-- Адрес -->
                    <div class="mb-3 icon-input">
                        <i class="fas fa-map-marker-alt"></i>
                        <input id="address"
                               name="address"
                               type="text"
                               class="form-control input-icon"
                               placeholder="Адрес заведения"
                               required>
                    </div>

                    <div class="mb-3 icon-input">
                        <i class="fas fa-phone"></i>
                        <input id="phone"
                               name="phone"
                               type="tel"
                               pattern="\+375\d{9}"
                               maxlength="13"
                               class="form-control input-icon"
                               placeholder="Номер телефона"
                               required
                               oninvalid="setCustomValidity('Введите номер в формате +375XXXXXXXXX')"
                        >
                    </div>

                    <!-- Форма предпринимательской деятельности -->
                    <div class="mb-3">
                        <select name="form_of_business_activity" id="form_of_business_activity" class="form-select" required>
                            <option value="" disabled selected>Выберите форму предпринимательской деятельности</option>
                            <option value="ООО">ООО</option>
                            <option value="ОАО">ОАО</option>
                            <option value="ИП">ИП</option>
                        </select>
                    </div>

                    <div class="mb-3 icon-input">
                        <i class="fas fa-user"></i>
                        <input id="owner_name"
                               name="owner_name"
                               type="text"
                               class="form-control input-icon"
                               placeholder="ФИО владельца"
                               required>
                    </div>

                    <div class="mb-4 icon-input">
                        <i class="fas fa-calendar"></i>
                        <input id="founding_date"
                               name="founding_date"
                               type="date"
                               class="form-control input-icon"
                               required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        Зарегистрировать заведение
                    </button>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            Заведение уже зарегистрировано?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
