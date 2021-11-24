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
    
    <input id="rows_danger" type="hidden" value="{{ $rows_count }}">

    @foreach ($row as $item)

        <div class="bd-callout" id="row_warning" style="border-left-color: #f0ad4e; display: none;">
            <i class="bi bi-info-circle"></i>&nbsp;&nbsp;<strong>This is a warning callout.</strong> You cannot exceed the
            rack height ({{ $item->height }}ft).
        </div>

        <div class="bd-callout" id="row_danger" style="border-left-color: red; display: none;">
            <i class="bi bi-info-circle"></i>&nbsp;&nbsp;<strong>Sorry!</strong> All four rows have been created, you cannot create anymore
        </div>




        <div class="card">
            <h3 class="card-header">Add row(s) inside {{ $item->rack_code }}</h3>
            <div class="card-body">
                <form action="{{ route('insert-row') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            <input type="hidden" name="wh_id" id="warehouse_id" value="{{ $wh_id }}">
                            <input type="hidden" name="rk_id" id="rack_id" value="{{ $item->rk_id }}">
                            <input type="hidden" name="rowCount" id="rowCount" value="{{ $item->row_name }}">
                            <input id="width" type="hidden" value="{{ $item->width }}">
                            <input id="height" type="hidden" value="{{ $item->height }}">
                            <input id="depth" type="hidden" value="{{ $item->depth }}">
                            <input type="hidden" name="rack_code" id="rack_code" value="{{ $item->rack_code }}">

                        </div>
                    </div>



                    <div class="message" style="display: none;">
                        <span class="badge badge-danger" id="warning"></span>
                        <span class="badge badge-success" id="height_sum"></span>
                        <span class="badge badge-danger" id="height_exceed"></span>
                    </div>


                    <div class="22 box">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped " id="dynamic_field2">
                                <thead>
                                    <tr>
                                        <th>Row Name</th>
                                        <th>Width</th>

                                        <th>Height</th>

                                        <th>Depth</th>

                                        <th></th>

                                    </tr>
                                </thead>

                                
                                <tbody>
                                    <?php $i=1; ?>
                                    <tr>
                                        <td><input class="form-control" name="row_name[]"
                                                                        placeholder="Enter Row Name" required
                                                                        value="R<?php echo $i; ?>" readonly=""></td>
                                        <td>
                                            <input class="form-control" name="width[]" id="" value="{{ $item->width }}"
                                                type="number" readonly>
                                        </td>
                                        <td><input class="form-control height_input" name="height[]" id="height_input1"
                                                placeholder="Enter height" min="1" value="" type="number"></td>
                                        <td><input class="form-control height" name="depth[]" id="depth"
                                                placeholder="Enter Fee" value="{{ $item->depth }}" autocomplete="off"
                                                onkeypress="return isNumberKey(event,this)" readonly>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <table class=" table table-responsive">
                            <tr>
                                <td></td>
                                <td></td>

                                <td style=" width: 5%">
                                    <button  type="button" name="add2" id="add2" class="btn btn-success bi bi-plus btn-lg"
                                        style=" margin-top: 20px;font-size:20px;"></button>
                                </td>

                            </tr>

                        </table>
                    </div>


                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div align="end">
                                <button type="button" class="btn btn-danger"
                                    onclick="javascript:window.history.back()">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="submit"
                                    id="submit_btn">Submit</button><br>
                                <br><span></span>
                            </div>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    @endforeach

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

            $('#height_input1').change(function(e) {
                console.log($('#height_input1').val());
            });




            $('#add2').click(function() {
                var totalRowCountVal = $('#rowCount').val();
                var totalRowCount = dynamic_field2.rows.length;
                var width = $('#width').val();
                var height = $('#height').val();
                var depth = $('#depth').val();
                var rowCount = +$('#rowCount').val();



                var j = +totalRowCount + +1 - 1;

                for (let index = totalRowCount; index >= totalRowCount; index--) {
                    $('#dynamic_field2').append('<tr  id="row' + index +
                        '"><td><input class="form-control" name="row_name[]" placeholder="Enter Row Name" required value="R'+index+'" readonly=""></td> <td><input class="form-control"  name="width[]" placeholder="Enter Width" value="' +
                        width +
                        '" readonly></td><td> <input class="form-control height_input"  name="height[]" placeholder="Enter Height"  value="" id="height_input' +
                        index +
                        '"></td> <td>  <input class="form-control"  name="depth[]" placeholder="Enter Depth" value="' +
                        depth + '" readonly></td><td><button type="button" name="remove" id="' +
                        index +
                        '" class="btn btn-danger btn_remove" style=" margin-top: 20px">X</button></td></tr>'
                    );

                    if (index >= rowCount) {
                        $('.message').show();
                        $('#warning').html("You have reached the row limit to this rack which is " + index)
                        $('#add2').prop('disabled', true);
                    }

                    $('.btn_remove').on('click', function(e) {
                        e.preventDefault();
                        $('#add2').prop('disabled', false);
                        $('.message').hide();
                        $('#row_warning').hide()
                        $('#submit_btn').prop('disabled', false)
                    });

                    $(document).on('click', '.btn_remove', function() {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id).remove();
                    });

                    var index_cp = index - 1;

                    $(document).on("change", ".height_input", function() {
                        var sum = 0;
                        $(".height_input").each(function() {
                            sum += +$(this).val();
                        });
                        var rack_height = +$('#height').val()
                        if (sum > rack_height) {
                            $('#row_warning').show()
                            $('.message').show();
                            $('#height_sum').html("Total height given to rows " + sum)
                            $('#submit_btn').prop('disabled', true)
                        } else {

                            $('#row_warning').hide()
                            $('.message').show();
                            $('#height_sum').html("Total height given to rows " + sum)
                            $('#submit_btn').prop('disabled', false)
                        }


                    });



                }

                // i++;

            });
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

        });
    </script>

    <script>
      var row_count =  $('#rows_danger').val();
      if(row_count >= 4){
          $('#row_danger').show()
          $('#add2').prop('disabled', true);
          $('#submit_btn').prop('disabled', true)

      }
      else{
        $('#row_danger').hide()
          $('#add2').prop('disabled', false);
          $('#submit_btn').prop('disabled', false)
      }
    </script>



@endsection
