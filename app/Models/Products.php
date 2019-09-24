<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadTrait;

class Products extends Model
{
    use UploadTrait;

    protected $fillable = [ 'name', 'reference', 'picture', 'price', 'description'];

    // public static function download_Setting($request)
    // {

    //     $picture = $request->picture;
    //     $name = str_slug($request->name).'_'.time();
    //     $folder = '/uploads/images/';
    //     $filePath = $folder . $name . '.' . $picture->getClientOriginalExtension();
    //     $this->uploadOne($picture, $folder, 'public', $name);
    //     return $filePath;
    // }
}
