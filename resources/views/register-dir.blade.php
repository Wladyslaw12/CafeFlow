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

        .icon-input i.fa-user,
        .icon-input i.fa-envelope,
        .icon-input i.fa-lock{
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
                <form action="{{ route('registerDirAction') }}" method="POST">
                    @csrf
                    <div class="mb-3 icon-input">
                        <i class="fas fa-user"></i>
                        <input id="name"
                               name="name"
                               type="text"
                               class="form-control input-icon"
                               placeholder="Имя"
                               required>
                    </div>

                    <div class="mb-3 icon-input">
                        <i class="fas fa-envelope"></i>
                        <input id="email"
                               name="email"
                               type="email"
                               class="form-control input-icon"
                               placeholder="Электронная почта"
                               required>
                    </div>

                    <div class="mb-3 icon-input">
                        <i class="fas fa-lock"></i>
                        <input id="password"
                               name="password"
                               type="password"
                               class="form-control input-icon"
                               placeholder="Пароль"
                               required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        Зарегистрировать директора
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
