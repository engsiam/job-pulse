@extends('frontend.layouts.master')

@section('title')
 || Login
@endsection

@section('content')


    <!--============================LOGIN/REGISTER PAGE START==============================-->

    <section id="wsus__login_register">
        <div class="container py-5">
            <div class="row">
                <div class="col-xl-8 m-auto">
                    <div class="wsus__login_reg_area">
                        <h3 class="text-center mb-3">Select Your Role</h3>
                        <p>If You Wanna Find a Job Then Login As Candidate. If You Wanna Hired Employee Then Login As Company</p>
                        <div class="col-xl-12 m-auto mb-5 text-center">
                           <a class="btn btn-danger m-3" href="{{ route('candidate.login') }}">Login As Candidate</a>
                           <a class="btn btn-danger" href="{{ route('company.login') }}">Login As Company</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--============================LOGIN/REGISTER PAGE END==============================-->
@endsection