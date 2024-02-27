@extends('frontend.layouts.master')


<style>
    .cat-item i{
        font-size: 30px;
    }
    .cat-item p{
        font-size: 18px;
        color: black;
        font-weight: bold;
    }
    .cat-item h6{
        font-size: 25px;
    }
    .fa-building{
        color: #e64a0c !important;
    }
</style>

@section('content')
     <!-- Header End -->
     <div class="py-5 mb-5 container-xxl bg-dark page-header">
        <div class="container pt-5 pb-4 my-5">
            <h1 class="mb-3 text-white display-3 animated slideInDown">All Category</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Category</a></li>
                </ol>
            </nav>
        </div>
    </div>

          <!-- Category Start -->
          <div class="my-5 container-xxl">
            <div class="container">
                <h2 class="mb-5 text-center wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h2>
                <div class="mt-3 row g-4">

                    <div class="row equal-height">
                        @foreach ($category as $item)
                            <div class="mb-3 col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <a class="p-4 rounded cat-item d-flex flex-column justify-content-between"
                                    href="{{ route('job.category', $item->id) }}">
                                    <i class="{{ $item->icon }} text-danger"></i>
                                    <div>
                                        <h5 class="mt-3 mb-3">{{ limitText($item->name, 20) }}</h5>
                                        <p class="mb-0 text-danger">{{ $item->jobs->count() }} Vacancy</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!-- Category End -->
@endsection


