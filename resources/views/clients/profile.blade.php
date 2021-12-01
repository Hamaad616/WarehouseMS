<html>


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Client Profile</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

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

        .sidebar {
            margin: 0;
            padding-top: 20px;
            width: 280px;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            padding: 16px;
            text-decoration: none;
            font-size: .875rem;
            font-weight: 500;
            line-height: 1.25rem;
            hyphens: auto;
            word-break: break-word;
            word-wrap: break-word;
            color: #3c4043;
        }

        .sidebar a.active {
            color: #1967d2;
            text-decoration: none;
            border-radius: 0 50px 50px 0;
            background-color: #e8f0fe;
        }

        .sidebar a:hover:not(.active) {
            background-color: rgba(0, 0, 0, 0.039);
            border-radius: 4px;
            transition: background 15ms;
        }

        div.content {
            margin-left: 320px;
            padding: 1px 16px;
            height: 1000px;
        }

        @media screen and (max-width: 2000px) {
            div.sidebar {
                overflow: auto;
                white-space: nowrap;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                display: inline-block;
                text-align: center;
                padding: 14px;
                text-decoration: none;
                color: #3c4043;
            }

            .sidebar a.active {
                color: #1967d2;
                border-bottom: solid 4px #1967d2;
                border-radius: 4px;
                background-color: #ffffff;
            }

            .sidebar a:hover:not(.active) {
                color: #1967d2;
                background-color: #ffffff;
            }

            div.content {
                margin-left: 0;
            }
        }

        .material-icons {
            vertical-align: middle;
        }

        .jEvccp {
            display: flex;
            height: 144px;
            -webkit-box-align: center;
            align-items: center;
            border: none;
            background: rgb(255, 205, 210);
        }

        .djLOvF {
            -webkit-box-flex: 1;
            flex-grow: 1;
            padding: var(--spacer-16);
            color: rgb(0, 0, 0);
        }

        @media (min-width: 992px) {
            .ftiIMf {
                font-size: var(--heading-2-font-size);
                letter-spacing: var(--heading-2-letter-spacing);
                line-height: var(--heading-2-line-height);
                font-weight: var(--heading-2-font-weight);
            }
        }

        .ftiIMf {
            margin: 0px;
            padding: 0px;
            font-size: var(--heading-3-font-size);
            letter-spacing: var(--heading-3-letter-spacing);
            line-height: var(--heading-3-line-height);
            font-weight: var(--heading-3-font-weight);
        }

        .enRnrT {
            display: flex;
            height: 144px;
            -webkit-box-align: center;
            align-items: center;
            border: none;
            background: rgb(30, 50, 100);
        }

        .iBFIWP {
            display: flex;
            height: 144px;
            -webkit-box-align: center;
            align-items: center;
            border: none;
            background: rgb(45, 70, 185);
        }

    </style>
</head>


<body>



    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('clients-home/warehouse') }}">Clients</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Client Profile</li>
                </ol>
            </nav>

            <div class="sidebar mb-2">
                <a style="cursor: pointer" id="home"> <span class="material-icons"
                        style="vertical-align: middle">home</span>
                    <span style="vertical-align: middle; padding-left: 5px">Home</span></a>
                <a style="cursor: pointer" id="products"> <span class="material-icons"
                        style="vertical-align: middle">inventory_2</span>
                    <span style="vertical-align: middle; padding-left: 5px">Client Products</span></a>
                <a style="cursor: pointer" id="all_fulfillments"> <span class="material-icons">all_inbox</span> <span
                        style="vertical-align: middle; padding-left: 5px">Client Fulfillments</span></a>
                <a style="cursor: pointer" id="invoices"> <span class="material-icons">receipt</span> <span
                        style="vertical-align: middle; padding-left: 5px">Client Invoices</span> </a>
            </div>

            <!-- /Breadcrumb -->

            <div class="row gutters-md" id="home-body" style="display: none">
                <h5 class="d-flex align-items-center mb-3 mt-3" style="font-size: 2rem"><i
                        class="material-icons text-info mr-2"></i>Account Overview</h5>
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
                        <div class="card-body">
                            <h5 class="d-flex align-items-center mb-3"><i
                                    class="material-icons text-info mr-2"></i>POC(s)</h5>
                            <?php $client_other_infos = App\Models\client_other_details::where('client_id', $client_id)->get(); ?>
                            <?php $count = 1; ?>
                            @foreach ($client_other_infos as $client_other_info)
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"> <?php echo $count; ?>.
                                            {{ $client_other_info->client_full_name }}</h6>
                                        <span
                                            class="text-secondary">{{ $client_other_info->client_contact_email }}</span>
                                    </li>
                                </ul>
                                <?php $count++; ?>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">

                            <?php $client_other_infos = App\Models\client_other_details::where('client_id', $client_id)
                                ->take(1)
                                ->get(); ?>
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


                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-info mr-2"></i>Audit History</h5>
                                    <center><i class="bi bi-clock-history" style="font-size: 8rem;"></i></center>
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div class="mt-3">
                                            <a href="{{ route('client.audit', $client_id) }}"
                                                class="btn btn-outline-primary mt-5">View Audit History</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>


            <div class="row gutters-md" id="products-body" style="display: none">

                <h5 class="d-flex align-items-center mb-3 mt-3" style="font-size: 2rem"><i
                        class="material-icons text-info mr-2"></i>Products</h5>

                <div class="col-md-12 mb-3">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="table-responsive" id="product-table">
                                <table class="table table-borderless" id="products-table">

                                    <thead>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Product Title</th>
                                            <th>Product barcode</th>
                                            <th>Product Internal Code</th>
                                            <th>Product Dimensions</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <?php $count = 1; ?>
                                    <tbody>
                                        @foreach ($c_items as $client_item)
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td>
                                                    {{ $client_item->pitem_title }}
                                                </td>

                                                <td>
                                                    {{ $client_item->pitem_code }}
                                                </td>

                                                <td>{{ $client_item->in_code }}</td>

                                                <td>
                                                    {{ round(($client_item->length * $client_item->width * $client_item->height) / 1728, 2) }}
                                                    cuft
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-primary" data-toggle="modal"
                                                            data-target="#modal{{ $client_item->pitem_id }}">
                                                            <i class="bi bi-eye"></i>
                                                        </a>

                                                        <a href="{{ route('item.edit-view', ['pitem_id' => $client_item->pitem_id]) }}"
                                                            class="btn btn-success"><i
                                                                class="bi bi-pencil-fill"></i></a>
                                                        <a href="{{ route('item.delete', ['pitem_id' => $client_item->pitem_id]) }}"
                                                            class="btn btn-danger"><i class="bi bi-x-square"></i></a>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade"
                                                        id="modal{{ $client_item->pitem_id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" style="width:1250px;"
                                                            role="document">
                                                            <form class="form-horizontal" method="post"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-content">

                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">×</button>
                                                                        <h4 class="modal-title"
                                                                            style=" text-align: center"> <strong>
                                                                            </strong></h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class=" container">
                                                                            <div class="row">
                                                                                <div class=" col-lg-12">
                                                                                    <table
                                                                                        class=" table table-responsive table-condensed"
                                                                                        style=" margin-top: 20px; border: none">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style=" width: 50%">
                                                                                                    <img src="{{ asset('uploads/' . $client_item->img) }}"
                                                                                                        style=" width: 50%; height:50%  ">
                                                                                                </td>
                                                                                                <td style=" width: 60%">
                                                                                                    <table
                                                                                                        class="table table-bordered table-dark">
                                                                                                        <tbody>
                                                                                                            <tr>


                                                                                                                <td
                                                                                                                    colspan="2">
                                                                                                                    <strong>Item
                                                                                                                        Info</strong>
                                                                                                                </td>




                                                                                                            </tr>
                                                                                                            <tr>


                                                                                                                <td><strong>Title</strong>
                                                                                                                </td>
                                                                                                                <td>{{ $client_item->pitem_title }}
                                                                                                                </td>


                                                                                                            </tr>



                                                                                                            <tr>
                                                                                                                <td><strong>Barcode</strong>
                                                                                                                </td>
                                                                                                                <td>{{ $client_item->pitem_code }}
                                                                                                                </td>

                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td><strong>Internal
                                                                                                                        Code</strong>
                                                                                                                </td>
                                                                                                                <td>{{ $client_item->in_code }}
                                                                                                                </td>
                                                                                                            </tr>



                                                                                                            <tr>
                                                                                                                <td><strong>Length</strong>
                                                                                                                </td>
                                                                                                                <td>{{ $client_item->length }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td><strong>Width</strong>
                                                                                                                </td>
                                                                                                                <td>{{ $client_item->width }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td><strong>Height</strong>
                                                                                                                </td>
                                                                                                                <td>{{ $client_item->height }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td><strong>Weight</strong>
                                                                                                                </td>
                                                                                                                <td>{{ $client_item->weight }}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                    <table
                                                                                                        class="table table-bordered table-dark">
                                                                                                        <tbody>
                                                                                                            <tr>




                                                                                                </td>
                                                                                            </tr>




                                                                                        </tbody>
                                                                                    </table>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <h4 class="modal-title" style=" text-align: center">
                            <strong><u>Racks Information</u></strong>
                        </h4>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Rack Code</th>
                                            <th>Location</th>
                                            <th>Quantity</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $item_location = App\Http\Controllers\MainController::getItemLocation($client_item->pitem_code); ?>
                                        @foreach ($item_location as $location)
                                            <td>{{ $location->rack_code }}</td>
                                            <td>{{ $location->rk_location }}</td>
                                            <td>{{ $location->quantity }}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>

                </div>

            </div>
            </form>
        </div>
    </div>


    </td>
    </tr>
    <?php $count++; ?>
    @endforeach
    </tbody>

    </table>
    </div>
    </div>
    </div>
    </div>
    </div>



    <div class="row gutters-md mt-2" style="display: none" id="plan-body">
        <div class="col-sm-12 mb-3">
            <h5 class="d-flex align-items-center mb-3" style="font-size: 2rem"><i
                    class="material-icons text-info mr-2"></i>Current Plans</h5>
            <div class="card">
                <div class="jEvccp">
                    <div class="djLOvF">
                        <span class="ftiIMf ml-3" style="font-size: 2rem"> <b>Product Storage
                                Plan</b> </span>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($client as $cl)
                        <div class="d-flex flex-column align-items-center text-center">
                            <div class="mt-3">
                                @if ($cl->per_item_charge_flat == 111)
                                    @if ($cl->flat_per_day == 1111)
                                        <h4>Flat charge per item</b>
                                            <p class="text-secondary mb-1 mt-1">
                                                {{ $cl->per_item_charge_day }} Rs/day
                                            </p>
                                    @endif

                                    @if ($cl->flat_per_day == 2222)
                                        <h4 style="font-size: 2rem">Flat charge per item </h4>
                                        <p class="text-secondary mb-1 mt-1">
                                            {{ $cl->per_item_charge_day }} Rs/Month
                                        </p>
                                    @endif

                                @endif

                                @if ($cl->per_item_charge_flat == 222)
                                    @if ($cl->flat_per_day == 3333)
                                        <b>Volume Based Charge</b>
                                        <p class="text-secondary mb-1 mt-1">
                                            {{ $cl->per_item_charge_day_vol }} Rs/Day</p>
                                    @endif

                                    @if ($cl->flat_per_day == 4444)
                                        <b>Volume Based Charge (Per Month)</b>
                                        <p class="text-secondary mb-1 mt-1">
                                            {{ $cl->per_item_charge_month_vol }} Rs/Month</p>
                                    @endif
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="card">
                <div class="enRnrT">
                    <div class="djLOvF">
                        <span class="ftiIMf ml-3 text-white" style="font-size: 2rem"> <b>Product Fulfillment
                                Plan</b> </span>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($client as $cl)
                        <div class="d-flex flex-column align-items-left text-center">
                            <div class="mt-3">
                                @if ($cl->fulfil_plan == 11)
                                    <b>Flat per order charge</b>
                                    <p class="text-secondary mb-1 mt-1">
                                        {{ $cl->fl_rate }} Rs/Order
                                    </p>
                                @endif

                                @if ($cl->fulfil_plan == 22)
                                    <h4>Tiered Charge</h4>
                                    <p class="text-secondary mb-1 mt-2">
                                        <?php $client_fulfillment_rates = DB::table('product_fulfillment_rate')
                                            ->where('client_id', $cl->sch_id)
                                            ->get(); ?>
                                        @foreach ($client_fulfillment_rates as $client_fulfillment_rate)
                                            <table class="table">
                                                <thead>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Fee</th>
                                                </thead>
                                                <tbody>
                                                    <td>{{ $client_fulfillment_rate->start_order }}-Order(s)
                                                    </td>
                                                    <td>{{ $client_fulfillment_rate->end_order }}-Orders
                                                    </td>
                                                    <td>{{ $client_fulfillment_rate->fee_order }}
                                                        Rs
                                                    </td>
                                                </tbody>
                                            </table>
                                        @endforeach
                                    </p>
                                @endif



                                @if ($cl->per_item_charge_flat == 222)
                                    @if ($cl->flat_per_day == 3333)
                                        <b>Volume Based Charge (Per Day)</b>
                                        <p class="text-secondary mb-1">
                                            {{ $cl->per_item_charge_day_vol }}</p>
                                    @endif

                                    @if ($cl->flat_per_day == 4444)
                                        <b>Volume Based Charge (Per Month)</b>
                                        <p class="text-secondary mb-1">
                                            {{ $cl->per_item_charge_month_vol }}</p>
                                    @endif
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-sm-12 mb-3">
            <div class="card">
                <div class="iBFIWP">
                    <div class="djLOvF">
                        <span class="ftiIMf ml-3 text-white" style="font-size: 2rem"> <b>Product Stock Out
                                Plan</b> </span>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($client as $cl)
                        <div class="d-flex flex-column align-items-left text-center">
                            <div class="mt-3">
                                @if ($cl->product_out_charge_flat == 55)
                                    <h4>Flat per order charge</b>
                                        <p class="text-secondary mb-1 mt-1">
                                            {{ $cl->product_out_flat_rate }} Rs/Order
                                        </p>
                                @endif

                                @if ($cl->product_out_charge_flat == 66)
                                    <h4>Tiered Charge</h4>
                                    <p class="text-secondary mb-1 mt-2">
                                        <?php $client_stock_out_rates = DB::table('client_stock_out_rates')
                                            ->where('client_id', $cl->sch_id)
                                            ->get(); ?>
                                        @foreach ($client_stock_out_rates as $client_stock_out_rate)
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <th>From</th>
                                                        <th>To</th>
                                                        <th>Fee</th>
                                                    </thead>
                                                    <tbody>
                                                        <td>{{ $client_fulfillment_rate->start_order }}-Order(s)
                                                        </td>
                                                        <td>{{ $client_fulfillment_rate->end_order }}-Orders
                                                        </td>
                                                        <td>{{ $client_fulfillment_rate->fee }}
                                                            Rs
                                                        </td>
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </p>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>


    <script>
        $(document).ready(function () { 
            $('#products-table').DataTable();
         })
    </script>

    <script>
        $('.sidebar a').click(function() {
            $('.sidebar a').removeClass('active')
            $(this).closest('.sidebar a').addClass('active')
        })

        mdc.ripple.MDCRipple.attachTo(document.querySelector('.foo-button'));
    </script>

    <script>
        $(document).ready(function() {
            $('#home-body').show()
            $('#plan-body').show()
            $('#home').addClass('active')
        })
    </script>

    <script>
        $('#home').on('click', function(e) {
            e.preventDefault()
            $('#home-body').show()
            $('#plan-body').show()
            $('#products-body').hide()
        })

        $('#products').on('click', function(e) {
            e.preventDefault()
            $('#home-body').hide()
            $('#plan-body').hide()
            $('#products-body').show()
        })
    </script>



</body>

</html>
