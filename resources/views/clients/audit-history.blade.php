@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>

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

            .show1 {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
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
                        <a style="text-decoration: none" href="#" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a style="text-decoration: none" href="#" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Clients</span> </a>
                        <a style="text-decoration: none" href="#" class="nav_link">
                            <i class="bi bi-house nav_icon"></i>
                            <span class="nav_name">Warehouses</span>
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

    <div class="container p-3 my-3 bg-light text-dark" style="border-radius: 3px;">
        @foreach ($client_audits as $client_audit)
            <h3>Client Audit Logs</h1>
                <p>Last Updated at: {{ $client_audit->updated_at }}</p>
                <p>Last Minimum charge: {{ $client_audit->minimum_per_month }} </p>
                <p>Last Product Inventory-in charge: {{ $client_audit->product_in_charge }}</p>
                <p>Last Storage Plan: @if ($client_audit->storage_plan == 1) <span>Per Item Charge</span> @else <span>Bulk Space</span> @endif</p>
                <p>Last Fulfillment Plan: @if ($client_audit->product_out_charge_flat == 55) <span class="badge badge-primary">Flat Charge: {{ $client_audit->product_out_flat_rate }} Rs.</span> @if($client_audit->product_out_charge_flat == 66) <span>Tiered</span> @endif @else <span>Not selected</span> @endif </p>
        @endforeach

    </div>




    <div class="card mt-5">
        <h5 class="card-header">Client Audit Log</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-condensed table-hover">

                    <thead>

                        <th>#</th>
                        <th>Minimum Charge</th>
                        <th>Inventory-In charge</th>
                        <th>Storage Plan</th>
                        <th>Flat charge type</th>
                        <th>Flat charge per item</th>
                        <th>Flat Volume based type</th>
                        <th>Flat Per Item Charge (Volume Based)</th>
                        <th>Fulfillment Plan</th>
                        <th>Fulfillment Rates</th>
                        <th>Product Stockout Charge</th>
                        <th>Product stock out rate</th>
                        <th>Created At</th>
                        <th>Update At</th>


                    </thead>
                    <?php $count = 1; ?>
                    <tbody>
                        @foreach ($client_audits as $client_audit)
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td>{{ $client_audit->minimum_per_month }} Rs</td>
                                <td>{{ $client_audit->product_in_charge }} Rs</td>
                                <td>@if ($client_audit->storage_plan == 1) <span>Per Item Charge</span> @else <span>Bulk Space</span> @endif</td>
                                <td>@if ($client_audit->per_item_charge_flat == 111) @if ($client_audit->flat_per_day == 1111) <span>Flat Charge Per Day</span>@endif @endif @if ($client_audit->per_item_charge_flat == 111) @if ($client_audit->flat_per_day == 2222) <span>Flat Charge Per Month</span>@endif @endif </td>
                                <td>@if ($client_audit->per_item_charge_flat == 111) @if ($client_audit->flat_per_day == 1111) <span>{{ $client_audit->per_item_charge_day }} Rs</span> @endif @endif  @if ($client_audit->per_item_charge_flat == 111) @if ($client_audit->flat_per_day == 2222) <span>{{ $client_audit->per_item_charge_month }} Rs</span> @endif @endif</span></td>
                                <td>@if ($client_audit->per_item_charge_flat == 222) @if ($client_audit->per_item_charge_day_vol == 3333) <span>Flat Per Day</span>@endif @endif @if ($client_audit->per_item_charge_month_vol == 4444) <span>Flat Per Month</span>@endif @if ($client_audit->per_item_charge_flat != 222) <span>Not selected</span> @endif </td>
                                <td>@if ($client_audit->per_item_charge_flat == 222) @if ($client_audit->flat_per_day == 3333) <span>{{ $client_audit->per_item_charge_day_vol }}</span> @endif @endif  @if ($client_audit->per_item_charge_flat == 222) @if ($client_audit->flat_per_day == 2222) <span>{{ $client_audit->per_item_charge_day_vol }} Rs.</span> @endif @endif @if ($client_audit->per_item_charge_flat != 222) <span>Not selected</span> @endif</td>
                                <td>@if ($client_audit->fulfil_plan == 11) <span>Flat Per Order Charge</span> @if ($client_audit->fulfil_plan == 22) <span>Tiered Charge</span> @endif @if ($client_audit->fulfil_plan == 33) <span>Charge by no. of items</span> @endif @endif</td>
                                <td>@if ($client_audit->fulfil_plan == 11) <span class="badge badge-primary">Flat Rate: {{ $client_audit->fl_rate }} Rs</span> @if ($client_audit->fulfil_plan == 22) <span>Tiered Charge <small><?php $fulfilment_rates = DB::select('select * from product_fulfillment_rate where client_id = ?', [$client_id]); ?></small>@foreach ($fulfilment_rates as $fulfilment_rate) <span>From: {{ $fulfilment_rate->start_order }} - To: {{ $fulfilment_rate->end_order }} - Fee: {{ $fulfilment_rate->fee_order }}</span> @endforeach</span> @endif @if ($client_audit->fulfil_plan == 33) <span>Charge by no. of items <small><?php $fulfilment_rates = DB::select('select * from product_fulfillment_rate_2 where client_id = ?', [$client_id]); ?></small>@foreach ($fulfilment_rates as $fulfilment_rate) <span>From: {{ $fulfilment_rate->start_item }} - To: {{ $fulfilment_rate->end_item }} - Fee: {{ $fulfilment_rate->fee_item }}</span> @endforeach</span></span> @endif @endif</td>
                                <td>@if ($client_audit->product_out_charge_flat == 55) <span class="badge badge-primary">Flat Charge: {{ $client_audit->product_out_flat_rate }} Rs.</span> @else <span>Not selected</span> @endif</td>
                                <td>@if ($client_audit->product_out_charge_flat == 66) <span>Tiered: <small><?php $fulfilment_rates = DB::select('select * from client_stock_out_rate where client_id = ?', [$client_id]); ?></small>@foreach ($fulfilment_rates as $fulfilment_rate) <span>From: {{ $fulfilment_rate->start_order }} - To: {{ $fulfilment_rate->end_order }} - Fee: {{ $fulfilment_rate->fee }}</span> @endforeach</small></span> @endif @if ($client_audit->product_out_charge_flat != 66) <span>Not selected</span> @endif</td>
                                <td>{{ $client_audit->created_at }}</td>
                                <td>{{ $client_audit->updated_at }}</td>
                            </tr>
                            <?php $count++; ?>
                        @endforeach

                    </tbody>

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
