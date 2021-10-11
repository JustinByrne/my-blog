<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function index(): View
    {
        return view('setup.index');
    }
}
