<html>


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Units</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

    </style>
</head>


<body>



    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($client as $cl)
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                        class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>{{ $cl->sch_name }}</h4>
                                        <p class="text-secondary mb-1">Email: {{ $cl->client_email }}</p>
                                        <p class="text-muted font-size-sm">Legal Type:<?php $client_legal_types = DB::select('select * from legal_types where id = ?', [$cl->legal_type]); ?>@foreach ($client_legal_types as $clt)
                                                {{ $clt->legal_type_name }}
                                            @endforeach</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card mt-3">
                        {{-- <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                        <span class="text-secondary">https://bootdey.com</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                        <span class="text-secondary">bootdey</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                        <span class="text-secondary">@bootdey</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                        <span class="text-secondary">bootdey</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                        <span class="text-secondary">bootdey</span>
                      </li>
                    </ul> --}}
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">

                            <?php $client_other_infos = DB::select('select * from client_other_contact_details where client_id = ?', [$client_id]); ?>
                            @foreach ($client_other_infos as $client_other_info)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Contact Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $client_other_info->client_full_name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Contact Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $client_other_info->client_contact_email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Client Department</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $client_other_info->client_dep }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Cell</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $client_other_info->client_cell }}
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Other Contact </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $client_other_info->client_other_contact }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address 1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $client_other_info->client_add_1 }}
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address 2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $client_other_info->client_add_2 }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-primary " target="__blank" href="">Edit</a>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    @foreach ($client as $cl)
                                        <h5 class="d-flex align-items-center mb-3"><i
                                                class="material-icons text-info mr-2"></i>Billing Plan</h5>
                                            <center><i class="bi bi-calendar3" style="font-size: 8rem;"></i></center>
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <div class="mt-3">
                                                    @if($cl->per_item_charge_flat == 111)
                                                        @if($cl->flat_per_day == 1111)
                                                        <b>Flat Charge (Per Day)</b>
                                                        <p class="text-secondary mb-1">{{ $cl->per_item_charge_day }}</p>
                                                        @endif

                                                        @if($cl->flat_per_day == 2222)
                                                        <b>Flat Charge (Per Mpnth)</b>
                                                        <p class="text-secondary mb-1">{{ $cl->per_item_charge_day }}</p>
                                                        @endif

                                                    @endif

                                                    @if($cl->per_item_charge_flat == 222)
                                                        @if($cl->flat_per_day == 3333)
                                                        <b>Volume Based Charge (Per Day)</b>
                                                        <p class="text-secondary mb-1">{{ $cl->per_item_charge_day_vol }}</p>
                                                        @endif

                                                        @if($cl->flat_per_day == 4444)
                                                        <b>Volume Based Charge (Per Month)</b>
                                                        <p class="text-secondary mb-1">{{ $cl->per_item_charge_month_vol }}</p>
                                                        @endif
                                                    @endif

                                                    <a href="#" class="btn btn-primary">Change Plan</a>

                                                </div>
                                            </div>                               
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-info mr-2"></i>Audit History</h5>
                                        <center><i class="bi bi-clock-history" style="font-size: 8rem;"></i></center>
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <div class="mt-3">
                                                <a href="{{ route('client.audit', $client_id) }}"  class="btn btn-outline-primary mt-5">View Audit History</a>
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

    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
</body>

</html>
