  <!-- Navbar Start -->
  <nav class="p-0 bg-white shadow navbar navbar-expand-lg navbar-light sticky-top">
      <a href="{{ route('home.page') }}" class="px-4 py-0 text-center navbar-brand d-flex align-items-center px-lg-5">
          <h1 class="m-0 text-danger">Job Pulse</h1>
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="p-4 navbar-nav ms-auto p-lg-0">
              <a href="{{ route('home.page') }}" class="{{ setActive(['home.page']) }} nav-item nav-link">Home</a>
              <a href="{{ route('job.page') }}" class="{{ setActive(['job.page', 'job.category', 'job.company', 'search.job']) }} nav-item nav-link">Jobs</a>
              <a href="{{ route('about.page') }}" class="{{ setActive(['about.page']) }} nav-item nav-link">About</a>
              <a href="{{ route('blog.page') }}" class="{{ setActive(['blog.page']) }} nav-item nav-link">Blog</a>
              <a href="{{ route('contact.page') }}"
                  class="{{ setActive(['contact.page']) }} nav-item nav-link">Contact</a>

          </div>



          @auth
              @if (auth()->user()->role === 'candidate')
                  <a href="{{ route('candidate.dashboard') }}"
                      class="py-4 btn btn-danger rounded-0 px-lg-5 d-none d-lg-block">{{ auth()->user()->name }} <i class="fa fa-arrow-right ms-3"></i></a>
              @elseif(auth()->user()->role === 'company')
                  <a href="{{ route('company.dashboard') }}"
                      class="py-4 btn btn-danger rounded-0 px-lg-5 d-none d-lg-block">{{ auth()->user()->name }} <i class="fa fa-arrow-right ms-3"></i></a>
              @elseif(auth()->user()->role === 'admin')
                  <a href="{{ route('admin.dashboard') }}"
                      class="py-4 btn btn-danger rounded-0 px-lg-5 d-none d-lg-block">{{ auth()->user()->name }} <i class="fa fa-arrow-right ms-3"></i></a>
              @endif
          @else
              <a href="{{ route('select.user') }}" class="py-4 btn btn-danger rounded-0 px-lg-5 d-none d-lg-block">Login
                  Here<i class="fa fa-arrow-right ms-3"></i></a>
          @endauth
      </div>
  </nav>
  <!-- Navbar End -->
