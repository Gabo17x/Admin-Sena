<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso - Profesor Registrado</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
</head>
<body>
    <h1>Curso - Profesor Registrado</h1>
    <div>
        <p><strong>ID:</strong> {{ $course_teacher->id }}</p>
        <p><strong>Curso ID:</strong> {{ $course_teacher->course_id }}</p>
        <p><strong>Profesor ID:</strong> {{ $course_teacher->teacher_id }}</p>
        <p><strong>Creado:</strong> {{ $course_teacher->created_at }}</p>
    </div>
    <a href="{{ route('course_teacher.create') }}">Volver al formulario</a>
</body>
</html>