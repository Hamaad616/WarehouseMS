@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

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

        .show1 {
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

                        <a style="text-decoration: none" href="{{ route('home') }}" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>

                        <a style="text-decoration: none" href="{{ route('home') }}" class="nav_link">
                            <i class="bi bi-house nav_icon"></i>
                            <span class="nav_name">Warehouses</span>
                        </a>

                        <a style="text-decoration: none" href="{{ url('clients-home/warehouse', [$warehouse_id]) }}" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Clients</span> </a>


                        <a style="text-decoration: none" href="{{ route('vendors') }}" class="nav_link">
                            <i class="bi bi-people nav_icon"></i>
                            <span class="nav_name">Vendors</span>
                        </a>



                        <a style="text-decoration: none" href="{{ url('add-categories') }}" class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Categories</span>
                        </a>

                        <a style="text-decoration: none" href="{{ route('units') }}" class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Units</span>
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


        <div class="card">
            <h3 class="card-header">
                Clients

                {{-- <a style="float: right" href="{{ route('client.view') }}" title="Add new client"><i
                        class="bi bi-plus-square"></i></a> --}}

                <a style="float: right" href="{{ url('c-reg/warehouse', [$warehouse_id]) }}" title="Add new client"><i
                        class="bi bi-plus-square"></i></a>
            </h3>



            @if (count($clients) > 0)
                <div id="card-body" class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            @foreach ($clients as $item)
                                <tbody>
                                    <tr>
                                        <td>

                                            <a
                                                href="{{ route('client.profile', ['client_id' => $item->sch_id]) }}">{{ $item->sch_name }}</a>
                                        </td>
                                        <td>
                                            <div class="btn-group">

                                                {{-- <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Client Details" class="btn btn-info"
                                                    href="{{ route('client.view-more', ['sch_id' => $item->sch_id, 'sch_name'=>$item->sch_name]) }}"><i
                                                        class="bi bi-person-lines-fill"></i></a> --}}


                                                <a class="btn btn-secondary" id="editUserCreds" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit Client Password"
                                                    data-id={{ $item->sch_id }}><i class="bi bi-people"></i></a>
                                                <a class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="View Client Products"
                                                    href="{{ route('client-details', $item->sch_id) }}"> <i
                                                        class="bi bi-diagram-3"></i> </a>
                                                <a class="btn btn-primary" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Edit Client Details"
                                                    href="{{ route('client.edit', ['sch_id' => $item->sch_id, 'sch_name' => $item->sch_name]) }}"><i
                                                        class="bi bi-pen"></i></a>
                                                <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="right"
                                                    title="Delete Client"
                                                    href="{{ route('client.delete', $item->sch_id) }}"><i
                                                        class="bi bi-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
            @else

                <div class="card-body">
                    <i class="bi bi-exclamation-triangle"> &nbsp;&nbsp;&nbsp;Sorry, you don't have any clients yet!</i>
                </div>

            @endif

        </div>
    </div>

    @include('clients.editUserCredsModal')
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
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>

    <script>
        toastr.options.preventDuplicates = true;
        $(document).on('click', '#editUserCreds', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var edit_id = $(this).data('id')
            $('.editClient').find('form')[0].reset()
            $('.editClient').find('span.error-text').text('')
            $.post('<?= route('client.edit-creds') ?>', {
                edit_id: edit_id
            }, function(data) {
                // alert(data.details.vend_name)
                $('.editClient').find('input[name="client_id"]').val(data.details.sch_id)
                $('.editClient').find('input[name="client_email"]').val(data.details
                    .client_email)

                $('.editClient').modal('show')
            }, 'json')
        })


        $('#client-update-creds-form').on('submit', function(e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault()

            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },

                success: function(data) {
                    console.log(data)
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0])
                        });
                    } else {
                        $('.editClient').modal('hide')
                        $('.editClient').find('form')[0].reset()
                        toastr.success(data.msg)
                        $("#card-body").load(location.href + " #card-body");
                    }
                }
            })

        })
    </script>

@endsection
