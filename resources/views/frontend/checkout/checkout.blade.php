@extends('frontend.main_master')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- Checkout Area -->
<section class="checkout-area pb-70">
    <div class="container">
        <form method="POST" role="form" action="{{ route('checkout.store') }}" class="stripe_form require-validation"
        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
            @csrf
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
                                    <input type="text" id="address" name="address" class="form-control" value="{{\Auth::user()->address}}">
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
                                            <input type="radio" class="pay_method" id="stripe" name="payment_method" value="Stripe">
                                                <label for="stripe">Stripe</label>
                                                </p>


                                                    <div id="stripe_pay" class="d-none">
                                                <br>
                                                <div class="form-row row">
                                                    <div class="col-xs-12 form-group required">
                                                            <label class="control-label">Name on Card</label>
                                                            <input class="form-control" size="4" type="text" />
                                                    </div>
                                                </div>
                                                <div class="form-row row">
                                                    <div class="col-xs-12 form-group  required">
                                                            <label class="control-label">Card Number</label>
                                                            <input autocomplete="off" class="form-control card-number" size="20" type="text" />
                                                    </div>
                                                </div>
                                                <div class="form-row row">
                                                    <div class="col-xs-12 col-md-4 form-group cvc required"><label class="control-label">CVC</label><input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" size="4" type="text" /></div>
                                                    <div class="col-xs-12 col-md-4 form-group expiration required"><label class="control-label">Expiration Month</label><input class="form-control card-expiry-month" placeholder="MM" size="2" type="text" /></div>
                                                    <div class="col-xs-12 col-md-4 form-group expiration required"><label class="control-label">Expiration Year</label><input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="text" /></div>
                                                </div>
                                                <div class="form-row row">
                                                    <div class="col-md-12 error form-group hide"><div class="alert-danger alert">Please correct the errors and try again.</div></div>
                                                </div>
                                        </div>
                                    </p>
                                    <p>
                                            <input type="radio" id="direct-bank-transfer" name="payment_method" value="PWR">
                                            {{-- PWR = Pay with receptionist --}}
                                            <label for="direct-bank-transfer">Pay with receptionist</label>
                                            <div class="risk-free">
                                                <strong class="risk-free-title">RISK FREE!</strong><br>
                                                <p>Free cancellation before you check in 3 days (property local time)</p>
                                            </div>
                                        </p>


                                        <p>
                                            <input type="radio" id="paynow" name="payment_method">
                                            <label for="paynow">Pay now</label>
                                        </p>
                                        <div class="bank-images mb-50">
                                            <img src="upload/aba.jpg" alt="Bank 1 Logo" width="300" height="400" style="margin-left:30px; margin-right: 60px;">
                                            <img src="upload/prince.jpg" alt="Bank 2 Logo" width="300" height="400">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn" id="myButton" style="color: #007bff"><b>Book Now</b></button>
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
                                        <img style="height:270px; width:500px;object-fit: cover"
                                        src="{{ (!empty($room->image))? url('upload/room_img/'.$room->image):url('upload/no_image.jpg') }}"  alt="Images" alt="Images">


                                    </div>

                                    <br>

                                    <table class="table" style="width: 100%">
                                        @php
                                            $subtotal = $room->price * $nights * $book_data['number_of_rooms'];
                                            $discount = ($room->discount/100)*$subtotal;
                                        @endphp
                                        <div style="padding-left: 10px;">
                                            <a href=" " style="font-size: 20px; color: #595959;font-weight: bold">
                                                {{ @$room->type->name }}
                                            </a>
                                            <p><b>$ {{ $room->price }} / Night</b></p>
                                    </div>
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
        </div>
        </form>
    </div>
</section>
<style>
    .hide{display:none}
</style>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

$(document).ready(function () {

    $(".pay_method").on('click', function () {
          var payment_method = $(this).val();
          if (payment_method == 'Stripe'){
                $("#stripe_pay").removeClass('d-none');
          }else{
                $("#stripe_pay").addClass('d-none');
          }
    });

});






$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {

          var pay_method = $('input[name="payment_method"]:checked').val();
          if (pay_method == undefined){
                alert('Please select a payment method');
                return false;
          }else if(pay_method == 'COD'){

          }else{
                document.getElementById('myButton').disabled = true;

                var $form         = $(".require-validation"),
                        inputSelector = ['input[type=email]', 'input[type=password]',
                              'input[type=text]', 'input[type=file]',
                              'textarea'].join(', '),
                        $inputs       = $form.find('.required').find(inputSelector),
                        $errorMessage = $form.find('div.error'),
                        valid         = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                      var $input = $(el);
                      if ($input.val() === '') {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault();
                      }
                });

                if (!$form.data('cc-on-file')) {

                      e.preventDefault();
                      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                      Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                      }, stripeResponseHandler);
                }
          }



    });



    function stripeResponseHandler(status, response) {
        if (response.error) {

                document.getElementById('myButton').disabled = false;

                $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
        } else {

                document.getElementById('myButton').disabled = true;
                document.getElementById('myButton').value = 'Please Wait...';

                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
        }
    }

});
</script>

<!-- Checkout Area End -->
@endsection

