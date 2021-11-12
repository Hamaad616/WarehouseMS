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

            .show {
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
                        <a style="text-decoration: none" href="{{ url('home') }}" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a style="text-decoration: none" href="{{ url('clients-home') }}" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Clients</span> </a>
                        <a style="text-decoration: none" href="{{ url('home') }}" class="nav_link">
                            <i class="bi bi-house nav_icon"></i>
                            <span class="nav_name">Warehouses</span>
                        </a>

                        <div class="nav_list">

                            {{-- <a class="nav_link dropdown-toggle" style="text-decoration: none" href="#ItemDropdown"
                                aria-expanded="false" data-toggle="collapse">
                                <i class="bi bi-diagram-3 nav-icon"></i>
                                <span class="nav_name"><strong>Items</strong></span>
                            </a>
                            <li id="ItemDropdown" class="collapse">
                                @foreach ($client_items as $client_item)
                                    <a title="{{ $client_item->item_name }}" class="dropdown-item nav_link"
                                        href="{{ url('product-item-table/' . $client_item->item_id . '/' . $sch_id . '/' . $client_item->item_name) }}">
                                        <i style="color: #0a0a0a" class="bi bi-box"></i> <span
                                            style="color: #0a0a0a">{{ $client_item->item_name }}</span>
                                    </a>
                                @endforeach
                            </li> --}}


                        </div>

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
        <h3 class="card-header">
            Edit Item
        </h3>
        <div class="card-body">
            @foreach ($users as $user)
                <div class="container">
                    <div class="row">

                        <div id="error_msg"></div>
                        <div class="well">
                            <form action="{{ url('upt_product_item_cnfrm') }}" id="update_from" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input class="form-control" type="hidden" name="sch_id_id" value="{{ $user->client_id }}">
                                <input class="form-control" type="hidden" name="pitem_id"
                                    value="{{ $user->pitem_id }}">



                                <div class="row" style="margin-left:25px;">

                                    <div class="col-md-4">


                                        <div class="form-group">
                                            <label class="control-label " for="">Item Title</label>
                                            <input class="form-control" name="item_title" required="required"
                                                value="{{ $user->pitem_title }}">

                                        </div>
                                        <div class="form-group">


                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label " for="">Barcode Code</label>

                                            <input class="form-control" required name="code" onchange="check_code();"
                                                value="{{ $user->pitem_code }}" id="code">
                                            <span></span>
                                        </div>

                                    </div>
                                    <div class="col-md-4">


                                        <div class="form-group">
                                            <label class="control-label " for="">Internal Code</label>
                                            <input class="form-control" required name="in_code"
                                                value="{{ $user->in_code }}">
                                        </div>

                                    </div>

                                </div>





                                <div class="row" style="margin-left:25px;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label " for="">Height - inces</label>
                                            <input class="form-control" required name="height"
                                                value="{{ $user->height }}">
                                        </div>

                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label " for="">Weight</label>
                                            <input class="form-control" required name="weight"
                                                value="{{ $user->weight }}">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label " for="">Width - inches</label>
                                            <input class="form-control" required name="width"
                                                value="{{ $user->width }}">
                                        </div>

                                    </div>
                                </div>
                                <div class="row" style="margin-left:25px;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label " for="">Length - inches</label>
                                            <input class="form-control" required name="length"
                                                value="{{ $user->length }}">
                                        </div>
                                    </div>


                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label class="control-label " for="">Product Image</label>
                                            <input type="file" id="inputFile4" name="logo" required
                                                value="{{ $user->img }}" class="form-control">

                                        </div>

                                    </div>

                                    <div class="col-md-4"></div>
                                </div>
                                {{-- <div class="row" style="margin-left:25px;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!--checkboxes-->
                                            <label class="control-label" style=" color: blue"><strong><u>Item
                                                        Handling Fee Plan</u></strong></label>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- <div class="row" style="margin-left:25px;">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!--checkboxes-->
                                            <label class="control-label">
                                                <input type="radio" name="fee_plan" value="1">
                                                Flat Rate
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                <input type="radio" name="fee_plan" value="2">
                                                Incremental Rate
                                            </label>
                                        </div>
                                    </div>

                                </div> --}}
                                {{-- <div class="row" style="margin-left:25px;">

                                    <div class="col-md-4">

                                        <!--Divisions to be shown and hidden-->
                                        <div class="1 box" style="display: none">


                                            <div class="form-group">

                                                <input class="form-control" name="fl_rate" placeholder=" Enter Flat Rate "
                                                    value="{{ $user->fl_rate }}">
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="2 box" style="display: none">


                                            <div class="mydiv table-responsive">
                                                <table class="table table-responsive table-bordered table-striped "
                                                    id="dynamic_field">
                                                    <tr>
                                                        <th>Start</th>

                                                        <th>End</th>

                                                        <th>Fee</th>


                                                        <th></th>
                                                    </tr>






                                                    <tr>
                                                        <td><input class="form-control" name="start[]" id=""
                                                                placeholder="Enter Value 1" value="0"></td>
                                                        <td><input class="form-control" name="end[]" id="width"
                                                                placeholder="Ente Value 2" value=""></td>
                                                        <td><input class="form-control height" name="fee[]" id="height"
                                                                placeholder="Enter Fee" value="" autocomplete="off"
                                                                onkeypress="return isNumberKey(event,this)"> </td>

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
                                </div> --}}



                                {{-- <?php


                        }else if ($user->item_type == 'NG') {
                        ?>


                            <div class="row" style="margin-left:25px;">



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label " for="">Edition</label>
                                        <input class="form-control" required name="edition"
                                            value="{{ $user->edition }}">
                                    </div>



                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label " for="">Length - inches</label>
                                        <input class="form-control" required name="length"
                                            value="{{ $user->length }}">
                                    </div>
                                </div>
                            </div>





                            <div class="row" style="margin-left:25px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label " for="">Width - inches</label>
                                        <input class="form-control" required name="width"
                                            value="{{ $user->width }}">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label " for="">Height - inces</label>
                                        <input class="form-control" required name="height"
                                            value="{{ $user->height }}">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label " for="">Weight</label>
                                        <input class="form-control" required name="weight"
                                            value="{{ $user->weight }}">
                                    </div>

                                </div>
                            </div>
                            <div class="row" style="margin-left:25px;">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="control-label " for="">Product Image</label>
                                        <input type="file" id="inputFile4" name="logo" required
                                            value="{{ $user->img }}" class="form-control">

                                    </div>

                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                            </div>



                            <?php

                        }else{ ?>


                            <div class="row" style="margin-left:25px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label " for="">Width - inches</label>
                                        <input class="form-control" required name="width"
                                            value="{{ $user->width }}">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label " for="">Height - inces</label>
                                        <input class="form-control" required name="height"
                                            value="{{ $user->height }}">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label " for="">Weight</label>
                                        <input class="form-control" required name="weight"
                                            value="{{ $user->weight }}">
                                    </div>

                                </div>
                            </div>
                            <div class="row" style="margin-left:25px;">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label " for="">Length - inches</label>
                                        <input class="form-control" required name="length"
                                            value="{{ $user->length }}">
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="control-label " for="">Product Image</label>
                                        <input type="file" id="inputFile4" name="logo" required
                                            value="{{ $user->img }}" class="form-control">

                                    </div>

                                </div>
                                <div class="col-md-4"></div>
                            </div>

                            <?php }?> --}}





                                <div class="row">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <div align="end">
                                            <a class="btn btn-danger btn-md" onclick="javascript: window.history.back()">
                                                <span class="bi bi-x-lg"></span>
                                                Cancel
                                            </a>
                                            <button type="submit" id="" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>



                    </div>
                </div>
            @endforeach

        </div>
    </div>

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
@endsection
