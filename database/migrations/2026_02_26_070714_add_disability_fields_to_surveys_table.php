<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('surveys', function (Blueprint $table) {
            // Q34
            $table->string('disability_in_household')->nullable();

            // Q35
            $table->json('disability_types')->nullable();
            $table->string('disability_types_other')->nullable();

            // Q36
            $table->string('urban_infrastructure_accessibility')->nullable();

            // Q37
            $table->json('mobility_barriers')->nullable();
            $table->string('mobility_barriers_other')->nullable();

            // Q38
            $table->string('transport_accessibility_rating')->nullable();

            // Q39
            $table->json('urgent_accessibility_actions')->nullable();
            $table->string('urgent_actions_other')->nullable();

            // Q40
            $table->string('public_spaces_accessibility')->nullable();

            // Q41
            $table->text('disability_comments')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->dropColumn([
                'disability_in_household',
                'disability_types',
                'disability_types_other',
                'urban_infrastructure_accessibility',
                'mobility_barriers',
                'mobility_barriers_other',
                'transport_accessibility_rating',
                'urgent_accessibility_actions',
                'urgent_actions_other',
                'public_spaces_accessibility',
                'disability_comments',
            ]);
        });
    }
};