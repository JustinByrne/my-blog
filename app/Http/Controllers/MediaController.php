<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __invoke(Request $request)
    {
        $media = Image::find(1);
        $image = $media->addMediaFromRequest('upload')->toMediaCollection();

        return response()->json([
            'url' => $image->getUrl()
        ]);
    }
}
