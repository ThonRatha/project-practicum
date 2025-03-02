@extends('frontend.main_master')
@section('main')
{{--
        <!-- Inner Banner -->
        <div class="inner-banner inner-bg9">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>Rooms</li>
                    </ul>
                    <h3>Rooms</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End --> --}}

        <!-- Room Area -->
        <div class="room-area pt-10 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color">ROOMS</span>
                    <h2>Rooms and Rates</h2>
                </div>
                <div class="row pt-10">
                    @foreach ($rooms as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="room-card">
                            <a href="{{ url('room/details/'.$item->id) }}">
                                <img src="{{ asset('upload/room_img/'.$item->image) }}" alt="Images" >
                            </a>
                            <div class="content">
                                <h3>
                                    @if (isset($item) && isset($item['type']))
                                    <a href="{{ url('room/details/'.$item->id) }}">{{ $item['type']['name'] }}</a>
                                    @else
                                    <p>Unavailable.</p>
                                    @endif
                                </h3>
                                <ul>
                                    <li class="text_color" style="color: #000000;">${{ $item->price }}</li>
                                    <li class="text_color" style="color: #000000;">Per Night</li>
                                </ul>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    </div>
                                    <a href="{{ url('room/details/'.$item->id) }}">View Details</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Room Area End -->

@endsection
