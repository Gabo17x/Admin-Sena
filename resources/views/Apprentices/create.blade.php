<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendices - AdminSENA</title>

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
            <h2 class="fw-bold text-dark mb-0">Aprendices</h2>
            <p class="text-muted mb-0">Gestión y registro de aprendices</p>
        </div>

        {{-- Alerta de éxito --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        {{-- Tarjeta y tabla de aprendices registrados --}}
        <div class="card shadow-sm border-0 rounded-3 mb-5">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Aprendices registrados</h5>
            </div>
            <div class="card-body p-0">
                @if($apprentices->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                        <em>No hay aprendices registrados aún.</em>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light border-bottom">
                                <tr>
                                    <th class="px-4 py-3 text-secondary" style="width: 70px;">#</th>
                                    <th class="py-3 text-secondary">Nombre</th>
                                    <th class="py-3 text-secondary">Correo</th>
                                    <th class="py-3 text-secondary">Teléfono</th>
                                    <th class="py-3 text-secondary">Curso</th>
                                    <th class="py-3 text-secondary">Computador</th>
                                    <th class="py-3 text-end px-4 text-secondary" style="width: 260px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apprentices as $apprentice)
                                    <tr>
                                        {{-- ID --}}
                                        <td class="px-4 fw-semibold text-secondary">{{ $apprentice->id }}</td>

                                        {{-- Nombre con Icono --}}
                                        <td class="fw-semibold text-dark">
                                            <i class="bi bi-person text-success me-2 fs-5 align-middle"></i>
                                            <span>{{ $apprentice->name }}</span>
                                        </td>

                                        {{-- Correo --}}
                                        <td class="text-muted">
                                            {{ $apprentice->email }}
                                        </td>

                                        {{-- Teléfono --}}
                                        <td class="text-muted">
                                            {{ $apprentice->phone ?? $apprentice->cellphone ?? 'N/A' }}
                                        </td>

                                        {{-- Curso (Ficha o Nombre) --}}
                                        <td class="text-secondary">
                                            {{ optional($apprentice->course)->code ?? optional($apprentice->course)->name ?? $apprentice->course_id }}
                                        </td>

                                        {{-- Computador Asignado --}}
                                        <td class="text-secondary">
                                            {{ optional($apprentice->computer)->id ?? $apprentice->computer_id ?? 'Sin asignar' }}
                                        </td>

                                        {{-- Acciones --}}
                                        <td class="text-end px-4">
                                            <div class="d-inline-flex align-items-center gap-2">
                                                {{-- Mostrar --}}
                                                <a href="{{ route('apprentice.show', $apprentice->id) }}" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-eye"></i> Mostrar
                                                </a>

                                                {{-- Editar --}}
                                                <a href="{{ route('apprentice.edit', $apprentice->id) }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                                    <i class="bi bi-pencil-square"></i> Editar
                                                </a>

                                                {{-- Eliminar --}}
                                                <form action="{{ route('apprentice.destroy', $apprentice->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('¿Estás seguro de eliminar este aprendiz?');">
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

        {{-- Tarjeta: Formulario Crear Nuevo Aprendiz --}}
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold text-dark mb-0">Crear nuevo aprendiz</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('apprentice.store') }}" method="POST">
                    @csrf

                    <div class="row g-3" style="max-width: 800px;">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">Nombre Completo:</label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Ej: Juliana Bolaños" 
                                   value="{{ old('name') }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Correo Electrónico:</label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="ejemplo@correo.com" 
                                   value="{{ old('email') }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="phone" class="form-label fw-semibold">Teléfono:</label>
                            <input type="text" 
                                   name="phone" 
                                   id="phone" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   placeholder="Ej: 3001234567" 
                                   value="{{ old('phone') }}" 
                                   required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold" for="course_id">Curso / Ficha:</label>
                            <select name="course_id" id="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                                <option value="">Seleccione un curso</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                        {{ $course->code ?? $course->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold" for="computer_id">Computador:</label>
                            <select name="computer_id" id="computer_id" class="form-select @error('computer_id') is-invalid @enderror">
                                <option value="">Sin asignar</option>
                                @foreach($computers as $computer)
                                    <option value="{{ $computer->id }}" {{ old('computer_id') == $computer->id ? 'selected' : '' }}>
                                        Equipo #{{ $computer->id }} ({{ $computer->brand ?? 'S/M' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('computer_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success mt-4 d-inline-flex align-items-center gap-2">
                        <i class="bi bi-plus-circle"></i>
                        <span>Guardar aprendiz</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>