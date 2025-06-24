<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <h4 class="logo-text"><b>FlexiBooking</b></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="fas fa-chevron-left"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class="fa-regular fa-address-card"></i>
                </div>
                <div class="menu-title">&nbsp; Dashboard</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-cart-arrow-down"></i>
                </div>
                <div class="menu-title">Booking</div>
            </a>
            <ul>
                <li> <a href="#"><i class="fa-solid fa-bed"></i>Rooms</a>
                </li>
                <li> <a href="#"><i class="fa-solid fa-list-check"></i>Room Details</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Admin Manage</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div class="menu-title">&nbsp; Book Area</div>
            </a>

            <ul>
                <li> <a href="{{ route('book.area') }}"><i class="fa-solid fa-pen-to-square"></i>Update Book Area</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-bed"></i>
                </div>
                <div class="menu-title">Room Type</div>
            </a>
            <ul>
                <li> <a href="{{ route('room.type.list') }}"><i class="fa-solid fa-address-book"></i>Room Type List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="fa-solid fa-users"></i>
                </div>
                <div class="menu-title">Manage Team</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.team') }}"><i class="fa-solid fa-bars"></i>All Team</a>
                </li>
                <li> <a href="{{ route('add.team') }}"><i class="fa-solid fa-user-plus"></i>Add Team</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="fa-solid fa-comment-dots"></i>
                </div>
                <div class="menu-title">&nbsp;Message </div>
            </a>
            <ul>
                <li> <a href="{{ route('contact.message') }}"><i class="fa-solid fa-envelope-open"></i>All Message </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="fa-solid fa-envelope-open-text"></i>
                </div>
                <div class="menu-title">&nbsp;Testimonial</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.testimonial') }}"><i class="fa-solid fa-envelope-open"></i>All Testimonial </a></li>
                <li> <a href="#"><i class="fa-solid fa-file-circle-plus"></i>Add</a></li>
            </ul>
        </li>


    <!--end navigation-->
</div>
