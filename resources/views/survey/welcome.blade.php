@extends('layouts.app')

@section('title', 'Bienvenido/a - Encuesta de Movilidad')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center" style="border-top: 4px solid; border-image: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a) 1;">

            <!-- Ícono -->
            <div class="mb-6">
                <svg class="mx-auto h-20 w-20 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>

            <!-- Título -->
            <h1 class="text-3xl font-bold text-green-800 mb-4">¡Bienvenido/a!</h1>

            <!-- Texto de bienvenida -->
            <p class="text-gray-600 text-lg leading-relaxed mb-8">
                Queremos conocer tu experiencia al moverte por nuestro municipio. Responder esta Encuesta te tomará solo unos pocos minutos y tu información será clave para mejorar la movilidad en Tlajomulco. <strong>¡Gracias por hacer escuchar tu voz!</strong>
            </p>

            <!-- Botón principal -->
            <a href="{{ route('survey.form') }}" class="inline-block bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-10 rounded-lg transition duration-300 text-lg mb-6">
                Comenzar Encuesta
            </a>

            <!-- Enlace Aviso de Confidencialidad -->
            <div class="mt-4">
                <button type="button" onclick="togglePrivacy()" class="inline-flex items-center space-x-2 text-green-700 hover:text-green-900 font-semibold transition-colors text-sm underline">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <span id="privacyToggleText">Ver Aviso de Confidencialidad</span>
                    <svg id="privacyChevron" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Aviso de Privacidad (colapsable) -->
        <div id="privacySection" class="hidden mt-4">
            <div class="bg-white rounded-2xl shadow-lg p-8 text-left" style="border-top: 4px solid; border-image: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a) 1;">
                <h2 class="text-xl font-bold text-center text-gray-900 mb-6">AVISO DE PRIVACIDAD</h2>
                <div class="text-sm text-gray-700 space-y-4">
                    <p>El equipo del Regidor Marcos Rosalio Torre, Regidor del Ayuntamiento de Tlajomulco de Zúñiga, Jalisco; es responsable del tratamiento de los datos personales que usted proporcione, conforme a lo dispuesto en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.</p>

                    <div>
                        <p class="font-bold">1. Finalidad del tratamiento de los datos personales</p>
                        <p>Los datos personales que recabamos serán utilizados exclusivamente para los fines académicos y de investigación descritos a continuación:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li>Identificar las problemáticas reales de la ciudadanía en tema de movilidad del municipio.</li>
                            <li>Fundamentar la creación e implementación de políticas públicas efectivas en materia de movilidad.</li>
                        </ul>
                    </div>

                    <div>
                        <p class="font-bold">2. Datos personales que se recopilarán</p>
                        <p>Los datos personales que se recolectarán incluyen, pero no se limitan a:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li>Edad</li>
                            <li>Sexo</li>
                            <li>Respuestas a las encuestas</li>
                            <li>Ubicaciones de calles</li>
                        </ul>
                    </div>

                    <div>
                        <p class="font-bold">3. Transferencia de datos personales</p>
                        <p>Sus datos personales no serán transferidos a terceros sin su consentimiento expreso, salvo en los casos previstos por la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.</p>
                    </div>

                    <div>
                        <p class="font-bold">4. Derechos ARCO (Acceso, Rectificación, Cancelación y Oposición)</p>
                        <p>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones de uso que les damos (Acceso). También es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada conforme a los principios, deberes y obligaciones previstas en la normativa (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición).</p>
                    </div>

                    <div>
                        <p class="font-bold">5. Mecanismos para ejercer sus derechos ARCO</p>
                        <p>Para ejercer cualquiera de los derechos ARCO, puede enviar una solicitud al correo electrónico <a href="mailto:regidor.marcosrosalio@gmail.com" class="text-green-700 underline">regidor.marcosrosalio@gmail.com</a>, indicando su nombre completo, una copia de un documento de identificación oficial, y especificando el derecho que desea ejercer.</p>
                    </div>

                    <div>
                        <p class="font-bold">6. Confidencialidad y seguridad de los datos</p>
                        <p>Para proteger la confidencialidad y seguridad de los datos personales recopilados, se implementarán las siguientes medidas:</p>
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li>Los datos serán anonimizados y desidentificados, es decir, no se asociarán con su nombre o correo electrónico en relación con las respuestas de la encuesta o el estudio.</li>
                            <li>Se aplicarán medidas técnicas y organizativas para prevenir el acceso no autorizado, el uso indebido, la divulgación, la alteración o la destrucción de los datos personales durante el ciclo de vida del proyecto de investigación.</li>
                        </ul>
                    </div>

                    <div>
                        <p class="font-bold">7. Cambios en el aviso de privacidad</p>
                        <p>Este aviso de privacidad puede sufrir modificaciones, cambios o actualizaciones derivadas de nuevos requerimientos legales, de nuestras propias necesidades o de nuestras prácticas de privacidad.</p>
                    </div>

                    <div>
                        <p class="font-bold">8. Consentimiento</p>
                        <p>Al ser un instrumento de investigación estrictamente anónimo y desidentificado, no se recaban datos de contacto ni información que permita la identificación de menores de edad. Los datos demográficos generales (como edad, colonia y ocupación) se utilizan exclusivamente con fines estadísticos, garantizando que la participación de menores sea completamente segura. Al participar en esta encuesta, usted consiente que sus datos personales sean tratados de acuerdo con los términos y condiciones del presente aviso de privacidad.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function togglePrivacy() {
                const section = document.getElementById('privacySection');
                const text = document.getElementById('privacyToggleText');
                const chevron = document.getElementById('privacyChevron');
                const isHidden = section.classList.contains('hidden');

                section.classList.toggle('hidden', !isHidden);
                text.textContent = isHidden ? 'Ocultar Aviso de Confidencialidad' : 'Ver Aviso de Confidencialidad';
                chevron.style.transform = isHidden ? 'rotate(180deg)' : 'rotate(0deg)';

                if (isHidden) {
                    setTimeout(() => section.scrollIntoView({ behavior: 'smooth', block: 'start' }), 50);
                }
            }
        </script>
    @endpush
@endsection