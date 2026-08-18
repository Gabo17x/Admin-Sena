@extends('layouts.app')

@section('title', 'Editar Aprendiz')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Editar</h1>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('apprentice.update', $apprentice) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label class="form-label">
                        Nombre:
                        <input type="text" name="name" class="form-control" value="{{ old('name', $apprentice->name) }}">
                    </label>

                    <label class="form-label mt-3">
                        Email:
                        <input type="email" name="email" class="form-control" value="{{ old('email', $apprentice->email) }}">
                    </label>

                    <label class="form-label mt-3">
                        Número:
                        <input type="text" name="number" class="form-control" value="{{ old('number', $apprentice->number) }}">
                    </label>

                    <label class="form-label mt-3">
                        Curso (ID):
                        <input type="number" name="course_id" class="form-control" value="{{ old('course_id', $apprentice->course_id) }}">
                    </label>

                    <label class="form-label mt-3">
                        Computador (ID):
                        <input type="number" name="computer_id" class="form-control" value="{{ old('computer_id', $apprentice->computer_id) }}">
                    </label>

                    <button type="submit" class="btn btn-success mt-3">Actualizar aprendiz</button>
                    <a href="{{ route('apprentice.create') }}" class="btn btn-outline-secondary mt-3 ms-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection