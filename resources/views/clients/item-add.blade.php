@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>

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

        <h3 class="card-header">Add Client Products</h3>

        <div class="card-body">

            <div class="container">
                <div class="row">

                    <div id="error_msg"></div>
                    <div class="well">

                        <form action="{{ route('item.create') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row" style="margin-left:25px;">

                                <input type="hidden" name="client_id" value="{{ $sch_id }}">

                                <label for="" class="lable-control">Product Name
                                    <input class="form-control" type="text" name="product_name">
                                </label>

                                <label for="" class="lable-control">Categories
                                    <select class="form-control" name="category_id" id="category">
                                        <option selected="" disabled>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </label>

                                <label class="label-control">Subcategories</label>
                                <div id="sub_cats" class="form-group">

                                    <select class="form-control" name="subcategory" id="subcategory">
                                        <option selected="" value="" disabled="">No Subcategory</option>
                                    </select>
                                </div>


                                <label class="label-control"> Units
                                    <select class="form-control" name="units" id="units">
                                        <option selected="" disabled>Select Unit</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </label>

                                <label for="" class="lable-control">Internal Code
                                    <input class="form-control" type="text" name="internal_code">
                                </label>

                                <label for="" class="lable-control">Product Barcode
                                    <input class="form-control" type="text" name="product_barcode">
                                </label>

                                <label for="" class="lable-control">Product Picture
                                    <input class="form-control" type="file" name="product_file">
                                </label>

                                <label for="" class="lable-control">Height-inches
                                    <input class="form-control" type="number" name="p_height">
                                </label>

                                <label for="" class="lable-control">Widht-inches
                                    <input class="form-control" type="number" name="p_width">
                                </label>

                                <label for="" class="lable-control">Depth-inches
                                    <input class="form-control" type="number" name="p_depth">
                                </label>

                                <label for="" class="lable-control">Weight (Grams)
                                    <input class="form-control" type="number" name="p_weight">
                                </label>

                                <div class="row" style="margin-left:25px;">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                </div>

                            </div>
                            <br>

                            <div class="d-grid">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>

                        </form>
                    </div>

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
        $('#category').on('change', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var cat_id = e.target.value;
            $.ajax({
                url: "{{ route('subcat') }}",
                type: "get",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "cat_id": cat_id
                },
                success: function(data) {
                    $('#subcategory').empty();
                    $('#subcategory').append('<option value="">choose Sub Category</option>');
                    if ((data.subcategories).length === 0) {
                        $('#subcategory').append(
                            '<option id="edit-sub-cat" selected ="selected" disabled>No subcategory</option>'
                            );
                    }
                    $.each(data.subcategories, function(index, subcategory) {
                        $('#subcategory').append(
                            '<option id="edit-sub" value="' + subcategory
                            .id +
                            '">' + subcategory.category_name + '</option>');
                    })
                }
            })
        });
    </script>


@endsection
