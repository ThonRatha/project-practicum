<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="{{ asset('frontend/assets/img/logos/logo.png') }}" class="logo-one" alt="Logo">
            <img src="{{ asset('frontend/assets/img/logos/logo.png') }}" class="logo-two" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('frontend/assets/img/logos/logo.png') }}" class="logo-one" alt="Logo">
                    <img src="{{ asset('frontend/assets/img/logos/logo.png') }}" class="logo-two" alt="Logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link active">
                                HOME

                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                BLOG
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                SERVICE
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="services-1.html" class="nav-link">
                                        Services Style One
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="services-2.html" class="nav-link">
                                        Services Style Two
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="service-details.html" class="nav-link">
                                        Service Details
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @php
                            $room = App\Models\Room::latest()->get();
                        @endphp
                        <li class="nav-item">
                            <a href="{{ route('froom.all') }}" class="nav-link">
                                ROOMS
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($room as $item)
                                <li class="nav-item">
                                    <?php if (isset($item['type']['name'])): ?>
                                        <a href="room-details.html"><?= htmlspecialchars($item['type']['name']) ?></a>
                                        <?php else: ?>
                                        <a href="room-details.html">Default Name</a>
                                    <?php endif; ?>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">
                                COUPON
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.us') }}" class="nav-link">
                                CONTACT
                            </a>
                        </li>
                        <li class="nav-item-btn">
                            <a href="#" class="default-btn">Book Now</a>
                        </li>
                    </ul>

                    <div class="nav-btn">
                        <a href="#" class="default-btn" style="border: 2px solid #1e75d6;">Book Now</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
