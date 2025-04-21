<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CafeFlow - Авторизация</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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

        .icon-input i.fa-lock,
        .icon-input i.fa-envelope {
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

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #667eea;
            z-index: 2;
            background: rgba(255,255,255,0.5);
            padding: 0 5px;
            border-radius: 3px;
        }

        .password-toggle:hover {
            color: #764ba2;
            background: rgba(255,255,255,0.8);
        }
    </style>
</head>
<body class="d-flex align-items-center">
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
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
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo-auth">
                <form action="{{ route('loginAction') }}" method="POST">
                    @csrf
                    <div class="mb-3 icon-input">
                        <i class="fas fa-envelope"></i>
                        <input id="email"
                               name="email"
                               type="email"
                               class="form-control input-icon"
                               placeholder="Введите email"
                               value="{{ old('email') }}"
                               required>
                    </div>

                    <div class="mb-4 icon-input">
                        <i class="fas fa-lock"></i>
                        <input type="password"
                               id="passwordInput"
                               name="password"
                               class="form-control input-icon"
                               placeholder="Введите пароль"
                               value="{{ old('password') }}"
                               required>
                        <i class="password-toggle fas fa-eye" onclick="togglePassword()"></i>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        Войти
                    </button>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            Зарегистрировать свое заведение
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('passwordInput');
        const toggleIcon = document.querySelector('.password-toggle');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>
</body>
</html>
