@extends('layouts.app')
@section('content')


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>

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
            height: 100vh;
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

            .show1 {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }

        @media (min-width: 1200px) {
            .modal-lg {
                width: 90%;
            }
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

                        <a title="Warehouses" style="text-decoration: none" href="{{ route('home') }}"
                            class="nav_link">
                            <i class="bi bi-house nav_icon"></i>
                            <span class="nav_name">Warehouses</span>
                        </a>
                        

                        <a class="nav_link dropdown-toggle" style="text-decoration: none" href="#ClientDropdown"
                            aria-expanded="false" data-toggle="collapse">
                            <i class="bx bx-user nav_icon"></i>
                            <span class="nav_name"><strong>Clients</strong></span>
                        </a>

                        <li id="ClientDropdown" class="collapse">
                            <a title="Client Product Requests" style="text-decoration: none" href="{{ route('client.product-requests', $sch_id) }}"
                                class="nav_link">
                                <i class='bx bx-user nav_icon'></i>
                                <span class="nav_name text-nowrap">Client Requests</span> </a>
                        </li>

                        <a style="text-decoration: none" href="{{ route('vendors') }}" class="nav_link">
                            <i class="bi bi-people nav_icon"></i>
                            <span class="nav_name">Vendors</span>
                        </a>

                        <a title="units" style="text-decoration: none" href="{{ route('units') }}"
                            class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Units</span>
                        </a>


                        <a title="categories" style="text-decoration: none" href="{{ url('add-categories') }}"
                            class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Categories</span>
                        </a>

                        

                        <a class="nav_link dropdown-toggle" style="text-decoration: none" href="#StockDropdown"
                            aria-expanded="false" data-toggle="collapse">
                            <i class="bi bi-bar-chart-steps nav_icon"></i>
                            <span class="nav_name"><strong>Stock</strong></span>
                        </a>


                        <li id="StockDropdown" class="collapse">

                            <a title="GRN" class="dropdown-item nav_link" href="{{ route('grn.view', $sch_id) }}">
                                <i style="color: #0a0a0a" class="bi bi-card-checklist nav_icon"></i> <span
                                    style="color: #0a0a0a">GRN</span>
                            </a>

                            <a title="Stock In" class="dropdown-item nav_link" href="{{ url('stock-in', $sch_id) }}">
                                <i style="color: #0a0a0a" class="bi bi-pencil nav_icon"></i> <span
                                    style="color: #0a0a0a">Stock In</span>
                            </a>

                        </li>

                        <a style="text-decoration: none" href="{{ route('client.fulfillment', ['client_id' => $sch_id]) }}" class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Create Fulfillment</span>
                        </a>

                        <a style="text-decoration: none" href="{{ route('fulfillments', ['client_id' => $sch_id]) }}" class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Client Fulfillments</span>
                        </a>

                        <a style="text-decoration: none" href="{{ url('billing', $sch_id) }}" class="nav_link">
                            <i class="bi bi-cash-stack nav_icon"></i>
                            <span class="nav_name">Billing</span>
                        </a>

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



    <div class="card">

        <h3 class="card-header">Client Products <a style="float: right;"
                href="{{ route('client.item-add', $sch_id) }}" class="btn btn-lg"><i
                    class="bi bi-plus-square"></i></a></h3>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-striped table-bordered">

                    <thead>
                        <tr>
                            <th>
                                Product Title
                            </th>

                            <th>
                                Product Code
                            </th>

                            <th>In Code</th>

                            <th>Product Dimensions</th>

                            <th width="20%">
                                Action
                            </th>
                        </tr>
                    </thead>

                    @foreach ($c_items as $client_item)

                        <tbody>
                            <tr>
                                <td>
                                    {{ $client_item->pitem_title }}
                                </td>

                                <td>
                                    {{ $client_item->pitem_code }}
                                </td>

                                <td>{{ $client_item->in_code }}</td>

                                <td>
                                    {{ ($client_item->length * $client_item->width * $client_item->height)/1728 }} cuft
                                </td>

                                <td>

                                    {{-- <div class="btn-group">
                                        <a href="{{ route('item.edit', ['sch_id' => $sch_id, 'category_id' => $client_item->id]) }}"
                                            class="btn btn-warning"><i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('item.delete', ['sch_id' => $sch_id, 'category_id' => $client_item->id]) }}"
                                            class="btn btn-danger"><i class="bi bi-trash"></i>
                                        </a>
                                    </div> --}}

                                    <!-- Button trigger modal -->
                                    <div class="btn-group">
                                        <a class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal{{ $client_item->pitem_id }}">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('item.edit-view', ['pitem_id' => $client_item->pitem_id]) }}"
                                            class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="{{ route('item.delete', ['pitem_id' => $client_item->pitem_id]) }}"
                                            class="btn btn-danger"><i class="bi bi-x-square"></i></a>

                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{ $client_item->pitem_id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" style="width:1250px;" role="document">
                                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">×</button>
                                                        <h4 class="modal-title" style=" text-align: center"> <strong>
                                                            </strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class=" container">
                                                            <div class="row">
                                                                <div class=" col-lg-12">
                                                                    <table class=" table table-responsive table-condensed"
                                                                        style=" margin-top: 20px; border: none">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style=" width: 50%"><img
                                                                                        src="{{ asset('uploads/' . $client_item->img) }}"
                                                                                        style=" width: 500px"></td>
                                                                                <td style=" width: 60%">
                                                                                    <table
                                                                                        class="table table-bordered table-dark">
                                                                                        <tbody>
                                                                                            <tr>


                                                                                                <td colspan="2"
                                                                                                                >
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
                                                                                                        Code</strong></td>
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
                                                                                                <td colspan="2"
                                                                                                    >
                                                                                                    <strong>Fee handling
                                                                                                        Plan</strong>

                                                                                                    <?php $fee_plan = App\Http\Controllers\MainController::getFeePlan($sch_id); ?>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    @foreach ($fee_plan as $item)
                                                                                                        @if ($item->fulfil_plan == 11)
                                                                                                            <span
                                                                                                                class="badge badge-primary"
                                                                                                                style="width: 100%">Flat
                                                                                                                {{ $item->fl_rate }}</span>
                                                                                                        @elseif($item->fulfil_plan
                                                                                                            == 22)
                                                                                                            <?php $fee_plan = App\Http\Controllers\MainController::productFulfillmentRate($sch_id); ?>
                                                                                                            Start Order-End Order<br>
                                                                                                            @foreach ($fee_plan as $item)
                                                                                                                {{ $item->start_order }}-{{ $item->end_order }} --- {{ $item->fee_order }}Rs<br>
                                                                                                            @endforeach
                                                                                                            
                                                                                                        @elseif($item->fulfil_plan==
                                                                                                            33)
                                                                                                            <?php $fee_plan = App\Http\Controllers\MainController::productFulfillmentRate2($sch_id); ?>
                                                                                                            @foreach ($fee_plan as $item)
                                                                                                            {{ $item->start_item }}-{{ $item->end_item }} --- {{ $item->fee_item }}Rs<br>
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                </td>
                                                                                            </tr>
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

    {{-- <a type="button" class="" data-toggle=" modal" data-target="#{{ $client_item->pitem_id }}"><span
                                            class=" btn btn-primary  bi bi-eye" data-toggle="tooltip"
                                            title="" data-original-title="View Item Info"></span></a>
                                    <div class="modal fade" id="{{ $client_item->pitem_id }}"  role="dialog" style="display: none;">
                                        <div class="modal-dialog modal-lg" style="width:1250px;">
                                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">×</button>
                                                        <h4 class="modal-title" style=" text-align: center"> <strong> </strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class=" container">
                                                            <div class="row">
                                                                <div class=" col-lg-12">
                                                                    <table class=" table table-responsive table-condensed"
                                                                        style=" margin-top: 20px; border: none">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style=" width: 50%"><img
                                                                                        src="uploads/556688437.jpg"
                                                                                        style=" width: 500px"></td>
                                                                                <td style=" width: 60%">
                                                                                    <table
                                                                                        class="table table-bordered table-dark">
                                                                                        <tbody>
                                                                                            <tr>


                                                                                                <td colspan="2"
                                                                                                    style=" color:blue">
                                                                                                    <strong>Item
                                                                                                        Info</strong></td>




                                                                                            </tr>
                                                                                            <tr>


                                                                                                <td><strong>Title</strong>
                                                                                                </td>
                                                                                                <td>TV</td>


                                                                                            </tr>



                                                                                            <tr>
                                                                                                <td><strong>Barcode</strong>
                                                                                                </td>
                                                                                                <td>66546</td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><strong>Internal
                                                                                                        Code</strong></td>
                                                                                                <td>65656</td>
                                                                                            </tr>



                                                                                            <tr>
                                                                                                <td><strong>Length</strong>
                                                                                                </td>
                                                                                                <td>7</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><strong>Width</strong>
                                                                                                </td>
                                                                                                <td>5</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><strong>Height</strong>
                                                                                                </td>
                                                                                                <td>3</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td><strong>Weight</strong>
                                                                                                </td>
                                                                                                <td>9</td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <table
                                                                                        class="table table-bordered table-dark">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td colspan="2"
                                                                                                    style=" color:blue">
                                                                                                    <strong>Fee handling
                                                                                                        Plan</strong></td>
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
                                                                <strong><u>Racks Information</u></strong></h4>
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
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </form>
                                        </div>


                                    </div> --}}

    </td>
    </tr>
    </tbody>
    @endforeach

    </table>

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
                        nav.classList.toggle('show1')
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


@endsection
