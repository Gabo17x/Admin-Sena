<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos - AdminSENA</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    {{-- Barra de Navegación --}}
    @include('includes.navbar')

    <div class="container my-5">
        {{-- Encabezado --}}
        <div class="mb-4">
            <h2 class="fw-bold text-dark mb-0">Cursos</h2>
            <p class="text-muted mb-0">Gestión y registro de cursos de formación</p>
        </div>

        {{-- Alerta de éxito --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        {{-- Tarjeta y tabla de cursos registrados --}}
        <div class="card shadow-sm border-0 rounded-3 mb-5">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Cursos registrados</h5>
            </div>
            <div class="card-body p-0">
                @if($courses->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                        <em>No hay cursos registrados aún.</em>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light border-bottom">
                                <tr>
                                    <th class="px-4 py-3 text-secondary" style="width: 70px;">#</th>
                                    <th class="py-3 text-secondary">Número de curso</th>
                                    <th class="py-3 text-secondary">Día</th>
                                    <th class="py-3 text-secondary">Área</th>
                                    <th class="py-3 text-secondary">Centro</th>
                                    <th class="py-3 text-end px-4 text-secondary" style="width: 260px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        {{-- ID --}}
                                        <td class="px-4 fw-semibold text-secondary">{{ $course->id }}</td>

                                        {{-- Número de curso con Icono --}}
                                        <td class="fw-semibold text-dark">
                                            <i class="bi bi-mortarboard text-success me-2 fs-5 align-middle"></i>
                                            <span>{{ $course->course_number ?? $course->name ?? $course->id }}</span>
                                        </td>

                                        {{-- Día --}}
                                        <td class="text-muted">
                                            {{ $course->day ?? 'N/A' }}
                                        </td>

                                        {{-- Área --}}
                                        <td class="text-secondary">
                                            @php
                                                $areaItem = isset($areas) ? $areas->firstWhere('id', $course->area_id) : null;
                                            @endphp
                                            {{ $areaItem ? $areaItem->name : 'Sin área' }}
                                        </td>

                                        {{-- Centro --}}
                                        <td class="text-secondary">
                                            @php
                                                $centerItem = isset($training_centers) ? $training_centers->firstWhere('id', $course->training_center_id) : null;
                                            @endphp
                                            {{ $centerItem ? $centerItem->name : 'Sin centro' }}
                                        </td>

                                        {{-- Acciones --}}
                                        <td class="text-end px-4">
                                            <div class="d-inline-flex align-items-center gap-2">
                                                <a href="{{ route('course.show', $course->id) }}" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-eye"></i> Mostrar
                                                </a>
                                                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-pencil-square"></i> Editar
                                                </a>
                                                <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('¿Estás seguro de eliminar este curso?');">
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

        {{-- Tarjeta: Formulario Crear Nuevo Curso --}}
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Crear nuevo curso</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('course.store') }}" method="POST">
                    @csrf

                    <div class="row g-3" style="max-width: 800px;">
                        <div class="col-md-6">
                            <label for="course_number" class="form-label fw-semibold">Número de curso:</label>
                            <input type="text" 
                                   name="course_number" 
                                   id="course_number" 
                                   class="form-control @error('course_number') is-invalid @enderror" 
                                   placeholder="Ej: 3223899" 
                                   value="{{ old('course_number') }}" 
                                   required>
                            @error('course_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="day" class="form-label fw-semibold">Día / Jornada:</label>
                            <input type="text" 
                                   name="day" 
                                   id="day" 
                                   class="form-control @error('day') is-invalid @enderror" 
                                   placeholder="Ej: Diurna, Tarde, Noche" 
                                   value="{{ old('day') }}" 
                                   required>
                            @error('day')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="area_id">Área:</label>
                            <select name="area_id" id="area_id" class="form-select @error('area_id') is-invalid @enderror" required>
                                <option value="">Seleccione un área</option>
                                @if(isset($areas))
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                            {{ $area->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('area_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold" for="training_center_id">Centro de Formación:</label>
                            <select name="training_center_id" id="training_center_id" class="form-select @error('training_center_id') is-invalid @enderror" required>
                                <option value="">Seleccione un centro de formación</option>
                                @if(isset($training_centers))
                                    @foreach($training_centers as $training_center)
                                        <option value="{{ $training_center->id }}" {{ old('training_center_id') == $training_center->id ? 'selected' : '' }}>
                                            {{ $training_center->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('training_center_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-4 d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        <span>Guardar curso</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>