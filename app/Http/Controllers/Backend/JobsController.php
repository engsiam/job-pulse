<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\JobDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JobDataTable $datatable)
    {
        return $datatable->render('company.job.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        return view('company.job.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'salary' => ['required'],
            'office_time' => ['required'],
            'office_from' => ['required'],
            'requirement' => ['required'],
            'end_date' => ['required'],
        ]);

        $jobscreate = Job::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'address' => $request->address,
            'salary' => $request->salary,
            'requirement' => $request->requirement,
            'office_time' => $request->office_time,
            'office_from' => $request->office_from,
            'end_date' => $request->end_date,
            'status' => 'inactive',
        ]);

        toastr('Created Successfully');
        return redirect()->route('company.jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::get();
        $jobs = Job::findOrFail($id);
        return view('company.job.edit', compact('jobs', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'salary' => ['required'],
            'office_time' => ['required'],
            'office_from' => ['required'],
            'requirement' => ['required'],
            'end_date' => ['required'],
        ]);

        $jobscreate = Job::findOrFail($id)->update([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'address' => $request->address,
            'salary' => $request->salary,
            'requirement' => $request->requirement,
            'office_time' => $request->office_time,
            'office_from' => $request->office_from,
            'end_date' => $request->end_date,
            'status' => 'inactive',
        ]);

        toastr('Updated Successfully');
        return redirect()->route('company.jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobs = Job::findOrFail( $id);
        $jobs->delete();
        return response(['status' => 'success', 'message'=> 'Deleted Successfully']);
    }

    public function changeStatus(Request $request){
        $jobs = Job::findOrFail($request->id);
        $jobs->status = $request->status == 'true' ? 'active' : 'inactive';
        $jobs->save();
        return response(['status' => 'success', 'message'=> 'Status Changed Successfully']);
    }
}
