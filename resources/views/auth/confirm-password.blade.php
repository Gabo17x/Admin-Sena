@extends('layouts.app')

@section('title', 'Confirmar contraseña')

@section('content')
<div class="container py-5" style="max-width: 620px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4 p-lg-5">
            <h2 class="fw-bold mb-3 text-sena-blue">Confirmar contraseña</h2>
            <p class="text-secondary mb-4">Por seguridad, confirma tu contraseña antes de continuar.</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Contraseña</label>
                    <input id="password" type="password" name="password" class="form-control rounded-pill @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success rounded-pill px-4">Confirmar</button>
            </form>
        </div>
    </div>
</div>
@endsection
