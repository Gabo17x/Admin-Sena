@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container py-4">

    <div class="mb-4">
        <h1 class="fw-bold text-dark mb-1">Panel de Administración</h1>
        <p class="text-muted mb-0">Resumen general del sistema SENA</p>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4 col-lg">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;background:#dcfce7;">
                        <i class="bi bi-diagram-3 fs-4 text-success"></i>
                    </div>
                    <div>
                        <div class="fs-4 fw-bold">{{ $stats['areas'] }}</div>
                        <div class="text-muted small">Áreas</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;background:#dbeafe;">
                        <i class="bi bi-journal-text fs-4 text-primary"></i>
                    </div>
                    <div>
                        <div class="fs-4 fw-bold">{{ $stats['courses'] }}</div>
                        <div class="text-muted small">Cursos</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;background:#fef9c3;">
                        <i class="bi bi-building fs-4 text-warning"></i>
                    </div>
                    <div>
                        <div class="fs-4 fw-bold">{{ $stats['training_centers'] }}</div>
                        <div class="text-muted small">Centros de Formación</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;background:#fce7f3;">
                        <i class="bi bi-people fs-4" style="color:#db2777;"></i>
                    </div>
                    <div>
                        <div class="fs-4 fw-bold">{{ $stats['apprentices'] }}</div>
                        <div class="text-muted small">Aprendices</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg">
            <div class="card border-0 shadow-sm rounded-3 h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;background:#e0e7ff;">
                        <i class="bi bi-person-badge fs-4" style="color:#4f46e5;"></i>
                    </div>
                    <div>
                        <div class="fs-4 fw-bold">{{ $stats['teachers'] }}</div>
                        <div class="text-muted small">Instructores</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECCIÓN DONDE VAN LOS ENLACES -->
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3">Accesos rápidos</h5>
           <!-- Tarjeta 1: Áreas -->
<a href="{{ url('/area/create') }}" class="btn ...">Ver áreas</a>

<!-- Tarjeta 2: Cursos -->
<a href="{{ url('/course/create') }}" class="btn ...">Ver cursos</a>

<!-- Tarjeta 3: Instructores -->
<a href="{{ url('/course-teacher/create') }}" style="text-decoration: none; color: inherit;">
    <div class="card">
        <h3>Instructores</h3>
        <p>Administra los docentes y su asignación.</p>
    </div>
</a>

<!-- Tarjeta 4: Aprendices -->
<a href="{{ url('/apprentices/create') }}" style="text-decoration: none; color: inherit;">
    <div class="card">
        <h3>Aprendices</h3>
        <p>Consulta y organiza la información de los aprendices.</p>
    </div>
</a>
        </div>
    </div>

</div>
@endsection