@extends('layouts.app')

@section('title', 'Dashboard - Estadísticas')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard de Encuestas</h1>
            <p class="text-gray-600">Análisis estadístico de la movilidad urbana</p>
        </div>

        <!-- Export Buttons -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Exportar Datos</h2>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('dashboard.export.excel') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Descargar Excel (.xlsx)
                </a>
                <a href="{{ route('dashboard.export.csv') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Descargar CSV
                </a>
                <a href="{{ route('survey.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
                    </svg>
                    Volver a la Encuesta
                </a>
            </div>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Surveys -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Total Encuestas</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($totalSurveys) }}</p>
                    </div>
                    <div class="bg-red-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Today's Surveys -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Hoy</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($todaySurveys) }}</p>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- This Week -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">Última Semana</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($weekSurveys) }}</p>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Age Distribution -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Distribución por Edad</h3>
                <div class="space-y-3">
                    @foreach($ageDistribution as $item)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700">{{ translateValue($item->age) }}</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-32 bg-gray-200 rounded-full h-3">
                                    <div class="bg-red-600 h-3 rounded-full" style="width: {{ ($item->total / $totalSurveys) * 100 }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-600 w-12 text-right">{{ $item->total }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Gender Distribution -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Distribución por Género</h3>
                <div class="space-y-3">
                    @foreach($genderDistribution as $item)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700">{{ translateValue($item->gender) }}</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-32 bg-gray-200 rounded-full h-3">
                                    <div class="bg-green-600 h-3 rounded-full" style="width: {{ ($item->total / $totalSurveys) * 100 }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-600 w-12 text-right">{{ $item->total }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Occupation Distribution -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Ocupación Principal</h3>
                <div class="space-y-3">
                    @foreach($occupationDistribution as $item)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700">{{ translateValue($item->occupation) }}</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-32 bg-gray-200 rounded-full h-3">
                                    <div class="bg-blue-600 h-3 rounded-full" style="width: {{ ($item->total / $totalSurveys) * 100 }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-600 w-12 text-right">{{ $item->total }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Walking Frequency -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Frecuencia de Caminar</h3>
                <div class="space-y-3">
                    @foreach($walkingFrequency as $item)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700">{{ translateValue($item->walking_frequency) }}</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-32 bg-gray-200 rounded-full h-3">
                                    <div class="bg-purple-600 h-3 rounded-full" style="width: {{ ($item->total / $totalSurveys) * 100 }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-600 w-12 text-right">{{ $item->total }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Bike Usage -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Uso de Bicicleta</h3>
                <div class="space-y-3">
                    @foreach($bikeUsage as $item)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700">{{ translateValue($item->bike_usage) }}</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-32 bg-gray-200 rounded-full h-3">
                                    <div class="bg-green-600 h-3 rounded-full" style="width: {{ ($item->total / $totalSurveys) * 100 }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-600 w-12 text-right">{{ $item->total }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Public Transport Frequency -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Uso de Transporte Público</h3>
                <div class="space-y-3">
                    @foreach($publicTransportFrequency as $item)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700">{{ translateValue($item->public_transport_frequency) }}</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-32 bg-gray-200 rounded-full h-3">
                                    <div class="bg-yellow-600 h-3 rounded-full" style="width: {{ ($item->total / $totalSurveys) * 100 }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-600 w-12 text-right">{{ $item->total }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Has Vehicle -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Posesión de Vehículo</h3>
                <div class="space-y-3">
                    @foreach($hasVehicle as $item)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700">{{ translateValue($item->has_vehicle) }}</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-32 bg-gray-200 rounded-full h-3">
                                    <div class="bg-indigo-600 h-3 rounded-full" style="width: {{ ($item->total / $totalSurveys) * 100 }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-600 w-12 text-right">{{ $item->total }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Traffic Rating -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Calificación del Tráfico</h3>
                <div class="space-y-3">
                    @foreach($trafficRating as $item)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700">{{ translateValue($item->traffic_rating) }}</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-32 bg-gray-200 rounded-full h-3">
                                    <div class="bg-red-600 h-3 rounded-full" style="width: {{ ($item->total / $totalSurveys) * 100 }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-600 w-12 text-right">{{ $item->total }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Roads Condition -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Estado de las Vialidades</h3>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                @foreach($roadsCondition as $item)
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <div class="text-3xl font-bold text-gray-800">{{ $item->total }}</div>
                        <div class="text-sm text-gray-600 mt-2">{{ translateValue($item->roads_condition) }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ number_format(($item->total / $totalSurveys) * 100, 1) }}%</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Top Neighborhoods -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Top 10 Colonias con Más Respuestas</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Colonia</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Porcentaje</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($topNeighborhoods as $index => $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->neighborhood }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->total }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format(($item->total / $totalSurveys) * 100, 2) }}%</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Surveys -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Últimas 10 Encuestas</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edad</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Género</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Colonia</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($recentSurveys as $survey)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $survey->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $survey->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ translateValue($survey->age) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ translateValue($survey->gender) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $survey->neighborhood }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@php
    function translateValue($value) {
        $translations = [
            'under_15' => 'Menos de 15', '16_17' => '16 a 17', '18_24' => '18 a 24',
            '25_34' => '25 a 34', '35_49' => '35 a 49', '50_59' => '50 a 59', '60_plus' => '60 o más',
            'female' => 'Mujer', 'male' => 'Hombre', 'non_binary' => 'No binario', 'prefer_not_say' => 'Prefiero no decir',
            'once' => 'Una vez', 'twice' => 'Dos veces', 'three_or_more' => 'Tres o más', 'rarely' => 'Casi no salgo',
            'student' => 'Estudia', 'worker' => 'Trabaja', 'both' => 'Ambas', 'other' => 'Otra',
            'daily' => 'Diario', 'several_times_week' => 'Varias veces por semana', 'never' => 'Nunca',
            '1_3_times' => '1 a 3 veces', '4_5_times' => '4 a 5 veces', 'no_use' => 'No uso',
            '1_3_days' => '1 a 3 días', '4_5_days' => '4 a 5 días', '6_7_days' => '6 a 7 días',
            'yes_car' => 'Sí, auto', 'yes_motorcycle' => 'Sí, moto', 'no' => 'No',
            'fluid' => 'Fluido', 'moderate' => 'Moderado', 'congested' => 'Congestionado', 'very_congested' => 'Muy congestionado',
            'very_good' => 'Muy bueno', 'good' => 'Bueno', 'regular' => 'Regular', 'bad' => 'Malo', 'very_bad' => 'Muy malo',
        ];
        return $translations[$value] ?? $value;
    }
@endphp
