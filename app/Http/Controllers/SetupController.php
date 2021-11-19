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
            'PHP 8.0+' => [
                'result' => PHP_VERSION_ID >= 80000,
                'description' => null,
            ],
            'bcmath extension' => [
                'result' => extension_loaded('bcmath'),
                'description' => null,
            ],
            'ctype extension' => [
                'result' => extension_loaded('ctype'),
                'description' => null,
            ],
            'json extension' => [
                'result' => extension_loaded('json'),
                'description' => null,
            ],
            'mbstring extension' => [
                'result' => extension_loaded('mbstring'),
                'description' => null,
            ],
            'openssl extension' => [
                'result' => extension_loaded('openssl'),
                'description' => null,
            ],
            'pdo_mysql extension' => [
                'result' => extension_loaded('pdo_mysql'),
                'description' => null,
            ],
            'tokenizer extension' => [
                'result' => extension_loaded('tokenizer'),
                'description' => null,
            ],
            'xml extension' => [
                'result' => extension_loaded('xml'),
                'description' => null,
            ],
            'env_writable' => [
                'result' => File::isWritable(base_path('.env')),
                'description' => null,
            ],
            'storage_writable' => [
                'result' => File::isWritable(storage_path()) && File::isWritable(storage_path('logs')),
                'description' => null,
            ],
        ];
        
        return view('setup.index', compact('requirements'));
    }
}
