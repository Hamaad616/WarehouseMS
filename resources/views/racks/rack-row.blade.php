@extends("layouts.app")
@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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

        *,
        ::after,
        ::before {
            box-sizing: border-box;
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



    <div class="card">

        <h3 class="card-header">
            @foreach ($rack_name as $item)
                {{ $item }} rows
            @endforeach
        </h3>

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr style="background-color:#31869b;color: white">


                        <?php
                                                    if(session()->get("flag")=='1'){
                                                    ?>
                        <th>Bin Action</th>
                        <?php
                                                    }
                                                    ?>


                        <th>Row Name </th>
                        <th>Row Code</th>


                        <th>Dimension</th>


                        <?php
                                                    if(session()->get("flag")=='1'){
                                                    ?>
                        <!--                                    <th>Action</th>-->
                        <?php
                                                    }
                                                    ?>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
       


                            <tr>

                                <?php
                                                    if(session()->get("flag")=='1'){
                                                        $get_rows_bin_info=App\Http\Controllers\MainController::get_bin_info($user->wh_id,$user->rk_id,1);
                                                    ?>
                                <td style="width: 13%;">
                                    <?php 
                                                        if($get_rows_bin_info=='0'){
                                                        ?>
                                    <a href="{{ route('bin.add', ['wh_id' => $user->wh_id, 'rk_id' => $user->rk_id,'rk_name' => $user->row_name,'row_id'=>$user->id ,'row_code' => $user->row_code, 'width' => $user->Width, 'height' => $user->Height, 'depth' => $user->Depth]) }}"
                                        class=" btn btn-info"><span class="bi bi-plus-square" data-toggle="tooltip"
                                            title="Add new bin"></span></a>
                                    <?php
                                                        }
                                                        ?>
                                    <a href="{{ route('bin.edit', ['wh_id' => $user->wh_id, 'rk_id' => $user->rk_id,'rk_name' => $user->row_name, 'row_code' => $user->row_code, 'width' => $user->Width, 'height' => $user->Height, 'depth' => $user->Depth]) }}"
                                        class="btn btn-success"><span class="bi bi-pencil" data-toggle="tooltip"
                                            title="Edit"></span></a>
                                    <a href="{{ route('bin.delete', ['wh_id' => $user->wh_id, 'rk_id' => $user->rk_id,'rk_name' => $user->row_name, 'row_code' => $user->row_code, 'width' => $user->Width, 'height' => $user->Height, 'depth' => $user->Depth]) }}"
                                        class=" btn btn-primary"><span class="bi bi-eye" data-toggle="tooltip"
                                            title="View bin Info"></span></a>

                                </td>
                                <?php
                                                    }
                                                    ?>


                                <td>{{ $user->row_name }}</td>
                                <td>{{ $user->row_code }}</td>


                                <td>Row({{ $user->Width }}x{{ $user->Height }}x{{ $user->Depth }})
                                </td>





                                <?php
                                if(session()->get("flag")=='1'){
                                ?>
                                <!--                                    <td style="width: 13%;">
                                            
                                                <a href="add_rack?func=edit &wh_id={{ $wh_id }}&id=0" class="btn btn-success"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></span></a>
                                                <a href='chwhrst?rk_id={{ $user->rk_id }}&wh_id={{ $wh_id }}'onclick="return confirm('Are you sure?')"  class="btn btn-danger" ><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Remove"></span></a>
                                            </td>-->
                                <?php
                                }
                                ?>
                            </tr>
                        @endforeach

                </tbody>
            </table>

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


@endsection
