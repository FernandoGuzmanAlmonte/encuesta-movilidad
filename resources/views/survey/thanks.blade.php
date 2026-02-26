@extends('layouts.app')

@section('title', 'Gracias por tu participación')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="mb-6">
                <svg class="mx-auto h-24 w-24 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <h2 class="text-3xl font-bold text-gray-800 mb-4">¡Gracias por tu participación!</h2>

            <p class="text-gray-600 mb-6">
                Una movilidad sustentable y sostenible es nuestro derecho.<br>
                En equipo, podemos construir el Tlajo que necesitamos.<br>
                Gracias por ser parte de este cambio.
            </p>

            <div class="bg-green-50 border-l-4 border-green-600 p-4 mb-6">
                <p class="text-sm text-green-700">
                    Tu encuesta ha sido registrada exitosamente. Los resultados agregados
                    estarán disponibles próximamente.
                </p>
            </div>

            <a href="{{ route('survey.index') }}" class="inline-block bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                Volver al inicio
            </a>
        </div>
    </div>
@endsection
