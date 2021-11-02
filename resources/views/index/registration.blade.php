<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="mdb/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="mdb/css/mdb.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js">
    </script>

    <style>
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 33.33%;
            float: left;
            position: relative;
            font-weight: 400;
            color: #455A64 !important
        }

        #progressbar #step1:before {
            font-family: FontAwesome;
            content: "\f00c";
            color: #fff;
            width: 29px;
            margin-left: 15px !important;
            margin-right: 5px;
            padding-left: 11px !important
        }

        #progressbar #step2:before {
            font-family: FontAwesome;
            content: "\f00c";
            color: #fff;
            width: 29px
        }

        #progressbar #step3:before {
            font-family: FontAwesome;
            content: "\f00c";
            color: #fff;
            width: 29px;
            margin-right: 15px !important;
            padding-right: 11px !important
        }

        #progressbar li:before {
            line-height: 29px;
            display: block;
            font-size: 12px;
            background: #455A64;
            border-radius: 50%;
            margin: auto
        }

        #progressbar li:after {
            content: '';
            width: 121%;
            height: 2px;
            background: #455A64;
            position: absolute;
            left: 0%;
            right: 0%;
            top: 15px;
            z-index: -1;

        }

        #progressbar li:nth-child(2):after {
            left: 50%
        }

        #progressbar li:nth-child(1):after {
            left: 25%;
            width: 121%
        }

        #progressbar li:nth-child(3):after {
            left: 25% !important;
            width: 50% !important
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #4bb8a9
        }

        .btn-xlarge {
            padding: 18px 28px;
            font-size: 22px; //change this to your desired size
            line-height: normal;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
        }

    </style>

    <script src="https://use.fontawesome.com/72e66dcf84.js"></script>

</head>

<body>

    &nbsp;&nbsp;<span class="btn btn-primary btn-sm" data-mdb-toggle="tooltip" title="Go back"
        onclick="window.history.back()"><i class="fas fa-arrow-left" style="font-size: 1.5rem"></i></span>

    <div class="row px-3 d-flex justify-content-center">

        <ul id="progressbar">
            <li class="step0" id="step1">Client Business Details</li>
            <li class="step0 text-center" id="step2">Client Contact Details</li>
            <li class="step0 text-right" id="step3">Billing Details</li>
        </ul>
    </div>
    <form method="POST" action="{{ route('client.create') }}" id="form-data" class="pt-2"
        enctype="multipart/form-data">
        @csrf

        <div class="row d-flex justify-content-center">
            <!-- Grid column -->
            <div id="first" class="col-md-6 my-5">

                <div class="card card-signup z-depth-1">

                    <div class="card-header">Create Client Business Details</div>

                    <div class="card-body text-center">

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if (session()->has('danger'))
                            <div class="alert alert-success">
                                {{ session()->get('danger') }}
                            </div>
                        @endif

                        <div id="step_1_validation" style="display: none" class="alert alert-danger" role="alert">
                            Please fill out the form
                        </div>

                        <div class="md-form md-outline">
                            <input type="text" id="client_name" name="client_name" class="form-control">
                            <label for="Enter Client Legal Name">Enter Client Legal Name</label>
                        </div>

                        <div class="md-form md-outline">
                            <input type="email" id="client_email" name="client_email" class="form-control">
                            <label for="email">Enter Client E-mail</label>
                        </div>

                        <div class="md-form md-outline">
                            <input type="password" id="client_password" class="form-control" name="client_password">
                            <label for="client_password">Password</label>
                        </div>

                        <div class="md-form ">
                            <select class="form-control md-select" name="entity_type" id="select_legal_type">
                                <option value="0" selected="">Select</option>
                                @foreach ($legal_types as $legal_type)
                                    <option value="{{ $legal_type->id }}">{{ $legal_type->legal_type_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form md-outline">
                            <label for="ntn_number">NTN Number</label>
                            <input id="ntn_number" class="form-control" type="text" name="ntn_number">
                        </div>

                        <div class="md-form md-outline">
                            <label for="sales_tax">Sales Tax Number</label>
                            <input id="sales_tax" class="form-control" type="text" name="sales_tax">
                        </div>

                        <div class="md-form md-outline">
                            <label for="contact_designated_add_1">Address Line 1</label>
                            <input id="contact_designated_add_1" class="form-control" type="text"
                                name="contact_designated_add_1">
                        </div>


                        <div class="md-form md-outline">

                            <label for="contact_designated_add_2">Address Line 2</label>
                            <input id="contact_designated_add_2" class="form-control" type="text"
                                name="contact_designated_add_2">

                        </div>


                        <div class="md-form md-outline">
                            <label for="client_designated_city">City</label>
                            <input id="client_designated_city" class="form-control" type="text"
                                name="client_designated_city">
                        </div>


                        <div class="card-foter text-right">
                            <button id="step_1" type="button" class="btn btn-outline-primary btn-sm"
                                style="width: 140px;">Next</button>
                        </div>



                    </div>

                </div>

            </div>

            <div id="second" class="col-md-6 my-5" style="display: none">

                <div class="card card-signup z-depth-1">
                    <div id="step_2_validation" style="display: none" class="alert alert-danger" role="alert">
                        Please fill out the form
                    </div>

                    <div class="card-header">Create Client Business Details
                        <a data-mdb-toggle="tooltip" title="Add more fields"
                            style="float: right; cursor: pointer; font-size:1.5rem" id="dynamic_add_contact"
                            class="form-icon far fa-plus-square"></a>
                    </div>

                    <div id="dynamic_contact_div" class="card-body text-center">

                        <div class="md-form md-outline">
                            <label for="client_contact_full_name">Full Contact Name</label>
                            <input id="client_contact_full_name" class="form-control" type="text"
                                name="client_contact_full_name[]">
                        </div>

                        <div class="md-form md-outline">
                            <label for="client_contact_email">Contact Email</label>
                            <input id="client_contact_email" class="form-control" type="email"
                                name="client_contact_email[]">
                        </div>

                        <div class="md-form md-outline">
                            <label for="client_designation">Designation</label>
                            <input id="client_designation" class="form-control" type="text"
                                name="client_designation[]">
                        </div>

                        <div class="md-form md-outline">
                            <label for="contact_department">Department</label>
                            <input id="contact_department" class="form-control" type="text"
                                name="contact_department[]" placeholder="e.g. Accounts, Finace, Sales">
                        </div>

                        <div class="md-form md-outline">
                            <label class="label-control" for="contact_cell">Cell Number</label>
                            <input id="contact_cell" class="form-control" type="text" name="contact_cell[]">
                        </div>

                        <div class="md-form md-outline">
                            <label class="label-control" for="contact_cell">Other Contact</label>
                            <input id="other_contact" class="form-control" type="text" name="other_contact[]">
                        </div>

                        <div class="md-form md-outline">
                            <label class="label-control" for="contact_corresponding_add_1">Registered Address Line
                                1</label>
                            <input id="contact_corresponding_add_1" class="form-control" type="text"
                                name="contact_corresponding_add_1[]">
                        </div>

                        <div class="md-form md-outline">
                            <label class="label-control" for="contact_corresponding_add_2">Registered Address Line
                                2</label>
                            <input id="contact_corresponding_add_2" class="form-control" type="text"
                                name="contact_corresponding_add_2[]">
                        </div>

                        <div class="md-form md-outline">
                            <label class="label-control" for="contact_corresponding_city">City </label>
                            <input id="contact_corresponding_city" class="form-control" type="text"
                                name="contact_corresponding_city[]">
                        </div>

                        <div class="md-form md-outline">
                            <label class="label-control" for="other_info_about_client">Other Information about client
                            </label>
                            <textarea id="other_info_about_client" class="form-control" type="text"
                                name="other_info_about_client[]"></textarea>
                        </div>

                    </div>

                    <div class="card-foter text-right">
                        <button id="previous_2" type="button" class="btn btn-outline-danger btn-sm"
                            style="width: 140px;">Previous</button>
                        <button id="next_2" type="button" class="btn btn-primary btn-sm"
                            style="width: 140px;">Next</button>
                    </div>

                </div>

            </div>

            <div id="third" style="display: none">
                <div id="step_3_validation" style="display: none" class="alert alert-danger" role="alert">
                    Please Select any plan
                </div>

                <div class="card card-signup z-depth-1">

                    <div class="card-header">Create Client Billing Details</div>
                    <div class="card-body">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Minimum Monthly Charge</h5>
                                <div class="md-form">
                                    <input id="per_item_charge" class="form-control" name="minimum_charge"
                                        placeholder="Minimum Charge Per Month">
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-body">
                                <h5 class="card-title">Product-Inventory-in Charge</h5>
                                <small>(This charge is per item for checking and putting the product/item in the inventory)</small><br>
                                <div class="md-form">
                                    <input id="product_in_charge" class="form-control" name="product_in_charge"
                                        placeholder="Enter per item rate">
                                </div>
                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-body">
                                <h5 class="card-title">Storage Charge (on monthly basis)</h5>
                                <small>Select any plan</small><br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary active btn-xlarge">
                                        <input value="1" type="radio" name="storage_plan" id="per_item_charge"
                                            autocomplete="off"> <i class="bi bi-currency-dollar"></i>&nbsp;<i
                                            class="bi bi-box-seam"></i>&nbsp;Per Item
                                        Charge
                                    </label>

                                    <label class="btn btn-success btn-xlarge">
                                        <input value="2" type="radio" name="storage_plan" id="bulk"
                                            autocomplete="off"><i class="bi bi-currency-dollar"></i>&nbsp;<i
                                            class="bi bi-view-list"></i>&nbsp;Bulk
                                        Space
                                    </label>
                                </div>


                                <div class="row mt-2">

                                    <!--Divisions to be shown and hidden-->
                                    <div class="1 box" style="display: none">

                                        <div class="btn-group btn-group-toggle" style="margin-left: 10px;"
                                            data-toggle="buttons">
                                            <label class="btn btn-primary active btn-sm">
                                                <input value="111" type="radio" name="flat_per_item_charge"
                                                    id="flat_per_item_charge" autocomplete="off"> <i
                                                    class="bi bi-currency-dollar"></i>&nbsp;<i
                                                    class="bi bi-box-seam"></i>&nbsp;Product (flat charge)
                                            </label>

                                            <label class="btn btn-success btn-sm">
                                                <input value="222" type="radio" name="flat_per_item_charge"
                                                    id="volume_based_1" autocomplete="off"><i
                                                    class="bi bi-currency-dollar"></i>&nbsp;<i
                                                    class="bi bi-view-list"></i>&nbsp;Product (on volume)
                                            </label>
                                        </div>

                                    </div>


                                    <!--Divisions to be shown and hidden-->
                                    <div class="2 box" style="display: none">

                                        <div class="md-form">
                                            <input type="number" style="margin-left: 2rem;" id="bulk_space"
                                                class="form-control" name="bulk_space"
                                                placeholder="Enter space in cuft">


                                            <input id="bulk_charge" style="margin-left: 2rem;" class="form-control"
                                                name="bulk_charge" placeholder="Bulk Charge rate">
                                        </div>


                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="111 box" style="display: none">

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-primary active btn-sm">
                                                <input value="1111" type="radio" name="flat_per_day"
                                                    id="flat_per_day" autocomplete="off"> <i
                                                    class="bi bi-currency-dollar"></i>&nbsp;<i
                                                    class="bi bi-box-seam"></i>&nbsp;Daily (flat charge)
                                            </label>

                                            <label class="btn btn-success btn-sm">
                                                <input value="2222" type="radio" name="flat_per_month"
                                                    id="flat_per_month" autocomplete="off"><i
                                                    class="bi bi-currency-dollar"></i>&nbsp;<i
                                                    class="bi bi-view-list"></i>&nbsp;Monthly (flat charge)
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="222 box" style="display: none">

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-primary active btn-sm">
                                                <input value="3333" type="radio" name="flat_per_day"
                                                    id="flat_per_day" autocomplete="off"> <i
                                                    class="bi bi-currency-dollar"></i>&nbsp;<i
                                                    class="bi bi-box-seam"></i>&nbsp;Daily (flat charge)
                                            </label>

                                            <label class="btn btn-success btn-sm">
                                                <input value="4444" type="radio" name="flat_per_month"
                                                    id="flat_per_month" autocomplete="off"><i
                                                    class="bi bi-currency-dollar"></i>&nbsp;<i
                                                    class="bi bi-view-list"></i>&nbsp;Monthly (flat charge)
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="1111 box" style="display: none">
                                        <div class="md-form md-outline">

                                            <input style="margin-left: 2rem;" id="per_item_charge"
                                                class="form-control" name="per_item_charge_day"
                                                placeholder="Enter flat rate per day">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="2222 box" style="display: none">
                                        <div class="md-form md-outline">

                                            <input style="margin-left: 2rem;" id="per_item_charge_month"
                                                class="form-control" name="per_item_charge"
                                                placeholder="Enter flat rate per month">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="3333 box" style="display: none">
                                        <div class="md-form md-outline">

                                            <input style="margin-left: 2rem;" id="per_item_charge_day_vol"
                                                class="form-control" name="volume_flat_rate"
                                                placeholder="Enter flat rate per day">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="4444 box" style="display: none">
                                        <div class="md-form md-outline">

                                            <input style="margin-left: 2rem;" id="per_item_charge_month_vol"
                                                class="form-control" name="volume_flat_rate"
                                                placeholder="Enter flat rate per month">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mt-2">
                            <div class="card-body">
                                <h5 class="card-title">Fulfillment Fee Plan</h5>
                                <small>Select any plan</small><br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary active btn-sm">
                                        <input value="11" type="radio" name="fulfillment_plan_flat" id="flat"
                                            autocomplete="off">
                                        <i class="bi bi-currency-dollar"></i>&nbsp;Flat Per Order Charge
                                    </label>
                                    <label class="btn btn-warning btn-sm">
                                        <input value="22" type="radio" name="fulfillment_plan_flat" id="tiered"
                                            autocomplete="off"><i class="bi bi-currency-dollar"></i>&nbsp;Tiered
                                        Charge
                                    </label>

                                    <label class="btn btn-info btn-sm">
                                        <input value="33" type="radio" name="fulfillment_plan_flat" id="no_of_items"
                                            autocomplete="off"><i class="bi bi-currency-dollar"></i>&nbsp;By No. Of
                                        Items
                                    </label>

                                    <label class="btn btn-danger btn-sm">
                                        <input value="44" type="radio" name="fulfillment_plan_flat" id="none"
                                            autocomplete="off">None
                                    </label>


                                </div>



                                <div class="row mt-2">

                                    <!--Divisions to be shown and hidden-->
                                    <div class="11 box" style="display: none">


                                        <div class="md-form md-outline">

                                            <input id="fl_rate" style="margin-left: 2rem;" class="form-control"
                                                name="fl_rate" placeholder=" Enter Flat Rate">
                                        </div>


                                    </div>

                                </div>

                                <div class="row mt-2">

                                    <div class="22 box" style="display: none">


                                        <div class="mydiv table-responsive">
                                            <table class="table table-responsive table-bordered table-striped "
                                                id="dynamic_field2">
                                                <tr>
                                                    <th>Start Order</th>

                                                    <th>End Order</th>

                                                    <th>Fee</th>


                                                    <th></th>
                                                </tr>






                                                <tr>
                                                    <td><input class="form-control" name="" id="index"
                                                            placeholder="Enter Value 1" value="0" readonly="">
                                                        <input class="form-control" name="start_order[]" id="start"
                                                            value="0" type="hidden">
                                                    </td>
                                                    <td><input class="form-control" name="end_order[]" id="end"
                                                            placeholder="Ente Value 2" value=""></td>
                                                    <td><input class="form-control height" name="fee_order[]"
                                                            id="fee_order" placeholder="Enter Fee" value=""
                                                            autocomplete="off"
                                                            onkeypress="return isNumberKey(event,this)">
                                                    </td>

                                                    <td></td>
                                                </tr>
                                            </table>

                                            <table class=" table table-responsive">
                                                <tr>
                                                    <td></td>
                                                    <td></td>

                                                    <td style=" width: 9%">
                                                        <button type="button" name="add2" id="add2"
                                                            class="btn btn-success bi bi-plus btn"
                                                            style=" margin-top: 20px;font-size:20px"></button>
                                                    </td>

                                                </tr>

                                            </table>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-2">

                                    <div class="33 box" style="display: none">


                                        <div class="mydiv table-responsive">
                                            <table class="table table-responsive table-bordered table-striped "
                                                id="dynamic_field">
                                                <tr>
                                                    <th>Start number of Item</th>

                                                    <th>End number of Item</th>

                                                    <th>Fee</th>


                                                    <th></th>
                                                </tr>






                                                <tr>
                                                    <td>
                                                        <input class="form-control" name="" id="" value="0"
                                                            readonly="readonly">
                                                        <input class="form-control" name="start_item[]" id="start"
                                                            placeholder="Enter Value 1" value="0" type="hidden">
                                                    </td>
                                                    <td><input class="form-control" name="end_item[]" id="end"
                                                            placeholder="Ente Value 2" value=""></td>
                                                    <td><input class="form-control height" name="fee_item[]"
                                                            id="fee_item" placeholder="Enter Fee" value=""
                                                            autocomplete="off"
                                                            onkeypress="return isNumberKey(event,this)">
                                                    </td>

                                                    <td></td>
                                                </tr>
                                            </table>

                                            <table class=" table table-responsive">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td style=" width: 9%"><button type="button" name="add" id="add"
                                                            class="btn btn-success bi bi-plus"
                                                            style=" margin-top: 20px;font-size:20px"></button>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card mt-2">
                            <div class="card-body">
                                <h5 class="card-title">Product return/out charges</h5>
                                <small>Select any plan</small><br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary active btn-md">
                                        <input value="55" type="radio" name="out_return_plan_flat" id="flat"
                                            autocomplete="off">
                                        <i class="bi bi-currency-dollar"></i>&nbsp;Flat Per Order Charge
                                    </label>
                                    <label class="btn btn-warning btn-md">
                                        <input value="66" type="radio" name="out_return_plan_flat_tiered" id="tiered"
                                            autocomplete="off"><i class="bi bi-currency-dollar"></i>&nbsp;Tiered
                                        Charge
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-2">

                                <!--Divisions to be shown and hidden-->
                                <div class="55 box" style="display: none">


                                    <div class="md-form md-outline">

                                        <input id="out_return_plan_flat" style="margin-left: 2rem;"
                                            class="form-control" name="out_return_plan_flat_input"
                                            placeholder=" Enter Flat Rate">
                                    </div>


                                </div>

                            </div>


                            <div class="row mt-2">

                                <div class="66 box" style="display: none">


                                    <div class="mydiv table-responsive col-md-10" style="margin-left: 2rem;">
                                        <table class="table table-responsive table-bordered table-striped"
                                            id="dynamic_field3">
                                            <tr>

                                                <th>Start Order</th>

                                                <th>End Order</th>

                                                <th>Fee</th>


                                                <th></th>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <input class="form-control" name="start_order_out[]" id="index"
                                                        placeholder="Enter Value 1" value="0" readonly="">
                                                </td>
                                                <td><input class="form-control" name="end_order_out[]" id="end"
                                                        placeholder="Ente Value 2" value=""></td>
                                                <td><input class="form-control height" name="fee_order_out[]"
                                                        id="fee_order" placeholder="Enter Fee" value=""
                                                        autocomplete="off" onkeypress="return isNumberKey(event,this)">
                                                </td>

                                                <td></td>
                                            </tr>

                                        </table>

                                        <table class=" table table-responsive">
                                            <tr>
                                                <td></td>
                                                <td></td>

                                                <td style=" width: 9%">
                                                    <button type="button" name="add3" id="add3"
                                                        class="btn btn-success bi bi-plus btn"
                                                        style=" margin-top: 20px;font-size:20px"></button>
                                                </td>

                                            </tr>

                                        </table>
                                    </div>
                                </div>

                            </div>


                            {{-- <!--Divisions to be shown and hidden-->
                            <div class="2 box" style="display: none">

                                <div class="md-form">
                                    <input type="number" style="margin-left: 2rem;" id="bulk_space"
                                        class="form-control" name="bulk_space" placeholder="Enter space in cuft">

                                    <input id="bulk_charge" style="margin-left: 2rem;" class="form-control"
                                        name="bulk_charge" placeholder="Bulk Charge rate">
                                </div>


                            </div> --}}
                        </div>

                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-foter text-right">
                        <button id="previous_3" type="button" class="btn btn-outline-danger btn-sm"
                            style="width: 140px;">Previous</button>
                        <button id="submit" type="submit" class="btn btn-success btn-sm"
                            style="width: 140px;">Submit</button>
                    </div>
                </div>

            </div>



        </div>

        </div>

    </form>

    <br><br>


    <script>
        // jQuery functions to show and hide divisions 
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                //  alert(inputValue);
                if (inputValue == '1') {
                    $("." + inputValue).show();
                    $("." + 2).hide();
                    $("." + 22).hide();
                    $("." + 11).hide();
                    $("." + 33).hide();
                }
                if (inputValue == '2') {
                    $("." + inputValue).show();
                    $("." + 1).hide();
                    $("." + 11).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                    $("." + 'flat_1').hide();
                    $("." + 'flat_vol').hide();
                    $("." + '111').hide()
                    $("." + '222').hide()
                    $("." + '1111').hide()
                    $("." + '2222').hide()
                    $("." + '3333').hide()
                    $("." + '4444').hide()
                }
                if (inputValue == '11') {
                    $("." + inputValue).show();
                    $("." + 1).hide();
                    $("." + 2).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                }
                if (inputValue == '22') {
                    $("." + inputValue).show();
                    $("." + 1).hide();
                    $("." + 11).hide();
                    $("." + 2).hide();
                    $("." + 33).hide();

                }
                if (inputValue == '33') {
                    $("." + inputValue).show();
                    $("." + 1).hide();
                    $("." + 11).hide();
                    $("." + 2).hide();
                    $("." + 22).hide();
                }
                if (inputValue == '44') {
                    $("." + inputValue).show();
                    $("." + 1).hide();
                    $("." + 11).hide();
                    $("." + 2).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                }

                if (inputValue == '111') {
                    $("." + inputValue).show();
                    $("." + 11).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                    $("." + '222').hide()
                    $("." + '3333').hide()
                    $("." + '4444').hide()
                    $("." + 66).hide();
                    $("." + 55).hide();
                }

                if (inputValue == '1111') {
                    $("." + inputValue).show();
                    $("." + 11).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                    $("." + '222').hide()
                    $("." + '2222').hide()
                    $("." + 66).hide();
                    $("." + 55).hide();
                }

                if (inputValue == '222') {
                    $("." + inputValue).show();
                    $("." + 11).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                    $("." + '111').hide();
                    $("." + '1111').hide();
                    $("." + 66).hide();
                    $("." + 55).hide();
                }

                if (inputValue == '2222') {
                    $("." + inputValue).show();
                    $("." + 11).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                    $("." + '1111').hide();
                    $("." + 66).hide();
                    $("." + 55).hide();
                }

                if (inputValue == '3333') {
                    $("." + inputValue).show();
                    $("." + 11).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                    $("." + '4444').hide();
                    $("." + '1111').hide();
                    $("." + '2222').hide();
                    $("." + '111').hide();
                    $("." + 66).hide();
                    $("." + 55).hide();
                }

                if (inputValue == '4444') {
                    $("." + inputValue).show();
                    $("." + 11).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                    $("." + '1111').hide();
                    $("." + '2222').hide();
                    $("." + '3333').hide();
                    $("." + 66).hide();
                    $("." + 55).hide();
                }

                if (inputValue == '55') {
                    $("." + inputValue).show();
                    $("." + 11).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                    $("." + 'flat_1').hide();
                    $("." + 'flat_vol').hide()
                    $("." + 66).hide();
                    $("." + 1).hide();
                    $("." + 2).hide()
                }

                if (inputValue == '66') {
                    $("." + inputValue).show();
                    $("." + 11).hide();
                    $("." + 22).hide();
                    $("." + 33).hide();
                    $("." + 'flat_1').hide();
                    $("." + 'flat_vol').hide()
                    $("." + 55).hide();
                    $("." + 1).hide();
                    $("." + 2).hide()
                }

            });
        });

        $(document).ready(function() {


            var i = 1;

            $('#add3').click(function() {
                var totalRowCount3 = dynamic_field3.rows.length;

                alert(totalRowCount3)

                var j = +totalRowCount3 + +1 - 1;
                $('#dynamic_field3').append('<tr  id="row' + i +
                    '"><td><input class="form-control"  name="start_order_out_return_plan_flat_input[]" placeholder="Enter Value 1" value="" ></td><td> <input class="form-control"  name="end_order_out_return_plan_flat_input[]" placeholder="Enter Value 2"  value="" ></td> <td>  <input class="form-control"  name="fee_order_out_return_plan_flat_input[]" placeholder="Enter Fee" value="" ></td><td><button type="button" name="remove" id="' +
                    i +
                    '" class="btn btn-danger btn_remove1" style=" margin-top: 20px">X</button></td></tr>'
                );
                i++;

            });

            $(document).on('click', '.btn_remove1', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });


        });

        $(document).ready(function() {


            var i = 1;



            $('#add').click(function() {
                var totalRowCount = dynamic_field.rows.length;
                // alert(totalRowCount);
                var j = +totalRowCount + +1 - 1;
                $('#dynamic_field').append('<tr  id="row' + i +
                    '"><td><input class="form-control"  name="start_item[]" placeholder="Enter Value 1" value="" ></td><td> <input class="form-control"  name="end_item[]" placeholder="Enter Value 2"  value="" ></td> <td>  <input class="form-control"  name="fee_item[]" placeholder="Enter Fee" value="" ></td><td><button type="button" name="remove" id="' +
                    i +
                    '" class="btn btn-danger btn_remove" style=" margin-top: 20px">X</button></td></tr>'
                );
                i++;

            });

            $('#add2').click(function() {
                var totalRowCount = dynamic_field2.rows.length;
                var j = +totalRowCount + +1 - 1;
                $('#dynamic_field2').append('<tr  id="row' + i +
                    '"><td><input class="form-control"  name="start_order[]" placeholder="Enter Value 1" value="" ></td><td> <input class="form-control"  name="end_order[]" placeholder="Enter Value 2"  value="" ></td> <td>  <input class="form-control"  name="fee_order[]" placeholder="Enter Fee" value="" ></td><td><button type="button" name="remove" id="' +
                    i +
                    '" class="btn btn-danger btn_remove" style=" margin-top: 20px">X</button></td></tr>'
                );
                i++;

            });



            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

        });
    </script>

    <script>
        $('#step_1').click(function(e) {
            e.preventDefault();
            let client_name = $('#client_name').val()
            let client_email = $('#client_email').val()
            let sel_val = +$('#select_legal_type').val()
            let client_password = $('#client_password').val()
            console.log(client_password)
            console.log(client_email)
            let ntn_number = $('#ntn_number').val()
            let sales_tax = $('#sales_tax').val()
            let contact_designated_add_1 = $('#contact_designated_add_1').val()
            let contact_designated_add_2 = $('#contact_designated_add_2').val()
            let client_designated_city = $('#client_designated_city').val()
            console.log(sel_val)
            $("#first").find("input[type = 'text']").each(function() {

                if (this.value === "") {
                    $('#step_1_validation').show()
                } else if (sel_val === 0) {
                    $('#step_1_validation').show()
                    $('#first').show()
                } else if ($('#client_password').val() === "") {
                    $('#step_1_validation').show()
                    $('#first').show(800)
                } else if ($('#client_email').val() === "") {
                    $('#step_1_validation').show()
                    $('#first').show(800)
                } else {
                    $('#step_1_validation').hide()
                    $('#first').hide()
                    $("#second").show(800)
                    $("#step1").addClass('active');

                }
            });


            //
            // $('#first').hide();

        });

        $('#previous_2').click(function(e) {
            e.preventDefault();
            $('#second').hide();
            $("#first").show(800)
            $("#step1").removeClass('active');

        });

        $('#next_2').click(function(e) {
            e.preventDefault();
            $("#second").find("input[type = 'text']").each(function() {
                if (this.value === "") {
                    $('#step_2_validation').show()
                    $('#second').show(800)
                } else if ($('#other_info_about_client').val() === "") {
                    $('#step_2_validation').hide()
                    $('#second').hide();
                    $('#third').show(800)
                    $("#step2").addClass('active');
                    $("#step3").addClass('active');
                } else if ($('#contact_corresponding_add_1').val() === "") {
                    $('#step_2_validation').show()
                    $('#second').show(800)
                } else if ($('#contact_corresponding_add_2').val() === "") {
                    $('#step_2_validation').hide()
                    $('#second').hide();
                    $('#third').show(800)
                    $("#step2").addClass('active');
                    $("#step3").addClass('active');
                } else {
                    $('#step_2_validation').hide()
                    $('#second').hide();
                    $('#third').show(800)
                    $("#step2").addClass('active');
                    $("#step3").addClass('active');

                }
            });
        });

        // $('#form-data').on('submit', function(e) {
        //     e.preventDefault();
        //     console.log("form submitted")
        //     $("#third").find("input[type = 'radio']").each(function() {
        //         if (this.value === "") {
        //             alert("Please")
        //             $('#step_3_validation').show()
        //             $('#third').show(800)
        //         }
        //     });
        // });

        $('#previous_3').click(function(e) {
            e.preventDefault();
            $('#third').hide();
            $("#second").show(800)
            $("#step2").removeClass('active');
            $("#step3").removeClass('active');

        });
    </script>

    <script>
        var i = 1;



        $('#dynamic_add_contact').click(function() {
            var inputs = $("#dynamic_contact_div").find($("input"));
            var totalRowCount = inputs.length;
            console.log("length" + inputs.length)
            //alert(totalRowCount);
            var j = +totalRowCount + +1 - 1;
            console.log(j)
            $('#custom_field').show()
            $('#dynamic_contact_div').append('<br><br><span id="custom_field' + i + '">Contact ' + i +
                '</span> <div id="form' + i +
                '"> <div class="md-form md-outline"><label for="client_contact_full_name">Full Contact Name</label><input id="client_contact_full_name" class="form-control" type="text" name="client_contact_full_name[]"></div> <div class="md-form md-outline"><label for="client_contact_email">Contact Email</label><input id="client_contact_email" class="form-control" type="email" name="client_contact_email[]"></div><div class="md-form md-outline"> <label for="client_designation">Designation</label><input id="client_designation" class="form-control" type="text" name="client_designation[]"></div><div class="md-form md-outline"><label for="contact_department">Department</label> <input id="contact_department" class="form-control" type="text" name="contact_department[]"></div><div class="md-form md-outline"><label class="label-control" for="contact_cell">Cell Number</label><input id="contact_cell" class="form-control" type="text" name="contact_cell[]"></div><div class="md-form md-outline"><label class="label-control" for="contact_cell">Other Contact</label><input id="other_contact" class="form-control" type="text" name="other_contact[]"></div><div class="md-form md-outline"> <label class="label-control" for="contact_corresponding_add_1">Registered Address Line 1</label> <input id="contact_corresponding_add_1" class="form-control" type="text" name="contact_corresponding_add_1[]"></div><div class="md-form md-outline"><label class="label-control" for="contact_corresponding_add_2">Registered Address Line 2</label><input id="contact_corresponding_add_2" class="form-control" type="text" name="contact_corresponding_add_2[]"></div><div class="md-form md-outline"><label class="label-control" for="contact_corresponding_city">City </label><input id="contact_corresponding_city" class="form-control" type="text" name="contact_corresponding_city[]"></div> <div class="md-form md-outline"><label class="label-control" for="other_info_about_client">Other Information about client </label><textarea id="other_info_about_client" class="form-control" type="text" name="other_info_about_client[]"></textarea> </div></div><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger contact_btn_remove" style=" margin-top: 20px;">X</button>'
            );
            i++;

        });
    </script>

    <script>
        $(document).on('click', '.contact_btn_remove', function() {
            var inputs = $("#dynamic_contact_div").find($("input"));
            var button_id = $(this).attr("id");
            $('#form' + button_id).remove();
            $(this).css('display', 'none')
            $('#custom_field' + button_id).css('display', 'none')
        });
    </script>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js">
    </script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>


</body>

</html>
