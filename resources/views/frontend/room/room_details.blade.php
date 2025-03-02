@extends('frontend.main_master')
@section('main')
        <div class="room-details-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="room-details-side">
                            <div class="side-bar-form">
                                <h3>BOOKING FORM</h3>
                                <form>
                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>CHECK IN</label>
                                                <div class="input-group">
                                                    <input id="datetimepicker" type="text" class="form-control" placeholder="DD/MM/YY">
                                                    <span class="input-group-addon"></span>
                                                </div>
                                                <i class="sp-color fa-solid fa-calendar-days"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>CHECK OUT</label>
                                                <div class="input-group">
                                                    <input id="datetimepicker-check" type="text" class="form-control" placeholder="DD/MM/YY">
                                                    <span class="input-group-addon"></span>
                                                </div>
                                                <i class="sp-color fa-solid fa-calendar-days"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>ADULT</label>
                                                <select class="form-control">
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>CHILDREN</label>
                                                <select class="form-control">
                                                    <option>NO</option>
                                                    <option>01</option>
                                                    <option>02</option>
                                                    <option>03</option>
                                                    <option>04</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class=" btn col-lg-12 col-md-12">
                                            <button type="submit" class="default-btn border-radius-5" style="border: 2px solid #1e75d6;">
                                                Book Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="room-details-article">
                            <div class="room-details-slider owl-carousel owl-theme">
                                @foreach ($multiImage as $image)
                                <div class="room-details-item">
                                    <img src="{{ asset('upload/room_img/multi_img/'.$image->multi_img) }}" alt="Images">
                                </div>
                                @endforeach
                            </div>
                            <div class="room-details-title">
                                <h2>{{ $roomdetails->type->name }}</h2>
                                <ul>
                                    <li>
                                        <b> Price : ${{ $roomdetails->price }} / Room / Night</b>
                                    </li>

                                </ul>
                            </div>
                            <div class="room-details-content">
                                <p>
                                    {!! $roomdetails->description !!}
                                </p>
                            <div class="side-bar-plan">
                                <h3>Facilities</h3>
                                <ul>
                                    @foreach ($facility as $fac)
                                    <li><a href="#">{{ $fac->facility_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
<div class="row">
    <div class="col-lg-6">
    <div class="services-bar-widget">
        <div class="side-bar-list">
            <ul>
                <li>
                    <a href="#">Capacity :  {{ $roomdetails->room_capacity }} Persons </a>
                </li>
                <li>
                    <a href="#">Size : {{ $roomdetails->size }} sqm </a>
                </li>
            </ul>
        </div>
    </div>
</div>



    <div class="col-lg-6">
    <div class="services-bar-widget">
        <div class="side-bar-list">
            <ul>
                <li>
                    <a href="#">View : {{ $roomdetails->view }} </a>
                </li>
                <li>
                    <a href="#">Bed Style : {{ $roomdetails->bed_style }}</a>
                </li>

            </ul>
        </div>
    </div>

                    </div>
                        </div>



                            </div>

                            <div class="room-details-review">
                                <h2>Clients Review</h2>
                                <div class="review-ratting">
                                    <h3>Your ratting: </h3>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <form >
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control"  cols="30" rows="8" required data-error="Write your message" placeholder="Write your review here.... "></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="btn px-3" style="border: 2px solid #1e75d6;">
                                                SUBMIT
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Room Details Area End -->

        <!-- Room Details Other -->
        <div class="room-details-other pb-70">
            <div class="container">
                <div class="room-details-text">
                    <h2>Other Rooms</h2>
                </div>

                <div class="row ">
                    @foreach ($otherRooms as $item)
                    <div class="col-lg-4">
                        <div class="room-card-two">
                            <div class="room-card-img">
                                <a href="{{ url('room/details/'.$item->id) }}">
                                    <img src="{{ asset( 'upload/room_img/'.$item->image ) }}" alt="Images">
                                </a>
                            </div>

                            <div class="room-card-content">
                                <h3>
                                    @if (isset($item) && isset($item['type']))
                                    <a href="{{ url('room/details/'.$item->id) }}">{{ $item['type']['name'] }}</a>
                                    @else
                                    <p>Unavailable.</p>
                                    @endif
                                </h3>
                                <span>{{ $item->price }}  / Per Night </span>
                                <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                </div>
                                <p>{{ $item->short_desc }}</p>
                                <ul>
                                    <li><i class="fa-solid fa-user"></i> {{ $item->room_capacity }} Person</li>
                                    <li><i class="fa-solid fa-up-right-and-down-left-from-center"></i> {{ $item->size }}sqm</li>
                                </ul>

                                <ul>
                                    <li><i class="fa-solid fa-image"></i> {{ $item->view }}</li>
                                    <li><i class="fa-solid fa-bed"></i> {{ $item->bed_style }}</li>
                                </ul>

                                <a href="room-details.html" class="btn px-3" style="border: 2px solid #1e75d6;">
                                    Book Now
                                </a>
                            </div>
                            {{-- <div class="row align-items-center">
                                <div class="col-lg-5 col-md-4 p-0">
                                    <div class="room-card-img">
                                        <a href="{{ url('room/details/'.$item->id) }}">
                                            <img src="{{ asset( 'upload/room_img/'.$item->image ) }}" alt="Images">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-8 p-0">
                                    <div class="room-card-content">
                                        <h3>
                                            @if (isset($item) && isset($item['type']))
                                            <a href="{{ url('room/details/'.$item->id) }}">{{ $item['type']['name'] }}</a>
                                            @else
                                            <p>Unavailable.</p>
                                            @endif
                                        </h3>
                                        <span>{{ $item->price }}  / Per Night </span>
                                        <div class="rating">
                                            <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        </div>
                                        <p>{{ $item->short_desc }}</p>
                                        <ul>
                                            <li><i class="fa-solid fa-user"></i> {{ $item->room_capacity }} Person</li>
                                            <li><i class="fa-solid fa-up-right-and-down-left-from-center"></i> {{ $item->size }}sqm</li>
                                        </ul>

                                        <ul>
                                            <li><i class="fa-solid fa-image"></i> {{ $item->view }}</li>
                                            <li><i class="fa-solid fa-bed"></i> {{ $item->bed_style }}</li>
                                        </ul>

                                        <a href="room-details.html" class="btn px-3" style="border: 2px solid #1e75d6;">
                                            Book Now
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Room Details Other End -->

@endsection
