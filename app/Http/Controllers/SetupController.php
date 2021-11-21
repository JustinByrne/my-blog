<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\User;
use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

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

    public function database(): View
    {
        return view('setup.database');
    }

    public function storeDatabase(Request $request): RedirectResponse
    {
        if (! $request->has('db_connection') || $request->db_connection != 'mysql') {
            return redirect()->route('setup.database')->withErrors(['msg' => 'Incorrect database connection']);
        }

        $config = config('database.connections.mysql');

        $config['host'] = $request->db_host;
        $config['port'] = $request->db_port;
        $config['database'] = $request->db_database;
        $config['username'] = $request->db_username;
        $config['password'] = $request->db_password;

        Config::set('database.connections.setup', $config);

        try {
            DB::connection('setup')
                ->getDoctrineSchemaManager()
                ->listTableNames();
        } catch (PDOException $e) {
            return redirect()->route('setup.database')->withInput()->withErrors(['msg' => 'Connection to database failed']);
        }

        Artisan::call('migrate:fresh', [
            '--database' => 'setup',
            '--force' => true,
            '--no-interaction' => true,
            '--seed' => true,
        ]);

        $envContent = File::get(base_path('.env'));

        $envContent = preg_replace([
            '/DB_HOST=(.*)\S/',
            '/DB_PORT=(.*)\S/',
            '/DB_DATABASE=(.*)\S/',
            '/DB_USERNAME=(.*)\S/',
            '/DB_PASSWORD=(.*)\S/',
        ], [
            'DB_HOST=' . $config['host'],
            'DB_PORT=' . $config['port'],
            'DB_DATABASE=' . $config['database'],
            'DB_USERNAME=' . $config['username'],
            'DB_PASSWORD=' . $config['password'],
        ], $envContent);

        if ($envContent !== null) {
            File::put(base_path('.env'), $envContent);
        }
        
        return redirect()->route('setup.settings');
    }

    public function settings(): View
    {
        return view('setup.settings');
    }

    public function storeSettings(Request $request)
    {
        $request->validate([
            'app_name' => 'required',
            'app_url' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed'
        ]);

        Setting::where('name', 'site_name')->first()->update([
            'value' => $request->app_name
        ]);

        User::find(1)->update([
            'email' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $envContent = File::get(base_path('.env'));

        $envContent = preg_replace([
            '/APP_NAME=(.*)\S/',
            '/APP_URL=(.*)\S/',
            '/SITE_SETUP=(.*)\S/',
        ], [
            'APP_NAME="' . $request->app_name . '"',
            'APP_URL=' . $request->app_url,
            'SITE_SETUP=true',
        ], $envContent);

        if ($envContent !== null) {
            File::put(base_path('.env'), $envContent);
        }

        Artisan::call('storage:link');

        return redirect()->route('home');
    }
}
