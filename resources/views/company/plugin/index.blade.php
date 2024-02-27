@extends('company.layouts.master')




@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('company.layouts.sidebar')


            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                       
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div class="card py-3">
                                            <h4 class="text-info">Blogs</h4>
                                            <a class="btn btn-danger" href="">Activate</a>
                                           </div>
                                           
                                      </div>
        
                                      <div class="col-md-4 text-center">
                                        <div class="card py-3">
                                            <h4 class="text-info">Empolyee</h4>
                                            <a class="btn btn-danger" href="">Activate</a>
                                           </div>
                                           
                                      </div>

                                      <div class="col-md-4 text-center">
                                        <div class="card py-3">
                                            <h4 class="text-info">Pages</h4>
                                            <a class="btn btn-danger" href="">Activate</a>
                                           </div>
                                           
                                      </div>
                                </div>
                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
