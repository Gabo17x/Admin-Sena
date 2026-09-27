    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recuperar Contraseña | AdminSENA</title>

        <!-- Bootstrap 5: framework de estilos usado en todo el proyecto (login, etc.) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>

        <!-- Iconos de Bootstrap (usados en el ícono del sobre de correo) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Tipografía institucional (misma fuente que el login) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        <style>
            /* Colores institucionales SENA reutilizados como variables CSS */
            :root {
                --sena-green: #39A900;
                --sena-green-hover: #2f8b00;
                --sena-blue: #00324D;
            }

            * { font-family: 'Plus Jakarta Sans', sans-serif; }
            a { text-decoration: none !important; }

            /* Fondo degradado suave que centra la tarjeta en toda la pantalla */
            body {
                background: linear-gradient(135deg, #f0fdf4 0%, #e2e8f0 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0;
            }

            /* Tarjeta blanca principal que contiene todo el formulario */
            .login-card {
                background: #ffffff;
                border: 1.5px solid #d1fae5;
                border-radius: 2rem;
                box-shadow: 0 25px 50px -12px rgba(0, 50, 77, 0.12);
                overflow: hidden;
            }

            /* Botón verde tipo "pastilla" (bordes redondeados) usado en todo el sitio */
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

            /* Resalta el campo de correo en verde SENA cuando el usuario hace clic */
            .form-control:focus {
                border-color: var(--sena-green);
                box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15);
            }
        </style>
    </head>
    <body class="p-3">

        <!-- Contenedor centrado que limita el ancho máximo de la tarjeta -->
        <div class="container" style="max-width: 900px;">
            <div class="login-card">
                <div class="row g-0">

                    <!-- ===== COLUMNA IZQUIERDA: Panel informativo institucional (fondo azul) ===== -->
                    <div class="col-lg-5 p-5 text-white d-flex flex-column justify-content-between" style="background-color: var(--sena-blue);">
                        <div>
                            <!-- Logo + nombre de la plataforma -->
                            <a href="{{ url('/') }}" class="d-inline-flex align-items-center gap-2 text-white mb-4">
                                <img src="{{ asset('images/logosena.png') }}" alt="Logo SENA" style="height: 36px; width: auto; object-fit: contain;">
                                <span class="fs-4 fw-black">Admin<span style="color: #84cc16;">SENA</span></span>
                            </a>

                            <!-- Título y descripción explicando el propósito de esta pantalla -->
                            <h2 class="fs-3 fw-bold mt-2">¿Olvidaste tu contraseña?</h2>
                            <p class="text-white-50 small mt-2">No te preocupes, ingresa tu correo institucional y te enviaremos un enlace para restablecerla.</p>
                        </div>

                        <!-- Pie de la columna izquierda: identifica la regional/programa -->
                        <div class="pt-4 border-top border-secondary">
                            <span class="d-block text-white-50" style="font-size: 0.75rem;">Regional Cauca • ADSO</span>
                        </div>
                    </div>

                    <!-- ===== COLUMNA DERECHA: Formulario para pedir el enlace de recuperación ===== -->
                    <div class="col-lg-7 p-4 p-md-5">
                        <div class="mb-4">
                            <h3 class="fw-bold" style="color: var(--sena-blue);">Recuperar Contraseña</h3>
                            <p class="text-secondary small">Ingresa tu correo y te enviaremos el enlace de recuperación</p>
                        </div>

                        <!-- Mensaje de éxito: Laravel lo llena automáticamente cuando el envío del correo funciona -->
                        @if (session('status'))
                            <div class="alert alert-success rounded-4 py-2 px-3 small mb-4">
                                <i class="bi bi-check-circle-fill me-1"></i>
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Mensaje de error: se muestra si el correo no existe, está mal escrito, etc. -->
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-4 py-2 px-3 small mb-4" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <!-- Formulario que envía el correo al controlador PasswordResetLinkController -->
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf {{-- Token de seguridad obligatorio en todo formulario POST de Laravel --}}

                            <div class="mb-4">
                                <label for="email" class="form-label small fw-bold text-secondary">Correo Institucional</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-pill text-secondary ps-3">
                                        <i class="bi bi-envelope-fill"></i>
                                    </span>
                                    <!-- old('email') recupera lo que el usuario escribió si el formulario falla y recarga -->
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                                        class="form-control bg-light border-start-0 rounded-end-pill py-2 text-dark"
                                        placeholder="ejemplo@soy.sena.edu.co">
                                </div>
                            </div>

                            <!-- Botón que envía el formulario -->
                            <button type="submit" class="btn-sena-pill w-100 justify-content-center shadow-sm mb-3">
                                Enviar enlace de recuperación
                            </button>

                            <!-- Enlace para regresar al inicio sin completar el proceso -->
                            <div class="text-center">
                                <a href="{{ url('/') }}" class="text-secondary small hover-sena">
                                    <i class="bi bi-arrow-left me-1"></i> Volver al Inicio
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </body>
    </html>