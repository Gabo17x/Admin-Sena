<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin SENA</title>
        @if (app()->environment('testing'))
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <script src="{{ asset('js/app.js') }}" defer></script>
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <!-- Iconos de Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body class="min-h-screen flex flex-col bg-gradient-to-br from-emerald-50/60 via-slate-50 to-[#39A900]/10 text-slate-800 antialiased font-sans">
        
        <!-- Encabezado Institucional -->
        <header class="mx-auto flex w-full max-w-7xl items-center justify-between border-b border-emerald-100/80 bg-white/80 px-6 py-4 backdrop-blur-md sticky top-0 z-50 lg:px-8">
            <!-- Izquierda: [LOGO] SENA • Regional Cauca / Admin-SENA -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 no-underline group">
                <!-- Logo SENA -->
                <img src="{{ asset('images/logosena.png') }}" 
                     alt="Logo SENA" 
                     class="h-11 w-auto object-contain transition duration-200 group-hover:scale-105">

                <div class="flex flex-col justify-center">
                    <div class="flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-widest text-[#39A900]">
                        <span>SENA</span>
                        <span class="text-slate-300">•</span>
                        <span class="text-[#00324D] font-semibold">Regional Cauca</span>
                    </div>
                    <h2 class="text-lg font-black text-[#00324D] tracking-tight leading-none mt-0.5 group-hover:text-[#39A900] transition">
                        Admin-SENA
                    </h2>
                </div>
            </a>

            <!-- Derecha: Estado y Perfil de Administrador -->
            <div class="flex flex-col items-end justify-center gap-1">
                <!-- Estado Activo -->
                <div class="flex items-center gap-2 text-xs font-semibold text-slate-700">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#39A900] opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-[#39A900]"></span>
                    </span>
                    <span class="text-slate-600">Sistema activo</span>
                </div>

                <!-- Usuario Administrador -->
                <div class="flex items-center gap-1.5 text-xs font-semibold text-[#00324D] hover:text-[#39A900] cursor-pointer transition">
                    <i class="bi bi-person-circle text-[#00324D]"></i>
                    <span>Administrador</span>
                    <i class="bi bi-chevron-down text-[10px] text-slate-400"></i>
                </div>
            </div>
        </header>

        <!-- Contenido Principal -->
        <main class="mx-auto flex-1 w-full max-w-7xl px-6 pb-16 pt-8 lg:px-8">
            
            <!-- Hero Banner con Paleta SENA -->
            <section class="relative overflow-hidden rounded-3xl border border-emerald-100 bg-white/90 p-8 shadow-xl shadow-emerald-950/5 backdrop-blur-sm lg:p-12 text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-4 py-1 text-xs font-bold text-[#39A900] border border-emerald-200/60 shadow-xs">
                    <i class="bi bi-shield-check"></i> Gestión Integral SENA
                </div>
                <h1 class="mt-4 text-3xl font-black leading-tight text-[#00324D] sm:text-5xl tracking-tight">
                    Organiza áreas, cursos, instructores y aprendices en un solo lugar.
                </h1>
                <p class="mt-4 text-base sm:text-lg text-slate-600 max-w-2xl mx-auto font-normal">
                    Selecciona uno de los módulos para registrar, editar y administrar la información del centro formativo.
                </p>
            </section>
                <br><br>
            <!-- Módulos / Accesos Rápidos -->
            <section class="mt-12">
                <div class="text-center mb-8">
                    <h3 class="text-xl font-bold text-[#00324D] tracking-tight">Módulos del Sistema</h3>
                    <div class="h-1 w-12 bg-[#39A900] mx-auto mt-2 rounded-full"></div>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    
                    <!-- 1. Áreas -->
                    <a href="{{ url('/area/create') }}" class="group rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-200 hover:-translate-y-1 hover:border-[#39A900] hover:shadow-lg hover:shadow-emerald-950/5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2.5">
                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-[#39A900] group-hover:bg-[#39A900] group-hover:text-white transition duration-200">
                                    <i class="bi bi-grid-fill text-base"></i>
                                </span>
                                <h4 class="text-lg font-bold text-[#00324D] group-hover:text-[#39A900] transition">Áreas</h4>
                            </div>
                            <span class="text-xs bg-emerald-50 text-[#39A900] border border-emerald-200 font-bold px-2.5 py-0.5 rounded-full">
                                {{ \Illuminate\Support\Facades\Schema::hasTable('areas') ? \App\Models\Areas::count() : 0 }}
                            </span>
                        </div>
                        <p class="text-sm text-slate-500 font-normal">Gestiona las áreas de formación del centro.</p>
                    </a>

                    <!-- 2. Cursos -->
                    <a href="{{ url('/course/create') }}" class="group rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-200 hover:-translate-y-1 hover:border-[#39A900] hover:shadow-lg hover:shadow-emerald-950/5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2.5">
                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-[#39A900] group-hover:bg-[#39A900] group-hover:text-white transition duration-200">
                                    <i class="bi bi-journal-bookmark-fill text-base"></i>
                                </span>
                                <h4 class="text-lg font-bold text-[#00324D] group-hover:text-[#39A900] transition">Cursos</h4>
                            </div>
                            <span class="text-xs bg-emerald-50 text-[#39A900] border border-emerald-200 font-bold px-2.5 py-0.5 rounded-full">
                                {{ \Illuminate\Support\Facades\Schema::hasTable('courses') ? \App\Models\Courses::count() : 0 }}
                            </span>
                        </div>
                        <p class="text-sm text-slate-500 font-normal">Controla programas, fichas y horarios.</p>
                    </a>

                    <!-- 3. Instructores -->
                    <a href="{{ url('/teacher/create') }}" class="group rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-200 hover:-translate-y-1 hover:border-[#39A900] hover:shadow-lg hover:shadow-emerald-950/5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2.5">
                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-[#39A900] group-hover:bg-[#39A900] group-hover:text-white transition duration-200">
                                    <i class="bi bi-person-badge-fill text-base"></i>
                                </span>
                                <h4 class="text-lg font-bold text-[#00324D] group-hover:text-[#39A900] transition">Instructores</h4>
                            </div>
                            <span class="text-xs bg-emerald-50 text-[#39A900] border border-emerald-200 font-bold px-2.5 py-0.5 rounded-full">
                                {{ \Illuminate\Support\Facades\Schema::hasTable('teachers') ? \App\Models\Teachers::count() : 0 }}
                            </span>
                        </div>
                        <p class="text-sm text-slate-500 font-normal">Administra los docentes y asignaciones.</p>
                    </a>

                    <!-- 4. Aprendices -->
                    <a href="{{ url('/apprentice/create') }}" class="group rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-200 hover:-translate-y-1 hover:border-[#39A900] hover:shadow-lg hover:shadow-emerald-950/5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2.5">
                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-[#39A900] group-hover:bg-[#39A900] group-hover:text-white transition duration-200">
                                    <i class="bi bi-people-fill text-base"></i>
                                </span>
                                <h4 class="text-lg font-bold text-[#00324D] group-hover:text-[#39A900] transition">Aprendices</h4>
                            </div>
                            <span class="text-xs bg-emerald-50 text-[#39A900] border border-emerald-200 font-bold px-2.5 py-0.5 rounded-full">
                                {{ \Illuminate\Support\Facades\Schema::hasTable('apprentices') ? \App\Models\Apprentices::count() : 0 }}
                            </span>
                        </div>
                        <p class="text-sm text-slate-500 font-normal">Consulta y organiza a los aprendices.</p>
                    </a>

                    <!-- 5. Centros de Formación -->
                    <a href="{{ url('/training-center/create') }}" class="group rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-200 hover:-translate-y-1 hover:border-[#39A900] hover:shadow-lg hover:shadow-emerald-950/5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2.5">
                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-[#39A900] group-hover:bg-[#39A900] group-hover:text-white transition duration-200">
                                    <i class="bi bi-building text-base"></i>
                                </span>
                                <h4 class="text-lg font-bold text-[#00324D] group-hover:text-[#39A900] transition">Centros</h4>
                            </div>
                            <span class="text-xs bg-emerald-50 text-[#39A900] border border-emerald-200 font-bold px-2.5 py-0.5 rounded-full">
                                {{ \Illuminate\Support\Facades\Schema::hasTable('training_centers') ? \App\Models\TrainingCenters::count() : 0 }}
                            </span>
                        </div>
                        <p class="text-sm text-slate-500 font-normal">Administra sedes e infraestructura.</p>
                    </a>

                    <!-- 6. Computadores -->
                    <a href="{{ url('/computer/create') }}" class="group rounded-2xl border border-slate-200/80 bg-white p-6 shadow-xs transition duration-200 hover:-translate-y-1 hover:border-[#39A900] hover:shadow-lg hover:shadow-emerald-950/5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2.5">
                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-50 text-[#39A900] group-hover:bg-[#39A900] group-hover:text-white transition duration-200">
                                    <i class="bi bi-laptop text-base"></i>
                                </span>
                                <h4 class="text-lg font-bold text-[#00324D] group-hover:text-[#39A900] transition">Computadores</h4>
                            </div>
                            <span class="text-xs bg-emerald-50 text-[#39A900] border border-emerald-200 font-bold px-2.5 py-0.5 rounded-full">
                                {{ \Illuminate\Support\Facades\Schema::hasTable('computers') ? \App\Models\Computers::count() : 0 }}
                            </span>
                        </div>
                        <p class="text-sm text-slate-500 font-normal">Administra y asigna tus equipos de trabajo.</p>
                    </a>

                </div>
            </section>
        </main>

        <!-- Footer Institucional -->
        <footer class="mt-auto border-t border-emerald-100 bg-white/80 backdrop-blur-sm py-6">
            <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-4 px-6 text-center text-sm text-slate-500 sm:flex-row lg:px-8">
                <p class="font-medium text-slate-600">© {{ date('Y') }} <span class="text-[#00324D] font-bold">AdminSENA</span>. Sistema de Gestión y Administración Educativa.</p>
                <div class="flex flex-wrap justify-center gap-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                    <a href="{{ url('/area/create') }}" class="hover:text-[#39A900] transition">Áreas</a>
                    <a href="{{ url('/course/create') }}" class="hover:text-[#39A900] transition">Cursos</a>
                    <a href="{{ url('/teacher/create') }}" class="hover:text-[#39A900] transition">Instructores</a>
                    <a href="{{ url('/apprentice/create') }}" class="hover:text-[#39A900] transition">Aprendices</a>
                    <a href="{{ url('/training-center/create') }}" class="hover:text-[#39A900] transition">Centros</a>
                    <a href="{{ url('/computer/create') }}" class="hover:text-[#39A900] transition">Computadores</a>
                </div>
            </div>
        </footer>

    </body>
</html>