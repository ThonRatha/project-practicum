@php
    $room = App\Models\Room::latest()->limit(4)->get();
@endphp
<div class="room-area pt-100 pb-70 section-bg" style="background-color:#ffffff">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">ROOMS</span>
            <h2>Our Rooms & Rates</h2>
        </div>
        <div class="row pt-45">
            @foreach ($room as $item)
            <div class="col-lg-4">
                <div class="room-card-two">
                    <!-- Image at the top -->
                    <div class="room-card-img">
                        <a href="{{ url('room/details/'.$item->id) }}">
                            <img src="{{ asset('upload/room_img/'.$item->image) }}" alt="Images">
                        </a>
                    </div>

                    <!-- Content below the image -->
                    <div class="room-card-content">
                        <h3>
                            <?php if (isset($item['type']['name'])): ?>
                                <a href="{{ url('room/details/'.$item->id) }}"><?= htmlspecialchars($item['type']['name']) ?></a>
                            <?php else: ?>
                                <a href="{{ url('room/details/'.$item->id) }}">Default Name</a>
                            <?php endif; ?>
                        </h3>
                        <span>{{ $item->price }}$ / Per Night </span>
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </div>
                        <p>Lorem ipsum dolor sit amet, adipiscing elit. Suspendisse et faucibus felis, sed pulvinar purus.</p>

                        <!-- Icon text moved to the bottom -->
                        <div class="room-card-footer">
                            <ul>
                                <li><i class="fa-solid fa-user"></i>{{ $item->room_capacity }} Person</li>
                                <li><i class="fa-solid fa-image"></i>{{$item->view}}</li>
                            </ul>
                            <ul>
                                <li><i class="fa-solid fa-up-right-and-down-left-from-center"></i>{{ $item->size }} sqm</li>
                                <li><i class="fa-solid fa-bed"></i>{{ $item->bed_style }}</li>
                            </ul>

                        </div>

                        <a href="room-details.html" class="book-more-btn" style="border: 2px solid #1e75d6;">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
