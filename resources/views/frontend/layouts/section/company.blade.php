
    <style>
        .cat-item i{
            display: inline-block;
            height: 65px;
        }
        .cat-item p{
            font-size: 30px;
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

    <!-- Category Start -->
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
               <div class="text-center mt-4">
                <a class="btn btn-danger py-3 px-5" href="{{ route('all.company') }}">Browse More Cpmpany</a>
               </div>
            </div>
        </div>
        <!-- Category End -->
