@extends('layouts.app')

@section('title', 'Editar Asignación Curso-Instructor')

@section('content')
	<div class="container py-4">
		<h1 class="mb-4">Editar Asignación Curso-Instructor</h1>

		<div class="card shadow-sm border-0">
			<div class="card-body">
				<form action="{{ route('course_teacher.update', $course_teacher) }}" method="POST">
					@csrf
					@method('PUT')

					<label class="form-label">
						Curso (ID):
						<input type="number" name="course_id" class="form-control" value="{{ old('course_id', $course_teacher->course_id) }}">
					</label>

					<label class="form-label mt-3">
						Instructor (ID):
						<input type="number" name="teacher_id" class="form-control" value="{{ old('teacher_id', $course_teacher->teacher_id) }}">
					</label>

					<button type="submit" class="btn btn-success mt-3">Actualizar asignación</button>
					<a href="{{ route('course_teacher.create') }}" class="btn btn-outline-secondary mt-3 ms-2">Cancelar</a>
				</form>
			</div>
		</div>
	</div>
@endsection
