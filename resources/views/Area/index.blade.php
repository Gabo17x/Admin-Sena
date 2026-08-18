@extends('layouts.app')

@section('title', 'Gestión de Áreas')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#39A900]/10 via-slate-50 to-[#00324D]/10 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        
        <!-- Encabezado de Sección -->
        <div class="mb-6">
            <div class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3.5 py-1 text-xs font-bold text-[#39A900] mb-2">
                <i class="bi bi-grid-fill"></i> Módulo de Áreas
            </div>
            <h1 class="text-3xl font-black text-[#00324D] tracking-tight">Áreas de Formación</h1>
            <p class="text-slate-600 text-sm mt-1">Registra y administra las áreas formativas del centro.</p>
        </div>

        {{-- Alertas de Éxito / Error --}}
        @if (session('success'))
            <div class="mb-6 rounded-2xl bg-emerald-500 text-white px-4 py-3 shadow-md flex items-center justify-between">
                <div class="flex items-center gap-2 font-medium text-sm">
                    <i class="bi bi-check-circle-fill text-lg"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Card: Tabla de Áreas Registradas -->
        <div class="bg-white rounded-3xl border-2 border-emerald-200/80 shadow-xl shadow-emerald-950/5 overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-emerald-100 bg-emerald-50/50 flex justify-between items-center">
                <h3 class="font-bold text-[#00324D] text-lg">Áreas registradas</h3>
                <span class="text-xs bg-[#39A900] text-white font-bold px-3 py-1 rounded-full">
                    Total: {{ $areas->count() }}
                </span>
            </div>

            <div class="p-0 overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-emerald-900 text-white text-xs uppercase tracking-wider font-semibold">
                            <th class="py-3.5 px-6">#</th>
                            <th class="py-3.5 px-6">Nombre del Área</th>
                            <th class="py-3.5 px-6 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-emerald-100 text-sm text-slate-700 font-medium">
                        @forelse($areas as $area)
                            <tr class="hover:bg-emerald-50/40 transition">
                                <td class="py-4 px-6 text-slate-400 font-bold">#{{ $area->id }}</td>
                                <td class="py-4 px-6 text-[#00324D] font-bold text-base">
                                    <i class="bi bi-bookmark-fill text-[#39A900] mr-2"></i>{{ $area->name }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('area.show', $area) }}" 
                                           class="rounded-xl border border-blue-200 bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700 hover:bg-blue-600 hover:text-white transition shadow-xs">
                                            Mostrar
                                        </a>
                                        <a href="{{ route('area.edit', $area) }}" 
                                           class="rounded-xl border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-[#39A900] hover:bg-[#39A900] hover:text-white transition shadow-xs">
                                            Editar
                                        </a>
                                        <form action="{{ route('area.destroy', $area) }}" method="POST" class="inline" onsubmit="return confirm('¿Deseas eliminar esta área?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-xl border border-red-200 bg-red-50 p-1.5 text-red-600 hover:bg-red-600 hover:text-white transition shadow-xs" title="Eliminar">
                                                <i class="bi bi-trash-fill text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-8 text-center text-slate-400 italic">
                                    No hay áreas registradas actualmente.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Card: Formulario Crear Área -->
        <div class="bg-white rounded-3xl border-2 border-emerald-200/80 shadow-xl shadow-emerald-950/5 p-6 sm:p-8">
            <h3 class="font-bold text-[#00324D] text-xl mb-4">Crear nueva área</h3>
            
            <form action="{{ route('area.store') }}" method="POST">
                @csrf
                <div class="max-w-xl">
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#00324D] mb-2">
                        Nombre del Área <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           required
                           placeholder="Ej: Agroindustria, Software, Contabilidad..." 
                           class="w-full rounded-2xl border border-slate-300 bg-slate-50/50 px-4 py-3 text-slate-800 placeholder-slate-400 focus:border-[#39A900] focus:bg-white focus:outline-none focus:ring-4 focus:ring-[#39A900]/20 transition">
                    
                    @error('name')
                        <p class="mt-1.5 text-xs text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="inline-flex items-center gap-2 rounded-2xl bg-[#39A900] px-6 py-3 text-sm font-bold text-white shadow-lg shadow-emerald-900/10 hover:bg-emerald-700 hover:scale-[1.02] active:scale-95 transition-all">
                        <i class="bi bi-plus-circle-fill"></i> Guardar área
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection