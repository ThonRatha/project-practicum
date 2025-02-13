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
        <div class="room-area pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color">ROOMS</span>
                    <h2>Rooms and Rates</h2>
                </div>
                <div class="row pt-45">

                    <?php $empty_array = []; ?>

                    @foreach ($rooms as $item)

                    @php
                        $bookings = App\Models\Booking::withCount('assign_rooms')->whereIn('id',
                        $check_date_booking_ids)->where('room_id', $item->id)->get()->toArray();

                        $total_book_room = array_sum(array_column($bookings, 'assign_rooms_count'));

                        $av_room = @$item->room_numbers_count-$total_book_room;
                    @endphp

                    @if ($av_room > 0 && old('person') <= $item->total_adult)

                    <div class="col-lg-4 col-md-6">
                        <div class="room-card">
                            <a href="{{ route('search_room_details', $item->id.'&check_in='.old(check_in).'&check_out='.old('check_out').'&person='.old('person'))  }}">
                                <img src="{{ asset('upload/room_img/'.$item->image) }}" alt="Images" style="width: 500px; height:300px;">
                            </a>
                            <div class="content">
                                <h6>
                                    @if (isset($item) && isset($item['type']))
                                    <a href="{{ route('search_room_details', $item->id.'&check_in='.old(check_in).'&check_out='.old('check_out').'&person='.old('person')) }}">{{ $item['type']['name'] }}</a>
                                    @else
                                    <p>Unavailable.</p>
                                    @endif
                                </h6>
                                <ul>
                                    <li class="text_color" style="color: #000000;">${{ $item->price }}</li>
                                    <li class="text_color" style="color: #000000;">Per Night</li>
                                </ul>
                                <div class="rating text-color">
                                    <i class="fa-solid fa-star" style="color: #FDCC0D;"></i>
                                    <i class="fa-solid fa-star" style="color: #FDCC0D;"></i>
                                    <i class="fa-solid fa-star" style="color: #FDCC0D;"></i>
                                    <i class="fa-solid fa-star" style="color: #FDCC0D;"></i>
                                    <i class="fa-solid fa-star" style="color: #FDCC0D;"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else
                    <?php array_push($empty_array, $item->id) ?>
                    @endif

                    @endforeach

                    @if (count($rooms) == count($empty_array))
                    <p class="text-center text-danger">No Data Found</p>

                    @endif
                </div>
            </div>
        </div>
        <!-- Room Area End -->

@endsection
