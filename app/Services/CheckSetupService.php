<?php

namespace App\Services;

use Illuminate\Support\Facades\Schema;

class CheckSetupService {

    public static function check(): Bool
    {
        if (! Schema::hasTable('users')) {
            return false;
        }
        
        return true;
    }
}