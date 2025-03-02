@php
    $id = Auth::user()->id;
    //find id when load any model in blade page
    $profileData = App\Models\User::find($id);
@endphp
<div class="service-side-bar">
    <div class="services-bar-widget">
        <div class="side-bar-categories">
        <img src="{{ (!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('upload/no_image.jpg') }}"
        class="mx-auto d-block" alt="Image" style="width:150px; height:180px;">
<center>
    <b>{{ $profileData->name }}</b><br>
    <b>{{ $profileData->email }}</b>
</center>
<br>
<div class="profile">
    <ul>
        <li>
            <a href="{{ route('user.profile') }}"><i class="fa-solid fa-user"></i> My Profile </a>
        </li>
        <li>
            <a href="{{ route('dashboard') }}"><i class="fa-solid fa-calendar-days"></i> Booking</a>
        </li>

        <li>
            <a href="{{ route('user.change.password') }}"><i class="fa-solid fa-key"></i> Password </a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-gear"></i> Setting </a>
        </li>
        <li>
            <a href="{{ route('user.logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout </a>
        </li>
    </ul>
</div>

        </div>
    </div>
</div>
