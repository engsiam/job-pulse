<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CandidateJobExperience;
use App\Models\CandidateBasicInformation;
use App\Models\CandidateDegreeInformation;
use App\DataTables\CompanyJobApplyDataTable;
use App\Models\CandidateTrainingInformation;
use App\Models\JobApply;

class CompanyJobAppyController extends Controller
{
    public function jobApplyCompany(CompanyJobApplyDataTable $datatable){
        return $datatable->render('company.job-apply.index');
    }

    public function viewCV(string $id){
        $candidateDegree = CandidateDegreeInformation::where('user_id', $id)->get();
        $candidateBasicInformation = CandidateBasicInformation::where('user_id',  $id)->first();
        $candidateJobExperience = CandidateJobExperience::where('user_id',  $id)->get();
        $candidateTraining = CandidateTrainingInformation::where('user_id',  $id)->get();


        return view('company.candidatecv.cvpreview', compact(
            'candidateBasicInformation',
            'candidateDegree',
            'candidateJobExperience',
            'candidateTraining'
        ));
    }

    public function jobApplyApprove(string $id, Request $request){
        $jobapplyapprove = JobApply::findOrFail($id);
        $jobapplyapprove->status = 'approved';
        $jobapplyapprove->save();
        toastr('Approved This CV Successfully');
        return redirect()->back();
    }

    public function jobApplyReject(string $id, Request $request){
        $jobapplyapprove = JobApply::findOrFail($id);
        $jobapplyapprove->status = 'rejected';
        $jobapplyapprove->save();
        toastr('Reject This CV Successfully');
        return redirect()->back();
    }
}
