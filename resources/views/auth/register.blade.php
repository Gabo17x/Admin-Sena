<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse | AdminSENA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --sena-green: #39A900;
            --sena-green-hover: #2f8b00;
            --sena-blue: #00324D;
        }
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        a { text-decoration: none !important; }
        body {
            background: linear-gradient(135deg, #f0fdf4 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card {
            background: #ffffff;
            border: 1.5px solid #d1fae5;
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 50, 77, 0.12);
            overflow: hidden;
        }
        .btn-sena-pill {
            background-color: var(--sena-green);
            color: #ffffff !important;
            border-radius: 9999px;
            font-weight: 700;
            padding: 0.65rem 1.4rem;
            transition: all 0.2s ease;
            border: none;
        }
        .btn-sena-pill:hover {
            background-color: var(--sena-green-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 14px rgba(57, 169, 0, 0.3);
        }
        .form-control:focus {
            border-color: var(--sena-green);
            box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15);
        }
        .toggle-password-btn {
            cursor: pointer;
            background-color: #f8fafc;
            border-color: #dee2e6;
            transition: color 0.2s ease;
        }
        .toggle-password-btn:hover {
            color: var(--sena-green);
        }
    </style>
</head>
<body class="p-3">

    <div class="container" style="max-width: 900px;">
        <div class="login-card">
            <div class="row g-0">

                <!-- Columna Izquierda -->
                <div class="col-lg-5 p-5 text-white d-flex flex-column justify-content-between" style="background-color: var(--sena-blue);">
                    <div>
                        <a href="{{ url('/') }}" class="d-inline-flex align-items-center gap-2 text-white mb-4">
                            <img src="{{ asset('images/logosena.png') }}" alt="Logo SENA" style="height: 36px; width: auto; object-fit: contain;">
                            <span class="fs-4 fw-black">Admin<span style="color: #84cc16;">SENA</span></span>
                        </a>
                        <h2 class="fs-3 fw-bold mt-2">Crear Cuenta</h2>
                        <p class="text-white-50 small mt-2">Regístrate para acceder a la plataforma centralizada de gestión académica.</p>
                    </div>

                    <div class="pt-4 border-top border-secondary">
                        <span class="d-block text-white-50" style="font-size: 0.75rem;">Regional Cauca • ADSO</span>
                    </div>
                </div>

                <!-- Columna Derecha: Formulario -->
                <div class="col-lg-7 p-4 p-md-5">
                    <div class="mb-4">
                        <h3 class="fw-bold" style="color: var(--sena-blue);">Registrarse</h3>
                        <p class="text-secondary small">Completa tus datos para crear tu cuenta</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-4 py-2 px-3 small mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-1"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label small fw-bold text-secondary">Nombre Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-pill text-secondary ps-3">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus
                                       class="form-control bg-light border-start-0 rounded-end-pill py-2 text-dark"
                                       placeholder="Tu nombre completo">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-bold text-secondary">Correo Institucional</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-pill text-secondary ps-3">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                       class="form-control bg-light border-start-0 rounded-end-pill py-2 text-dark"
                                       placeholder="ejemplo@soy.sena.edu.co">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small fw-bold text-secondary">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-pill text-secondary ps-3">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" name="password" id="password" required
                                       class="form-control bg-light border-start-0 border-end-0 py-2 text-dark"
                                       placeholder="••••••••">
                                <button class="input-group-text toggle-password-btn border-start-0 rounded-end-pill pe-3 text-secondary"
                                        type="button" id="btnTogglePassword" aria-label="Mostrar u ocultar contraseña">
                                    <i class="bi bi-eye-slash-fill" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label small fw-bold text-secondary">Confirmar Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-pill text-secondary ps-3">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                       class="form-control bg-light border-start-0 rounded-end-pill py-2 text-dark"
                                       placeholder="••••••••">
                            </div>
                        </div>

                        <button type="submit" class="btn-sena-pill w-100 justify-content-center shadow-sm mb-3">
                            Crear Cuenta
                        </button>

                        <div class="text-center">
                            <span class="text-secondary small">¿Ya tienes cuenta?</span>
                            <a href="{{ route('login') }}" class="small fw-semibold" style="color: var(--sena-green);">
                                Inicia sesión
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('password');
            const btnTogglePassword = document.getElementById('btnTogglePassword');
            const toggleIcon = document.getElementById('toggleIcon');

            btnTogglePassword.addEventListener('click', function () {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                toggleIcon.classList.toggle('bi-eye-fill', isPassword);
                toggleIcon.classList.toggle('bi-eye-slash-fill', !isPassword);
            });
        });
    </script>

</body>
</html>