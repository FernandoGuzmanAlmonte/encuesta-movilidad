<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Exports\SurveysExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    /**
     * Display the dashboard
     */
    public function index()
    {
        $totalSurveys = Survey::count();
        $todaySurveys = Survey::whereDate('created_at', today())->count();
        $weekSurveys = Survey::where('created_at', '>=', now()->subDays(7))->count();

        // Age distribution
        $ageDistribution = Survey::select('age', DB::raw('count(*) as total'))
            ->groupBy('age')
            ->get();

        // Gender distribution
        $genderDistribution = Survey::select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->get();

        // Occupation distribution
        $occupationDistribution = Survey::select('occupation', DB::raw('count(*) as total'))
            ->groupBy('occupation')
            ->get();

        // Walking frequency
        $walkingFrequency = Survey::select('walking_frequency', DB::raw('count(*) as total'))
            ->groupBy('walking_frequency')
            ->get();

        // Bike usage
        $bikeUsage = Survey::select('bike_usage', DB::raw('count(*) as total'))
            ->groupBy('bike_usage')
            ->get();

        // Public transport frequency
        $publicTransportFrequency = Survey::select('public_transport_frequency', DB::raw('count(*) as total'))
            ->groupBy('public_transport_frequency')
            ->get();

        // Has vehicle
        $hasVehicle = Survey::select('has_vehicle', DB::raw('count(*) as total'))
            ->groupBy('has_vehicle')
            ->get();

        // Traffic rating
        $trafficRating = Survey::select('traffic_rating', DB::raw('count(*) as total'))
            ->whereNotNull('traffic_rating')
            ->groupBy('traffic_rating')
            ->get();

        // Roads condition
        $roadsCondition = Survey::select('roads_condition', DB::raw('count(*) as total'))
            ->groupBy('roads_condition')
            ->get();

        // Top neighborhoods
        $topNeighborhoods = Survey::select('neighborhood', DB::raw('count(*) as total'))
            ->groupBy('neighborhood')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        // Recent surveys
        $recentSurveys = Survey::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard.index', compact(
            'totalSurveys',
            'todaySurveys',
            'weekSurveys',
            'ageDistribution',
            'genderDistribution',
            'occupationDistribution',
            'walkingFrequency',
            'bikeUsage',
            'publicTransportFrequency',
            'hasVehicle',
            'trafficRating',
            'roadsCondition',
            'topNeighborhoods',
            'recentSurveys'
        ));
    }

    /**
     * Export to Excel
     */
    public function exportExcel()
    {
        return Excel::download(new SurveysExport, 'encuestas_movilidad_' . date('Y-m-d_His') . '.xlsx');
    }

    /**
     * Export to CSV
     */
    public function exportCsv()
    {
        return Excel::download(new SurveysExport, 'encuestas_movilidad_' . date('Y-m-d_His') . '.csv');
    }
}
