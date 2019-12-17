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
        $search = $request->q;
        if(!empty($search))
        {
            $user_records = UserForm::where('name', 'LIKE', '%'.$search.'%')
                        ->orWhere('spouse_name', 'LIKE', '%'.$search.'%')
                        ->orWhere('position', 'LIKE', '%'.$search.'%')
                        ->orWhere('organization', 'LIKE', '%'.$search.'%')
                        ->orWhere('business_address', 'LIKE', '%'.$search.'%')
                        ->orWhere('residence_address', 'LIKE', '%'.$search.'%')
                        ->orWhere('permanent_address', 'LIKE', '%'.$search.'%')
                        ->orWhere('phone', 'LIKE', '%'.$search.'%')
                        ->orWhere('email', 'LIKE', '%'.$search.'%')
                        ->orWhere('years', 'LIKE', '%'.$search.'%')
                        ->orWhere('facebook', 'LIKE', '%'.$search.'%')
                        ->orWhere('viber', 'LIKE', '%'.$search.'%')
                        ->orWhere('line', 'LIKE', '%'.$search.'%')
                        ->orWhere('skype', 'LIKE', '%'.$search.'%')
                        ->orWhere('passport_number', 'LIKE', '%'.$search.'%')
                        ->orWhere('date', 'LIKE', '%'.$search.'%')
                        ->paginate(20);
            return view('user_records',compact('user_records'));
        }else{
            $user_records = UserForm::paginate(20);
        }
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
        return \Excel::download(new UserFromExport, 'bangladeshis.xlsx');
    }
    
}
