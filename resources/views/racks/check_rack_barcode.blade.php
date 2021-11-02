{{--@extends('layouts.app')--}}
{{--@section('content')--}}


{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">--}}
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" id="bootstrap-css">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
<!-- Theme style -->
{{--<link rel="stylesheet" href="dist/css/AdminLTE.min.css">--}}
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
{{--<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">--}}
<!-- Morris chart -->
<link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
{{--<!-- bootstrap wysihtml5 - text editor -->--}}
{{--<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">--}}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">
    /*Styling for errors on form*/
    .form_error span {
        width: 80%;
        height: 35px;
        margin: 3px 10%;
        font-size: 1.1em;
        color: #D83D5A;
    }

    .form_error input {
        border: 1px solid #D83D5A;
        display: block;

        width: 100%;

        height: 34px;

        padding: 6px 12px;

        font-size: 14px;

        line-height: 1.42857143;

        color: #555;

        background-color: #fff;

        background-image: none;

        border: 1px solid #ccc;
    }

    /*Styling in case no errors on form*/
    .form_success span {
        width: 80%;
        height: 35px;
        margin: 3px 10%;
        font-size: 1.1em;
        color: green;
    }

    .form_success input {
        border: 1px solid green;
        display: block;

        width: 100%;

        height: 34px;

        padding: 6px 12px;

        font-size: 14px;

        line-height: 1.42857143;

        color: #555;

        background-color: #fff;

        background-image: none;

        border: 1px solid #ccc;
    }

    #error_msg {
        color: red;
        /*  text-align: center;*/
        /*  margin: 10px auto;*/
    }



    .card {

        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;

    }


    .text-white {

        color: #fff !important;

    }

    .p-4 {

        padding: 1.5rem !important;

    }

    .flex-row-reverse {

        -ms-flex-direction: row-reverse !important;
        flex-direction: row-reverse !important;

    }

    .d-flex {

        display: -ms-flexbox !important;
        display: flex !important;

    }

    .bg-dark {

        background-color: #343a40 !important;

    }


    .p-0 {

        padding: 0 !important;

    }

    .card-body {

        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;

    }

    * {

        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;

    }

    .p-5 {

        padding: 2rem !important;

    }

    .rainbow {
        background-image: -webkit-gradient(linear, left top, right top, color-stop(0, #f22), color-stop(0.15, #f2f), color-stop(0.3, #22f), color-stop(0.45, #2ff), color-stop(0.6, #2f2), color-stop(0.75, #2f2), color-stop(0.9, #ff2), color-stop(1, #f22));
        color: transparent;
        -webkit-background-clip: text;

    }

    .printMe {
        page-break-after: always;

    }

    .printMe:last-child {
        page-break-after: auto;
    }

    @media print {

        html,
        body {
            margin: 0 0 0 0;
            height: 99% !important;
        }

        .printMe {
            height: 100vh;
            page-break-after: always;
        }
    }

</style>

<style type="text/css" media="print">
    @media print {

        html,
        body {
            margin: 0 0 0 0;
            height: 99% !important;
        }

        .printMe {
            height: 100vh;
            page-break-after: always;
        }

    }

    .new1 {
        border-top: 1px solid red;
    }

</style>

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

        hr.new2 {
            border-top: 1px dashed red;
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





{{--    <header class="header" id="header">--}}

{{--        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i></div>--}}
{{--        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>--}}
{{--    </header>--}}
{{--    <div class="l-navbar" id="nav-bar">--}}
{{--        <nav class="nav">--}}
{{--            <div>--}}
{{--                <div class="nav_list">--}}
{{--                    <a style="text-decoration: none" href="#" class="nav_link active">--}}
{{--                        <i class='bx bx-grid-alt nav_icon'></i>--}}
{{--                        <span class="nav_name">Dashboard</span> </a>--}}
{{--                    <a style="text-decoration: none" href="{{ url('clients-home') }}" class="nav_link">--}}
{{--                        <i class='bx bx-user nav_icon'></i>--}}
{{--                        <span class="nav_name">Clients</span> </a>--}}
{{--                    <a style="text-decoration: none" href="#" class="nav_link">--}}
{{--                        <i class="bi bi-house nav_icon"></i>--}}
{{--                        <span class="nav_name">Warehouses</span>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @guest--}}

{{--                @if (Route::has('login'))--}}
{{--                    <div class="nav_item">--}}
{{--                        <a class="nav_link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                @if (Route::has('register'))--}}
{{--                    <div class="nav_item">--}}
{{--                        <a class="nav_link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @else--}}
{{--                <a style="text-decoration: none" class="nav_link" href="{{ route('logout') }}"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                                                                                                     document.getElementById('logout-form').submit();">--}}

{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                        @csrf--}}
{{--                    </form><i class='bx bx-log-out nav_icon'></i> <span class="nav_name"> {{ __('Logout') }}</span>--}}
{{--                </a>--}}

{{--            @endguest--}}

{{--        </nav>--}}
{{--    </div>--}}




    <body class="hold-transition skin-blue">
    <div class="container">
        @foreach ($users as $user)

            <div class="row" id='printMe' class="printMe">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row p-5">
                                <br>

                                <b>Rack Barcode</b><br><br>


                                <img style="width: 20%" src="data:image/png;base64,{{ DNS1D::getBarcodePNG($user->rack_code, 'C128A', 1, 33) }}" alt="{{ $user->rack_code }}" />
                                <br>
                                <span style="text-align: left">{{ $user->rack_code }}</span>
                                <br>
                                <hr style="border-top: dashed 0.2rem red">
                                <br>

                                <?php

                                $getrowinfo=App\Http\Controllers\MainController::grn_rack_rows($user->rk_id);
                                if (!empty($getrowinfo)) {
                                ?>

                                @foreach ($getrowinfo as $user)

                                    <b>Row Barcode</b>
                                    <br>
                                    <br>
                                    <span> <img
                                            src="data:image/png;base64,{{ DNS1D::getBarcodePNG($user->row_code, 'C128A', 2, 33) }}"
                                            alt="{{ $user->row_code }}" /></span>
                                    <br>
                                    <span style="text-align: center">{{ $user->row_code }}</span>
                                    <br>
                                    <br>

                                    <b>Bin Barcode</b><br><br>

                                    <?php
                                    $getbininfo=App\Http\Controllers\MainController::grn_rack_bins($user->row_id);
                                    if (!empty($getbininfo)) {
                                    ?>


                                    @foreach ($getbininfo as $user2)


                                        <br>
                                        <span> <img
                                                src="data:image/png;base64,{{ DNS1D::getBarcodePNG($user2->bin_code, 'C128A', 2, 33) }}"
                                                alt="{{ $user2->bin_code }}" /></span>
                                        <br>
                                        <span style="text-align: center">{{ $user2->bin_code }}</span>
                                        <br>




                                    @endforeach
                                    <?php
                                    }
                                    ?>
                                    <hr style="border-top: 2px solid  blue">

                                @endforeach
                                <?php
                                }
                                ?>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <br>




            <div  class="row text-light mt-5 mb-5 text-center">
                <img title="Go back" src="{{asset('img/arrow-left.svg')}}" onclick="returnBack()" style="width:50px; cursor: pointer; margin-right: 20px" alt="Back Button">
                <img title="Print the barcodes" src="{{asset('img/print-icon.png')}}"
                     onclick="printDiv('printMe')" style=" width: 50px; cursor: pointer;">

            </div>
            <br><br><br><br>

        @endforeach

    </div>
    </body>


{{--    <script>--}}
{{--        document.addEventListener("DOMContentLoaded", function(event) {--}}

{{--            const showNavbar = (toggleId, navId, bodyId, headerId) => {--}}
{{--                const toggle = document.getElementById(toggleId),--}}
{{--                    nav = document.getElementById(navId),--}}
{{--                    bodypd = document.getElementById(bodyId),--}}
{{--                    headerpd = document.getElementById(headerId)--}}

{{--                // Validate that all variables exist--}}
{{--                if (toggle && nav && bodypd && headerpd) {--}}
{{--                    toggle.addEventListener('click', () => {--}}
{{--                        // show navbar--}}
{{--                        nav.classList.toggle('show')--}}
{{--                        // change icon--}}
{{--                        toggle.classList.toggle('bx-x')--}}
{{--                        // add padding to body--}}
{{--                        bodypd.classList.toggle('body-pd')--}}
{{--                        // add padding to header--}}
{{--                        headerpd.classList.toggle('body-pd')--}}
{{--                    })--}}
{{--                }--}}
{{--            }--}}

{{--            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')--}}

{{--            /*===== LINK ACTIVE =====*/--}}
{{--            const linkColor = document.querySelectorAll('.nav_link')--}}

{{--            function colorLink() {--}}
{{--                if (linkColor) {--}}
{{--                    linkColor.forEach(l => l.classList.remove('active'))--}}
{{--                    this.classList.add('active')--}}
{{--                }--}}
{{--            }--}}
{{--            linkColor.forEach(l => l.addEventListener('click', colorLink))--}}

{{--            // Your code to run since DOM is loaded and ready--}}
{{--        });--}}
{{--    </script>--}}

    <script>
        function printDiv(divName) {

            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

        function returnBack(){
            window.history.back();
        }
    </script>
{{--@endsection--}}
