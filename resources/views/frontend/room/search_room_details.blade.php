@extends('frontend.main_master')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <div class="room-details-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="room-details-side">
                            <div class="side-bar-form">
                                <h3>Booking Form</h3>
                                <form action="{{ route('user_booking_store', $roomdetails->id) }}" method="POST" id="bk_form">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $roomdetails->id }}">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>CHECK IN</label>
                                                <div class="input-group">
                                                    <input autocomplete="off" type="text" required name="check_in" id="check_id" class="form-control dt_picker"
                                                    value="{{ old('check_in') ? date('Y-m-d', strtotime(old('check_in'))) : '' }}">
                                                    <span class="input-group-addon"></span>
                                                </div>
                                                <i class="sp-color fa-solid fa-calendar-days"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>CHECK OUT</label>
                                                <div class="input-group">
                                                    <input autocomplete="off" type="text" required name="check_out" id="check_out" class="form-control dt_picker"
                                                    value="{{ old('check_out') ? date('Y-m-d', strtotime(old('check_out'))) : '' }}">
                                                    <span class="input-group-addon"></span>
                                                </div>
                                                <i class="sp-color fa-solid fa-calendar-days"></i>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group" >
                                                <label>Numbers of Persons</label>
                                                <select class="form-control" name="person" id="nmbr_person">
                                                    @for ($i = 1; $i <= 4; $i++)
                                                    <option {{ old('person') == $i ? 'selected' : '' }} value="0{{ $i }}">0{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" id="total_adult" value="{{ $roomdetails->total_adult }}">
                                        <input type="hidden" id="room_price" value="{{ $roomdetails->price }}">
                                        <input type="hidden" id="discount_p" value="{{ $roomdetails->discount }}">

                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label>Numbers of Rooms</label>
                                                <select class="form-control number_of_rooms" name="number_of_rooms" id="select_room">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="0{{ $i }}">0{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <input type="hidden" name="available_room" id="available_room">
                                            <p class="available_room"></p>
                                        </div>

                                        <div class="col-lg-12">
                                            <table class="table">
                                                <tr>
                                                    <td ><p>SubTotal</p></td>
                                                    <td style="text-align:right">$<span class="t_subtotal"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><p>Discount</p></td>
                                                    <td style="text-align:right">$<span class="t_discount"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><p>Total</p></td>
                                                    <td style="text-align:right">$<span class="t_g_total"></span></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="btn col-lg-12 col-md-12">
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
                                        <b> Price : ${{ $roomdetails->price }}/ Night</b>
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
                    <a href="#"> <b>Capacity : </b> {{ $roomdetails->room_capacity }} Person </a>
                </li>
                <li>
                    <a href="#"> <b>Size : </b> {{ $roomdetails->size }}sqm </a>
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
                    <a href="#"> <b>View : </b> {{ $roomdetails->view }}</a>
                </li>
                <li>
                    <a href="#"> <b>Bad Style : </b> {{ $roomdetails->bed_style }}</a>
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
                    <div class="col-lg-6">
                        <div class="room-card-two">
                            <div class="row align-items-center">
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
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Room Details Other End -->
<script>
    $(document).ready(function () {
        // old for call existing value
        var check_in = "{{ old('check_in') }}";
        var check_out = "{{ old('check_out') }}";
        var room_id = "{{ $rooms_id }}";
        if (check_in != '' && check_out != ''){
            getAvaility(check_in, check_out, room_id);
        }
        $("#check_out").on('change', function () {
            var check_out = $(this).val();
            var check_in = $("#check_in").val();
            if(check_in != '' && check_out != ''){
                getAvaility(check_in, check_out, room_id);
            }
        });
        $(".number_of_rooms").on('change', function () {
            var check_out = $("#check_out").val();
            var check_in = $("#check_in").val();
            if(check_in != '' && check_out != ''){
                getAvaility(check_in, check_out, room_id);
            }
        });
    });
    function getAvaility(check_in, check_out, room_id) {
        $.ajax({
            url: "{{ route('check_room_availability') }}",
            data: {room_id:room_id, check_in:check_in, check_out:check_out},
            success: function(data){
                $(".available_room").html('Availability : <span class="text-success">'+data['available_room']+' Rooms</span>');
                $("#available_room").val(data['available_room']);
                price_calculate(data['total_nights']);
            }
        });
    }
    function price_calculate(total_nights){
        var room_price = $("#room_price").val();
        var discount_p = $("#discount_p").val();
        var select_room = $("#select_room").val();
        var sub_total = room_price * total_nights * parseInt(select_room);
        var discount_price = (parseInt(discount_p)/100)*sub_total;
        $(".t_subtotal").text(sub_total);
        $(".t_discount").text(discount_price);
        $(".t_g_total").text(sub_total-discount_price);
    }
    $("#bk_form").on('submit', function () {
        var av_room = $("#available_room").val();
        var select_room = $("#select_room").val();
        if (parseInt(select_room) >  av_room){
            alert('Sorry, you select maximum number of room');
            return false;
        }
        var nmbr_person = $("#nmbr_person").val();
        var total_adult = $("#total_adult").val();
        if(parseInt(nmbr_person) > parseInt(total_adult)){
            alert('Sorry, you select maximum number of person');
            return false;
        }
    })
</script>
@endsection
