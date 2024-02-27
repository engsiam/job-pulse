   <!-- Carousel Start -->
   <div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">

        @foreach ($banner as $item)
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{ asset($item->banner) }}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">{{ $item->title }}</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">{{ $item->description }}</p>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Carousel End -->