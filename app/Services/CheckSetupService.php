<?php

namespace App\Services;

use Illuminate\Support\Facades\Schema;

class CheckSetupService {

    public static function check(): Bool
    {
        if (! env('SITE_SETUP', false)) {
            return false;
        }
        
        return true;
    }
}