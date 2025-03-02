@extends('frontend.main_master')
@section('main')
<div class="service-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.dashboard.user_menu')
            </div>


            <div class="col-lg-9">
                <div class="service-article">


                    <div class="service-article-title">
                        <h2>Dashboard </h2>
                    </div>

                    <div class="service-article-content">
                    <div class="row">

<div class="col-md-4">
<div class="card mb-3" >
<div class="card-header">Total Booking</div>
<div class="card-body">
<h1 class="card-title" style="font-size: 45px;">2</h1>

</div>
</div>
</div>

    <div class="col-md-4">
<div class="card mb-3">
<div class="card-header">Pending Booking </div>
<div class="card-body">
<h1 class="card-title" style="font-size: 45px;">1</h1>

</div>
</div>
</div>


<div class="col-md-4">
<div class="card mb-3">
<div class="card-header">Complete Booking</div>
<div class="card-body">
<h1 class="card-title" style="font-size: 45px;">1</h1>

</div>
</div>
</div>





                    </div>

                    </div>


                </div>
            </div>


        </div>
    </div>
</div>
<!-- Service Details Area End -->
@endsection
