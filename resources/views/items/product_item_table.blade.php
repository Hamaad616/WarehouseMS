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

        .btn-xlarge {
            padding: 18px 28px;
            font-size: 22px; //change this to your desired size
            line-height: normal;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
        }

    </style>


    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt="image"> </div>
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



                        <a class="nav_link dropdown-toggle" style="text-decoration: none" href="#StockDropdown"
                            aria-expanded="false" data-toggle="collapse">
                            <i class="bi bi-bar-chart-steps"></i>
                            <span class="nav_name"><strong>Stock</strong></span>
                        </a>
                        <li id="StockDropdown" class="collapse">
                            
                                <a title="GRN" class="dropdown-item nav_link"
                                    href="{{ route('grn.view', $sch_id) }}">
                                    <i style="color: #0a0a0a" class="bi bi-card-checklist"></i> <span
                                  style="color: #0a0a0a">GRN</span>
                                </a>

                                <a title="Stock In" class="dropdown-item nav_link"
                                    href="{{ url('stock-in') }}">
                                    <i style="color: #0a0a0a" class="bi bi-pencil"></i> <span
                                  style="color: #0a0a0a">Stock In</span>
                                </a>
                          
                        </li>

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

        <h3 class="card-header">{{ $item_name }} <small>items</small></h3>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped example1">
                    <thead>
                        <tr style="background-color:#2f54c4;color: white">
                            <th>SR #</th>
                            <th>BarCode</th>
                            <th>Internal code</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @foreach ($users as $item)
                        <tbody>
                            <tr>
                                <td>{{ $item->pitem_id }}</td>
                                <td>{{ $item->pitem_code }}</td>
                                <td>{{ $item->in_code }}</td>
                                <td>{{ $item->pitem_title }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn" data-toggle="modal"
                                            data-target="#_{{ $item->pitem_id }}"><span
                                                class=" btn btn-success bi bi-eye" data-toggle="tooltip"
                                                title="View Item Info"></span></a>
                                        <div class="modal fade" id="_<?php echo $item->pitem_id; ?>" role="dialog">
                                            <div class="modal-dialog modal-lg" style="width:1250px;">
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">×</button>
                                                            <h4 class="modal-title" style=" text-align: center"> <strong>





                                                                    <?php
                                                                    $users1 = App\Http\Controllers\MainController::get_schname($item->pitem_id);
                                                                    
                                                                    ?>

                                                                    @foreach ($users1 as $user1)

                                                                        {{ $user1->sch_name }}
                                                                    @endforeach

                                                                </strong></h4>

                                                        </div>
                                                        <div class="modal-body">
                                                            <div class=" container">
                                                                <div class="row">
                                                                    <div class=" col-lg-12">
                                                                        <table
                                                                            class=" table table-responsive table-condensed table-bordered"
                                                                            style=" margin-top: 20px; border: none">
                                                                            <tr>
                                                                                <td style=" width: 50%">
                                                                                        <img src="{{ asset('uploads/' . $item->img) }}" style=" width: 500px" />
                                                                                </td>
                                                                                <td style=" width: 60%">
                                                                                    <table
                                                                                        class="table table-bordered table-dark">
                                                                                        <tr>


                                                                                            <td colspan="2"
                                                                                                style=" color:blue">
                                                                                                <strong>Item Info</strong>
                                                                                            </td>




                                                                                        </tr>
                                                                                        <tr>


                                                                                            <td><strong>Title</strong></td>
                                                                                            <td>{{ $item->pitem_title }}
                                                                                            </td>


                                                                                        </tr>



                                                                                        <tr>
                                                                                            <td><strong>Barcode</strong>
                                                                                            </td>
                                                                                            <td>{{ $item->pitem_code }}
                                                                                            </td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Internal
                                                                                                    Code</strong></td>
                                                                                            <td>{{ $item->in_code }}</td>
                                                                                        </tr>



                                                                                        <tr>
                                                                                            <td><strong>Length</strong></td>
                                                                                            <td>{{ $item->length }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Width</strong></td>
                                                                                            <td>{{ $item->width }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Height</strong></td>
                                                                                            <td>{{ $item->height }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><strong>Weight</strong></td>
                                                                                            <td>{{ $item->weight }}</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                    <table
                                                                                        class="table table-bordered table-dark">
                                                                                        <tr>
                                                                                            <td colspan="2"
                                                                                                style=" color:blue">
                                                                                                <strong>Fee handling
                                                                                                    Plan</strong>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <?php
                                                                                        $plan = App\Http\Controllers\MainController::get_fee_plan($item->pitem_id);
                                                                                        ?>

                                                                                        @foreach ($plan as $plan1)
                                                                                            <tr>
                                                                                                <td><strong>{{ $plan1->start }}-{{ $plan1->end }}</strong>
                                                                                                </td>
                                                                                                <td>{{ $plan1->fee }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach


                                                                                    </table>
                                                                                </td>
                                                                            </tr>
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
                                                                                <?php
                                                                                 $users6=App\Http\Controllers\MainController::getproduct_item_table1($item->pitem_id);
                                                                                foreach($users6 as $user6){

                                                                                ?>
                                                                                <tr>
                                                                                    <td><strong>{{ $user6->rk_code }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ $user6->rk_location }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ $user6->quantity }}</strong>
                                                                                    </td>

                                                                                </tr>
                                                                                <?php
                                                                                }
                                                                                ?>
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
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
