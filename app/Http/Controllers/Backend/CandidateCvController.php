<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CandidateBasicInformation;
use App\Models\CandidateDegreeInformation;
use App\Models\CandidateJobExperience;
use App\Models\CandidateTrainingInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateCvController extends Controller
{
    public function candidateCV()
    {
        $candidateBasicInformation = CandidateBasicInformation::where('user_id', Auth::user()->id)->first();

        $candidateDegreeMasters = CandidateDegreeInformation::where('user_id', Auth::user()->id)->where('degree_number', 'one')->first();
        $candidateDegreeBachelor = CandidateDegreeInformation::where('user_id', Auth::user()->id)->where('degree_number', 'two')->first();
        $candidateDegreeHsc = CandidateDegreeInformation::where('user_id', Auth::user()->id)->where('degree_number', 'three')->first();
        $candidateDegreeSsc = CandidateDegreeInformation::where('user_id', Auth::user()->id)->where('degree_number', 'four')->first();

        $candidateTrainingOne = CandidateTrainingInformation::where('user_id', Auth::user()->id)->where('training_number', 'one')->first();
        $candidateTrainingTwo = CandidateTrainingInformation::where('user_id', Auth::user()->id)->where('training_number', 'two')->first();
        $candidateTrainingThree = CandidateTrainingInformation::where('user_id', Auth::user()->id)->where('training_number', 'three')->first();


        $candidateJobExperienceOne = CandidateJobExperience::where('user_id', Auth::user()->id)->where('experience_number', 'one')->first();
        $candidateJobExperienceTwo = CandidateJobExperience::where('user_id', Auth::user()->id)->where('experience_number', 'two')->first();
        $candidateJobExperienceThree = CandidateJobExperience::where('user_id', Auth::user()->id)->where('experience_number', 'three')->first();

        return view('frontend.dashboard.candidateCV', compact(
            'candidateBasicInformation',
            'candidateDegreeMasters',
            'candidateDegreeBachelor',
            'candidateDegreeHsc',
            'candidateDegreeSsc',
            'candidateTrainingOne',
            'candidateTrainingTwo',
            'candidateTrainingThree',
            'candidateJobExperienceOne',
            'candidateJobExperienceTwo',
            'candidateJobExperienceThree'
        ));
    }

    public function cvPreview(){
        $candidateDegree = CandidateDegreeInformation::where('user_id', Auth::user()->id)->get();
        $candidateBasicInformation = CandidateBasicInformation::where('user_id', Auth::user()->id)->first();
        $candidateJobExperience = CandidateJobExperience::where('user_id', Auth::user()->id)->get();
        $candidateTraining = CandidateTrainingInformation::where('user_id', Auth::user()->id)->get();
        return view('frontend.dashboard.cvpreview', compact(
            'candidateBasicInformation',
            'candidateDegree',
            'candidateJobExperience',
            'candidateTraining'
    ));
    }


    public function store(Request $request)
    {



        $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'father_name' => 'nullable',
            'mother_name' => 'nullable',
            'blood_group' => 'nullable',
            'phone' => 'nullable',
            'github_link' => 'nullable',
            'portfolio_website' => 'nullable',
            'skill' => 'nullable',
            'current_salary' => 'nullable',
            'expected_salary' => 'nullable',

            'degree_one' => 'nullable',
            'university_one' => 'nullable',
            'department_one' => 'nullable',
            'passing_one' => 'nullable',
            'cgpa_one' => 'nullable',

            'training_name' => 'nullable',
            'institution_name' => 'nullable',
            'completion_year' => 'nullable',

            'designation'=> 'nullable',
            'company_name'=> 'nullable',
            'joining_date'=> 'nullable',
            'depareture_date'=> 'nullable',
            'experience_number'=> 'nullable'

        ]);

        $basicInformation = CandidateBasicInformation::updateOrCreate(

            [
                'user_id' => Auth::user()->id,
            ],

            [
                'name' => $request->name,
                'email' => $request->email,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'blood_group' => $request->blood_group,
                'phone' => $request->phone,
                'github_link' => $request->github_link,
                'portfolio_website' => $request->portfolio_website,
                'skill' => $request->skill,
                'current_salary' => $request->current_salary,
                'expected_salary' => $request->expected_salary,
            ]
        );

        $userId = auth()->id(); // Or however you retrieve the user ID

        // Master's Degree
        CandidateDegreeInformation::updateOrCreate(
            ['user_id' => $userId, 'degree_number' => 'one'],
            [
                'degree_type' => $request->input('degree_one'),
                'university_name' => $request->input('university_one'),
                'department' => $request->input('department_one'),
                'passing_year' => $request->input('passing_one'),
                'cgpa' => $request->input('cgpa_one'),
            ]
        );

        // Bachelor's Degree

        CandidateDegreeInformation::updateOrCreate(
            ['user_id' => $userId, 'degree_number' => 'two'],
            [
                'degree_type' => $request->input('degree_two'),
                'university_name' => $request->input('university_two'),
                'department' => $request->input('department_two'),
                'passing_year' => $request->input('passing_two'),
                'cgpa' => $request->input('cgpa_two'),
            ]
        );

        // SSC
        CandidateDegreeInformation::updateOrCreate(
            ['user_id' => $userId, 'degree_number' => 'three'],
            [
                'degree_type' => $request->input('degree_three'),
                'university_name' => $request->input('university_three'),
                'department' => $request->input('department_three'),
                'passing_year' => $request->input('passing_three'),
                'cgpa' => $request->input('cgpa_three'),
            ]
        );

        CandidateDegreeInformation::updateOrCreate(
            ['user_id' => $userId, 'degree_number' => 'four'],
            [
                'degree_type' => $request->input('degree_four'),
                'university_name' => $request->input('university_four'),
                'department' => $request->input('department_four'),
                'passing_year' => $request->input('passing_four'),
                'cgpa' => $request->input('cgpa_four'),
            ]
        );


        CandidateTrainingInformation::updateOrCreate(
            ['user_id' => $userId, 'training_number' => 'one'],

            [
                'training_name' => $request->input('training_one'),
                'institution_name' => $request->input('institution_one'),
                'completion_year' => $request->input('completion_one'),
            ]
        );

        CandidateTrainingInformation::updateOrCreate(
            ['user_id' => $userId, 'training_number' => 'two'],

            [
                'training_name' => $request->input('training_two'),
                'institution_name' => $request->input('institution_two'),
                'completion_year' => $request->input('completion_two'),
            ]
        );


        CandidateTrainingInformation::updateOrCreate(
            ['user_id' => $userId, 'training_number' => 'three'],

            [
                'training_name' => $request->input('training_three'),
                'institution_name' => $request->input('institution_three'),
                'completion_year' => $request->input('completion_three'),
            ]
        );

        
        CandidateJobExperience::updateOrCreate(
            ['user_id' => $userId, 'experience_number' => 'one'],

            [
                'designation' => $request->input('designation_one'),
                'company_name' => $request->input('company_one'),
                'joining_date' => $request->input('joining_one'),
                'depareture_date' => $request->input('depareture_one'),
            ]
        );

        CandidateJobExperience::updateOrCreate(
            ['user_id' => $userId, 'experience_number' => 'two'],

            [
                'designation' => $request->input('designation_two'),
                'company_name' => $request->input('company_two'),
                'joining_date' => $request->input('joining_two'),
                'depareture_date' => $request->input('depareture_two'),
            ]
        );

        CandidateJobExperience::updateOrCreate(
            ['user_id' => $userId, 'experience_number' => 'three'],

            [
                'designation' => $request->input('designation_three'),
                'company_name' => $request->input('company_three'),
                'joining_date' => $request->input('joining_three'),
                'depareture_date' => $request->input('depareture_three'),
            ]
        );

        toastr('Created Successfully');
        return redirect()->back();
    }
}
