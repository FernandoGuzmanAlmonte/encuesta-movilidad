<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display the survey form
     */
    public function index()
    {
        return view('survey.form');
    }

    /**
     * Store the survey
     */
    public function store(Request $request)
    {
        // Validate data
        $validated = $request->validate([
            // General data
            'age' => 'required|string',
            'gender' => 'required|string',
            'neighborhood' => 'required|string|max:255',
            'frequent_destination' => 'nullable|string|max:255',
            'exit_frequency' => 'required|string',
            'occupation' => 'required|string',

            // Pedestrians
            'walking_frequency' => 'required|string',
            'safe_sidewalks' => 'required|string',
            'safe_crossings' => 'required|string',
            'walking_safety' => 'required|string',
            'pedestrian_improvements' => 'nullable|string',

            // Bike lanes
            'bike_usage' => 'required|string',
            'bike_lane_exists' => 'nullable|string',
            'bike_safety' => 'nullable|string',
            'bike_obstacles' => 'nullable|array',
            'bike_lane_viable' => 'nullable|string',

            // Public transport
            'public_transport_frequency' => 'required|string',
            'most_used_transport' => 'nullable|string',
            'public_transport_time' => 'nullable|string',
            'public_transport_problems' => 'nullable|array',
            'preferred_routes' => 'nullable|string',

            // Vehicles
            'has_vehicle' => 'required|string',
            'vehicle_usage_frequency' => 'nullable|string',
            'private_transport_time' => 'nullable|string',
            'traffic_rating' => 'nullable|string',
            'most_traffic_street' => 'nullable|string',

            // Roads
            'roads_condition' => 'required|string',
            'road_problems' => 'nullable|array',
            'roads_for_all' => 'required|string',
            'maintenance_frequency' => 'required|string',
            'priority_zones' => 'nullable|string',
            'frequent_roads' => 'nullable|array',
            'roads_transport_mode' => 'nullable|string',

            // Coordinates
            'traffic_street_lat' => 'nullable|numeric',
            'traffic_street_lng' => 'nullable|numeric',
            'priority_zone_lat' => 'nullable|numeric',
            'priority_zone_lng' => 'nullable|numeric',
        ]);

        // Save survey
        Survey::create($validated);

        return redirect()->route('survey.thanks')
            ->with('success', '¡Gracias por tu participación!');
    }

    /**
     * Thank you page
     */
    public function thanks()
    {
        return view('survey.thanks');
    }
}
