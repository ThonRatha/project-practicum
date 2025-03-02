<header class="top-header top-header-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-2 pr-0">
                <div class="language-list">
                    <select class="language-list-item">
                        <option>English</option>
                        <option>Khmer</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-9 col-md-10">
                <div class="header-right">
                    <ul>
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <a href="#">Phnom Penh</a>
                        </li>
                        {{-- <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="#">+885 123456789</a>
                        </li> --}}

                        @auth
                        <li>
                            <i class="fa-solid fa-user"></i>
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <a href="{{ route('user.logout') }}">Logout</a>
                        </li>
                        @else
                        <li>
                            <i class="fa-solid fa-user"></i>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-address-book"></i>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
