@extends('layouts.app')

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
                        <a style="text-decoration: none" href="{{ url('clients-home') }}" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Clients</span> </a>
                        <a style="text-decoration: none" href="{{ route('home') }}" class="nav_link">
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

    <?php
    $total_width = $width;
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8" style="margin-top:20px;">
                <div class="well">
                    <form action="{{ url('upt_bin') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-lg-8 col-lg-offset-2">

                                <span style="color:red; font-size: 16px; background-color: yellow">Row
                                    Total Width {{ $width }} Ft</span>
                                <input type="hidden" name="wh_id" id="wh_id" value="{{ $wh_id }}">
                                <input type="hidden" name="rk_id" id="rk_id" value="{{ $rk_id }}">
                                <input type="hidden" name="row_id" id="row_id" value="{{ $row_id }}">
                                {{-- <input type="hidden" name="bin_id" id="bin_id" value="{{ $bin_id }}"> --}}
                            <input type="hidden" name="row_code" id="row_code" value="{{ $row_code }}">
                            </div>
                        </div>
                        <div class="row" style="margin-left:20px;margin-right:20px;">
                            <div class="col-md-12">
                                <div class="mydiv table-responsive">
                                    <table class="table table-responsive table-bordered table-striped " id="dynamic_field">
                                        <tr>
                                            <th>Bin Name</th>

                                            <th>Width Ft</th>

                                            <th>Height Ft</th>

                                            <th>Depth Ft</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($row_bins as $bin)




                                            <tr>
                                                <td><input class="form-control" name="bin_name[]"
                                                        placeholder="Enter Bin Name" required
                                                        value="{{ $bin->bin_name }}" readonly=""></td>
                                                <input type="hidden" name="bin_code[]" id="row_code"
                                                    value="{{ $row_code }}-{{ $bin->bin_name }}">
                                                <td> <input class="form-control width" name="width[]" id="width"
                                                        placeholder="Enter Width" required value="{{ $bin->Width }}"
                                                        onkeypress="return isNumberKey(event,this)" autocomplete="off"
                                                        onchange="get_width_function({{ $total_width }})">
                                                </td>
                                                <td><input class="form-control" name="height[]" id="height"
                                                        placeholder="Enter Height" required value="{{ $bin->Height }}"
                                                        readonly=""></td>
                                                <td> <input class="form-control" name="depth[]" id="depth"
                                                        placeholder="Enter Depth" required value="{{ $bin->Depth }}"
                                                        readonly=""></td>
                                                <td><button type="button" name="remove" id=""
                                                        class="btn btn-danger btn_remove" style=" margin-top: 20px"
                                                        onclick="delbin('{{ $bin->wh_id }}','{{ $bin->rk_id }}','{{ $bin->row_id }}','{{ $bin->id }}')">X</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>

                                    <table class=" table table-responsive">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td style=" width: 9%"><button type="button" name="add" id="add"
                                                    class="btn btn-success bi bi-plus btn-lg"
                                                    style=" margin-top: 20px;font-size:20px"></button>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                    <div align="end">
                                        <button type="button" class="btn btn-danger"
                                            onclick="javascript:window.history.back()">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="submit"
                                            id="xxx">Submit</button><br>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col-md-5">

                                    <span style="color:red; font-size: 16px; background-color: yellow">All
                                        Measurement In Ft</span>
                                </div>
                            </div>

                    </form>
                </div>


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
        function get_width_function(row_width_main) {
            var sum = 0;
            var row_width = row_width_main;


            $('.width').each(function() {
                // alert($(this).val());
                sum += Number($(this).val());
            });




            if (row_width == sum) {

                //               shuld be 

                $('#xxx').siblings("span").text('Bin width equal to Row  width ');

                document.getElementById("xxx").disabled = false;

            } else {

                var remain = row_width - sum;
                $('#xxx').siblings("span").text(' Available Row  width ' + remain);


                document.getElementById("xxx").disabled = true;
            }

        }
    </script>
    <script type="text/javascript">
        function isNumberKey(evt, obj) {

            var charCode = (evt.which) ? evt.which : event.keyCode
            var value = obj.value;
            var dotcontains = value.indexOf(".") != -1;
            if (dotcontains)
                if (charCode == 46) return false;
            if (charCode == 46) return true;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <script>
        function delbin(wh_id1, rk_id1, row_id1, bin_id1) {
                var wh_id = wh_id1;
                var rk_id = rk_id1;
                var row_id = row_id1;
                var bin_id = bin_id1;

                $.ajax({
                    url: "{{ route('del_bin') }}",
                    method: "GET",
                    data: 'wh_id=' + wh_id + '&rk_id=' + rk_id + '&row_id=' + row_id + '&bin_id=' + bin_id,
                    success: function(data) {
                        alert(data);
                        if (data == 1) {
                            window.location.reload();
                            alert("Data Submitted");

                        }
                    }
                });
                //document.write(grn_data_id);
            }
            $(document).ready(function() {

                var i = 1;
                var heigh = document.getElementById('height').value;
                var depth = document.getElementById('depth').value;


                $('#add').click(function() {

                    var totalRowCount = dynamic_field.rows.length;

                    var j = +totalRowCount + +1 - 1;
                    $('#dynamic_field').append('<tr  id="row' + i +
                        '"><td><input class="form-control"  name="bin_name[]" placeholder="Enter Bin Name"required value="B' +
                        j +
                        '" readonly=""></td><td> <input class="form-control"  name="width[]" placeholder="Enter Width" required value="" ></td><td><input class="form-control"  name="height[]" placeholder="Enter height"required value="' +
                        heigh +
                        '" readonly=""></td> <td>  <input class="form-control"  name="depth[]" placeholder="Enter depth"required value="' +
                        depth + '" readonly=""></td><td><button type="button" name="remove" id="' + i +
                        '" class="btn btn-danger btn_remove" style=" margin-top: 5px">X</button></td></tr>');
                    i++;

                });
                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });

            });
    </script>

@endsection
