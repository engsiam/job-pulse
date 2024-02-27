@extends('company.layouts.master')

@section('title')
    || Job
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('company.layouts.sidebar')


            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Edit Job</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('company.jobs.update', $jobs->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group wsus_input">
                                        <label>Post Name</label>
                                        <input type="text" class="form-control"name="name" value="{{ $jobs->name }}">
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $jobs->address }}">
                                    </div>


                                    <div class="form-group wsus_input">
                                        <label>Salary</label>
                                        <input type="text" class="form-control" name="salary"
                                            value="{{ $jobs->salary }}">
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label>Application Last Date</label>
                                        <input type="date" class="form-control" name="end_date"
                                            value="{{ $jobs->end_date }}">
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label for="inputState">Category</label>
                                        <select id="inputState" class="form-control" name="category">

                                            @foreach ($category as $item)
                                                <option {{ $jobs->category_id == $item->id ? 'selected' : '' }}
                                                    value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label for="inputState">Office Time</label>
                                        <select id="inputState" class="form-control" name="office_time">
                                            <option {{ $jobs->office_time == 'fulltime' ? 'selected' : '' }}
                                                value="fulltime">Full Time</option>
                                            <option {{ $jobs->office_time == 'partime' ? 'selected' : '' }} value="partime">
                                                Part Time</option>
                                        </select>
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label for="inputState">Office From</label>
                                        <select id="inputState" class="form-control" name="office_from">
                                            <option {{ $jobs->office_from == 'office' ? 'selected' : '' }} value="office">
                                                Office</option>
                                            <option {{ $jobs->office_from == 'remote' ? 'selected' : '' }} value="remote">
                                                Remote</option>
                                        </select>
                                    </div>

                                    <div class="form-group wsus_input">
                                        <label>Requirement</label>
                                        <textarea name="requirement" id="" cols="30" rows="5"
                                            placeholder="Write Your Requirement exp: PHP, Laravel, Mysql Database">{{ $jobs->requirement }}</textarea>
                                    </div>

                                    <button class="btn btn-danger">Update Job</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
