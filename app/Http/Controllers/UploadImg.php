<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Traits\UploadImagesTrait;
use Illuminate\Http\Request;

class UploadImg extends Controller
{
    use UploadImagesTrait;

    public function showForm() {
        return view('upload');
    }

    public function store(Request $request) {
        $path = $this->uploadImage($request, 'users');
        Image::create([
            'path' => $path
        ]);

        return "upload OK";
    }
}
