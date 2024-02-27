@extends('admin.layouts.master')

@section('title')
    || Admin Dashboard
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Admin Dashboard</h1>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="text-info">Active Companis</h4>

                            </div>
                            <div class="card-body">
                                <p class="text-info">{{ $companis }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="text-info">Total Jobs</h4>

                            </div>
                            <div class="card-body">
                                <p class="text-info">{{ $totaljobs }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="text-info">Job Applied</h4>

                            </div>
                            <div class="card-body">
                                <p class="text-info">{{ $totalapply }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </section>
@endsection
