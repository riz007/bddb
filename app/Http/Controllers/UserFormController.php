<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserForm;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UserFormRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Http\Controllers\UserFormExport;
use App\Exports\UserFromExport;

class UserFormController extends Controller
{

    public function index(Request $request)
    {
        $user_records = UserForm::all();
        return view('user_records',compact('user_records'));
    }

    public function create(Request $request)
    {
        return view('form');
    }

    public function store(UserFormRequest $request)
    {
        $data = $request->all();
        $file = $request->file('image');
        if($request->hasFile('image'))
        {
            $data['image'] = $this->image_upload($file,"user",200,200);
        }
        UserForm::create($data);
        return redirect()->route('user-records.index')->with('detail','Created successfully');
    }

    public function edit(Request $request, $id)
    {
        $record = UserForm::where('id',$id)->first();
        return view('form',['record'=>$record]);
    }

    public function update(UserFormRequest $request, $id)
    {
        $record = UserForm::where('id',$id)->first();
        $data = $request->all();
        $file = $request->file('image');
        if($request->hasFile('image'))
        {
            $data['image'] = $this->image_upload($file,"user",200,200);
        }
        $record->update($data);
        return redirect()->route('user-records.index')->with('detail','Updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $record = UserForm::where('id',$id)->first();
        $record->delete();
        return redirect()->route('user-records.index')->with('detail','Updated successfully');
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

    public function export_excel(Request $request)
    {
        return \Excel::download(new UserFromExport, 'users.xlsx');
    }
    
}
