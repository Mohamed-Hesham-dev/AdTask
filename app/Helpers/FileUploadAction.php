<?php


namespace App\Helpers;


use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileUploadAction
{

    function str_random($length = 4)
    {
        return Str::random($length);
    }

    function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }

    public function execute($model, $files, $destination)
    {
        foreach ($files as $images) {
            $img = "";
            $img = $this->str_random(4) . $images->getClientOriginalName();
            $originname = time() . '.' . $images->getClientOriginalName();
            $filename = $this->str_slug(pathinfo($originname, PATHINFO_FILENAME), "-");
            $filename = $images->hashName();
            $extention = pathinfo($originname, PATHINFO_EXTENSION);
            $img = $filename;
            $type = $images->extension();
            $size = $images->getSize();
            $images->move(public_path('storage'), $img);
            $model->images()->create(['image'=>$img,'type'=>$type, 'size'=>$size]);
        }


    }

}
