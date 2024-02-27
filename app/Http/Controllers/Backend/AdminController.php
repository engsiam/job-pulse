<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $companis = User::where('role', 'company')->count();
        $totaljobs = Job::where('status', 'active')->count();
        $totalapply = JobApply::count();
        return view('admin.dashboard', compact('companis', 'totaljobs', 'totalapply'));
    }

    public function login(){
        return view('admin.auth.login');
    }

    
    public function plugin(){
        return view('company.plugin.index');
    }
}
