<?php

namespace App\Traits;

use Illuminate\Http\UploadeFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    public function uploadOne($uploadeFile, $folder = null, $disk = 'public', $filename = null){

        $name = ! is_null($filename) ? $filename : str_random(25);

        $file = $uploadeFile->storeAs($folder, $name. '.' . $uploadeFile->getClientOriginalExtension(), $disk);

        return $file;
    }

}