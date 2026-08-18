<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centros de Formación - AdminSENA</title>

    <!-- 1. Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 2. Bootstrap Icons CSS (Carga garantizada de iconos) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    {{-- Barra de Navegación --}}
    @include('includes.navbar')

    <div class="container my-5">
        {{-- Encabezado y botón de crear --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-0">Centros de Formación</h2>
                <p class="text-muted mb-0">Listado general de sedes y centros registrados</p>
            </div>
            <a href="{{ route('training_center.create') }}" class="btn btn-success d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i>
                <span>Nuevo Centro</span>
            </a>
        </div>

        {{-- Alerta de éxito --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        {{-- Tarjeta y tabla de centros --}}
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light border-bottom">
                            <tr>
                                <th class="px-4 py-3 text-secondary" style="width: 80px;">#</th>
                                <th class="py-3 text-secondary">Centro</th>
                                <th class="py-3 text-secondary">Ubicación</th>
                                <th class="py-3 text-end px-4 text-secondary" style="width: 250px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($training_centers as $center)
                                <tr>
                                    {{-- ID --}}
                                    <td class="px-4 fw-semibold text-secondary">{{ $center->id }}</td>

                                    {{-- Nombre con Icono de Edificio --}}
                                    <td class="fw-semibold text-dark">
                                        <i class="bi bi-building text-success me-2 fs-5 align-middle"></i>
                                        <span>{{ $center->name }}</span>
                                    </td>

                                    {{-- Ubicación con Icono de Pin --}}
                                    <td class="text-muted">
                                        <i class="bi bi-geo-alt-fill text-danger me-1 fs-6 align-middle"></i>
                                        <span>{{ $center->location }}</span>
                                    </td>

                                    {{-- Acciones --}}
                                    <td class="text-end px-4">
                                        <div class="d-inline-flex gap-2">
                                            {{-- Mostrar --}}
                                            <a href="{{ route('training_center.show', $center->id) }}" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-eye"></i> Mostrar
                                            </a>

                                            {{-- Editar --}}
                                            <a href="{{ route('training_center.edit', $center->id) }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('training_center.destroy', $center->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este centro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-trash3"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                                        <em>No hay centros de formación registrados aún.</em>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS (Incluye Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>