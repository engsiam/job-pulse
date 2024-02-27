<style>
    .active {
        background-color: rgba(0, 0, 0, 0.4);
    }
</style>

<div class="dashboard_sidebar">
    <span class="close_icon">
        <i class="far fa-bars dash_bar"></i>
        <i class="far fa-times dash_close"></i>
    </span>
    <a href="{{ route('home.page') }}" class="dash_logo"></a>
            
    <ul class="dashboard_link">
        <li class=""><a class="" href="{{ route('home.page') }}"><i class="fas fa-home"></i>Go To Home
                Page</a></li>
        <li class="{{ setActive(['candidate.dashboard']) }}"><a class="" href="{{ route('candidate.dashboard') }}"><i
                    class="fas fa-tachometer"></i>Dashboard</a></li>
  
        <li class="{{ setActive(['candidate.job.cv']) }}"><a href="{{ route('candidate.job.cv') }}"><i
                        class="far fa-user"></i>Create CV</a></li>
            <li>

                <li class="{{ setActive(['candidate.show-job.apply']) }}"><a href="{{ route('candidate.show-job.apply') }}"><i
                    class="far fa-user"></i>Show Job Apply</a></li>
        <li>


        <li class="{{ setActive(['candidate.profile']) }}"><a href="{{ route('candidate.profile') }}"><i
                    class="far fa-user"></i> My Profile</a></li>
        <li>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
            this.closest('form').submit()";><i
                        class="far fa-sign-out-alt"></i>Log out</a>

            </form>

        </li>
    </ul>
</div>
