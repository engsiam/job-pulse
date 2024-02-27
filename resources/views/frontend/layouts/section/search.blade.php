    <!-- Search Start -->
    <div class="container-fluid bg-danger wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                         <form action="{{ route('search.job') }}" method="GET">
                            @csrf
                    <div class="row g-2">

                            <div class="col-md-12">
                                <input type="text" name="keyword" class="form-control border-0 p-3"
                                    placeholder="Search Via Address, Category, Remote Or Office" />
                            </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100 p-3">Search</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Search End -->
