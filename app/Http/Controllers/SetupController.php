<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SetupController extends Controller
{
    public function welcome(): View
    {
        return view('setup.welcome');
    }
    
    public function requirements(): View
    {
        $requirements = [
            'PHP 8.0+' => PHP_VERSION_ID >= 80000,
            'bcmath ext' => extension_loaded('bcmath'),
            'ctype ext' => extension_loaded('ctype'),
            'json ext' => extension_loaded('json'),
            'mbstring ext' => extension_loaded('mbstring'),
            'openssl ext' => extension_loaded('openssl'),
            'pdo_mysql ext' => extension_loaded('pdo_mysql'),
            'tokenizer ext' => extension_loaded('tokenizer'),
            'xml ext' => extension_loaded('xml'),
            '.env writable' => File::isWritable(base_path('.env')),
            'storage writable' => File::isWritable(storage_path()) && File::isWritable(storage_path('logs')),
        ];

        $pass = ! in_array(false, $requirements);
        
        return view('setup.requirements', compact('requirements', 'pass'));
    }
}
