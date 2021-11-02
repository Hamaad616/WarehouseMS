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
                        <a style="text-decoration: none" href="#" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a style="text-decoration: none" href="{{ url('clients-home') }}" class="nav_link">
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

    <div class="container">

    <div class="card">

        <h3 class="card-header">Edit Warehouse</h3>

        <div class="card-body">

            <div class="row">
                <div class="col-md-1">

                </div>

                <div class="col-md-10" style="margin-top:20px;">
                    <div class="well">
                        <form action="{{ route('warehouse.update') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                            @csrf
                            @foreach ($warehouses as $item)
                            <div class="row" style="margin-left:25px;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label " for="">Code</label>
                                        <input class="form-control" name="wh_code" value="{{ $item->wh_code }}" required="" spellcheck="false" data-ms-editor="true">
                                        <input class="form-control" name="wh_id" type="hidden" value="{{ $wh_id }}" required="">
                                    </div>

                                </div>
                            </div>
                            <div class="row" style="margin-left:25px;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label " for="">Warehouse Name</label>
                                        <input class="form-control" name="wh_name" value="{{ $item->wh_name }}" required="" spellcheck="false" data-ms-editor="true">
                                    <editor-squiggler><style>
                                    @media print {
                                    .ms-editor-squiggles-container {
                                    display:none !important;
                                    }
                                    }
                                    .ms-editor-squiggles-container {
                                    all: initial;
                                    }</style><div class="ms-editor-squiggles-container"></div></editor-squiggler></div>

                                </div>
                            </div>
                            <div class="row" style="margin-left:25px;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label " for="">Contact Person Name</label>
                                        <input class="form-control" name="wh_person" value="{{ $item->wh_person }}" required="" spellcheck="false" data-ms-editor="true">
                                    </div>

                                </div>
                            </div>
                            <div class="row" style="margin-left:25px;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label " for="">Email</label>
                                        <input class="form-control" type="email" name="wh_email" value="{{ $item->wh_email }}" required="">
                                    </div>

                                </div>
                            </div>
                            <div class="row" style="margin-left:25px;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label " for="">Number</label>
                                        <input class="form-control" name="wh_number" value="{{ $item->wh_phone }}" required="">
                                    </div>

                                </div>
                            </div>
                            <div class="row" style="margin-left:25px;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label " for="">Address</label>
                                        <input class="form-control" name="wh_address" value="{{ $item->wh_address }}" required="" spellcheck="false" data-ms-editor="true">
                                    <editor-squiggler><style>
                                        @media print {
                                        .ms-editor-squiggles-container {
                                        display:none !important;
                                        }
                                        }
                                        .ms-editor-squiggles-container {
                                        all: initial;
                                        }</style><div class="ms-editor-squiggles-container"></div></editor-squiggler></div>

                                </div>
                            </div>

                                
                            @endforeach

                            <div class="row">
                                <div class="col-md-8">
                                    <div align="end">
                                        <button type="button" class="btn btn-danger" onclick="javascript:window.location = 'warehouse'">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>


                </div>
            </div>

        </div>

    </div>
</div>


    @endsection