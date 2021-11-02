@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js">
    </script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #4723D9;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
        }

        a {
            text-decoration: none
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
        }

        .header_img img {
            width: 40px
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed);

        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem
        }

        .nav_logo {
            margin-bottom: 2rem
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
        }

        .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s
        }

        .nav_link:hover {
            color: var(--white-color)
        }

        .nav_icon {
            font-size: 1.25rem
        }

        .show {
            left: 0
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
        }

        .active {
            color: var(--white-color)
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color)
        }

        .height-100 {
            height: 100vh
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 2rem)
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
            }

            .header_img {
                width: 40px;
                height: 40px
            }

            .header_img img {
                width: 45px
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0
            }

            .show {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }

        .btn-xlarge {
            padding: 18px 28px;
            font-size: 22px; //change this to your desired size
            line-height: normal;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
        }

        label {
            padding-top: 1rem
        }

    </style>


    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <div class="nav_list">
                        <a style="text-decoration: none" href="{{ route('home') }}" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a style="text-decoration: none" href="{{ route('home') }}" class="nav_link">
                            <i class="bi bi-house nav_icon"></i>
                            <span class="nav_name">Warehouses</span>
                        </a>
                        <a style="text-decoration: none" href="{{ url('clients-home') }}" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Clients</span> </a>
                    </div>
                </div>
                @guest

                    @if (Route::has('login'))
                        <div class="nav_item">
                            <a class="nav_link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </div>
                    @endif

                    @if (Route::has('register'))
                        <div class="nav_item">
                            <a class="nav_link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    @endif
                @else
                    <a style="text-decoration: none" class="nav_link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                             document.getElementById('logout-form').submit();">

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form><i class='bx bx-log-out nav_icon'></i> <span class="nav_name"> {{ __('Logout') }}</span>
                    </a>

                @endguest

            </nav>
        </div>

    </body>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light p-4 rounded shadow-lg p-3 mb-5">
                <a href="{{ url('/') }}" class="btn btn-primary bi bi-house mb-2" style="font-size: 1rem">&nbsp;
                    &nbsp;
                    Go back home</a>
                <center><i id="form-icon" class="bi bi-briefcase" style="font-size: 8rem; color:rgb(14, 144, 187)"></i>
                </center>
                <h5 id="title-h5" class="text-center mb-2 p-2 rounded lead">Client Business Details</h5>

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

                <div class="progress-bar bg-primary rounded mb-3" role="progressbar" style="width: 20%; height: 40px"
                    id="progressBar">
                    <b class="lead" id="progressText">Step - 1</b>
                </div>

                <form method="POST" action="{{ route('client.create') }}" id="form-data" class="pt-2"
                    enctype="multipart/form-data">
                    @csrf
                    <input id="client_id" name="client_id" type="hidden" value="{{ session('id') }}">

                    <div id="first">
                        <div id="step_1_validation" style="display: none" class="alert alert-danger" role="alert">
                            Please fill out the form
                        </div>

                        <div class="card">
                            <div class="card-body">

                                <label class="label-control" for="client_name">Enter Client Legal Name</label>
                                <input id="client_name" class="form-control" type="text" name="client_name"
                                    placeholder="e.g. Ferozsons Pvt. Limited">

                                <label class="label-control" for="client_email">Enter Client Email</label>
                                <input id="client_email" class="form-control" type="email" name="client_email">

                                <label class="label-control" for="client_password">Create Client Password</label>
                                <input id="client_password" class="form-control" type="password" name="client_password">

                                <label class="label-control" for="entity_type">Select Legal Entity Type</label>
                                <select class="form-control" name="entity_type" id="select_legal_type">
                                    <option value="0" selected="">Select</option>
                                    @foreach ($legal_types as $legal_type)
                                        <option value="{{ $legal_type->id }}">{{ $legal_type->legal_type_name }}
                                        </option>
                                    @endforeach
                                </select>

                                <label class="label-control" for="ntn_number">NTN Number</label>
                                <input id="ntn_number" class="form-control" type="text" name="ntn_number">

                                <label class="label-control" for="sales_tax">Sales Tax Number</label>
                                <input id="sales_tax" class="form-control" type="text" name="sales_tax">

                                <label class="label-control" for="contact_designated_add_1">Address Line 1</label>
                                <input id="contact_designated_add_1" class="form-control" type="text"
                                    name="contact_designated_add_1">


                                <label class="label-control" for="contact_designated_add_2">Address Line 2</label>
                                <input id="contact_designated_add_2" class="form-control" type="text"
                                    name="contact_designated_add_2">


                                <label class="label-control" for="client_designated_city">City</label>
                                <input id="client_designated_city" class="form-control" type="text"
                                    name="client_designated_city">



                            </div>


                        </div>

                        <div class="form-group">
                            <button id="step_1" type="button" class="btn btn-primary btn-lg btn-block mt-3">Next</button>
                        </div>

                    </div>


                    <div id="second" style="display:none">
                        <div id="step_2_validation" style="display:none" class="alert alert-danger" role="alert">
                            Please fill out the form
                        </div>

                        <div class="card">
                            <h4 class="card-header"><a data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add more fields" style="float: right; cursor: pointer;" id="dynamic_add_contact"
                                    class="bi bi-plus-square btn"></a></h4>
                            <div id="dynamic_contact_div" class="card-body">

                                <label class="label-control" for="client_contact_full_name">Full Contact Name</label>
                                <input id="client_contact_full_name" class="form-control" type="text"
                                    name="client_contact_full_name[]">

                                <label class="label-control" for="client_designation">Designation</label>
                                <input id="client_designation" class="form-control" type="text"
                                    name="client_designation[]">

                                <label class="label-control" for="contact_department">Department</label>
                                <input id="contact_department" class="form-control" type="text"
                                    name="contact_department[]" placeholder="e.g. Accounts, Finace, Sales">

                                <label class="label-control" for="contact_cell">Cell Number</label>
                                <input id="contact_cell" class="form-control" type="text" name="contact_cell[]">

                                <label class="label-control" for="contact_cell">Other Contact</label>
                                <input id="other_contact" class="form-control" type="text" name="other_contact[]">

                                <label class="label-control" for="contact_corresponding_add_1">Address Line 1</label>
                                <input id="contact_corresponding_add_1" class="form-control" type="text"
                                    name="contact_corresponding_add_1[]">


                                <label class="label-control" for="contact_corresponding_add_2">Address Line 2</label>
                                <input id="contact_corresponding_add_2" class="form-control" type="text"
                                    name="contact_corresponding_add_2[]">


                                <label class="label-control" for="contact_corresponding_city">City </label>
                                <input id="contact_corresponding_city" class="form-control" type="text"
                                    name="contact_corresponding_city[]">

                                <label class="label-control" for="other_info_about_client">Other Information about client
                                </label>
                                <textarea id="other_info_about_client" class="form-control" type="text"
                                    name="other_info_about_client[]"></textarea>
                                <br>
                                <span id="custom_field" style="display: none">Custom Fields</span>

                            </div>

                            <div class="btn-group mt-2">
                                <button id="previous_2" type="button" class="btn btn-danger btn-lg">Previous</button>
                                <button id="next_2" type="button" class="btn btn-success btn-lg">Next</button>
                            </div>
                        </div>
                    </div>

                    <div id="third" style="display:none">
                        <div id="step_3_validation" style="display: none" class="alert alert-danger" role="alert">
                            Please Select any plan
                        </div>
                        <div class="card">
                            <div class="card-body">


                                <div class="row" style="margin-top: 10px">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Product Storage Plan</h5>
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


                                                    <div class="form-group">

                                                        <input id="per_item_charge" class="form-control"
                                                            name="per_item_charge" placeholder="Enter per item rate">
                                                    </div>


                                                </div>


                                                <!--Divisions to be shown and hidden-->
                                                <div class="2 box" style="display: none">

                                                    <div class="form-group">
                                                        <input type="number" id="bulk_space" class="form-control"
                                                            name="bulk_space" placeholder="Enter space in cuft">
                                                    </div>

                                                    <div class="form-group">
                                                        <input id="bulk_charge" class="form-control"
                                                            name="bulk_charge" placeholder="Bulk Charge rate">
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
                                                        autocomplete="off"><i
                                                        class="bi bi-currency-dollar"></i>&nbsp;Tiered
                                                    Charge
                                                </label>

                                                <label class="btn btn-info btn-sm">
                                                    <input value="33" type="radio" name="fulfillment_plan_flat"
                                                        id="no_of_items" autocomplete="off"><i
                                                        class="bi bi-currency-dollar"></i>&nbsp;By No. Of
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


                                                    <div class="form-group">

                                                        <input id="fl_rate" class="form-control" name="fl_rate"
                                                            placeholder=" Enter Flat Rate">
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
                                                                    <input class="form-control" name="start_order[]"
                                                                        id="start" value="0" type="hidden">
                                                                </td>
                                                                <td><input class="form-control" name="end_order[]"
                                                                        id="end" placeholder="Ente Value 2" value=""></td>
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
                                                                        class="btn btn-success bi bi-plus btn-lg"
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
                                                                    <input class="form-control" name="start_item[]"
                                                                        id="start" placeholder="Enter Value 1" value="0"
                                                                        type="hidden">
                                                                </td>
                                                                <td><input class="form-control" name="end_item[]"
                                                                        id="end" placeholder="Ente Value 2" value=""></td>
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
                                                                <td style=" width: 9%"><button type="button" name="add"
                                                                        id="add" class="btn btn-success bi bi-plus btn-lg"
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
                                            <h5 class="card-title">Payment Plan</h5>
                                            <small>Select any plan</small><br>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-primary active btn-lg">
                                                    <input value="13" type="radio" name="payment_plan" id="per_day"
                                                        autocomplete="off" checked>Per Day Charge
                                                </label>


                                                <label class="btn btn-warning btn-lg">
                                                    <input value="7" type="radio" name="payment_plan" id="weekly"
                                                        autocomplete="off">Weekly
                                                    Charge
                                                </label>

                                                <label class="btn btn-info btn-lg">
                                                    <input value="12" type="radio" name="payment_plan" id="monthly"
                                                        autocomplete="off">Monthly
                                                </label>


                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="btn-group mt-2">
                            <button id="previous_3" type="button" class="btn btn-danger btn-lg">Previous</button>
                            <button id="submit" type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>

                    </div>


                </form>

            </div>
        </div>
    </div>


    

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('show')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });
    </script>

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

            });
        });


        $(document).ready(function() {


            var i = 1;



            $('#add').click(function() {
                var totalRowCount = dynamic_field.rows.length;
                //alert(totalRowCount);
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
                    $('#title-h5').html("Client Contact Details")
                    $('#form-icon').removeClass('bi bi-briefcase')
                    $('#form-icon').addClass('bi bi-person')
                    $("#second").show(800)
                    // $('#second').show()
                    $('#progressBar').css('width', '60%')
                    $('#progressText').text('Step - 2')
                }
            });


            //
            // $('#first').hide();

        });

        $('#previous_2').click(function(e) {
            e.preventDefault();
            $('#second').hide();
            $('#title-h5').html("Client Business Details")
            $('#form-icon').addClass('bi bi-briefcase')
            $('#form-icon').removeClass('bi bi-person')
            $("#first").show(800)
            $('#progressBar').css('width', '20%')
            $('#progressText').text('Step - 1')
        });

        $('#next_2').click(function(e) {
            e.preventDefault();
            $("#second").find("input[type = 'text']").each(function() {
                if (this.value === "") {
                    $('#step_2_validation').show()
                    $('#second').show(800)
                } else if ($('#other_info_about_client').val() === "") {
                    $('#step_2_validation').show()
                    $('#second').show(800)
                } else {
                    $('#step_1_validation').hide()
                    $('#second').hide();
                    $('#title-h5').html("Client Fulfillment & Billing Details")
                    $('#form-icon').removeClass('bi bi-person')
                    $('#form-icon').addClass('bi bi-credit-card-2-front')
                    $('#progressBar').css('width', '100%')
                    $('#progressText').text('Step - 3')
                    $('#third').show(800)

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
            $('#title-h5').html("Client Contact Details")
            $('#form-icon').addClass('bi bi-person')
            $('#form-icon').removeClass('bi bi-credit-card-2-front')
            $("#second").show(800)
            $('#progressBar').css('width', '60%')
            $('#progressText').text('Step - 2')
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
            $('#dynamic_contact_div').append('<input id="rowContact' + i +
                '" class="form-control mt-3"  name="client_contact_full_name[]" placeholder="Enter client full name" value="" >  <input id="rowContact' +
                i +
                '" class="form-control mt-3"  name="client_designation[]" placeholder="Enter client designation"  value=""><input id="rowContact' +
                i +
                '" class="form-control mt-3"  name="contact_department[]" placeholder="Enter client department"  value="" ><input id="rowContact' +
                i +
                '" class="form-control mt-3"  name="contact_cell[]" placeholder="Enter client cell number"  value="" ><input id="rowContact' +
                i +
                '" class="form-control mt-3"  name="other_contact[]" placeholder="Enter client other contact"  value="" ><input id="rowContact' +
                i +
                '" class="form-control mt-3"  name="contact_corresponding_add_1[]" placeholder="Enter client address"  value="" ><input id="rowContact' +
                i +
                '" class="form-control mt-3"  name="contact_corresponding_add_2[]" placeholder="Enter client address line 2"  value="" ><input id="rowContact' +
                i +
                '" class="form-control mt-3"  name="contact_corresponding_city[]" placeholder="Enter client city"  value="" ><button type="button" name="remove" id="' +
                i +
                '" class="btn btn-danger contact_btn_remove" style=" margin-top: 20px;">X</button></td></tr>'
            );
            i++;

        });


        $(document).on('click', '.contact_btn_remove', function() {
            var inputs = $("#dynamic_contact_div").find($("input"));
            var button_id = $(this).attr("id");
            $('#rowContact' + button_id + '').remove();
            var inputs = $("#dynamic_contact_div").find($("input"));
            if (inputs.length === 8) {
                $('.contact_btn_remove').css('display', 'none')
                $('#custom_field').css('display', 'none')
            }
        });
    </script>

@endsection
