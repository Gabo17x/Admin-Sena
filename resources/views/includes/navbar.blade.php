<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm py-2" style="background: linear-gradient(90deg, #166534 0%, #22c55e 100%);">
  <div class="container">
    <a class="navbar-brand flex items-center gap-2" href="{{ url('/') }}">
    <img src="{{ asset('images/logosena.png') }}" alt="Logo SENA" style="max-height: 40px; width: auto;">
    <span class="font-bold text-white text-lg">AdminSena</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdminSena" aria-controls="navbarAdminSena" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarAdminSena">
      <ul class="navbar-nav ms-auto align-items-center gap-2">
        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-2" href="{{ url('/') }}">INICIO</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-2" href="{{ route('training_center.create') }}">CENTRO DE FORMACIÓN</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-2" href="{{ route('area.create') }}"> ÁREA</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-2" href="{{ route('course.create') }}"> CURSOS</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-2" href="{{ route('teacher.create')}}">INSTRUCTORES</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-2" href="{{ route('computer.create') }}">COMPUTADORES</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white fw-semibold px-2" href="{{ route('apprentice.create') }}"> APRENDIZ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>