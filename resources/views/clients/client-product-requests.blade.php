@extends('layouts.app')

@section('content')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    

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


        .bd-callout+.bd-callout {
            margin-top: -.25rem;
        }

        .bd-callout {
            padding: 1.25rem;
            margin-top: 1.25rem;
            margin-bottom: 1.25rem;
            border: 1px solid #AFA5D9;
            border-left-width: .25rem;
            border-radius: .25rem;
        }


        .toggle.ios,
        .toggle-on.ios,
        .toggle-off.ios {
            border-radius: 20px;
        }

        .toggle.ios .toggle-handle {
            border-radius: 20px;
        }

        .slow .toggle-group {transition: left 0.7s; -webkit-transition: left 0.7s}

    </style>


    <body id="body-pd">
        <header class="header" id="header">

            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i></div>
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

                        <a class="nav_link dropdown-toggle" style="text-decoration: none" href="#ClientDropdown"
                            aria-expanded="false" data-toggle="collapse">
                            <i class="bx bx-user nav_icon"></i>
                            <span class="nav_name"><strong>Clients</strong></span>
                        </a>

                        <li id="ClientDropdown" class="collapse">
                            <a title="Clients" style="text-decoration: none" href="{{ url('clients-home') }}"
                                class="nav_link">
                                <i class='bx bx-user nav_icon'></i>
                                <span class="nav_name">Clients</span> </a>

                            <a title="Clients Product Requests" style="text-decoration: none"
                                href="{{ route('client.product-requests', $client_id) }}" class="nav_link">
                                <i class='bx bx-user nav_icon'></i>
                                <span class="nav_name text-nowrap">Client Requests</span> </a>
                        </li>

                        <a title="categories" style="text-decoration: none" href="{{ route('categories') }}"
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

                            <a title="GRN" class="dropdown-item nav_link" href="{{ route('grn.view', $client_id) }}">
                                <i style="color: #0a0a0a" class="bi bi-card-checklist nav_icon"></i> <span
                                    style="color: #0a0a0a">GRN</span>
                            </a>

                            <a title="Stock In" class="dropdown-item nav_link" href="{{ url('stock-in', $client_id) }}">
                                <i style="color: #0a0a0a" class="bi bi-pencil nav_icon"></i> <span
                                    style="color: #0a0a0a">Stock In</span>
                            </a>

                        </li>

                        <a style="text-decoration: none" href="{{ url('billing', $client_id) }}" class="nav_link">
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
        <h4 class="card-header">Client Product Requests</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Category Name</th>
                                <th>SKU ID</th>
                                <th>SKU Barcode</th>
                                <th>Product Reorder level</th>
                                <th>Product Retail Price</th>
                                <th>Product Length</th>
                                <th>Product Width</th>
                                <th>Product Height</th>
                                <th> Product Weight </th>
                                <th>Status</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <?php $count = 1; ?>
                        @foreach ($p_requests as $p_request)
                            <tbody>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td>{{ $p_request->product_name }}</td>
                                    <td>{{ $p_request->product_description }}</td>
                                    <td>
                                        @foreach ($category as $cat)
                                            {{ $cat->category_name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $p_request->SKU_ID }}</td>
                                    <td>{{ $p_request->SKU_BARCODE }}</td>
                                    <td>{{ $p_request->product_reorder_level }}</td>
                                    <td>{{ $p_request->product_retail_price }}</td>
                                    <td>{{ $p_request->product_length }}</td>
                                    <td>{{ $p_request->product_width }}</td>
                                    <td>{{ $p_request->product_height }}</td>
                                    <td>{{ $p_request->weight }}</td>
                                    <td>
                                        @if ($p_request->status == 0)
                                            <span class="badge badge-info">Not Approved</span>
                                        @elseif ($p_request->status == 1)
                                            <span class="badge badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-danger">Disapproved</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <input type="checkbox" class="toggle-class" data-id="{{ $p_request->id }}"
                                            data-toggle="toggle" data-style="ios slow" data-on="Processing"
                                            data-off="Not Processed" {{ $p_request->status == 1 ? 'checked' : '' }}><br> --}}
                                            <input type="checkbox" data-style="slow" data-toggle="toggle" data-id="{{ $p_request->id }}" {{ $p_request->status == 1 ? 'checked' : '' }}>
                                        {{-- <div class="btn-group">
                                            <a href="{{ route('client.udpate-stock-request', $p_request->id) }}" class="btn btn-success btn"><i class="bi bi-check-square"></i></a>
                                            <a href="{{ url('client.add-client-stock-request', $p_request->id) }}" class="btn btn-primary btn"><i class="bi bi-plus-square"></i></a>
                                            <a href="{{ url('client.delete-stock-request', $p_request->id) }}" class="btn btn-danger btn"><i class="bi bi-x-square"></i> </a>
                                        </div> --}}
                                    </td>
                                </tr>
                            </tbody>
                            <?php $count++; ?>
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
        $(function() {
            $('#toggle-two').bootstrapToggle({
                on: 'Approved',
                off: 'Not Approved'
            });
        })
    </script>



@endsection
