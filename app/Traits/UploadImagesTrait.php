<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait UploadImagesTrait {
    public function uploadImage(Request $request, $folderName) {
        $path = '';
        if($request->hasFile('photo')) {
            $img = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs($folderName, $img, 'public');
        }
        return $path;
    }
}
