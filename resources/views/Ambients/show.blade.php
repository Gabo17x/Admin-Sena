@extends('layouts.app')

@section('title', 'Detalle del Ambiente - AdminSENA')

@push('styles')
<style>
    .form-sena-card {
        background: #ffffff;
        border: 1.5px solid #d1fae5;
        border-radius: 2rem;
        box-shadow: 0 20px 40px -15px rgba(0, 50, 77, 0.07);
    }
    .btn-sena-pill {
        background-color: #39A900;
        color: #ffffff !important;
        border-radius: 9999px;
        font-weight: 700;
        padding: 0.6rem 1.6rem;
        border: none;
        transition: all 0.2s ease;
    }
    .btn-sena-pill:hover {
        background-color: #2f8b00;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(57, 169, 0, 0.3);
    }
    .btn-sena-outline {
        border-radius: 9999px;
        font-weight: 600;
        padding: 0.5rem 1.4rem;
    }
    .info-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        color: #6c757d;
        font-weight: 700;
    }
    .info-value {
        font-size: 1.05rem;
        color: #00324D;
        font-weight: 600;
    }
    .badge-disponible { background-color: #39A900; }
    .badge-ocupado { background-color: #dc3545; }
    .badge-mantenimiento { background-color: #ffc107; color: #00324D; }
</style>
@endpush

@section('content')
<div class="container-xl px-4" style="max-width: 800px;">

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold" style="color: #00324D;">Detalle del Ambiente</h2>
            <p class="text-secondary small mb-0">Información completa del ambiente #{{ $ambient->id }}</p>
        </div>
        <span class="badge rounded-pill badge-{{ $ambient->status }} text-capitalize px-3 py-2">
            {{ $ambient->status }}
        </span>
    </div>

    <div class="form-sena-card p-4 p-md-5">
        <div class="row g-4">

            <div class="col-md-6">
                <div class="info-label">Número / Nombre</div>
                <div class="info-value">
                    <i class="bi bi-door-open-fill me-1" style="color: #39A900;"></i>
                    {{ $ambient->number }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-label">Capacidad</div>
                <div class="info-value">{{ $ambient->capacity }} personas</div>
            </div>

            <div class="col-md-6">
                <div class="info-label">Tipo</div>
                <div class="info-value text-capitalize">{{ $ambient->type }}</div>
            </div>

            <div class="col-md-6">
                <div class="info-label">Estado</div>
                <div class="info-value text-capitalize">{{ $ambient->status }}</div>
            </div>

            <div class="col-md-6">
                <div class="info-label">Centro de Formación</div>
                <div class="info-value">{{ $ambient->trainingCenter->name ?? 'Sin asignar' }}</div>
            </div>

            <div class="col-md-6">
                <div class="info-label">Área</div>
                <div class="info-value">{{ $ambient->area->name ?? 'Sin asignar' }}</div>
            </div>

            <div class="col-md-6">
                <div class="info-label">Registrado el</div>
                <div class="info-value">{{ $ambient->created_at->format('d/m/Y H:i') }}</div>
            </div>

            <div class="col-md-6">
                <div class="info-label">Última actualización</div>
                <div class="info-value">{{ $ambient->updated_at->format('d/m/Y H:i') }}</div>
            </div>

        </div>

        <div class="d-flex gap-2 mt-4 pt-3 border-top">
            <a href="{{ route('ambients.edit', $ambient->id) }}" class="btn btn-sena-pill d-inline-flex align-items-center gap-2">
                <i class="bi bi-pencil-square"></i>
                <span>Editar</span>
            </a>
            <a href="{{ route('ambients.create') }}" class="btn btn-outline-secondary btn-sena-outline">
                <i class="bi bi-arrow-left me-1"></i> Volver al listado
            </a>
        </div>
    </div>

</div>
@endsection