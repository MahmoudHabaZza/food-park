<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Str;

trait UploadFileTrait {
    public function uploadImage(Request $request , $inputName , $path = 'uploads') {
        if($request->hasFile($inputName)) {
            $image = $request->file($inputName);
            $file_name = time() .'.'. $image->getClientOriginalExtension();
            $image->move(public_path($path),$file_name);

            return $path.'/'.$file_name;
        }

        return null;
    }
}
