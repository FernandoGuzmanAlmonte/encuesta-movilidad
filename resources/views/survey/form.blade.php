@extends('layouts.app')

@section('title', 'Encuesta de Movilidad')

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Steps Navigation -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 sticky top-20 z-40 animate-fade-in-up" style="border-top: 4px solid; border-image: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a) 1;">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800">Progreso de la Encuesta</h3>
                <span class="text-sm font-semibold text-green-700" id="progressText">0%</span>
            </div>

            <!-- Progress Bar -->
            <div class="progress-container mb-6">
                <div class="progress-bar" id="progressBar" style="width: 0%"></div>
            </div>

            <!-- Steps Indicators - Version compacta -->
            <div class="grid grid-cols-7 gap-1 md:flex md:items-center md:justify-between">
                <button type="button" class="step-btn text-center" data-step="1">
                    <div class="flex flex-col items-center">
                        <div class="step-circle mb-1 md:mb-2" id="step-circle-1">
                            <span class="step-number">1</span>
                            <svg class="step-check hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="hidden md:block text-xs font-medium text-gray-600 text-center">Datos</span>
                    </div>
                </button>

                <div class="hidden md:block step-connector flex-1 h-1 mx-1" style="background: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a);"></div>

                <button type="button" class="step-btn text-center" data-step="2">
                    <div class="flex flex-col items-center">
                        <div class="step-circle mb-1 md:mb-2" id="step-circle-2">
                            <span class="step-number">2</span>
                            <svg class="step-check hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="hidden md:block text-xs font-medium text-gray-600 text-center">Peatones</span>
                    </div>
                </button>

                <div class="hidden md:block step-connector flex-1 h-1 mx-1" style="background: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a);"></div>

                <button type="button" class="step-btn text-center" data-step="3">
                    <div class="flex flex-col items-center">
                        <div class="step-circle mb-1 md:mb-2" id="step-circle-3">
                            <span class="step-number">3</span>
                            <svg class="step-check hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="hidden md:block text-xs font-medium text-gray-600 text-center">Ciclovías</span>
                    </div>
                </button>

                <div class="hidden md:block step-connector flex-1 h-1 mx-1" style="background: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a);"></div>

                <button type="button" class="step-btn text-center" data-step="4">
                    <div class="flex flex-col items-center">
                        <div class="step-circle mb-1 md:mb-2" id="step-circle-4">
                            <span class="step-number">4</span>
                            <svg class="step-check hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="hidden md:block text-xs font-medium text-gray-600 text-center">Transporte</span>
                    </div>
                </button>

                <div class="hidden md:block step-connector flex-1 h-1 mx-1" style="background: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a);"></div>

                <button type="button" class="step-btn text-center" data-step="5">
                    <div class="flex flex-col items-center">
                        <div class="step-circle mb-1 md:mb-2" id="step-circle-5">
                            <span class="step-number">5</span>
                            <svg class="step-check hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="hidden md:block text-xs font-medium text-gray-600 text-center">Vehículos</span>
                    </div>
                </button>

                <div class="hidden md:block step-connector flex-1 h-1 mx-1" style="background: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a);"></div>

                <button type="button" class="step-btn text-center" data-step="6">
                    <div class="flex flex-col items-center">
                        <div class="step-circle mb-1 md:mb-2" id="step-circle-6">
                            <span class="step-number">6</span>
                            <svg class="step-check hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="hidden md:block text-xs font-medium text-gray-600 text-center">Vialidades</span>
                    </div>
                </button>

                <div class="hidden md:block step-connector flex-1 h-1 mx-1" style="background: linear-gradient(to right, #c8e6a0, #4caf50, #1a5c3a);"></div>

                <button type="button" class="step-btn text-center" data-step="7">
                    <div class="flex flex-col items-center">
                        <div class="step-circle mb-1 md:mb-2" id="step-circle-7">
                            <span class="step-number">7</span>
                            <svg class="step-check hidden" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="hidden md:block text-xs font-medium text-gray-600 text-center">Accesibilidad</span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('survey.store') }}" method="POST" id="surveyForm">
            @csrf

            <!-- STEP 1: GENERAL DATA -->
            <div class="form-step active" data-step="1">
                <div class="section-card mb-8">
                    <div class="section-title">
                        <div class="w-12 h-12 bg-green-700 rounded-full flex items-center justify-center text-white font-bold text-lg">1</div>
                        <span>Datos Generales</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Age -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">1.</span>
                                <span>Edad: <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <select name="age" class="form-select" required>
                                <option value="">Seleccione su rango de edad...</option>
                                <option value="under_15">Menos de 15 años</option>
                                <option value="16_17">16 a 17 años</option>
                                <option value="18_24">18 a 24 años</option>
                                <option value="25_34">25 a 34 años</option>
                                <option value="35_49">35 a 49 años</option>
                                <option value="50_59">50 a 59 años</option>
                                <option value="60_plus">60 años o más</option>
                            </select>
                        </div>

                        <!-- Gender -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">2.</span>
                                <span>Género: <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <div class="space-y-2">
                                <label class="radio-option">
                                    <input type="radio" name="gender" value="female" required>
                                    <span class="flex-1">Mujer</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="gender" value="male" required>
                                    <span class="flex-1">Hombre</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="gender" value="non_binary" required>
                                    <span class="flex-1">No binario</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="gender" value="prefer_not_say" required>
                                    <span class="flex-1">Prefiero no decirlo</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 mt-6">
                        <!-- Neighborhood -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">3.</span>
                                <span>Colonia o fraccionamiento donde vive: <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <input type="text" name="neighborhood" class="form-input" placeholder="Ej: Providencia, Chapalita, Centro..." required>
                        </div>

                        <!-- Frequent destination -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">4.</span>
                                <span>¿A qué zona, colonia y/o municipio se traslada con mayor frecuencia?</span>
                            </span>
                            </label>
                            <input type="text" name="frequent_destination" class="form-input" placeholder="Ej: Centro de Guadalajara, Zapopan...">
                        </div>

                        <!-- Exit frequency -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">5.</span>
                                <span>¿Con qué frecuencia sale de su colonia en un día promedio? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <select name="exit_frequency" class="form-select" required>
                                <option value="">Seleccione una opción...</option>
                                <option value="once">Una vez</option>
                                <option value="twice">Dos veces</option>
                                <option value="three_or_more">Tres o más veces</option>
                                <option value="rarely">Casi no salgo</option>
                            </select>
                        </div>

                        <!-- Occupation -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">6.</span>
                                <span>¿A qué se dedica principalmente? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="occupation" value="student" required>
                                    <span class="flex-1">Estudia</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="occupation" value="worker" required>
                                    <span class="flex-1">Trabaja</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="occupation" value="both" required>
                                    <span class="flex-1">Ambas</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="occupation" value="other" required>
                                    <span class="flex-1">Otra</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: PEDESTRIANS -->
            <div class="form-step" data-step="2">
                <div class="section-card mb-8">
                    <div class="section-title">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">2</div>
                        <span>Peatones (Movilidad a pie)</span>
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>

                    <div class="space-y-6">
                        <!-- Question 7 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-600 font-bold">7.</span>
                                <span>¿Con qué frecuencia camina como medio de transporte? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <select name="walking_frequency" class="form-select" required>
                                <option value="">Seleccione una opción...</option>
                                <option value="daily">Diario</option>
                                <option value="several_times_week">Varias veces por semana</option>
                                <option value="rarely">Rara vez</option>
                                <option value="never">Nunca</option>
                            </select>
                        </div>

                        <!-- Question 8 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-600 font-bold">8.</span>
                                <span>¿Hay banquetas seguras y transitables en su colonia? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <select name="safe_sidewalks" class="form-select" required>
                                <option value="">Seleccione una opción...</option>
                                <option value="yes_most">Sí, en la mayoría de las calles</option>
                                <option value="some">En algunas calles</option>
                                <option value="very_few">Muy pocas</option>
                                <option value="none">No hay</option>
                            </select>
                        </div>

                        <!-- Question 9 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-600 font-bold">9.</span>
                                <span>¿Considera que su colonia tiene cruces peatonales seguros? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="safe_crossings" value="yes" required>
                                    <span class="flex-1">Sí</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="safe_crossings" value="partially" required>
                                    <span class="flex-1">Parcialmente</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="safe_crossings" value="no" required>
                                    <span class="flex-1">No</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 10 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-600 font-bold">10.</span>
                                <span>¿Qué tan seguro se siente al caminar en su colonia? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <select name="walking_safety" class="form-select" required>
                                <option value="">Seleccione una opción...</option>
                                <option value="very_safe">Muy seguro</option>
                                <option value="somewhat_safe">Algo seguro</option>
                                <option value="not_very_safe">Poco seguro</option>
                                <option value="not_safe">Nada seguro</option>
                            </select>
                        </div>

                        <!-- Question 11 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-600 font-bold">11.</span>
                                <span>¿Qué mejoraría de la movilidad peatonal en su zona?</span>
                            </span>
                            </label>
                            <textarea name="pedestrian_improvements" class="form-input" rows="4" placeholder="Comparte tus sugerencias..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 3: BIKE LANES -->
            <div class="form-step" data-step="3">
                <div class="section-card mb-8">
                    <div class="section-title">
                        <div class="w-12 h-12 bg-green-700 rounded-full flex items-center justify-center text-white font-bold text-lg">3</div>
                        <span>Ciclovías (Movilidad en bicicleta)</span>
                        <svg class="w-7 h-7 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
                        </svg>
                    </div>

                    <div class="space-y-6">
                        <!-- Question 12 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">12.</span>
                                <span>¿Utiliza la bicicleta como medio de transporte? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="bike_usage" value="daily" required>
                                    <span class="flex-1">🚴 Diario</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="bike_usage" value="1_3_times" required>
                                    <span class="flex-1">1 a 3 veces a la semana</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="bike_usage" value="4_5_times" required>
                                    <span class="flex-1">4 a 5 veces por semana</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="bike_usage" value="no_use" required>
                                    <span class="flex-1">❌ No uso bicicleta</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 13 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">13.</span>
                                <span>¿Existen ciclovías en su ruta habitual?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="bike_lane_exists" value="yes_good">
                                    <span class="flex-1">✅ Sí, en buen estado</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="bike_lane_exists" value="yes_bad">
                                    <span class="flex-1">⚠️ Sí, pero en mal estado</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="bike_lane_exists" value="no">
                                    <span class="flex-1">❌ No hay ciclovías</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 14 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">14.</span>
                                <span>¿Se siente seguro/a usando bicicleta en su zona?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="bike_safety" value="yes">
                                    <span class="flex-1">Sí</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="bike_safety" value="sometimes">
                                    <span class="flex-1">A veces</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="bike_safety" value="no">
                                    <span class="flex-1">No</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 15 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">15.</span>
                                <span>¿Qué obstáculos ha enfrentado al usar bicicleta? (puede marcar varias)</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="bike_obstacles[]" value="lack_infrastructure">
                                    <span class="flex-1">🚧 Falta de infraestructura</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="bike_obstacles[]" value="bad_pavement">
                                    <span class="flex-1">🕳️ Mal estado del pavimento</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="bike_obstacles[]" value="vehicles_invading">
                                    <span class="flex-1">🚗 Vehículos invadiendo ciclovías</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="bike_obstacles[]" value="insecurity">
                                    <span class="flex-1">🚨 Inseguridad</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="bike_obstacles[]" value="lack_culture">
                                    <span class="flex-1">⚠️ Falta de cultura vial</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 16 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">16.</span>
                                <span>De tu localidad, ¿En dónde consideras viable una ciclovía?</span>
                            </span>
                            </label>
                            <textarea name="bike_lane_viable" class="form-input" rows="3" placeholder="Indica las calles o zonas donde sería útil una ciclovía..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 4: PUBLIC TRANSPORT -->
            <div class="form-step" data-step="4">
                <div class="section-card mb-8">
                    <div class="section-title">
                        <div class="w-12 h-12 bg-green-700 rounded-full flex items-center justify-center text-white font-bold text-lg">4</div>
                        <span>Transporte Público</span>
                        <svg class="w-7 h-7 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>

                    <div class="space-y-6">
                        <!-- Question 17 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">17.</span>
                                <span>¿Con qué frecuencia usa el transporte público a la semana? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="public_transport_frequency" value="1_3_days" required>
                                    <span class="flex-1">De 1 a 3 días</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="public_transport_frequency" value="4_5_days" required>
                                    <span class="flex-1">4 a 5 días</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="public_transport_frequency" value="6_7_days" required>
                                    <span class="flex-1">6 a 7 días</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="public_transport_frequency" value="never" required>
                                    <span class="flex-1">Nunca</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 18 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">18.</span>
                                <span>¿Qué medio utiliza con más frecuencia?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="most_used_transport" value="urban_bus">
                                    <span class="flex-1">🚌 Camión urbano</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="most_used_transport" value="feeder_bus">
                                    <span class="flex-1">🚌 Camión/Alimentadora</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="most_used_transport" value="light_rail">
                                    <span class="flex-1">🚊 Tren ligero</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="most_used_transport" value="taxi">
                                    <span class="flex-1">🚕 Taxi/Sitio</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="most_used_transport" value="uber">
                                    <span class="flex-1">🚗 Uber</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="most_used_transport" value="macro_calzada">
                                    <span class="flex-1">🚌 Macro calzada</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="most_used_transport" value="macro_periferico">
                                    <span class="flex-1">🚌 Macro periférico</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="most_used_transport" value="other">
                                    <span class="flex-1">Otro</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 19 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">19.</span>
                                <span>Tiempo promedio de traslado en transporte público (ida):</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="public_transport_time" value="under_30min">
                                    <span class="flex-1">⏱️ Menos de 30 min</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="public_transport_time" value="30min_1hour">
                                    <span class="flex-1">⏱️ 30 min a 1 hora</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="public_transport_time" value="1_2_hours">
                                    <span class="flex-1">⏱️ De 1 hora a 2 horas</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="public_transport_time" value="over_2_hours">
                                    <span class="flex-1">⏱️ Más de 2 horas</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 20 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">20.</span>
                                <span>¿Cuáles son los principales problemas del transporte público? (máximo 3)</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="public_transport_problems[]" value="wait_times">
                                    <span class="flex-1">⏰ Tiempos de espera</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="public_transport_problems[]" value="inefficient_routes">
                                    <span class="flex-1">🗺️ Rutas ineficientes</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="public_transport_problems[]" value="bad_condition">
                                    <span class="flex-1">🔧 Mal estado de unidades</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="public_transport_problems[]" value="insecurity">
                                    <span class="flex-1">🚨 Inseguridad</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="public_transport_problems[]" value="overcrowding">
                                    <span class="flex-1">👥 Saturación</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 21 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">21.</span>
                                <span>¿Qué ruta o rutas te benefician más? ¿Qué ruta te gustaría?</span>
                            </span>
                            </label>
                            <textarea name="preferred_routes" class="form-input" rows="3" placeholder="Describe las rutas que utilizas o que te gustaría que existieran..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 5: PRIVATE VEHICLES -->
            <div class="form-step" data-step="5">
                <div class="section-card mb-8">
                    <div class="section-title">
                        <div class="w-12 h-12 bg-green-700 rounded-full flex items-center justify-center text-white font-bold text-lg">5</div>
                        <span>Vehículos Particulares</span>
                        <svg class="w-7 h-7 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                    </div>

                    <div class="space-y-6">
                        <!-- Question 22 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">22.</span>
                                <span>¿Cuenta con vehículo propio? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="has_vehicle" value="yes_car" required>
                                    <span class="flex-1">🚗 Sí, auto</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="has_vehicle" value="yes_motorcycle" required>
                                    <span class="flex-1">🏍️ Sí, motocicleta</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="has_vehicle" value="no" required>
                                    <span class="flex-1">❌ No</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 23 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">23.</span>
                                <span>¿Con qué frecuencia lo usa para trasladarse?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="vehicle_usage_frequency" value="1_3_days">
                                    <span class="flex-1">De 1 a 3 días</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="vehicle_usage_frequency" value="4_6_days">
                                    <span class="flex-1">De 4 a 6 días</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="vehicle_usage_frequency" value="daily">
                                    <span class="flex-1">Diario</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="vehicle_usage_frequency" value="never">
                                    <span class="flex-1">Nunca</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 24 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">24.</span>
                                <span>¿Cuál es su tiempo promedio de traslado en vehículo particular?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="private_transport_time" value="under_30min">
                                    <span class="flex-1">Menos de 30 min</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="private_transport_time" value="30min_1hour">
                                    <span class="flex-1">30 min - 1 hora</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="private_transport_time" value="1_2_hours">
                                    <span class="flex-1">1 hora – 2 horas</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="private_transport_time" value="over_2_hours">
                                    <span class="flex-1">Más de 2 horas</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 25 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">25.</span>
                                <span>¿Cómo califica el tráfico en su ruta habitual?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="traffic_rating" value="fluid">
                                    <span class="flex-1">✅ Fluido</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="traffic_rating" value="moderate">
                                    <span class="flex-1">⚠️ Moderado</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="traffic_rating" value="congested">
                                    <span class="flex-1">🚦 Congestionado</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="traffic_rating" value="very_congested">
                                    <span class="flex-1">🚨 Muy congestionado</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 26 - WITH MAP -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">26.</span>
                                <span>¿Qué calle en su localidad es en la que más tráfico se hace?</span>
                            </span>
                            </label>
                            <input type="text" name="most_traffic_street" id="trafficStreetInput" class="form-input mb-3" placeholder="Escribe la calle o marca en el mapa...">

                            <div class="bg-green-50 border-l-4 border-green-600 p-4 rounded-lg mb-3">
                                <div class="space-y-2">
                                    <p class="text-sm text-green-800 flex items-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span><strong>💡 Tip:</strong> Escribe la dirección y el mapa se actualizará automáticamente</span>
                                    </p>
                                    <p class="text-xs text-green-700 ml-7">
                                        Ejemplo: "Av. López Mateos Sur", "Carretera a Chapala", etc.
                                    </p>
                                </div>
                            </div>

                            <div id="trafficMap" class="map-container"></div>
                            <input type="hidden" name="traffic_street_lat" id="trafficLat">
                            <input type="hidden" name="traffic_street_lng" id="trafficLng">
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 6: ROADS -->
            <div class="form-step" data-step="6">
                <div class="section-card mb-8">
                    <div class="section-title">
                        <div class="w-12 h-12 bg-green-700 rounded-full flex items-center justify-center text-white font-bold text-lg">6</div>
                        <span>Vialidades</span>
                        <svg class="w-7 h-7 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                    </div>

                    <div class="space-y-6">
                        <!-- Question 27 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">27.</span>
                                <span>¿Cómo califica el estado de las vialidades en su zona? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <select name="roads_condition" class="form-select" required>
                                <option value="">Seleccione una opción...</option>
                                <option value="very_good">⭐⭐⭐⭐⭐ Muy bueno</option>
                                <option value="good">⭐⭐⭐⭐ Bueno</option>
                                <option value="regular">⭐⭐⭐ Regular</option>
                                <option value="bad">⭐⭐ Malo</option>
                                <option value="very_bad">⭐ Muy malo</option>
                            </select>
                        </div>

                        <!-- Question 28 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">28.</span>
                                <span>¿Cuáles son los principales problemas de las vialidades? (puede marcar varias)</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="road_problems[]" value="potholes">
                                    <span class="flex-1">🕳️ Baches o daños</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="road_problems[]" value="lack_signage">
                                    <span class="flex-1">🚸 Falta de señalización</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="road_problems[]" value="bad_design">
                                    <span class="flex-1">🛣️ Mal diseño vial</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="road_problems[]" value="lack_lighting">
                                    <span class="flex-1">💡 Falta de iluminación</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="road_problems[]" value="invasion">
                                    <span class="flex-1">🚧 Invasión de banquetas o ciclovías</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 29 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">29.</span>
                                <span>¿Siente que las calles están diseñadas para todos los modos de transporte? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="roads_for_all" value="yes" required>
                                    <span class="flex-1">Sí</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="roads_for_all" value="partially" required>
                                    <span class="flex-1">Parcialmente</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="roads_for_all" value="no" required>
                                    <span class="flex-1">No</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 30 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">30.</span>
                                <span>¿Con qué frecuencia hay mantenimiento en las calles que transita? <span class="text-green-700">*</span></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="maintenance_frequency" value="frequently" required>
                                    <span class="flex-1">Frecuentemente</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="maintenance_frequency" value="occasionally" required>
                                    <span class="flex-1">Ocasionalmente</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="maintenance_frequency" value="rarely" required>
                                    <span class="flex-1">Casi nunca</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="maintenance_frequency" value="never" required>
                                    <span class="flex-1">Nunca</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 31 - WITH MAP -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">31.</span>
                                <span>¿Qué calles, avenidas o zonas considera prioritarias para mejorar?</span>
                            </span>
                            </label>
                            <textarea name="priority_zones" id="priorityZonesInput" class="form-input mb-3" rows="3" placeholder="Describe las zonas que consideras prioritarias o márcalas en el mapa..."></textarea>

                            <div class="bg-green-50 border-l-4 border-green-600 p-4 rounded-lg mb-3">
                                <div class="space-y-2">
                                    <p class="text-sm text-green-800 flex items-center space-x-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span><strong>💡 Tip:</strong> Escribe la dirección y el mapa se actualizará automáticamente</span>
                                    </p>
                                    <p class="text-xs text-green-700 ml-7">
                                        Ejemplo: "Av. Revolución", "Centro de Tlajomulco", etc.
                                    </p>
                                </div>
                            </div>

                            <div id="priorityMap" class="map-container"></div>
                            <input type="hidden" name="priority_zone_lat" id="priorityLat">
                            <input type="hidden" name="priority_zone_lng" id="priorityLng">
                        </div>

                        <!-- Question 32 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">32.</span>
                                <span>De las siguientes vialidades, ¿Cuál transitas con mayor frecuencia?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 gap-2">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="frequent_roads[]" value="adolf_bernard_horn">
                                    <span class="flex-1">Av. Adolf Bernard Horn Jr</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="frequent_roads[]" value="lopez_mateos">
                                    <span class="flex-1">Av. Adolfo López Mateos</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="frequent_roads[]" value="8_julio">
                                    <span class="flex-1">Av. Jesús Michel González (8 de Julio)</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="frequent_roads[]" value="circuito_metropolitano">
                                    <span class="flex-1">Circuito Metropolitano Sur (Vicente Fernández Gómez)</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="frequent_roads[]" value="camino_colima">
                                    <span class="flex-1">Av. Camino Real a Colima</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="frequent_roads[]" value="carretera_chapala">
                                    <span class="flex-1">Carretera Chapala</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 33 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">33.</span>
                                <span>¿Qué medio utiliza con más frecuencia para trasladarse en las vialidades antes seleccionadas?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="roads_transport_mode" value="public_transport">
                                    <span class="flex-1">🚌 Transporte Público</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="roads_transport_mode" value="motorcycle">
                                    <span class="flex-1">🏍️ Moto</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="roads_transport_mode" value="car">
                                    <span class="flex-1">🚗 Carro</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="roads_transport_mode" value="bicycle">
                                    <span class="flex-1">🚴 Bicicleta</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="roads_transport_mode" value="other">
                                    <span class="flex-1">Otro</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 7: ACCESIBILIDAD Y DISCAPACIDAD (OPCIONAL) -->
            <div class="form-step" data-step="7">
                <div class="section-card mb-8">
                    <div class="section-title">
                        <div class="w-12 h-12 bg-green-700 rounded-full flex items-center justify-center text-white font-bold text-lg">7</div>
                        <span>Accesibilidad y Discapacidad</span>
                        <svg class="w-7 h-7 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>

                    <!-- Aviso opcional -->
                    <div class="bg-green-50 border-l-4 border-green-600 p-4 rounded-lg mb-6">
                        <p class="text-sm text-green-800 font-semibold">Esta sección es completamente opcional.</p>
                        <p class="text-sm text-green-700 mt-1">Si eres una persona con discapacidad o una persona cuidadora, responde las siguientes preguntas. Si no aplica a tu caso, puedes enviar la encuesta directamente.</p>
                    </div>

                    <div class="grid grid-cols-1 gap-6">

                        <!-- Question 34 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">34.</span>
                                <span>¿Cuenta usted o alguien en su hogar con alguna discapacidad que influya en su movilidad diaria?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="disability_in_household" value="si_yo" id="disability_si_yo">
                                    <span class="flex-1">Sí, yo</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="disability_in_household" value="si_alguien">
                                    <span class="flex-1">Sí, alguien en mi hogar</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="disability_in_household" value="no">
                                    <span class="flex-1">No</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="disability_in_household" value="ninguna">
                                    <span class="flex-1">Ninguna de las anteriores</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 35 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">35.</span>
                                <span>En caso de responder sí, indique el tipo de discapacidad presente en el hogar: <em class="text-gray-500 font-normal">(puede elegir varias)</em></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="disability_types[]" value="motriz">
                                    <span class="flex-1">Motriz (silla de ruedas, bastón, andadera, movilidad reducida, etc.)</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="disability_types[]" value="visual">
                                    <span class="flex-1">Visual</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="disability_types[]" value="auditiva">
                                    <span class="flex-1">Auditiva</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="disability_types[]" value="intelectual">
                                    <span class="flex-1">Intelectual</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="disability_types[]" value="psicosocial">
                                    <span class="flex-1">Psicosocial</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="disability_types[]" value="otra" id="disability_types_otra_chk">
                                    <span class="flex-1">Otra</span>
                                </label>
                            </div>
                            <div id="disability_types_otra_container" class="hidden mt-2">
                                <input type="text" name="disability_types_other" class="form-input" placeholder="Especifique el tipo de discapacidad...">
                            </div>
                        </div>

                        <!-- Question 36 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">36.</span>
                                <span>En su colonia, la infraestructura urbana es accesible para personas con discapacidad:</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="urban_infrastructure_accessibility" value="si">
                                    <span class="flex-1">Sí</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="urban_infrastructure_accessibility" value="parcialmente">
                                    <span class="flex-1">Parcialmente</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="urban_infrastructure_accessibility" value="muy_poca">
                                    <span class="flex-1">Muy poca</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="urban_infrastructure_accessibility" value="no_accesible">
                                    <span class="flex-1">No es accesible</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="urban_infrastructure_accessibility" value="no_lo_se">
                                    <span class="flex-1">No lo sé</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 37 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">37.</span>
                                <span>¿Cuáles son las principales barreras que dificultan la movilidad de personas con discapacidad en su zona? <em class="text-gray-500 font-normal">(puede marcar varias)</em></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 gap-2">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="mobility_barriers[]" value="banquetas_mal_estado">
                                    <span class="flex-1">Banquetas en mal estado o con obstáculos</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="mobility_barriers[]" value="falta_rampas">
                                    <span class="flex-1">Falta de rampas adecuadas</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="mobility_barriers[]" value="rampas_mal_construidas">
                                    <span class="flex-1">Rampas muy inclinadas o mal construidas</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="mobility_barriers[]" value="cruces_inseguros">
                                    <span class="flex-1">Cruces peatonales inseguros o sin señalización accesible</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="mobility_barriers[]" value="falta_semaforos">
                                    <span class="flex-1">Falta de semáforos auditivos o visuales</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="mobility_barriers[]" value="transporte_no_accesible">
                                    <span class="flex-1">Falta de transporte público accesible (unidades sin espacio, sin rampas, sin prioridad)</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="mobility_barriers[]" value="vehiculos_invadiendo">
                                    <span class="flex-1">Vehículos invadiendo banquetas o rampas</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="mobility_barriers[]" value="iluminacion_insuficiente">
                                    <span class="flex-1">Iluminación insuficiente</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="mobility_barriers[]" value="otra" id="mobility_barriers_otra_chk">
                                    <span class="flex-1">Otra</span>
                                </label>
                            </div>
                            <div id="mobility_barriers_otra_container" class="hidden mt-2">
                                <input type="text" name="mobility_barriers_other" class="form-input" placeholder="Especifique la barrera...">
                            </div>
                        </div>

                        <!-- Question 38 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">38.</span>
                                <span>¿Qué tan accesible considera el transporte público en su zona para personas con discapacidad?</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="transport_accessibility_rating" value="muy_accesible">
                                    <span class="flex-1">Muy accesible</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="transport_accessibility_rating" value="algo_accesible">
                                    <span class="flex-1">Algo accesible</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="transport_accessibility_rating" value="poco_accesible">
                                    <span class="flex-1">Poco accesible</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="transport_accessibility_rating" value="nada_accesible">
                                    <span class="flex-1">Nada accesible</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="transport_accessibility_rating" value="no_lo_utilizo">
                                    <span class="flex-1">No lo utilizo</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 39 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">39.</span>
                                <span>¿Qué acciones considera más urgentes para mejorar la movilidad y accesibilidad para personas con discapacidad en Tlajomulco? <em class="text-gray-500 font-normal">(máximo 3 opciones)</em></span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 gap-2" id="urgentActionsGroup">
                                <label class="checkbox-option">
                                    <input type="checkbox" name="urgent_accessibility_actions[]" value="reparar_banquetas" class="urgent-action-chk">
                                    <span class="flex-1">Reparar y nivelar banquetas</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="urgent_accessibility_actions[]" value="construir_rampas" class="urgent-action-chk">
                                    <span class="flex-1">Construir rampas accesibles y estandarizadas</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="urgent_accessibility_actions[]" value="adaptar_transporte" class="urgent-action-chk">
                                    <span class="flex-1">Adaptar transporte público (rampas, espacios, señalización)</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="urgent_accessibility_actions[]" value="mejorar_senalizacion" class="urgent-action-chk">
                                    <span class="flex-1">Mejorar señalización visual y auditiva en cruceros</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="urgent_accessibility_actions[]" value="mayor_iluminacion" class="urgent-action-chk">
                                    <span class="flex-1">Mayor iluminación en calles</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="urgent_accessibility_actions[]" value="cultura_vial" class="urgent-action-chk">
                                    <span class="flex-1">Programas de cultura vial y respeto a accesos</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="urgent_accessibility_actions[]" value="rutas_inclusivas" class="urgent-action-chk">
                                    <span class="flex-1">Crear rutas seguras e inclusivas en centros escolares, de salud y mercados</span>
                                </label>
                                <label class="checkbox-option">
                                    <input type="checkbox" name="urgent_accessibility_actions[]" value="otra" id="urgent_actions_otra_chk" class="urgent-action-chk">
                                    <span class="flex-1">Otra</span>
                                </label>
                            </div>
                            <div id="urgent_actions_otra_container" class="hidden mt-2">
                                <input type="text" name="urgent_actions_other" class="form-input" placeholder="Especifique la acción...">
                            </div>
                            <p class="text-xs text-gray-500 mt-1" id="urgentActionsCounter">Seleccionadas: 0 / 3</p>
                        </div>

                        <!-- Question 40 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">40.</span>
                                <span>En su opinión, los espacios públicos cercanos (parques, unidades deportivas, centros de salud, escuelas) son accesibles para personas con discapacidad:</span>
                            </span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <label class="radio-option">
                                    <input type="radio" name="public_spaces_accessibility" value="si">
                                    <span class="flex-1">Sí</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="public_spaces_accessibility" value="parcialmente">
                                    <span class="flex-1">Parcialmente</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="public_spaces_accessibility" value="no">
                                    <span class="flex-1">No</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="public_spaces_accessibility" value="no_lo_se">
                                    <span class="flex-1">No lo sé</span>
                                </label>
                            </div>
                        </div>

                        <!-- Question 41 -->
                        <div class="space-y-3">
                            <label class="question-label">
                            <span class="flex items-center space-x-2">
                                <span class="text-green-700 font-bold">41.</span>
                                <span>Comentarios o necesidades específicas relacionadas con movilidad y discapacidad en su comunidad:</span>
                            </span>
                            </label>
                            <textarea name="disability_comments" class="form-input" rows="5" placeholder="Comparte tus comentarios o necesidades específicas..."></textarea>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center mb-8">
                <button type="button" id="prevBtn" class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white font-bold rounded-lg transition-all duration-300 flex items-center space-x-2 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span>Anterior</span>
                </button>

                <button type="button" id="nextBtn" class="px-6 py-3 bg-green-700 hover:bg-green-800 text-white font-bold rounded-lg transition-all duration-300 flex items-center space-x-2">
                    <span>Continuar</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <button type="submit" id="submitBtn" class="hidden px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition-all duration-300 flex items-center space-x-2">
                    <span>Enviar Encuesta</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            let currentStep = 1;
            const totalSteps = 7;
            const form = document.getElementById('surveyForm');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');

            // Tlajomulco de Zuñiga, Jalisco, México coordinates
            const tlajomulcoCenter = [20.4742, -103.4538];
            let trafficMap, priorityMap, trafficMarker, priorityMarker;

            // Geocoding function using Nominatim (OpenStreetMap)
            async function geocodeAddress(address) {
                try {
                    const response = await fetch(
                        `https://nominatim.openstreetmap.org/search?` +
                        `q=${encodeURIComponent(address + ', Tlajomulco de Zuñiga, Jalisco, México')}` +
                        `&format=json&limit=1&countrycodes=mx`
                    );
                    const data = await response.json();

                    if (data && data.length > 0) {
                        return {
                            lat: parseFloat(data[0].lat),
                            lng: parseFloat(data[0].lon),
                            display_name: data[0].display_name
                        };
                    }
                    return null;
                } catch (error) {
                    console.error('Error geocoding address:', error);
                    return null;
                }
            }

            // Debounce function to avoid too many requests
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Initialize maps when reaching step 5 or 6
            function initializeMaps() {
                // Traffic map (Step 5 - Question 26)
                if (currentStep === 5 && !trafficMap) {
                    setTimeout(() => {
                        const mapEl = document.getElementById('trafficMap');
                        if (mapEl) {
                            trafficMap = L.map('trafficMap').setView(tlajomulcoCenter, 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors',
                                maxZoom: 19
                            }).addTo(trafficMap);

                            // Add click handler
                            trafficMap.on('click', function(e) {
                                placeTrafficMarker(e.latlng);
                            });

                            // Setup geocoding for traffic street input
                            const trafficInput = document.getElementById('trafficStreetInput');
                            if (trafficInput) {
                                const debouncedGeocode = debounce(async (value) => {
                                    if (value.length > 3) {
                                        const result = await geocodeAddress(value);
                                        if (result) {
                                            const latlng = L.latLng(result.lat, result.lng);
                                            placeTrafficMarker(latlng);
                                            trafficMap.setView(latlng, 16);
                                        }
                                    }
                                }, 1000);

                                trafficInput.addEventListener('input', (e) => {
                                    debouncedGeocode(e.target.value);
                                });
                            }
                        }
                    }, 100);
                }

                // Priority zones map (Step 6 - Question 31)
                if (currentStep === 6 && !priorityMap) {
                    setTimeout(() => {
                        const mapEl = document.getElementById('priorityMap');
                        if (mapEl) {
                            priorityMap = L.map('priorityMap').setView(tlajomulcoCenter, 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '© OpenStreetMap contributors',
                                maxZoom: 19
                            }).addTo(priorityMap);

                            // Add click handler
                            priorityMap.on('click', function(e) {
                                placePriorityMarker(e.latlng);
                            });

                            // Setup geocoding for priority zones textarea
                            const priorityInput = document.getElementById('priorityZonesInput');
                            if (priorityInput) {
                                const debouncedGeocode = debounce(async (value) => {
                                    if (value.length > 3) {
                                        // Get the last line or last address mentioned
                                        const lines = value.split('\n');
                                        const lastLine = lines[lines.length - 1].trim();

                                        if (lastLine.length > 3) {
                                            const result = await geocodeAddress(lastLine);
                                            if (result) {
                                                const latlng = L.latLng(result.lat, result.lng);
                                                placePriorityMarker(latlng);
                                                priorityMap.setView(latlng, 16);
                                            }
                                        }
                                    }
                                }, 1500);

                                priorityInput.addEventListener('input', (e) => {
                                    debouncedGeocode(e.target.value);
                                });
                            }
                        }
                    }, 100);
                }

                // Invalidate size to ensure proper rendering
                setTimeout(() => {
                    if (trafficMap) trafficMap.invalidateSize();
                    if (priorityMap) priorityMap.invalidateSize();
                }, 200);
            }

            // Place traffic marker
            function placeTrafficMarker(latlng) {
                if (trafficMarker) {
                    trafficMap.removeLayer(trafficMarker);
                }

                const icon = L.divIcon({
                    className: 'custom-marker',
                    html: '<div style="background: #9333ea; width: 30px; height: 30px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 10px rgba(0,0,0,0.3);"></div>',
                    iconSize: [30, 30]
                });

                trafficMarker = L.marker(latlng, {icon: icon}).addTo(trafficMap);
                document.getElementById('trafficLat').value = latlng.lat.toFixed(6);
                document.getElementById('trafficLng').value = latlng.lng.toFixed(6);
                trafficMarker.bindPopup('📍 Ubicación de tráfico marcada').openPopup();
            }

            // Place priority zone marker
            function placePriorityMarker(latlng) {
                if (priorityMarker) {
                    priorityMap.removeLayer(priorityMarker);
                }

                const icon = L.divIcon({
                    className: 'custom-marker',
                    html: '<div style="background: #2d8f4e; width: 30px; height: 30px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 10px rgba(0,0,0,0.3);"></div>',
                    iconSize: [30, 30]
                });

                priorityMarker = L.marker(latlng, {icon: icon}).addTo(priorityMap);
                document.getElementById('priorityLat').value = latlng.lat.toFixed(6);
                document.getElementById('priorityLng').value = latlng.lng.toFixed(6);
                priorityMarker.bindPopup('📍 Zona prioritaria marcada').openPopup();
            }

            // Show specific step
            function showStep(step) {
                document.querySelectorAll('.form-step').forEach(el => {
                    el.classList.remove('active');
                });

                const currentStepEl = document.querySelector(`.form-step[data-step="${step}"]`);
                if (currentStepEl) {
                    currentStepEl.classList.add('active');
                }

                // Update step indicators
                updateStepIndicators(step);

                // Update buttons
                prevBtn.disabled = step === 1;

                if (step === totalSteps) {
                    nextBtn.classList.add('hidden');
                    submitBtn.classList.remove('hidden');
                    submitBtn.classList.add('flex');
                } else {
                    nextBtn.classList.remove('hidden');
                    submitBtn.classList.add('hidden');
                }

                // Update progress
                const progress = Math.round((step / totalSteps) * 100);
                document.getElementById('progressBar').style.width = progress + '%';
                document.getElementById('progressText').textContent = progress + '%';

                // Initialize maps if needed
                initializeMaps();

                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Update step indicators
            function updateStepIndicators(step) {
                for (let i = 1; i <= totalSteps; i++) {
                    const circle = document.getElementById(`step-circle-${i}`);
                    const numberSpan = circle.querySelector('.step-number');
                    const checkIcon = circle.querySelector('.step-check');

                    if (i < step) {
                        // Completed
                        circle.classList.add('completed');
                        circle.classList.remove('active', 'inactive');
                        numberSpan.classList.add('hidden');
                        checkIcon.classList.remove('hidden');
                    } else if (i === step) {
                        // Active
                        circle.classList.add('active');
                        circle.classList.remove('completed', 'inactive');
                        numberSpan.classList.remove('hidden');
                        checkIcon.classList.add('hidden');
                    } else {
                        // Inactive
                        circle.classList.add('inactive');
                        circle.classList.remove('active', 'completed');
                        numberSpan.classList.remove('hidden');
                        checkIcon.classList.add('hidden');
                    }
                }
            }

            // Validate current step
            function validateStep(step) {
                const currentStepEl = document.querySelector(`.form-step[data-step="${step}"]`);
                const requiredFields = currentStepEl.querySelectorAll('[required]');
                let firstInvalid = null;

                for (let field of requiredFields) {
                    if (field.type === 'radio') {
                        const radioGroup = currentStepEl.querySelectorAll(`[name="${field.name}"]`);
                        const isChecked = Array.from(radioGroup).some(radio => radio.checked);
                        if (!isChecked && !firstInvalid) {
                            firstInvalid = field;
                        }
                    } else if (!field.value.trim() && !firstInvalid) {
                        firstInvalid = field;
                    }
                }

                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstInvalid.reportValidity();
                    return false;
                }

                return true;
            }

            // Next button
            nextBtn.addEventListener('click', () => {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            // Previous button
            prevBtn.addEventListener('click', () => {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            // Step buttons in navigation
            document.querySelectorAll('.step-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const targetStep = parseInt(btn.dataset.step);
                    // Allow going back to any previous step
                    // Only validate if going forward
                    if (targetStep <= currentStep || validateStep(currentStep)) {
                        currentStep = targetStep;
                        showStep(currentStep);
                    }
                });
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                if (!validateStep(currentStep)) {
                    e.preventDefault();
                    return false;
                }

                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner mr-2"></span> Enviando...';
            });

            // Initialize first step
            showStep(1);

            // Toggle "Otra" text inputs in step 7
            function setupOtraToggle(checkboxId, containerId) {
                const chk = document.getElementById(checkboxId);
                const container = document.getElementById(containerId);
                if (chk && container) {
                    chk.addEventListener('change', function () {
                        container.classList.toggle('hidden', !this.checked);
                    });
                }
            }
            setupOtraToggle('disability_types_otra_chk', 'disability_types_otra_container');
            setupOtraToggle('mobility_barriers_otra_chk', 'mobility_barriers_otra_container');
            setupOtraToggle('urgent_actions_otra_chk', 'urgent_actions_otra_container');

            // Limit Q39 to max 3 checkboxes
            const urgentCheckboxes = document.querySelectorAll('.urgent-action-chk');
            const urgentCounter = document.getElementById('urgentActionsCounter');
            urgentCheckboxes.forEach(function (chk) {
                chk.addEventListener('change', function () {
                    const checked = document.querySelectorAll('.urgent-action-chk:checked');
                    if (urgentCounter) {
                        urgentCounter.textContent = 'Seleccionadas: ' + checked.length + ' / 3';
                    }
                    if (checked.length >= 3) {
                        urgentCheckboxes.forEach(function (c) {
                            if (!c.checked) c.disabled = true;
                        });
                    } else {
                        urgentCheckboxes.forEach(function (c) {
                            c.disabled = false;
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
