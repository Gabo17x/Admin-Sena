<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Áreas - AdminSENA</title>

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
            <h2 class="fw-bold text-dark mb-0">Área</h2>
            <p class="text-muted mb-0">Gestión y registro de áreas de formación</p>
        </div>

        {{-- Alerta de éxito --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        {{-- Tarjeta y tabla de áreas registradas --}}
        <div class="card shadow-sm border-0 rounded-3 mb-5">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Áreas registradas</h5>
            </div>
            <div class="card-body p-0">
                @if($areas->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                        <em>No hay áreas registradas aún.</em>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light border-bottom">
                                <tr>
                                    <th class="px-4 py-3 text-secondary" style="width: 80px;">#</th>
                                    <th class="py-3 text-secondary">Nombre</th>
                                    <th class="py-3 text-end px-4 text-secondary" style="width: 260px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($areas as $area)
                                    <tr>
                                        {{-- ID --}}
                                        <td class="px-4 fw-semibold text-secondary">{{ $area->id }}</td>

                                        {{-- Nombre con Icono --}}
                                        <td class="fw-semibold text-dark">
                                            <i class="bi bi-journal-bookmark text-success me-2 fs-5 align-middle"></i>
                                            <span>{{ $area->name }}</span>
                                        </td>

                                        {{-- Acciones (Alineación y tamaño exacto a Centros) --}}
                                        <td class="text-end px-4">
                                            <div class="d-inline-flex align-items-center gap-2">
                                                {{-- Mostrar --}}
                                                <a href="{{ route('area.show', $area->id) }}" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-eye"></i> Mostrar
                                                </a>

                                                {{-- Editar --}}
                                                <a href="{{ route('area.edit', $area->id) }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-pencil-square"></i> Editar
                                                </a>

                                                {{-- Eliminar con borde rojo estándar --}}
                                                <form action="{{ route('area.destroy', $area->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('¿Estás seguro de eliminar esta área?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1">
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

        {{-- Tarjeta: Formulario Crear Nueva Área --}}
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Crear nueva área</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('area.store') }}" method="POST">
                    @csrf

                    <div class="row g-3" style="max-width: 500px;">
                        <div class="col-12">
                            <label for="name" class="form-label fw-semibold">Nombre del Área:</label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Ej: Tecnología, Agricultura..." 
                                   value="{{ old('name') }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-4 d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        <span>Guardar área</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>