<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();

            // General data
            $table->string('age');
            $table->string('gender');
            $table->string('neighborhood');
            $table->string('frequent_destination')->nullable();
            $table->string('exit_frequency');
            $table->string('occupation');

            // Pedestrians
            $table->string('walking_frequency');
            $table->string('safe_sidewalks');
            $table->string('safe_crossings');
            $table->string('walking_safety');
            $table->text('pedestrian_improvements')->nullable();

            // Bike lanes
            $table->string('bike_usage');
            $table->string('bike_lane_exists')->nullable();
            $table->string('bike_safety')->nullable();
            $table->json('bike_obstacles')->nullable();
            $table->text('bike_lane_viable')->nullable();

            // Public transport
            $table->string('public_transport_frequency');
            $table->string('most_used_transport')->nullable();
            $table->string('public_transport_time')->nullable();
            $table->json('public_transport_problems')->nullable();
            $table->text('preferred_routes')->nullable();

            // Private vehicles
            $table->string('has_vehicle');
            $table->string('vehicle_usage_frequency')->nullable();
            $table->string('private_transport_time')->nullable();
            $table->string('traffic_rating')->nullable();
            $table->text('most_traffic_street')->nullable();

            // Roads
            $table->string('roads_condition');
            $table->json('road_problems')->nullable();
            $table->string('roads_for_all');
            $table->string('maintenance_frequency');
            $table->text('priority_zones')->nullable();
            $table->json('frequent_roads')->nullable();
            $table->string('roads_transport_mode')->nullable();

            // Geolocation for questions 26 and 31
            $table->decimal('traffic_street_lat', 10, 8)->nullable();
            $table->decimal('traffic_street_lng', 11, 8)->nullable();
            $table->decimal('priority_zone_lat', 10, 8)->nullable();
            $table->decimal('priority_zone_lng', 11, 8)->nullable();

            $table->timestamps();

            // Indexes for fast searches
            $table->index('created_at');
            $table->index('neighborhood');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
