<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructores - AdminSENA</title>

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
            <h2 class="fw-bold text-dark mb-0">Instructores</h2>
            <p class="text-muted mb-0">Gestión y registro de instructores formativos</p>
        </div>

        {{-- Alerta de éxito --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        {{-- Tarjeta y tabla de instructores registrados --}}
        <div class="card shadow-sm border-0 rounded-3 mb-5">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Instructores registrados</h5>
            </div>
            <div class="card-body p-0">
                @if($teachers->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                        <em>No hay instructores registrados aún.</em>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light border-bottom">
                                <tr>
                                    <th class="px-4 py-3 text-secondary" style="width: 80px;">#</th>
                                    <th class="py-3 text-secondary">Nombre</th>
                                    <th class="py-3 text-secondary">Ubicación</th>
                                    <th class="py-3 text-secondary">Área</th>
                                    <th class="py-3 text-secondary">Centro</th>
                                    <th class="py-3 text-end px-4 text-secondary" style="width: 260px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        {{-- ID --}}
                                        <td class="px-4 fw-semibold text-secondary">{{ $teacher->id }}</td>

                                        {{-- Nombre con Icono --}}
                                        <td class="fw-semibold text-dark">
                                            <i class="bi bi-person-badge text-success me-2 fs-5 align-middle"></i>
                                            <span>{{ $teacher->name }}</span>
                                        </td>

                                        {{-- Ubicación con Icono --}}
                                        <td class="text-muted">
                                            <i class="bi bi-geo-alt-fill text-danger me-1 fs-6 align-middle"></i>
                                            <span>{{ $teacher->location ?? 'N/A' }}</span>
                                        </td>

                                        {{-- Área --}}
                                        <td class="text-secondary">
                                            {{ optional($teacher->area)->name ?? 'Sin área' }}
                                        </td>

                                        {{-- Centro de Formación --}}
                                        <td class="text-secondary">
                                            {{ optional($teacher->trainingCenter)->name ?? (optional($teacher->training_center)->name ?? 'Sin centro') }}
                                        </td>

                                        {{-- Acciones --}}
                                        <td class="text-end px-4">
                                            <div class="d-inline-flex align-items-center gap-2">
                                                {{-- Mostrar --}}
                                                <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-eye"></i> Mostrar
                                                </a>

                                                {{-- Editar --}}
                                                <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-pencil-square"></i> Editar
                                                </a>

                                                {{-- Eliminar --}}
                                                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('¿Estás seguro de eliminar este instructor?');">
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

        {{-- Tarjeta: Formulario Crear Nuevo Instructor --}}
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Crear nuevo instructor</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3" style="max-width: 800px;">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">Nombre del Instructor:</label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Ej: Carlos Mario Pérez" 
                                   value="{{ old('name') }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="location" class="form-label fw-semibold">Ubicación:</label>
                            <input type="text" 
                                   name="location" 
                                   id="location" 
                                   class="form-control @error('location') is-invalid @enderror" 
                                   placeholder="Ej: Sede Principal" 
                                   value="{{ old('location') }}" 
                                   required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="area_id">Área:</label>
                            <select name="area_id" id="area_id" class="form-select @error('area_id') is-invalid @enderror" required>
                                <option value="">Seleccione un área</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('area_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="training_center_id">Centro de Formación:</label>
                            <select name="training_center_id" id="training_center_id" class="form-select @error('training_center_id') is-invalid @enderror" required>
                                <option value="">Seleccione un centro de formación</option>
                                @foreach($training_centers as $training_center)
                                    <option value="{{ $training_center->id }}" {{ old('training_center_id') == $training_center->id ? 'selected' : '' }}>
                                        {{ $training_center->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('training_center_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-4 d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        <span>Guardar instructor</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>