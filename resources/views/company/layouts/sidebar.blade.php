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
    <a href="" class="dash_logo"><img src="" alt="" class="img-fluid"></a>
    <ul class="dashboard_link">
        <li class=""><a class="" href="{{ route('home.page') }}"><i class="fas fa-home"></i>Go To Home
                Page</a></li>
        <li class="{{ setActive(['company.dashboard']) }}"><a class="" href="{{ route('company.dashboard') }}"><i
                    class="fas fa-tachometer"></i>Dashboard</a></li>

        <li class="{{ setActive(['company.jobs.index', 'company.jobs.edit', 'company.jobs.create']) }}"><a class=""
                href="{{ route('company.jobs.index') }}"><i class="far fa-clipboard"></i>Job Post</a></li>

        <li class="{{ setActive(['company.job-apply-company']) }}"><a class=""
                href="{{ route('company.job-apply-company') }}"><i class="far fa-clipboard"></i>All Application</a></li>


        <li class="{{ setActive(['company.profile']) }}"><a href="{{ route('company.profile') }}"><i
                    class="far fa-user"></i> My Profile</a></li>
        <li>

        <li class="{{ setActive(['company.plugin.index']) }}"><a href="{{ route('company.plugin.index') }}"><i
                    class="far fa-user"></i>Plugin</a></li>
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
