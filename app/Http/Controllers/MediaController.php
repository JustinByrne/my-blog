<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function index()
    {
        $media = Image::find(1)->getMedia();

        return view('media.index', compact('media'));
    }

    public function destroy(Media $media) {
        $media->delete();

        return redirect()->route('media.index');
    }
}
