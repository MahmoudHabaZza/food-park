<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait UploadFileTrait
{
    public function uploadImage(Request $request, $inputName, $path = 'uploads', $oldPath = NULL)
    {
        if ($request->hasFile($inputName)) {
            $image = $request->file($inputName);
            $file_name = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $file_name);

            //  Delete Previous Image
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $path . '/' . $file_name;
        }

        return null;
    }


    public function removeImage(string $path): void
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
