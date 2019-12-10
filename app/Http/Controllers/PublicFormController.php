<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserForm;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UserFormRequest;

class PublicFormController extends Controller
{
    public function store(UserFormRequest $request)
    {
        $data = $request->all();
        $file = $request->file('image');
        if($request->hasFile('image'))
        {
            $data['image'] = $this->image_upload($file,"user",200,200);
        }
        UserForm::create($data);
        return redirect()->route('welcome')->with('detail','Created successfully');
    }

    function image_upload($file, $name, $width, $height)
    {
        $thumb_path = "uploads/".$name."/";
        // this is upload path relative to file system
        $uploadPath = $thumb_path;
        $extension = $file->getClientOriginalExtension();
        $filename = time() . Str::random(20) . "." . $extension;

        // dd(is_dir($uploadPath));
        if (false == is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $filename  = time() . '.' . $file->getClientOriginalExtension();
        Image::make($file->getRealPath())->resize($width, $height)->save($uploadPath . "/" . "thumbnail-" . $filename);
        Image::make($file)->save($uploadPath . $filename);
        $path_name = $uploadPath. $filename;
        return $path_name;
    }


}
