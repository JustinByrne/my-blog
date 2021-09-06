<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $media = Image::find(1)->getMedia();

        return view('media.index', compact('media'));
    }
}
