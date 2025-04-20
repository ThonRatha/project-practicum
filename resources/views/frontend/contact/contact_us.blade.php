@extends('frontend.main_master')
@section('main')
<!-- Contact Area -->
<div class="contact-area pt-10 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="contact-content">
                    <div class="section-title">
                        <h2>Let's Start to Give Us a Message and Contact With Us</h2>
                    </div>
                    <div class="contact-img">
                        <img src="{{ asset('frontend/assets/img/b.jpg') }}" alt="Images">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="contact-form">
                    <form method="POST" action="{{ route('store.contact') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn border-radius-5" style="border: 2px solid #1e75d6;">
                                    Send Message
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Area End -->
{{--
@php
    $setting = App\Models\SiteSetting::find(1);
@endphp --}}
<!-- contact Another -->
<div class="contact-another pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-another-content">
                    <div class="section-title">
                        <h2>Contacts Info</h2>
                        <p>
                            Book your room with us to get affordable price and build your quality time with us. You can easily make a contact
                            us anytime on the below details.
                        </p>
                    </div>

                    <div class="contact-item">
                        <ul>
                            <li>

                                <i class="fa-solid fa-phone"></i>
                                <div class="content">
                                    <span><a href="tel:+1-(123)-456-7890">+885 123456789</a></span>
                                </div>
                            </li>
                            <li>
                                <i class="fa-solid fa-envelope"></i>
                                <div class="content">
                                    <span><a href="mailto:hello@atoli.com">flexibooking@gmail.com</a></span>
                                </div>
                            </li>
                            <li>

                                <i class="fa-solid fa-location-dot"></i>
                                <div class="content">
                                    <span><a href="#">Villa #4, Street 228, Sangkat Chaktomuk, Khan Doun Penh, Phnom Penh, Cambodia.</a></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="contact-another-img">
                    <img src="{{ asset('frontend/assets/img/kkk.jpg') }}" alt="Images">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact Another End -->
@endsection
