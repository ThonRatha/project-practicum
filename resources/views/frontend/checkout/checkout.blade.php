@extends('frontend.main_master')
@section('main')
<!-- Checkout Area -->
<section class="checkout-area pt-100 pb-70">
    <div class="container">
        <form>
            <div class="row">
                <div class="col-lg-8">
                    <div class="billing-details">
                        <h3 class="title">Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{\Auth::user()->name}}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" name="email" class="form-control" value="{{\Auth::user()->email}}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{\Auth::user()->phone}}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div name="province" class="form-group">
                                    <label>Location <span class="required">*</span></label>
                                    <div class="select-box">
                                        <select class="form-control">
                                            <option value="5">Phnom Penh</option>
                                            <option value="0">Kandal</option>
                                            <option value="2">Kampot</option>
                                            <option value="3">Koh Kong</option>
                                            <option value="1">Siem Reap</option>
                                            <option value="4">Mondulkiri</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" name="address" class="form-control" value="{{\Auth::user()->address}}">
                                </div>
                            </div>
                            {{-- <p>Session Value: {{ json_encode(session('book_date')) }}</p> --}}
                            <div class="col-lg-12 col-md-6">
                                <div class="payment-box">
                                    <h3>
                                        Choose your payment option
                                    </h3>
                                    <div class="payment-method">
                                        <p>
                                            <input type="radio" id="direct-bank-transfer" name="payment_method">
                                            <label for="direct-bank-transfer">Pay with receptionist</label>
                                        </p>
                                        <div class="risk-free">
                                            <strong class="risk-free-title">RISK FREE!</strong><br>
                                            <p>Free cancellation before you check in 3 days (property local time)</p>
                                        </div>
                                        <p>
                                            <input type="radio" id="paypal" name="radio-group">
                                            <label for="paypal">Pay now</label>
                                        </p>
                                        <div class="bank-images mb-50">
                                            <img src="upload/aba.jpg" alt="Bank 1 Logo" width="300" height="400" style="margin-left:30px; margin-right: 60px;">
                                            <img src="upload/prince.jpg" alt="Bank 1 Logo" width="300" height="400">
                                        </div>
                                    </div>

                                    <a href="#" class="btn" style="color: #007bff">
                                        <b>Book Now</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <section class="checkout-area pb-70">
                        <div class="card-body">
                            <div class="billing-details">
                                    <h3 class="title">Booking Summary</h3>
                                    <hr>

                                    <div style="display: flex">
                                        <img style="height:100px; width:120px;object-fit: cover" src=" "
                                        src="{{ (!empty($room->image))? url('upload/room_img/'.$room->image):url('upload/no_image.jpg') }}"  alt="Images" alt="Images">
                                        <div style="padding-left: 10px;">
                                                <a href=" " style="font-size: 20px; color: #595959;font-weight: bold">
                                                    {{ @$room->type->name }}
                                                </a>
                                                <p><b>$ {{ $room->price }} / Night</b></p>
                                        </div>

                                    </div>

                                    <br>

                                    <table class="table" style="width: 100%">
                                        @php
                                            $subtotal = $room->price * $nights * $book_data['number_of_rooms'];
                                            $discount = ($room->discount/100)*$subtotal;
                                        @endphp
                                        <tr>
                                            <td><p>Total Night <br> <b> ({{ $book_data['check_in'] }} - {{ $book_data['check_out'] }})</p></td>
                                            <td style="text-align: right"></b><p>{{ $nights }} Days</p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Total Room</p></td>
                                            <td style="text-align: right"><p>{{ $book_data['number_of_rooms'] }}</p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Subtotal</p></td>
                                            <td style="text-align: right"><p>${{ $subtotal }}</p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Discount</p></td>
                                            <td style="text-align:right"> <p>${{ $discount }}</p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Total</p></td>
                                            <td style="text-align:right"> <p>${{ $subtotal-$discount }}</p></td>
                                        </tr>
                                    </table>

                              </div>
                        </div>
                  </section>

                </div>



            </div>
        </form>
    </div>
</section>
<!-- Checkout Area End -->
@endsection

