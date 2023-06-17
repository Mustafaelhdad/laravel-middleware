<?php

namespace App\Http\Controllers;

use App\Traits\UploadImagesTrait;
use Illuminate\Http\Request;

class UploadImg extends Controller
{
    use UploadImagesTrait;

    public function showForm() {
        return view('upload');
    }

    public function store(Request $request) {
        return $this->uploadImage($request, 'admins');
    }
}
