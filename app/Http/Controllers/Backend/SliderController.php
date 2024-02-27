<?php

namespace App\Http\Controllers\Backend;
use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Models\Slider;
use File;


class SliderController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'banner' => ['required', 'image'],
            'title' => ['required','max:100'],
            'description' => ['required','max:300'],
            'status' => ['required'],
            
        ]);


        $slider = new Slider();

       $imagePath = $this->uploadImage($request, 'banner', 'uploads');

        $slider->banner= $imagePath;
        $slider->title = $request-> title;
        $slider->description = $request-> description;
        $slider->status = $request-> status;
        $slider->save();

        toastr('Created Succesfully!', 'success');

        return redirect()->route('admin.slider.index');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $slider = Slider::findOrFail($id);

        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([

            'banner' => ['nullable', 'image'],
            'title' => ['required','max:200'],
            'description' => ['required','max:300'],
            'status' => ['required'],
            
        ]);    
        
        $slider = Slider::findOrFail($id);

        $imagePath = $this->updateImage($request, 'banner', 'uploads', $slider->banner);

        $slider->banner= empty(!$imagePath) ? $imagePath:  $slider->banner;
        $slider->title = $request-> title;
        $slider->description = $request-> description;
        $slider->status = $request-> status;

        $slider->save();

        toastr('Updated Succesfully!', 'success');

        return redirect()->route('admin.slider.index');


    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $this->deleteImage($slider->banner);
        $slider->delete();
        
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request){

        $slider = Slider::findOrFail($request->id);
        $slider->status = $request->status == 'true' ? 1 : 0;
        $slider->save();

        return response(['message' => 'Status has been Updated!']);
    }

}
