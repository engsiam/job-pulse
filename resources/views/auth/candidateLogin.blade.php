
@extends('frontend.layouts.master')

@section('title')
 -- Login
@endsection

@section('content')



    <!--============================LOGIN/REGISTER PAGE START==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="m-auto col-xl-5">
                    <div class="wsus__login_reg_area">
                        <h3 class="mb-3 text-center">Be a Candidate</h3>
                        <ul class="mb-3 nav nav-pills" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-homes" type="button" role="tab" aria-controls="pills-homes"
                                    aria-selected="true">login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-profiles" type="button" role="tab"
                                    aria-controls="pills-profiles" aria-selected="true">signup</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="text-center wsus__login">

                                    <form action="{{route('candidate.login')}}" method="POST">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input id="email" type="email" name="email" value="{{old('email')}}" placeholder="Email">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password" type="password" name="password" placeholder="Password">
                                        </div>

                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">

                                                <input id="remember_me" name="remember" class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckDefault">

                                                <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                                    me</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">forget password ?</a>
                                        </div>

                                        <button class="common_btn" type="submit">login</button>
                                    </form>

                                    {{-- <a class="mt-3 btn btn-danger" href="{{ route('login.google') }}"><i class="fab fa-google"></i> Login With Google</a> --}}

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                                aria-labelledby="pills-profile-tab2">
                                <div class="wsus__login">
                                    <form action="{{route('candidate.register')}}" method="POST">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input id="name" value="{{old('name')}}" type="text" name="name"placeholder="Name">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="far fa-envelope"></i>
                                            <input id="email" name="email" value="{{old('email')}}" type="text" placeholder="Email">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password"  type="password"  name="password" placeholder="Password">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password">
                                        </div>

                                        <button class="mt-4 common_btn" type="submit">signup</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================LOGIN/REGISTER PAGE END==============================-->
@endsection
