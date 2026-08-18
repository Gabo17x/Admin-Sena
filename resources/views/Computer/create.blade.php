<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Computadores - AdminSENA</title>

    <!-- 1. Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 2. Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    {{-- Barra de Navegación --}}
    @include('includes.navbar')

    <div class="container my-5">
        {{-- Encabezado --}}
        <div class="mb-4">
            <h2 class="fw-bold text-dark mb-0">Gestión de Computadores</h2>
            <p class="text-muted mb-0">Listado y administración de equipos registrados</p>
        </div>

        {{-- Alerta de éxito --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        {{-- Tarjeta y tabla de computadores --}}
        <div class="card shadow-sm border-0 rounded-3 mb-5">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Computadores registrados</h5>
            </div>
            <div class="card-body p-0">
                @if($computers->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                        <em>No hay computadores registrados aún.</em>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light border-bottom">
                                <tr>
                                    <th class="px-4 py-3 text-secondary" style="width: 80px;"># ID</th>
                                    <th class="py-3 text-secondary">Número de Equipo</th>
                                    <th class="py-3 text-secondary">Marca</th>
                                    <th class="py-3 text-end px-4 text-secondary" style="width: 260px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($computers as $computer)
                                    <tr>
                                        {{-- ID --}}
                                        <td class="px-4 fw-semibold text-secondary">{{ $computer->id }}</td>

                                        {{-- Número de Equipo con Icono --}}
                                        <td class="fw-semibold text-dark">
                                            <i class="bi bi-laptop text-success me-2 fs-5 align-middle"></i>
                                            <span>Equipo #{{ $computer->id }}</span>
                                        </td>

                                        {{-- Marca --}}
                                        <td class="text-secondary">
                                            {{ $computer->brand ?? $computer->name ?? 'N/A' }}
                                        </td>

                                        {{-- Acciones --}}
                                        <td class="text-end px-4">
                                            <div class="d-inline-flex align-items-center gap-2">
                                                {{-- Mostrar --}}
                                                <a href="{{ route('computer.show', $computer->id) }}" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-eye"></i> Mostrar
                                                </a>

                                                {{-- Editar --}}
                                                <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-pencil-square"></i> Editar
                                                </a>

                                                {{-- Eliminar --}}
                                                <form action="{{ route('computer.destroy', $computer->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('¿Estás seguro de eliminar este computador?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1" title="Eliminar">
                                                        <i class="bi bi-trash3"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        {{-- Tarjeta: Formulario Crear Nuevo Computador --}}
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Registrar nuevo computador</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('computer.store') }}" method="POST">
                    @csrf

                    <div class="row g-3" style="max-width: 600px;">
                        <div class="col-12">
                            <label for="brand" class="form-label fw-semibold">Marca del Computador:</label>
                            <input type="text" 
                                   name="brand" 
                                   id="brand" 
                                   class="form-control @error('brand') is-invalid @enderror" 
                                   placeholder="Ej: Lenovo, HP, Asus..." 
                                   value="{{ old('brand') }}" 
                                   required>
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-4 d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        <span>Guardar computador</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>