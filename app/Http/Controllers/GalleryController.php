<?php

namespace App\Http\Controllers;

class GalleryController extends Controller
{
    public function show($file)
    {
        return view('main.gallery', ['image' => $file]);
    }
}