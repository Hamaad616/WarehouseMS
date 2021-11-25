@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('datatables/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

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

        #style-1::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        #style-1::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        #style-1::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: rgb(179, 174, 174);
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

    <div class="card shadow-lg p-3 mb-5 bg-body rounded border-0">
        <div class="card-body">

            <form id="fulfillment-form" method="POST" enctype="multipart/form-data" >
                @csrf
                <input id="client_id" type="hidden" value="{{ $client_id }}">

                <div class="row">
                    <div class="col-lg-8">
                        <br>
                        <br>
                    </div>

                    <div class="col-lg-4">
                        <label class="control-label" for="v_id"> Session</label>
                        <select type="text" class="form-control" id="session_id " name="session_id">
                            @foreach ($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->session_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="table-responsive" id="style-1">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>

                                        <td>

                                            <label class="control-label" for="v_id">Client</label>
                                            <select type="text" class="form-control" name="client_id" id="client_id"
                                                required="required">
                                                <!--                                                        <option value="0">Select school</option>';-->
                                                @foreach ($client_name as $client)
                                                    <option value="{{ $client->sch_id }}">{{ $client->sch_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <label class="control-label">Mode</label>
                                            <select type="text" class="form-control" name="mode" id="mode" tabindex="8"
                                                required="required">

                                                <option value="1" selected="selected">By Hand</option>
                                                <option value="2">Courier</option>

                                            </select>

                                        </td>

                                        <td>
                                            <label class="control-label" for="v_id">Warehouse</label>
                                            <select type="text" class="form-control" name="wh_id" id="wh_id" tabindex="8"
                                                required="required">
                                                <?php $wh = DB::table('clients')
                                                    ->where('sch_id', '=', $client_id)
                                                    ->pluck('warehouse_id'); ?>
                                                <?php $warehouse_name = DB::table('Warehouses')
                                                    ->where('wh_id', $wh)
                                                    ->get(); ?>
                                                @foreach ($warehouse_name as $warehouse)
                                                    <option value="{{ $warehouse->wh_id }}">{{ $warehouse->wh_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <label class="control-label " for="">Delivery Date</label>
                                            <input type="date" name="date" min="1000-01-01" max="3000-12-31"
                                                class="form-control">

                                        </td>
                                        <td>
                                            <label class="control-label " for="">P/O &nbsp; / &nbsp; Acknowledgment
                                                #</label>
                                            <input class="form-control" name="po" id="po" required="required" value=""
                                                spellcheck="false" data-ms-editor="true">

                                            <label class="control-label" style="display: none" id="courierSelect">Select
                                                Courier</label>
                                            <select type="text" class="form-control" name="couriers" id="couriers"
                                                tabindex="8" required="required" style="display: none">

                                                @foreach ($couriers as $courier)
                                                    <option value="{{ $courier->id }}">{{ $courier->courier_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </td>



                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <label class="control-label " for="">Remarks/Comments</label>
                                            <textarea class="form-control" name="remarks" id="remarks"
                                                placeholder=" Write remarks...." spellcheck="false"
                                                data-ms-editor="true"> </textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <br><br>

                            <div class="row">
                                <div class="col-lg-9"><br><br><br></div>
                                <div class="col-lg-3"><input id="search_product" type="number" class="form-control"
                                        placeholder="Search product by barcode"></div>
                            </div>

                            <div class="row justify-content-center">
                                <div id="searchResults" class="card shadow-lg p-3 mb-5 bg-body rounded border-0 col-lg-8"
                                    style="display: none">

                                    <a id="search-result" style="cursor: pointer">
                                        <table class="table table-borderless" id="search-table">
                                            <thead>
                                                <tr>
                                                    <th><label for="p_code" class="label-control"> Product Code </label>
                                                    </th>
                                                    <th><label for="p_name"> Product Name </label></th>
                                                </tr>
                                            </thead>

                                            <tbody>


                                                <tr>
                                                    <td>
                                                        <input type="text" name="product_code_search"
                                                            id="product_code-search" class="form-control" value=""
                                                            readonly>
                                                    </td>

                                                    <td>
                                                        <input type="text" name="product_name_search"
                                                            id="product_name-search" class="form-control" value=""
                                                            readonly>
                                                    </td>

                                                </tr>





                                            </tbody>

                                        </table>
                                    </a>


                                </div>

                            </div>



                            <div id="div1" style="display: none">
                                <div class="div1 table-responsive">
                                    <table class="table table-borderless" id="dynamic_table">
                                        <thead>
                                            <tr>
                                                <th><label for="p_code" class="label-control"> Product Code </label>
                                                </th>
                                                <th><label for="p_name"> Product Name </label></th>
                                                <th><label for="p_quantity">Quantity</label></th>
                                                <th><label for="action">Action</label></th>
                                            </tr>
                                        </thead>

                                        <tbody>




                                        </tbody>

                                    </table>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>

                <div class="d-grid gap-2 mt-2">
                    <button class="btn btn-success" type="success">Submit</button>
                </div>

            </form>
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
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('sweetalert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>

    {{-- <script>
        $(document).ready(function() {
            var client_id = $('#client_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '{{ route('client.all-products') }}',
                data: {
                    client_id: client_id
                },
                success: function(response) {
                    for (let i = 0; i < response.details.length; i++) {
                        $('#dynamic-table tbody').find('#product_code').val(response.details[i]
                            .pitem_code)
                        $('#dynamic-table tbody').find('#product_name').val(response.details[i]
                            .pitem_title)
                    }
                }

            }, 'json')
        })
    </script> --}}

    <script>
        $('#fulfillment-form').on('submit', function(e) {
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url: '{{ route('client.create-fulfillment') }}',
                method: "POST",
                data: $('#fulfillment-form').serialize(),
                success: function(response) {
                    if(response.code === 1){
                        toastr.success(response.msg)
                        $('#fulfillment-form')[0].reset()
                    }
                    else{
                        toastr.error(" Something went wrong! ")
                    }
                }
            })
        })
    </script>

    <script>
        $('#search_product').on('change', function() {
            var search_code = $(this).val()
            if (search_code == "") {
                $('#searchResults').css('display', 'none')
            } else {
                var client_id = $('#client_id').val()
                $.ajax({
                    url: '{{ route('searchProduct') }}',
                    method: 'get',
                    data: {
                        search_code: search_code,
                        client_id: client_id
                    },
                    success: function(response) {
                        console.log(response.details)
                        $('#searchResults').css('display', 'block')
                        for (let i = 0; i <= response.details.length; i++) {
                            $('#product_code-search').val(response.details[i]
                                .pitem_code)
                            $('#product_name-search').val(response.details[i]
                                .pitem_title)
                        }
                    }
                })
            }
        })

        $(document).on('click', '#search-result', function(e) {
            $('#div1').show()
            $('#searchResults').css('display', 'none')
            var product_code = $('#product_code-search').val()
            var product_name = $('#product_name-search').val()
            var totalRowCount = dynamic_table.rows.length;
            console.log(totalRowCount)

            for (let index = totalRowCount; index >= totalRowCount; index--) {
                $('#dynamic_table > tbody').append(
                    '<tr id="row' + index +
                    '"> <td><input type="text" name="product_code[]" id="product_code" class="form-control" value="' +
                    product_code +
                    '" readonly></td> <td><input type="text" name="product_name[]" id="product_name' + index +
                    '" class="form-control" value="' +
                    product_name +
                    '" readonly></td><td><input type="number" min="0" name="product_quantity[]" id="product_quantity' +
                    index + '" class="form-control" value="0"></td> <td> <a id="' + index +
                    '" href="javascript:void(0);" class="remCF btn btn-danger">X</a> </td> </tr>'
                )

            }

        })
    </script>

    <script>
        $(document).on('click', '.remCF', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            var totalRowCount = dynamic_table.rows.length;
            if (totalRowCount === 1) {
                $('#div1').css('display', 'none')
            }
        })
    </script>


    <script>
        $(document).on('change', '#mode', function() {

            var mode_val = +$(this).val()
            if (mode_val === 2) {
                $('#courierSelect').show()
                $('#couriers').show()
            } else {
                $('#courierSelect').css('display', 'none')
                $('#couriers').css('display', 'none')
            }
        })
    </script>



@endsection
