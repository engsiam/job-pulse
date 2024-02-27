@extends('frontend.layouts.master')

<style>
.card img{
    height: 250px;
    cursor: pointer;
}
</style>

@section('content')
     <!-- Header End -->
     <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Our Blog</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Blog</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->

<!-- Category Start -->
<div class="container">
    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Our Blog</h1>
    {{ $blog->links() }}

    <div class="row">
        @foreach ($blog as $item)
        <div class="col-lg-3 col-md-6 mb-5">
            <div class="card mb-3 h-100">
                <img class="card-img-top" src="{{ asset($item->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{!! $item->description !!}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Category End -->


<div class="container-xxl pt-5">
    <div class="container">
        <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Top Companis</h2>
        <div class="row g-4">
            @foreach ($company as $item)
            <div class="col-lg-3 col-sm-6 wow fadeInUp text-center" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="javascript:;">
                    @if ($item->image)
                    <img width="100px" height="80px" src="{{ asset($item->image) }}" alt="">
                    @else
                    <i class="fas fa-building mb-3"></i>
                    @endif
                   
                    <p class="mb-3">{{ limitText($item->name, 20) }}</p>
                </a>
            </div>
            @endforeach

            
        </div>
    
    </div>
</div>

@endsection
     
     
