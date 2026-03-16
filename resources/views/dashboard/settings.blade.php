@extends('layouts.app')

@section('title', 'Configuración del Sitio')

@section('content')
    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-1">Configuración del Sitio</h1>
                <p class="text-gray-500">Controla la disponibilidad pública de la encuesta</p>
            </div>
            <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 font-semibold transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
                </svg>
                <span>Volver al Dashboard</span>
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-300 text-green-800 rounded-lg px-5 py-4 mb-6 flex items-center space-x-3">
                <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('dashboard.settings.update') }}" method="POST">
            @csrf

            <!-- Estado actual -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Estado del Sitio</h2>

                <!-- Indicador de estado -->
                <div class="flex items-center justify-between p-5 rounded-xl mb-6 {{ $settings['maintenance_mode'] ? 'bg-red-50 border border-red-200' : 'bg-green-50 border border-green-200' }}">
                    <div class="flex items-center space-x-4">
                        <div class="w-4 h-4 rounded-full {{ $settings['maintenance_mode'] ? 'bg-red-500' : 'bg-green-500' }} shadow-sm"></div>
                        <div>
                            <p class="font-bold text-lg {{ $settings['maintenance_mode'] ? 'text-red-800' : 'text-green-800' }}">
                                {{ $settings['maintenance_mode'] ? 'Sitio en Mantenimiento' : 'Sitio en Línea' }}
                            </p>
                            <p class="text-sm {{ $settings['maintenance_mode'] ? 'text-red-600' : 'text-green-600' }}">
                                {{ $settings['maintenance_mode'] ? 'La encuesta no es visible al público.' : 'La encuesta está disponible al público.' }}
                            </p>
                        </div>
                    </div>
                    <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full {{ $settings['maintenance_mode'] ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                        {{ $settings['maintenance_mode'] ? 'Inactivo' : 'Activo' }}
                    </span>
                </div>

                <!-- Toggle -->
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-semibold text-gray-700">Activar modo mantenimiento</p>
                        <p class="text-sm text-gray-500 mt-1">Al activarlo, los visitantes verán la página de mantenimiento.</p>
                    </div>
                    <div>
                        <input type="hidden" name="maintenance_mode" value="0" id="maintenance_hidden">
                        <button type="button" id="maintenanceToggle" onclick="toggleMaintenance()"
                            style="width:56px; height:28px; border-radius:9999px; border:none; cursor:pointer; position:relative; transition: background 0.3s; background: {{ $settings['maintenance_mode'] ? '#ef4444' : '#d1d5db' }};">
                            <span id="maintenanceThumb" style="position:absolute; top:3px; width:22px; height:22px; border-radius:50%; background:#fff; box-shadow:0 1px 3px rgba(0,0,0,0.3); transition: left 0.3s; left: {{ $settings['maintenance_mode'] ? '31px' : '3px' }};"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Fecha de reapertura y mensaje -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Mensaje de Mantenimiento</h2>

                <div class="space-y-5">
                    <!-- Fecha de reapertura -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Fecha estimada de reapertura</label>
                        <input type="date" name="reopen_date" value="{{ $settings['reopen_date'] }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <p class="text-xs text-gray-400 mt-1">Se mostrará en la página de mantenimiento.</p>
                    </div>

                    <!-- Mensaje personalizado -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Mensaje personalizado <span class="text-gray-400 font-normal">(opcional)</span></label>
                        <textarea name="maintenance_message" rows="3"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Ej: Estamos actualizando el sistema para mejorar tu experiencia...">{{ $settings['maintenance_message'] }}</textarea>
                        <p class="text-xs text-gray-400 mt-1">Si lo dejas vacío, se mostrará un mensaje por defecto.</p>
                    </div>
                </div>
            </div>

            <!-- Botón guardar -->
            <div class="flex justify-end">
                <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-8 rounded-lg transition duration-300 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Guardar Configuración</span>
                </button>
            </div>
        </form>
    </div>
    @push('scripts')
    <script>
        let maintenanceOn = {{ $settings['maintenance_mode'] ? 'true' : 'false' }};

        function toggleMaintenance() {
            maintenanceOn = !maintenanceOn;
            const btn   = document.getElementById('maintenanceToggle');
            const thumb = document.getElementById('maintenanceThumb');
            const hidden = document.getElementById('maintenance_hidden');

            btn.style.background = maintenanceOn ? '#ef4444' : '#d1d5db';
            thumb.style.left     = maintenanceOn ? '31px' : '3px';
            hidden.value         = maintenanceOn ? '1' : '0';
        }
    </script>
    @endpush
@endsection