<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApply;
use Illuminate\Support\Facades\Auth;
use File;
class CompanyController extends Controller
{
    public function dashboard(){
        $totaljobpost = Job::where('user_id', auth()->user()->id)->count();
        $totalactivepost = Job::where('user_id', auth()->user()->id)->where('status', 'active')->count();
        $totalapplication = JobApply::where('company_id', auth()->user()->id)->count();
        $totalapproveapply = JobApply::where('company_id', auth()->user()->id)->where('status', 'approved')->count();
        return view('company.dashboard.dashboard', compact('totaljobpost', 'totalactivepost', 'totalapplication', 'totalapproveapply'));
    }

    public function index()
    {

        return view('company.dashboard.profile');
    }

    public function updateProfile(Request $request)
    {

        $request->validate([

            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image', 'max:2048'],

        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand() . '-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = "uploads/" . $imageName;
            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile Updated Succesfully');
        return redirect()->back();
    }

    /** Update Password **/

    public function updatePassword(Request $request)
    {

        $request->validate([

            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);


        $request->user()->update([

            'password' => bcrypt($request->password)

        ]);

        toastr()->success('Password Updated Succesfully');
        return redirect()->back();
    }
}
