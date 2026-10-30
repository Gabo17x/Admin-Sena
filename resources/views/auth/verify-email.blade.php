@extends('layouts.app')

@section('title', 'Verifica tu correo')

@section('content')
<div class="container py-5" style="max-width: 620px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4 p-lg-5">
            <h2 class="fw-bold mb-3 text-sena-blue">Verifica tu correo</h2>
            <p class="text-secondary mb-4">
                Gracias por registrarte. Antes de continuar, revisa tu correo electrónico y haz clic en el enlace de verificación que te enviamos.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success rounded-4">Se ha enviado un nuevo enlace de verificación.</div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-success rounded-pill px-4">Reenviar correo de verificación</button>
            </form>

            <div class="mt-4">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-secondary text-decoration-none">
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
