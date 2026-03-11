<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Encuesta Movilidad Sustentable y Sostenible Tlajomulco')</title>
    <meta name="description" content="Participa en la Encuesta de Movilidad Sustentable y Sostenible de Tlajomulco. Tu opinión construye mejores comunidades.">
    <meta name="keywords" content="movilidad sustentable, Tlajomulco, encuesta, movilidad urbana, Marcos Rosalio, transporte, sostenible">
    <meta name="author" content="Marcos Rosalio Tlajomulco">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://marcosrosaliotlajomulco.com.mx/">

    <!-- Open Graph (para compartir en redes sociales) -->
    <meta property="og:title" content="Encuesta Movilidad Sustentable y Sostenible Tlajomulco">
    <meta property="og:description" content="Participa en la encuesta y ayuda a construir una mejor movilidad en Tlajomulco.">
    <meta property="og:url" content="https://marcosrosaliotlajomulco.com.mx/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('images/rosalio_logo_completo.png') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/rosalio_logo.png') }}">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .section-fade-in {
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .section-fade-in:nth-child(1) { animation-delay: 0.1s; }
        .section-fade-in:nth-child(2) { animation-delay: 0.2s; }
        .section-fade-in:nth-child(3) { animation-delay: 0.3s; }
        .section-fade-in:nth-child(4) { animation-delay: 0.4s; }
        .section-fade-in:nth-child(5) { animation-delay: 0.5s; }
        .section-fade-in:nth-child(6) { animation-delay: 0.6s; }
    </style>
</head>
<body class="bg-gray-50">
<!-- Header limpio y profesional con borde tricolor -->
<header class="bg-white shadow-md sticky top-0 z-50" style="border-bottom: 4px solid; border-image: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a) 1;">
    <div class="container mx-auto px-4 py-2">
        <div class="flex items-center justify-between">
            <!-- Logo y título -->
            <div class="flex items-center space-x-4">
                <div class="transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/rosalio_logo.png') }}" alt="Rosalio Logo" class="h-16 w-18 md:h-20 md:w-24">
                </div>
                <div>
                    <h1 class="text-xl md:text-2xl font-bold text-gray-800">Encuesta Movilidad Sustentable y Sostenible Tlajomulco</h1>
                    <p class="text-xs md:text-sm text-gray-600">Tu opinión construye mejores comunidades</p>
                </div>
            </div>

            <!-- Navigation (Desktop) -->
            <div class="hidden lg:flex items-center space-x-2">
                @if(session('admin_logged_in'))
                    <a href="{{ route('dashboard.index') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors font-medium {{ request()->routeIs('dashboard.*') ? 'bg-green-50 text-green-700' : '' }}">
                        📊 Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors font-medium">
                            🚪 Cerrar sesión
                        </button>
                    </form>
                @endif
            </div>

            <!-- Mobile menu button -->
            @if(session('admin_logged_in'))
            <button id="mobileMenuBtn" class="lg:hidden text-gray-700 p-2 hover:bg-gray-100 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            @endif
        </div>

        <!-- Mobile menu -->
        @if(session('admin_logged_in'))
        <div id="mobileMenu" class="lg:hidden hidden mt-4 pb-4 border-t pt-4">
            <div class="flex flex-col space-y-2">
                <a href="{{ route('dashboard.index') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.*') ? 'bg-green-50 text-green-700 font-semibold' : '' }}">
                    📊 Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 rounded-lg text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                        🚪 Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</header>

<!-- Main content -->
<main class="container mx-auto px-4 py-8">
    <!-- Success message -->
    @if(session('success'))
        <div class="max-w-4xl mx-auto mb-6 bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-md animate-fade-in-up">
            <div class="flex items-center space-x-3">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Error messages -->
    @if($errors->any())
        <div class="max-w-4xl mx-auto mb-6 bg-red-50 border-l-4 border-red-500 text-red-800 p-4 rounded-lg shadow-md animate-fade-in-up">
            <div class="flex items-start space-x-3">
                <svg class="w-6 h-6 text-red-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <p class="font-semibold mb-2">Por favor corrige los siguientes errores:</p>
                    <ul class="list-disc list-inside space-y-1 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-800 text-white mt-16">
    <div class="container mx-auto px-0 py-0">
        <div class="text-center px-0 py-0">
            <div class="flex items-center justify-center px-2 py-2 mb-0">
                <img src="{{ asset('images/rosalio_logo_completo.png') }}" alt="Rosalio Logo" class="h-24 w-auto md:h-[8.5rem] md:w-auto ">
            </div>
            <div class="border-t border-gray-700 pt-4 py-2 mt-0">
                <p class="text-sm text-gray-400">&copy; {{ date('Y') }} - Todos los derechos reservados</p>
                <p class="text-xs text-gray-500 mt-2">Encuesta Movilidad Sustentable y Sostenible Tlajomulco</p>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to top button -->
<button id="scrollToTop" class="fixed bottom-6 right-6 bg-green-700 hover:bg-green-800 text-white p-4 rounded-full shadow-2xl opacity-0 pointer-events-none transition-all duration-300 hover:scale-110 z-50">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</button>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Scroll to top button
    const scrollToTopBtn = document.getElementById('scrollToTop');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
            scrollToTopBtn.classList.add('opacity-100');
        } else {
            scrollToTopBtn.classList.add('opacity-0', 'pointer-events-none');
            scrollToTopBtn.classList.remove('opacity-100');
        }
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Fade-in animation on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.section-card').forEach(section => {
        observer.observe(section);
    });
</script>

@stack('scripts')
</body>
</html>
