<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogService
{

    /**
     * Registro de una actividad en la base de datos
     */
    public static function log(string $action, ?string $module = null, ?array $data = null, ?string $ipAddress = null, ?int $user_id = null ): void
    {
        ActivityLog::created([
            'user_id' => $user_id ?? Auth::user()->id,
            'action' => $action,
            'module' => $module,
            'data' => $data,
            'ip_address' => $ipAddress ?? request()->ip(),
        ]);
    }
}
