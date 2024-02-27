@extends('frontend.dashboard.layouts.master')

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('frontend.dashboard.layouts.sidebar')


            <div class="row ">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>CV</h3>
                       <div class="text-end m-3">
                        <a class="btn btn-danger" href="{{ route('candidate.cv.preview') }}" target="_blank">Preview</a>
                       </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <h4 class="text-info">Basic information</h4>

                                <form action="{{ route('candidate.job.cv-store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label for="">Full Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="name" value="{{ @$candidateBasicInformation->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Email</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="email" value="{{ @$candidateBasicInformation->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Fathers Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="father_name" value="{{ @$candidateBasicInformation->father_name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Mothers Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="mother_name" value="{{ @$candidateBasicInformation->mother_name }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Blood group</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="blood_group" value="{{ @$candidateBasicInformation->blood_group }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Phone No</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="phone" value="{{ @$candidateBasicInformation->phone }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Github Link</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="github_link" value="{{ @$candidateBasicInformation->github_link }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Portfolio Website</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="portfolio_website" value="{{ @$candidateBasicInformation->portfolio_website }}">
                                            </div>
                                        </div>
                                    </div>

 
                                    <h4 class="text-info">Masters Degree</h4>

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label for="">Degree Type</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="degree_one" value="{{ @$candidateDegreeMasters->degree_type }}" placeholder="Masters">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">University Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="university_one" value="{{ @$candidateDegreeMasters->university_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Department</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="department_one" value="{{ @$candidateDegreeMasters->department }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Passing Year</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="passing_one" value="{{ @$candidateDegreeMasters->passing_year }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">CGPA</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="cgpa_one" value="{{ @$candidateDegreeMasters->cgpa }}">
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="text-info">Bachalor Degree</h4>

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label for="">Degree Type</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="degree_two" value="{{ @$candidateDegreeBachelor->degree_type }}" placeholder="Bachelor">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">University Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="university_two" value="{{ @$candidateDegreeBachelor->university_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Department</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="department_two" value="{{ @$candidateDegreeBachelor->department }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Passing Year</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="passing_two" value="{{ @$candidateDegreeBachelor->passing_year }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">CGPA</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="cgpa_two" value="{{ @$candidateDegreeBachelor->cgpa }}">
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="text-info">HSC</h4>

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label for="">Degree Type</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="degree_three" value="{{ @$candidateDegreeHsc->degree_type }}" placeholder="HSC">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">University Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="university_three" value="{{ @$candidateDegreeHsc->university_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Department</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="department_three" value="{{ @$candidateDegreeHsc->department }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Passing Year</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="passing_three" value="{{ @$candidateDegreeHsc->passing_year }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">CGPA</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="cgpa_three" value="{{ @$candidateDegreeHsc->cgpa }}">
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="text-info">SSC</h4>

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label for="">Degree Type</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="degree_four" value="{{ @$candidateDegreeSsc->degree_type }}" placeholder="SSC">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">University Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="university_four" value="{{ @$candidateDegreeSsc->university_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Department</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="department_four" value="{{ @$candidateDegreeSsc->department }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Passing Year</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="passing_four" value="{{ @$candidateDegreeSsc->passing_year }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">CGPA</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="cgpa_four" value="{{ @$candidateDegreeSsc->cgpa }}">
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="text-info">Professional Trainings</h4>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="">Training Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="training_one" value="{{ @$candidateTrainingOne->training_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Institution Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="institution_one" value="{{ @$candidateTrainingOne->institution_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Completion Year</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="completion_one" value="{{ @$candidateTrainingOne->completion_year }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="">Training Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="training_two" value="{{ @$candidateTrainingTwo->training_name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Institution Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="institution_two" value="{{ @$candidateTrainingTwo->institution_name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Completion Year</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="completion_two" value="{{ @$candidateTrainingTwo->completion_year }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <label for="">Training Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="training_three" value="{{ @$candidateTrainingThree->training_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Institution Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="institution_three" value="{{ @$candidateTrainingThree->institution_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Completion Year</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="completion_three" value="{{ @$candidateTrainingThree->completion_year }}">
                                            </div>
                                        </div>

                                    </div>



                                    <h4 class="text-info">Job Experience</h4>

                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="">Designation</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="designation_one" value="{{ @$candidateJobExperienceOne->designation }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Company Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="company_one" value="{{ @$candidateJobExperienceOne->company_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Joining Date</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="joining_one" value="{{ @$candidateJobExperienceOne->joining_date }}" placeholder="M-D-Y">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Departure Date</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="depareture_one" value="{{ @$candidateJobExperienceOne->depareture_date }}" placeholder="M-D-Y">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="">Designation</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="designation_two" value="{{ @$candidateJobExperienceTwo->designation }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Company Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="company_two" value="{{ @$candidateJobExperienceTwo->company_name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Joining Date</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="joining_two" value="{{ @$candidateJobExperienceTwo->joining_date }}" placeholder="M-D-Y"> 
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Departure Date</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="depareture_two" value="{{ @$candidateJobExperienceTwo->depareture_date }}" placeholder="M-D-Y">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="">Designation</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="designation_three" value="{{ @$candidateJobExperienceThree->designation }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Company Name</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="company_three" value="{{ @$candidateJobExperienceThree->company_name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Joining Date</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="joining_three" value="{{ @$candidateJobExperienceThree->joining_date }}" placeholder="M-D-Y">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">Departure Date</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="depareture_three" value="{{ @$candidateJobExperienceThree->depareture_date }}" placeholder="M-D-Y">
                                            </div>
                                        </div>

                                    </div>


                              

                                    <h4 class="text-info">Write Your Skills</h4>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="wsus__dash_pro_single">
                                                <textarea name="skill" id="" cols="30" rows="10">{{ @$candidateBasicInformation->skill }}</textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Current Salary</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="current_salary" value="{{ @$candidateBasicInformation->current_salary }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Expected Salary</label>
                                            <div class="wsus__dash_pro_single">
                                                <input type="text" name="expected_salary" value="{{ @$candidateBasicInformation->expected_salary }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 mb-4">
                                        <button class="common_btn" type="submit">Update</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
