<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use App\Models\AboutImage;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $about = About::first();
        $aboutImage = AboutImage::get();
        return view('admin.about.index', compact('about', 'aboutImage'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => ['required'],
            'description' => ['required'],
        ]);
        About::updateOrCreate(

            ['id' => 1],

            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        toastr('Updated Successfully');
        return redirect()->back();
    }


    public function imageUpload(Request $request)
    {

        $request->validate([
            'image.*' => ['required', 'image'],
        ]);

        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');

        if ($imagePaths !== null) {
            foreach ($imagePaths as $path) {
                $aboutImage = new AboutImage();
                $aboutImage->image = $path;
                $aboutImage->save();
            }
        }

        toastr('Updated Successfully');
        return redirect()->back();
    }

    public function imageDelete(string $id){

        $aboutImage = AboutImage::findOrFail($id);
        $aboutImage->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }
  
}
