<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        // General data
        'age', 'gender', 'neighborhood', 'frequent_destination', 'exit_frequency', 'occupation',

        // Pedestrians
        'walking_frequency', 'safe_sidewalks', 'safe_crossings',
        'walking_safety', 'pedestrian_improvements',

        // Bike lanes
        'bike_usage', 'bike_lane_exists', 'bike_safety',
        'bike_obstacles', 'bike_lane_viable',

        // Public transport
        'public_transport_frequency', 'most_used_transport', 'public_transport_time',
        'public_transport_problems', 'preferred_routes',

        // Private vehicles
        'has_vehicle', 'vehicle_usage_frequency', 'private_transport_time',
        'traffic_rating', 'most_traffic_street',

        // Roads
        'roads_condition', 'road_problems', 'roads_for_all',
        'maintenance_frequency', 'priority_zones', 'frequent_roads',
        'roads_transport_mode',

        // Geolocation
        'traffic_street_lat', 'traffic_street_lng',
        'priority_zone_lat', 'priority_zone_lng',
    ];

    protected $casts = [
        'bike_obstacles' => 'array',
        'public_transport_problems' => 'array',
        'road_problems' => 'array',
        'frequent_roads' => 'array',
        'traffic_street_lat' => 'decimal:8',
        'traffic_street_lng' => 'decimal:8',
        'priority_zone_lat' => 'decimal:8',
        'priority_zone_lng' => 'decimal:8',
    ];
}
