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

        .btn-xlarge {
            padding: 18px 28px;
            font-size: 22px; //change this to your desired size
            line-height: normal;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
        }

    </style>


    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt="image"> </div>
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


    @foreach ($users as $user)
        <div class="container">
            <div class="well">
                <div class="row">
                    <div class=" col-lg-12 col-md-12 col-sm-12"> <a href="#">GRN number : <span
                                class="badge">{{ $user->grn_id }}</span></a><br><br> <br> </div>
                </div>
                <div class="row">
                    <div class=" col-lg-12 col-md-12 col-sm-12">
                        <form name="add_name" id="add_name">
                            {{ csrf_field() }}
                            <input class="form-control" type="hidden" name="grn_id" id="grn_id"
                                value="{{ $user->grn_id }}">
                            <input class="form-control" type="hidden" name="func" value="edit">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>


                                            <label class="control-label" for="v_id">Clients</label>
                                            <select type="text" class="form-control" name="sch_id" id="sch_id"
                                                tabindex="1" required>
                                                <option value="">Select school</option>
                                                <?php
                                                foreach ($users3 as $user3) {
                                                    if ($user3->sch_id == $user->client_id) {
                                                        $selected = 'selected = "selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                
                                                    echo '<option value=' . $user3->sch_id . " $selected>" . $user3->sch_name . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <label class="control-label" for="v_id">Session</label>
                                            <select type="text" class="form-control" id="session_id " name="session_id">
                                                @foreach ($session as $session1)
                                                    <option value="{{ $session1->id }}" 
                                                        <?php if($session1->id == $user->session_id){ ?>
                                                        selected="selected" <?php }?>>
                                                        {{ $session1->session_number }}</option>
                                                @endforeach

                                            </select>
                                        </td>
                                        <td>


                                            <label class="control-label" for="v_id">Vendor</label>
                                            <select type="text" class="form-control" name="v_id" id="v_id2" tabindex="8"
                                                required="required">
                                                <option value="">Select vendor</option>';
                                                <?php
                                                foreach ($users1 as $user1) {
                                                    if ($user1->vend_id == $user->vend_id) {
                                                        $selected = 'selected = "selected"';
                                                    } else {
                                                        $selected = '';
                                                    }
                                                
                                                    echo '<option value=' . $user1->vend_id . " $selected>" . $user1->vend_name . '</option>';
                                                }
                                                ?>
                                            </select>

                                        </td>
                                        <td>
                                            <label class="control-label " for="">D/O</label>
                                            <input class="form-control" name="do" id="do2" required="required"
                                                value="{{ $user->do }}">
                                        </td>
                                        <td> <label class="control-label " for="">P/O</label>
                                            <input class="form-control" name="po" id="po2" required="required"
                                                value="{{ $user->po }}">
                                        </td>
                                        <td> <label class="control-label " for="">Delivery Date</label>
                                            <input type="date" name="todate" min="1000-01-01" max="3000-12-31"
                                                class="form-control" value="{{ $user->todate }}">

                                        </td>
                                    </tr>
    @endforeach
    <?php
                                      foreach ($users2 as $user2){
                                        ?>
    <input class="form-control" type="hidden" name="grnd_id[]" id="grnd_id" value="{{ $user2->grnd_id }}">
    <tr>

        <td>
            <label class="control-label " for="">Product Barcode</label>
            <input class="form-control name_list code2" name="code1[]" id="code_" value="{{ $user2->grnd_code }}">
        </td>
        <td>
            <label class="control-label " for="">Quantity</label>
            <input class="form-control name_list quantity2" name="quantity1[]" id="quantity2"
                value="{{ $user2->quantity }}">
            <input class="form-control name_list quantity2" name="rem_stack_fit1[]" id="rem_stack_fit2"
                value="{{ $user2->rem_stack_fit }}" type="hidden">
        </td>
        <td><button type="button" name="remove" id="" class="btn btn-danger btn_remove" style=" margin-top: 20px"
                onclick="delproduct({{ $user2->grnd_id }})">X</button></td>
    </tr>
    <?php
                                        }
                                        ?>
    </table>
    <div class="mydiv table-responsive">
        <table class="table table-responsive" id="dynamic_field">

            <tr>
                <td style=" width: 2%; "><span class="badge" style=" margin-top:35px;">1</span></td>
                <td>
                    <label class="control-label " for="">Product
                        Barcode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="span_1"></span>
                    <input class="form-control name_list code2" name="code[]" id="code1" placeholder="Enter Product Code"
                        onblur="check_code(1);">
                </td>
                <td>
                    <label class="control-label " for="">Quantity</label>
                    <input class="form-control name_list quantity2" name="quantity[]" id="quantity2"
                        placeholder="Enter Product Quantity">
                </td>
                <td style=" width: 9%"></td>
            </tr>
        </table>
    </div>
    <table class=" table table-responsive">
        <tr>
            <td></td>
            <td></td>
            <td style=" width: 6.5%"><button type="button" name="add" id="add" class="btn btn-success bi bi-plus btn-lg"
                    style=" margin-top: 20px;font-size:20px"></button></td>
        </tr>

    </table>
    <table>
        <tr>
            <td colspan="3" style=" height: 50px">
                <input type="button" name="update" id="update" class="btn btn-info btn-lg" value="Update" />
            </td>
        </tr>
    </table>
    </div>
    </form>
    </div>

    </div>
    </div>
    </div>

    <script>
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr  id="row'+i+'"><td style=" width: 2%"><span class="badge">'+i+'</span></td><td>Product Barcode&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id=span_'+i+'> </span><input type="text" required name="code[]" id="code'+i+'"  placeholder="Enter Product Code" class="form-control name_list code " onblur=" check_code('+i+');" value=""/></td><td style="margin-top:10px"><span id=span_'+i+'>Quantity</span><input type="text" required name="quantity[]"  id="quantity'+i+'" type="number"  placeholder="Enter  Product Quantity" class="quantity  form-control name_list search" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style=" margin-top: 20px">X</button></td></tr>');
            });
            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });
    
        });
        </script>

    @endsection
