@extends('layouts.master')
@section('content')
    <div class="page-header flex-wrap">
        <div class="header-left d-flex">
            <h5 class="m-0 pr-3">Dashboard</h5>
            <p class="m-0">Here are your important tasks, updates and alerts.</p>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0 align-items-center">
            <h5 class="font-weight-normal">20 Mar 2020, Friday</h5>
            <form class="search-form d-none d-md-block mb-2 ml-2" action="#">
                <i class="mdi mdi-magnify"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 stretch-card grid-margin">
            <div class="title-banner">
                <div class="d-lg-flex justify-content-between">
                    <div class="mr-4">
                        <h3>How are feeling today ?</h3>
                        <p class="m-0">Get unlimited doctor consultations and much more with plusadmin</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 stretch-card grid-margin">
            <div class="card">
                <div class="time-banner">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-center border-right pr-3">
                            <i class="mdi mdi-clock-outline"></i>
                            <h6 class="m-0 font-weight-normal">Open Hours</h6>
                        </div>
                        <div class="pl-3">
                            <p class="m-0">Monday-Saturday: 10.00 - 24.00</p>
                            <p class="m-0">Sunday: 12.00 - 18.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="text-center hospital-features">
                        <div class="badge btn-facebook">3 New</div>
                        <i class="mdi mdi-stethoscope icon-md text-danger"></i>
                        <h5 class="font-weight-normal">Doctors</h5>
                        <h5>3,973</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="text-center hospital-features">
                        <i class="mdi mdi-ambulance icon-md text-danger"></i>
                        <h5 class="font-weight-normal">Patients</h5>
                        <h5>4353</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="text-center hospital-features">
                        <i class="mdi mdi-human-child icon-md text-danger"></i>
                        <h5 class="font-weight-normal">Nurses</h5>
                        <h5>2354</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="text-center hospital-features">
                        <i class="mdi mdi-medical-bag icon-md text-danger"></i>
                        <h5 class="font-weight-normal">Pharmacist</h5>
                        <h5>12</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="text-center hospital-features">
                        <i class="mdi mdi-calendar-clock icon-md text-danger"></i>
                        <h5 class="font-weight-normal">New events</h5>
                        <h5>29</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="text-center hospital-features">
                        <i class="mdi mdi-file-document-box icon-md text-danger"></i>
                        <h5 class="font-weight-normal">Reports</h5>
                        <h5>46</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Doctors list</div>
                    <div class="doctor-list d-flex align-items-center">
                        <img src="{{asset('theme/assets/images/faces/face1.jpg')}}" alt="image" />
                        <div>
                            <h6 class="mb-0">Dr.Freddy</h6>
                            <p class="text-small m-0">gynaecology</p>
                        </div>
                    </div>
                    <div class="doctor-list d-flex align-items-center">
                        <img src="{{asset('theme/assets/images/faces/face2.jpg')}}" alt="image" />
                        <div>
                            <h6 class="mb-0">Dr.Kita Chihoko</h6>
                            <p class="text-small m-0">Cardiology</p>
                        </div>
                    </div>
                    <div class="doctor-list d-flex align-items-center">
                        <img src="{{asset('theme/assets/images/faces/face3.jpg')}}" alt="image" />
                        <div>
                            <h6 class="mb-0">Dr.Nwoye</h6>
                            <p class="text-small m-0">Cardiology</p>
                        </div>
                    </div>
                    <div class="doctor-list d-flex align-items-center">
                        <img src="{{asset('theme/assets/images/faces/face4.jpg')}}" alt="image" />
                        <div>
                            <h6 class="mb-0">Dr.Richard</h6>
                            <p class="text-small m-0">Orthopedic</p>
                        </div>
                    </div>
                    <div class="doctor-list d-flex align-items-center border-0">
                        <img src="{{asset('theme/assets/images/faces/face5.jpg')}}" alt="image" />
                        <div>
                            <h6 class="mb-0">Dr.Herman Beck</h6>
                            <p class="text-small m-0">Pediatric</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9  col-sm-8 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex justify-content-between">
                        <h4 class="card-title">Recent Appointments </h4>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm mb-2 text-muted " type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-settings"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuIconButton1">
                                <a class="dropdown-item bg-light ary p-2 mb-1" href="#"><i class="mdi mdi-file-excel"></i> Excel</a>
                                <a class="dropdown-item  bg-light p-2 mb-1" href="#"><i class="mdi mdi-file-pdf"></i> PDF</a>
                                <a class="dropdown-item  bg-light p-2 mb-1" href="#"><i class="mdi mdi-file-document"></i> Doc</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive custom-datatable">
                        <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="order-listing_length"><label>Sort by <select name="order-listing_length" aria-controls="order-listing" class="custom-select custom-select-sm form-control"><option value="2">2</option><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="-1">All</option></select></label></div></div><div class="col-sm-12 col-md-6"><div id="order-listing_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control" placeholder="Search" aria-controls="order-listing"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="order-listing" class="table table-striped apointment-table dataTable no-footer" role="grid">
                                        <thead>
                                        <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 119.594px;"> Patient </th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 184.672px;"> Doctor	 </th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 111.438px;"> Date </th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 80.188px;"> Timing </th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 121.125px;"> Contact </th></tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td>Nik Jordan </td>
                                            <td>
                                                <img src="{{asset('theme/assets/images/faces/face1.jpg')}}" alt="image" /> Alfie Wood
                                            </td>
                                            <td>
                                                12 Sep 2020
                                            </td>
                                            <td> 10:02PM </td>
                                            <td> 087-288-7626 </td>
                                        </tr><tr role="row" class="even">
                                            <td> Lily Wozniak </td>
                                            <td>
                                                <img src="{{asset('theme/assets/images/faces/face2.jpg')}}" alt="image" /> Dr.Kita Chihoko
                                            </td>
                                            <td>
                                                14 Mar 2020
                                            </td>
                                            <td> 05:11PM </td>
                                            <td> 958-984-6484 </td>
                                        </tr><tr role="row" class="odd">
                                            <td> Samuel Path </td>
                                            <td>
                                                <img src="{{asset('theme/assets/images/faces/face3.jpg')}}" alt="image" /> Dr.Nwoye
                                            </td>
                                            <td>
                                                26 Feb 2020
                                            </td>
                                            <td> 08:05PM </td>
                                            <td> 782-097-9355 </td>
                                        </tr><tr role="row" class="even">
                                            <td> Mia Mai</td>
                                            <td>
                                                <img src="{{asset('theme/assets/images/faces/face4.jpg')}}" alt="image" /> Dr.Herman Beck
                                            </td>
                                            <td>
                                                22 Apr 2020
                                            </td>
                                            <td> 08:54PM </td>
                                            <td> 892-335-8026 </td>
                                        </tr><tr role="row" class="odd">
                                            <td> Herman Beck</td>
                                            <td>
                                                <img src="{{asset('theme/assets/images/faces/face5.jpg')}}" alt="image" /> Dr.Herman Beck
                                            </td>
                                            <td>
                                                26 Oct 2020
                                            </td>
                                            <td> 08:18PM </td>
                                            <td> 027-758-9324 </td>
                                        </tr></tbody>
                                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="order-listing_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="order-listing_previous"><a href="#" aria-controls="order-listing" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="order-listing" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="order-listing_next"><a href="#" aria-controls="order-listing" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales revenue starts here -->
    <div class="row">
        <div class="col-xl-9 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div>
                            <div class="card-title mb-0">Sales Revenue</div>
                            <h3 class="font-weight-bold mb-0">$32,409</h3>
                        </div>
                        <div>
                            <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                                <div class="d-flex me-5">
                                    <button type="button" class="btn btn-social-icon btn-outline-sales">
                                        <i class="mdi mdi-inbox-arrow-down"></i>
                                    </button>
                                    <div class="ps-2">
                                        <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                                        <span class="font-10 font-weight-semibold text-muted">TOTAL SALES</span>
                                    </div>
                                </div>
                                <div class="d-flex me-3 mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                        <i class="mdi mdi-cash text-info"></i>
                                    </button>
                                    <div class="ps-2">
                                        <h4 class="mb-0 font-weight-semibold head-count"> 2,804 </h4>
                                        <span class="font-10 font-weight-semibold text-muted">TOTAL PROFIT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted font-13 mt-2 mt-sm-0"> Your sales monitoring dashboard template. <a class="text-muted font-13" href="#"><u>Learn more</u></a>
                    </p>
                    <div class="flot-chart-wrapper">
                        <div id="flotChart" class="flot-chart">
                            <canvas class="flot-base"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 stretch-card grid-margin">
            <div class="card card-img">
                <div class="card-body d-flex align-items-center">
                    <div class="text-white">
                        <h1 class="font-20 font-weight-semibold mb-0"> Get premium </h1>
                        <h1 class="font-20 font-weight-semibold">account!</h1>
                        <p>to optimize your selling prodcut</p>
                        <p class="font-10 font-weight-semibold"> Enjoy the advantage of premium. </p>
                        <button class="btn bg-white font-12">Get Premium</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-sm-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">Make an Appointment</div>
                    <form>
                        <select class="form-control form-select-arrow lg">
                            <option>Choose Service</option>
                            <option>Diabetes</option>
                            <option>Cardiology</option>
                            <option>Gynaecology</option>
                            <option>Pediatric</option>
                        </select>
                        <select class="form-control form-select-arrow lg">
                            <option>Select Doctor</option>
                            <option>Dr.Freddy</option>
                            <option>Dr.Kita Chihoko</option>
                            <option>Dr.Nwoye</option>
                            <option>Dr.Richard</option>
                            <option>Dr.Herman Beck</option>
                        </select>
                        <select class="form-control form-select-arrow lg">
                            <option>Select Date</option>
                            <option>01/01/2020</option>
                            <option>31/01/2020</option>
                            <option>01/02/20120</option>
                            <option>01/03/20120</option>
                            <option>11/03/20120</option>
                        </select>
                        <select class="form-control form-select-arrow lg">
                            <option>Desirable time</option>
                            <option>10 AM</option>
                            <option>10.30 AM</option>
                            <option>11 AM</option>
                            <option>11.30 AM</option>
                            <option>12 PM</option>
                        </select>
                        <button type="button" class="btn btn-facebook btn-lg">Check now</button>
                        <p class="text-muted text-small mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="card-title ">Latest reports</div>
                    <div>
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <div class="">
                                <h5 class="text-primary mb-0">Death report.pdf</h5>
                                <p class="mb-0 text-muted text-small">View Report</p>
                            </div>
                            <button type="button" class="btn btn-facebook btn-xs">Download</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <div class="">
                                <h5 class="text-primary mb-0">Birth report.pdf</h5>
                                <p class="mb-0 text-muted text-small">View Report</p>
                            </div>
                            <button type="button" class="btn btn-facebook btn-xs">Download</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <div class="">
                                <h5 class="text-primary mb-0">Diabetes</h5>
                                <p class="mb-0 text-muted text-small">View Report</p>
                            </div>
                            <button type="button" class="btn btn-facebook btn-xs">Download</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                            <div class="">
                                <h5 class="text-primary mb-0">Typhoid</h5>
                                <p class="mb-0 text-muted text-small">View Report</p>
                            </div>
                            <button type="button" class="btn btn-facebook btn-xs">Download</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center py-3">
                            <div class="">
                                <h5 class="text-primary mb-0">X-ray.pdf</h5>
                                <p class="mb-0 text-muted text-small">View Report</p>
                            </div>
                            <button type="button" class="btn btn-facebook btn-xs">Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-12 stretch-card grid-margin">
            <div class="card chat-with-doctor">
                <div class="card-body">
                    <div class="p-2">
                        <div class="card-title font-weight-normal">Chat with a doctor</div>
                        <h2 class="mb-3">Connect with a  doctor instantly</h2>
                        <h5 class="font-weight-normal w-75 mb-4">Call or chat privately with a
                            verified doctor, get a response in 2 minutes!</h5>
                        <button type="button" class="btn btn-outline-primary btn-lg mt-4">Chat now</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
