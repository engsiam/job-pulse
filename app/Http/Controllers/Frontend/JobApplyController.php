<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Job;
use App\Models\JobApply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CandidateJobApplyDataTable;
use App\Models\CandidateBasicInformation;

class JobApplyController extends Controller
{

    public function showJobApply(CandidateJobApplyDataTable $datatable)
    {
        return $datatable->render('frontend.dashboard.jobApply');
    }

    public function jobApply(Request $request)
    {
        $findcv = CandidateBasicInformation::where('user_id', $request->user_id)->first();
    
        if (!$findcv) {
            toastr()->error('Before Applying for a job, please create your CV.');
            return redirect()->back();
        }
    
        $countapply = JobApply::where('user_id', auth()->user()->id)
                               ->where('job_id', $request->job_id)
                               ->get();
    
        if (count($countapply) > 0) {
            toastr()->error('You have already applied for this job.');
            return redirect()->back();
        } else {
            $jobapply = JobApply::create([
                'user_id' => $request->user_id,
                'job_id' => $request->job_id,
                'company_id' => $request->company_id
            ]);
            toastr('Applied For This Successfully');
            return redirect()->back();
        }
    }
    
}
