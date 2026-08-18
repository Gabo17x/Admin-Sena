<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso Registrado</title>
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
</head>
<body>
    <h1>Curso Registrado</h1>
    <div>
        <p><strong>ID:</strong> {{ $course->id }}</p>
        <p><strong>Número de curso:</strong> {{ $course->course_number }}</p>
        <p><strong>Día:</strong> {{ $course->day }}</p>
        <p><strong>Área ID:</strong> {{ $course->area_id }}</p>
        <p><strong>Centro de formación ID:</strong> {{ $course->training_center_id }}</p>
        <p><strong>Creado:</strong> {{ $course->created_at }}</p>
    </div>
    <a href="{{ route('course.create') }}">Volver al formulario</a>
</body>
</html>