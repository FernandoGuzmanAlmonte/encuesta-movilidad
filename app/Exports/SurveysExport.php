<?php

namespace App\Exports;

use App\Models\Survey;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SurveysExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    /**
     * Get the surveys collection
     */
    public function collection()
    {
        return Survey::orderBy('created_at', 'desc')->get();
    }

    /**
     * Define column headings
     */
    public function headings(): array
    {
        return [
            'ID',
            'Fecha',
            // General Data
            'Edad',
            'Género',
            'Colonia',
            'Destino Frecuente',
            'Frecuencia de Salida',
            'Ocupación',

            // Pedestrians
            'Frecuencia Caminar',
            'Banquetas Seguras',
            'Cruces Seguros',
            'Seguridad al Caminar',
            'Mejoras Peatonales',

            // Bike Lanes
            'Uso de Bicicleta',
            'Existe Ciclovía',
            'Seguridad en Bicicleta',
            'Obstáculos Bicicleta',
            'Ciclovía Viable',

            // Public Transport
            'Frecuencia Transporte Público',
            'Medio Más Usado',
            'Tiempo Transporte Público',
            'Problemas Transporte Público',
            'Rutas Preferidas',

            // Private Vehicles
            'Tiene Vehículo',
            'Frecuencia Uso Vehículo',
            'Tiempo Vehículo Particular',
            'Calificación Tráfico',
            'Calle con Más Tráfico',

            // Roads
            'Estado Vialidades',
            'Problemas Vialidades',
            'Calles para Todos',
            'Frecuencia Mantenimiento',
            'Zonas Prioritarias',
            'Vialidades Frecuentes',
            'Modo Transporte Vialidades',

            // Geolocation
            'Latitud Calle Tráfico',
            'Longitud Calle Tráfico',
            'Latitud Zona Prioritaria',
            'Longitud Zona Prioritaria',
        ];
    }

    /**
     * Map data for each row
     */
    public function map($survey): array
    {
        return [
            $survey->id,
            $survey->created_at->format('Y-m-d H:i:s'),

            // General Data
            $this->translateValue($survey->age),
            $this->translateValue($survey->gender),
            $survey->neighborhood,
            $survey->frequent_destination,
            $this->translateValue($survey->exit_frequency),
            $this->translateValue($survey->occupation),

            // Pedestrians
            $this->translateValue($survey->walking_frequency),
            $this->translateValue($survey->safe_sidewalks),
            $this->translateValue($survey->safe_crossings),
            $this->translateValue($survey->walking_safety),
            $survey->pedestrian_improvements,

            // Bike Lanes
            $this->translateValue($survey->bike_usage),
            $this->translateValue($survey->bike_lane_exists),
            $this->translateValue($survey->bike_safety),
            $this->arrayToString($survey->bike_obstacles),
            $survey->bike_lane_viable,

            // Public Transport
            $this->translateValue($survey->public_transport_frequency),
            $this->translateValue($survey->most_used_transport),
            $this->translateValue($survey->public_transport_time),
            $this->arrayToString($survey->public_transport_problems),
            $survey->preferred_routes,

            // Private Vehicles
            $this->translateValue($survey->has_vehicle),
            $this->translateValue($survey->vehicle_usage_frequency),
            $this->translateValue($survey->private_transport_time),
            $this->translateValue($survey->traffic_rating),
            $survey->most_traffic_street,

            // Roads
            $this->translateValue($survey->roads_condition),
            $this->arrayToString($survey->road_problems),
            $this->translateValue($survey->roads_for_all),
            $this->translateValue($survey->maintenance_frequency),
            $survey->priority_zones,
            $this->arrayToString($survey->frequent_roads),
            $this->translateValue($survey->roads_transport_mode),

            // Geolocation
            $survey->traffic_street_lat,
            $survey->traffic_street_lng,
            $survey->priority_zone_lat,
            $survey->priority_zone_lng,
        ];
    }

    /**
     * Apply styles to the worksheet
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }

    /**
     * Helper: Convert array to string
     */
    private function arrayToString($array): string
    {
        if (!$array || !is_array($array)) {
            return '';
        }

        return implode(', ', array_map(function($item) {
            return $this->translateValue($item);
        }, $array));
    }

    /**
     * Helper: Translate English values to Spanish
     */
    private function translateValue($value): string
    {
        $translations = [
            // Age
            'under_15' => 'Menos de 15',
            '16_17' => '16 a 17',
            '18_24' => '18 a 24',
            '25_34' => '25 a 34',
            '35_49' => '35 a 49',
            '50_59' => '50 a 59',
            '60_plus' => '60 o más',

            // Gender
            'female' => 'Mujer',
            'male' => 'Hombre',
            'non_binary' => 'No binario',
            'prefer_not_say' => 'Prefiero no decir',

            // Exit frequency
            'once' => 'Una vez',
            'twice' => 'Dos veces',
            'three_or_more' => 'Tres o más veces',
            'rarely' => 'Casi no salgo',

            // Occupation
            'student' => 'Estudia',
            'worker' => 'Trabaja',
            'both' => 'Ambas',
            'other' => 'Otra',

            // Walking frequency
            'daily' => 'Diario',
            'several_times_week' => 'Varias veces por semana',
            'rarely' => 'Rara vez',
            'never' => 'Nunca',

            // Sidewalks
            'yes_most' => 'Sí, en la mayoría',
            'some' => 'En algunas calles',
            'very_few' => 'Muy pocas',
            'none' => 'No hay',

            // Yes/No/Partially
            'yes' => 'Sí',
            'no' => 'No',
            'partially' => 'Parcialmente',

            // Safety
            'very_safe' => 'Muy segura',
            'somewhat_safe' => 'Algo segura',
            'not_very_safe' => 'Poco segura',
            'not_safe' => 'Nada segura',

            // Bike usage
            '1_3_times' => '1 a 3 veces',
            '4_5_times' => '4 a 5 veces',
            'no_use' => 'No uso',

            // Bike lanes
            'yes_good' => 'Sí, buen estado',
            'yes_bad' => 'Sí, mal estado',

            // Sometimes
            'sometimes' => 'A veces',

            // Bike obstacles
            'lack_infrastructure' => 'Falta infraestructura',
            'bad_pavement' => 'Mal pavimento',
            'vehicles_invading' => 'Vehículos invadiendo',
            'insecurity' => 'Inseguridad',
            'lack_culture' => 'Falta cultura vial',

            // Public transport frequency
            '1_3_days' => '1 a 3 días',
            '4_5_days' => '4 a 5 días',
            '6_7_days' => '6 a 7 días',

            // Transport types
            'urban_bus' => 'Camión urbano',
            'light_rail' => 'Tren ligero',
            'taxi' => 'Taxi',

            // Time
            'under_30min' => 'Menos de 30 min',
            '30min_1hour' => '30 min a 1 hora',
            '1_2_hours' => '1 a 2 horas',
            'over_2_hours' => 'Más de 2 horas',

            // Transport problems
            'wait_times' => 'Tiempos de espera',
            'inefficient_routes' => 'Rutas ineficientes',
            'bad_condition' => 'Mal estado',
            'overcrowding' => 'Saturación',

            // Vehicles
            'yes_car' => 'Sí, auto',
            'yes_motorcycle' => 'Sí, moto',
            '4_6_days' => '4 a 6 días',

            // Traffic
            'fluid' => 'Fluido',
            'moderate' => 'Moderado',
            'congested' => 'Congestionado',
            'very_congested' => 'Muy congestionado',

            // Road condition
            'very_good' => 'Muy bueno',
            'good' => 'Bueno',
            'regular' => 'Regular',
            'bad' => 'Malo',
            'very_bad' => 'Muy malo',

            // Road problems
            'potholes' => 'Baches',
            'lack_signage' => 'Falta señalización',
            'bad_design' => 'Mal diseño',
            'lack_lighting' => 'Falta iluminación',
            'invasion' => 'Invasión',

            // Maintenance
            'frequently' => 'Frecuentemente',
            'occasionally' => 'Ocasionalmente',

            // Roads
            'adolf_bernard_horn' => 'Av. Adolf Bernard Horn Jr',
            'lopez_mateos' => 'Av. López Mateos',
            '8_julio' => 'Av. 8 de Julio',
            'circuito_metropolitano' => 'Circuito Metropolitano Sur',
            'camino_colima' => 'Camino Real a Colima',
            'carretera_chapala' => 'Carretera Chapala',

            // Transport modes
            'public_transport' => 'Transporte público',
            'motorcycle' => 'Moto',
            'car' => 'Carro',
            'bicycle' => 'Bicicleta',
        ];

        return $translations[$value] ?? $value;
    }
}
