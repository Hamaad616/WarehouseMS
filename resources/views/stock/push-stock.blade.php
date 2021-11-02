@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
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

                        <a style="text-decoration: none" href="{{ url('client-details') }}" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Clients</span> </a>


                        <a style="text-decoration: none" href="{{ route('categories') }}" class="nav_link">
                            <i class="bi bi-card-list nav_icon"></i>
                            <span class="nav_name">Categories</span>
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

    <div class="modal-header">
        <!--<span class=" label label-warning">Remaining = <?php //echo $rem;
?>&nbsp;&nbsp;&nbsp;</span>-->
        <h4 class="modal-title"><span class=" badge badge-info">GRN # <?php echo $grnd_id; ?></span>&nbsp;&nbsp;&nbsp;<span
                class="badge badge-warning">Product barcode = <?php echo $grnd_code; ?></span>&nbsp;&nbsp;&nbsp;<span
                class="badge badge-success">Total Qty = <?php echo $qty; ?></span>&nbsp;&nbsp;&nbsp;<span
                class=" badge badge-secondary"> Length = <?php echo $length; ?></span>&nbsp;&nbsp;&nbsp;</span><span
                class=" badge badge-danger"> Width = <?php echo $pwidth = $width; ?>&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;<span
                class="badge badge-primary"> Height = <?php echo $height; ?></span>&nbsp;&nbsp;&nbsp;<span
                class=" badge badge-info"> Cuft = <?php echo $length * $height * $width; ?></span></h4>

    </div>


    <div class="modal-body">

        <div class="container">
            <div class="row">



                <div class="col-md-4" style="margin-top:20px;">
                    <form id="add_name" method="post">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="control-label " for="">Product Code</label>
                            <input class="form-control" name="code" id="code" required="required"
                                value="{{ $grnd_code }}" readonly="readonly">
                            <input class="form-control" type="hidden" name="grnd_id" id="grn_id"
                                value="{{ $grnd_id }}">
                            <input class="form-control" type="hidden" name="code" value="{{ $grnd_code }}">
                            <input class="form-control" type="hidden" name="client_id" value="{{ $sch_id }}">
                            <input type="hidden" class="form-control" name="product_name" value="{{ $product_name }}">
                        </div>


                        <div class="form-group">
                            <label class="control-label " for="">Quantity</label>
                            <input class="form-control" name="quantity" required id="quantity"
                                onblur="grnqty_function({{ $rem }});" value="<?php echo $qty; ?>">
                            <span></span>
                        </div>







                        <div class="form-group">

                            <input type="hidden" name="grnd_id" class="form-control" required
                                value="{{ $grnd_id }}">
                            <input type="hidden" name="rem" class="form-control" required value="{{ $rem }}">
                            <label class="control-label" for="">Item size in CUFT</label>
                            <input class="form-control" type="text" name="item_space" id="item_size"
                                onblur="check_rack_size()" value="{{ $length * $height * $width }}">
                            <label class="control-label" for="">Rack Code</label>
                            <input type="text" name="rk_code" id="rk_code" class="form-control" required
                                onblur="check_rack();" value="">
                            <span></span>
                        </div>
                        <div class="modal-footer">
                            <input type="button" name="submit" id="submit" class="btn btn-info btn-md" value="Submit"
                                onclick="Submit_stock();" />
                            <button type="button" class="btn btn-danger"
                                onclick="javascript:window.history.back()">Cancel</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    </div>


    <script>
        function grnqty_function(rem) {
            //        var quantity   = $('#qty').val();
            var quantity = document.getElementById('quantity').value;


            if (quantity <= rem) {
                username_state = true;
                $('#quantity').parent().removeClass();
                $('#quantity').parent().addClass("form_success");
                $('#quantity').siblings("span").text('Yes Product Qty Available');
                document.getElementById("xxx").disabled = false;


            } else {
                username_state = false;
                $('#quantity').parent().removeClass();
                $('#quantity').parent().addClass("form_error");
                $('#quantity').siblings("span").text('Sorry... Product Qty Greater then Remaining Qty ');
                document.getElementById("xxx").disabled = true;
            }

        }

        function check_rack() {
            var code1 = $('#rk_code').val();
            var item_size = $('#item_size').val();
            alert(code1)
            //document.write(code1);
            $.ajax({
                url: '{{ route('check_rack') }}',
                type: "GET",
                data: {
                    'rk_code': code1,
                    'item_size': item_size
                },
                success: function(data) {


                    $('#rk_code').parent().removeClass();
                    $('#rk_code').parent().addClass("form_error");
                    $('#rk_code').siblings("span").text(data);

                    // if(data != null){
                    //     $('#check_rack').show();
                    //     $('#check_rack').html('Found');
                    // }
                    // else{
                    //     $('#check_rack').hide();
                    //     $('#check_rack_false').show();
                    //     $('#check_rack').html('Not found'); 
                    // }

                }
            });

        }

        function check_rack_size() {
            var code1 = $('#rk_code').val();
            var item_size = $('#item_size').val();
            //document.write(code1);
            $.ajax({
                url: '{{ route('check_rack_size') }}',
                type: "GET",
                data: {
                    'rk_code': code1,
                    'item_size': item_size
                },
                success: function(data) {

                    if (data == 0) {
                        $('#submit').prop('disabled', true)
                        $('#rk_code').siblings("span").text("Sorry the item size exceeded the rack size");
                        $("#item_size").css("border-color", "#FF0000 "); //red
                    } else {
                        $('#submit').prop('disabled', false)
                        $('#rk_code').parent().removeClass();
                        $('#rk_code').parent().addClass("form_error");
                        $("#item_size").css("border-color", "#00CC00"); //green
                        $('#rk_code').siblings("span").text("Item can be added to rack");
                        // if(data != null){
                        //     $('#check_rack').show();
                        //     $('#check_rack').html('Found');
                        // }
                        // else{
                        //     $('#check_rack').hide();
                        //     $('#check_rack_false').show();
                        //     $('#check_rack').html('Not found'); 
                        // }

                    }
                }
            });

        }

        function Submit_stock() {

            $.ajax({
                url: '{{ route('confirm-grn') }}',
                type: "get",
                data: $('#add_name').serialize(),
                success: function(data) {
                    alert(data);
                }
            });
        }
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
