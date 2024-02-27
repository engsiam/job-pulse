       <style>
           .cat-item i {
               font-size: 30px;
           }

           .cat-item p {
               font-size: 15px;
           }

           .equal-height {
               display: flex;
           }

           .equal-height .cat-item {
               display: flex;
               flex-direction: column;
               height: 100%;
           }
       </style>

       <!-- Category Start -->
       <div class="container-xxl my-5">
           <div class="container">
               <h2 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h2>
               <div class="row g-4">

                   <div class="row equal-height">
                       @foreach ($category as $item)
                           <div class="col-lg-3 col-sm-6 wow fadeInUp mb-3" data-wow-delay="0.1s">
                               <a class="cat-item rounded p-4 d-flex flex-column justify-content-between"
                                   href="{{ route('job.category', $item->id) }}">
                                   <i class="{{ $item->icon }} text-danger"></i>
                                   <div>
                                       <h5 class="mb-3">{{ limitText($item->name, 20) }}</h5>
                                       <p class="mb-0 text-danger">{{ $item->jobs->count() }} Vacancy</p>
                                   </div>
                               </a>
                           </div>
                       @endforeach
                   </div>

                   <div class="text-center mt-4">
                    <a class="btn btn-danger py-3 px-5" href="{{ route('all.category') }}">Browse More Category</a>
                   </div>
               </div>
           </div>
       </div>
       <!-- Category End -->
