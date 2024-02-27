@extends('frontend.layouts.master')


<style>
    .cat-item i{
        font-size: 40px;
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
        color: #00b074;
    }
</style>
@section('content')
     <!-- Header End -->
     <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">All Companis</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Company</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-xxl pt-5">
        <div class="container">
            <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Top Companis</h2>
            <div class="row g-4">
                @foreach ($company as $item)
                <div class="col-lg-3 col-sm-6 wow fadeInUp text-center" data-wow-delay="0.1s">
                    <a class="cat-item rounded p-4" href="{{ route('job.company',$item->id) }}">
                        @if ($item->image)
                        <img width="100px" height="80px" src="{{ asset($item->image) }}" alt="">
                        @else
                        <i class="fas fa-building mb-3"></i>
                        @endif

                        <p class="mb-3">{{ limitText($item->name, 20) }}</p>
                        <p class="mb-0 text-danger">{{ $item->jobs->count() }} Vacancy</p>
                    </a>
                </div>
                @endforeach


            </div>

        </div>
    </div>
    <!-- Category End -->
@endsection


