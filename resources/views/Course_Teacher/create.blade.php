@extends('layouts.app')

@section('title', 'Asignación de Cursos')

@section('content')
<!-- Bootstrap Icons CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container my-5">
    {{-- Encabezado --}}
    <div class="mb-4">
        <h2 class="fw-bold text-dark mb-0">Asignación de Cursos a Instructores</h2>
        <p class="text-muted mb-0">Gestión de vinculación entre cursos e instructores</p>
    </div>

    {{-- Alerta de éxito --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Tarjeta y tabla de asignaciones --}}
    <div class="card shadow-sm border-0 rounded-3 mb-5">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="fw-bold text-dark mb-0">Asignaciones registradas</h5>
        </div>
        <div class="card-body p-0">
            @if(!isset($courseTeachers) || $courseTeachers->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                    <em>No hay asignaciones registradas aún.</em>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light border-bottom">
                            <tr>
                                <th class="px-4 py-3 text-secondary" style="width: 70px;">#</th>
                                <th class="py-3 text-secondary">Curso / Ficha</th>
                                <th class="py-3 text-secondary">Instructor</th>
                                <th class="py-3 text-end px-4 text-secondary" style="width: 260px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courseTeachers as $item)
                                <tr>
                                    <td class="px-4 fw-semibold text-secondary">{{ $item->id }}</td>
                                    
                                    {{-- Curso --}}
                                    <td class="fw-semibold text-dark">
                                        <i class="bi bi-mortarboard text-success me-2 fs-5 align-middle"></i>
                                        <span>{{ optional($item->course)->course_number ?? optional($item->course)->name ?? $item->course_id }}</span>
                                    </td>

                                    {{-- Instructor --}}
                                    <td class="text-secondary">
                                        <i class="bi bi-person-badge text-primary me-2 fs-5 align-middle"></i>
                                        <span>{{ optional($item->teacher)->name ?? $item->teacher_id }}</span>
                                    </td>

                                    {{-- Acciones --}}
                                    <td class="text-end px-4">
                                        <div class="d-inline-flex align-items-center gap-2">
                                            <a href="{{ route('course_teacher.show', $item->id) }}" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-eye"></i> Mostrar
                                            </a>
                                            <a href="{{ route('course_teacher.edit', $item->id) }}" class="btn btn-sm btn-outline-success d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <form action="{{ route('course_teacher.destroy', $item->id) }}" method="POST" class="d-inline m-0 p-0" onsubmit="return confirm('¿Deseas eliminar esta asignación?');">
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
</div>
@endsection