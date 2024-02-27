<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\JobRequestDataTable;

class JobRequestController extends Controller
{
    public function index(JobRequestDataTable $datatable){
        return $datatable->render('admin.job-request.index');
    }

    public function changeStatus(Request $request){
        $jobs = Job::findOrFail($request->id);
        $jobs->status = $request->status == 'true' ? 'active' : 'inactive';
        $jobs->save();
        return response(['status' => 'success', 'message' => 'Status Chaged Successfully']);
    }


    public function edit(string $id)
    {
        $category = Category::get();
        $jobs = Job::findOrFail($id);
        return view('admin.job-request.edit', compact('jobs', 'category'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required'],
            'address' => ['required'],
            'salary' => ['required'],
            'office_time' => ['required'],
            'office_from' => ['required'],
        ]);

        $jobscreate = Job::findOrFail($id)->update([

            'name' => $request->name,
            'category_id' => $request->category,
            'address' => $request->address,
            'salary' => $request->salary,
            'requirement' => $request->requirement,
            'office_time' => $request->office_time,
            'office_from' => $request->office_from,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        toastr('Updated Successfully');
        return redirect()->route('admin.company.job-request');
    }

    public function delete(string $id){
        $jobs = Job::findOrFail($id);
        $jobs->delete();
        return response(['status' => 'success', 'message' => 'Deleted Succesfully']);
    }
}
