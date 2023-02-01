<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img
                    src="https://media.wired.co.uk/photos/60c8730fa81eb7f50b44037e/3:2/w_3329,h_2219,c_limit/1521-WIRED-Cat.jpeg"
                    height="35"
                    alt="MDB Logo"
                    loading="lazy"
                />
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('list.category') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('list.post') }}">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('list.user') }}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.admin') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>

        <div class="d-flex align-items-center">
            <div>
                <img
                    @if(Auth::user() !== null)
                        src="{{ Auth::user()->avatar }}"
                    @endif
                    class="rounded-circle"
                    height="40"
                    loading="lazy"
                />
                </a>
            </div>
        </div>
        <div class="d-flex ">
            @if(Auth::user() !== null)
                <span style="font-size: 24px">{{ Auth::user()->first_name . '.' . Auth::user()->last_name }}</span>
            @endif

        </div>
    </div>
</nav>
<!-- Navbar https://media.wired.co.uk/photos/60c8730fa81eb7f50b44037e/3:2/w_3329,h_2219,c_limit/1521-WIRED-Cat.jpeg -->
