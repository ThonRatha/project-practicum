@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Booking</p>
                            <h4 class="my-1 text-info">100</h4>
                            <p class="mb-0 font-13">+2.5% from last week</p>
                        </div>
                        <div class="widgets-icons-2 bg-gradient-blues text-white ms-auto"><i class="fa-solid fa-chart-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Revenue</p>
                        <h4 class="my-1 text-success">$6,00</h4>
                        <p class="mb-0 font-13">+5.4% from last week</p>
                    </div>
                    <div class="widgets-icons-2 bg-gradient-green text-white ms-auto"><i class="fa-solid fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Bounce Rate</p>
                        <h4 class="my-1 text-warning">34.6%</h4>
                        <p class="mb-0 font-13">-4.5% from last week</p>
                    </div>
                    <div class="widgets-icons-2 bg-gradient-kyoto text-white ms-auto"><i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Cancel</p>
                        <h4 class="my-1 text-danger">0.6%</h4>
                        <p class="mb-0 font-13">+0.5% from last week</p>
                    </div>
                    <div class="widgets-icons-2 bg-gradient-burning text-white ms-auto"><i class="fa-regular fa-rectangle-xmark"></i>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div><!--end row-->

    <div class="row">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card radius-10 w-100">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Booking Overview</h6>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
                <span class="border px-1 rounded cursor-pointer"><i class="fa-solid fa-list-check me-1" style="color: #14abef"></i>Booking</span>
                <span class="border px-1 rounded cursor-pointer"><i class="fa-regular fa-rectangle-xmark me-1" style="color: #e52d27"></i>Cancel</span>
            </div>
            <div class="chart-container-1">
                <canvas id="chart1"></canvas>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
            <div class="col">
                <div class="p-3">
                <h5 class="mb-0">100</h5>
                <small class="mb-0">Overall Booking<span> <i class="bx bx-up-arrow-alt align-middle"></i> 100%</span></small>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                <h5 class="mb-0">3 Days</h5>
                <small class="mb-0">Stay Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 80%</span></small>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                <h5 class="mb-0">5</h5>
                <small class="mb-0">Cancel<span> <i class="bx bx-up-arrow-alt align-middle"></i> 5%</span></small>
                </div>
            </div>
            </div>
        </div>
    </div>
        {{-- <div class="col-12 col-lg-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Trending Products</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-2">
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">Jeans <span class="badge bg-success rounded-pill">25</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">T-Shirts <span class="badge bg-danger rounded-pill">10</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Shoes <span class="badge bg-primary rounded-pill">65</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Lingerie <span class="badge bg-warning text-dark rounded-pill">14</span>
                    </li>
                </ul>
            </div>
        </div> --}}
    </div><!--end row-->

    <div class="card radius-10">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Recent Bookings</h6>
                </div>
                <div class="dropdown ms-auto">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table align-middle mb-0">
        <thead class="table-light">
            <tr>
            <th>Room</th>
            <th>Photo</th>
            <th>Room ID</th>
            <th>Status</th>
            <th>Room Rate</th>
            <th>Date</th>
            <th>Booking</th>
            </tr>
            </thead>
            <tbody><tr>
            <td>One Bed Room</td>
            <td><img src="#" class="product-img-2"></td>
            <td>#001</td>
            <td><span class="badge bg-gradient-green text-white shadow-sm w-50">Paid</span></td>
            <td>$25.00</td>
            <td>10 Jan 2025</td>
            <td><div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-gradient-green" role="progressbar" style="width: 100%"></div>
                </div></td>
            </tr>

            <tr>
            <td>Two Bed Room</td>
            <td><img src="#" class="product-img-2"></td>
            <td>#002</td>
            <td><span class="badge bg-gradient-blues text-white shadow-sm w-50">Pending</span></td>
            <td>$20.00</td>
            <td>13 Jan 2025</td>
            <td><div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-gradient-blues" role="progressbar" style="width: 50%"></div>
                </div></td>
            </tr>

            <tr>
            <td>Three Bed Room</td>
            <td><img src="#" class="product-img-2"></td>
            <td>#003</td>
            <td><span class="badge bg-gradient-burning text-white shadow-sm w-50" >Canceled</span></td>
            <td>$15.00</td>
            <td>16 Jan 2025</td>
            <td><div class="progress" style="height: 6px;">
                <div class="progress-bar bg-gradient-burning" role="progressbar" style="width: 20%"></div>
                </div></td>
            </tr>
        </tbody>
    </table>
    </div>
        </div>
    </div>
</div>
@endsection


