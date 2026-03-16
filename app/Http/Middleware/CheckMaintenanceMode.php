<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next)
    {
        $settingsPath = storage_path('app/site_settings.json');

        if (file_exists($settingsPath)) {
            $settings = json_decode(file_get_contents($settingsPath), true);
            if (!empty($settings['maintenance_mode'])) {
                return redirect()->route('survey.maintenance');
            }
        }

        return $next($request);
    }
}