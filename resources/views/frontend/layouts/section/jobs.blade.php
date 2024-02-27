        <!-- Jobs Start -->
        <div class="py-5 container-xxl">
            <div class="container">
                <h1 class="mb-5 text-center wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="text-center tab-class wow fadeInUp" data-wow-delay="0.3s">

                    <div class="tab-content">
                        <div id="tab-1" class="p-0 tab-pane fade show active">
                            <div class="p-4 mb-4 job-item">

                                @foreach ($jobs as $item)
                                <div class="mb-3 row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 border rounded img-fluid" src=" {{ asset($item->user->image) }}" alt="" style="width: 80px; height: 80px;">
                                        <div class="m-3 text-start">

                                            <h5 class="mb-2">{{ $item->name }} <span class="text-truncate me-3 text-danger"><i class="text-danger me-2"></i>{{ $item->user->name }}</span></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-danger me-2"></i>{{ $item->address }}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-danger me-2"></i>{{ $item->office_from }}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-danger me-2"></i>{{ $item->office_time }}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-danger me-2"></i>{{ $item->salary }}</span>
                                            <p class="mt-2"><span class="text-danger">Requirement: </span>{{ $item->requirement }}</p>
                                            <span class="mb-2 text-truncate me-3"><i class="far fa-clock text-danger me-2"></i><span class="text-info">Publish: {{ $item->created_at->diffForHumans() }}</span></span>
                                            <span class="mb-2 text-truncate me-3"><i class="far fa-clock text-danger me-2"></i><span class="text-info">Last Date: {{ \Carbon\Carbon::parse($item->end_date)->format('d F Y') }}</span></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="mb-3 d-flex">
                                           <form action="{{ route('candidate.job.apply') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="job_id" value="{{ $item->id }}">

                                            <input type="hidden" name="company_id" value="{{ $item->user->id }}">
                                           @auth
                                           <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                           @endauth

                                           <button class="applied btn btn-danger">Apply Now</button>

                                           </form>

                                        </div>

                                    </div>
                                </div>
                                @endforeach


                            </div>

                            <a class="px-5 py-3 btn btn-danger" href="{{ route('job.page') }}">Browse More Jobs</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->


@push('scripts')


@endpush
