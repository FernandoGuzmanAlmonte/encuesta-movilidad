@extends('layouts.app')

@section('title', 'Acceso Administrativo')

@section('content')
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-800 px-8 py-6 text-center">
                <img src="{{ asset('images/rosalio_logo_completo.png') }}" alt="Rosalio Logo" class="mx-auto h-20 w-auto">
            </div>

            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Acceso Administrativo</h2>
                <p class="text-sm text-gray-500 text-center mb-6">Ingresa tus credenciales para continuar</p>

                @if($errors->has('credentials'))
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                        {{ $errors->first('credentials') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Usuario</label>
                        <input
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            required autofocus
                        >
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input
                            type="password"
                            name="password"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            required
                        >
                    </div>

                    <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                        Iniciar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection