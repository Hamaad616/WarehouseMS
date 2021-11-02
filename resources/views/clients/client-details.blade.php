@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

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

        <h3 class="card-header">Update Client</h3>

        <div class="card-body">
            @foreach ($users as $user)
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10" style="margin-top:20px;">
                                        <div class="well">
                                            {{-- <form action="{{route('client.update')}}" class="form-horizontal" method="post"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }} --}}
                                                <div class="row" style="margin-left:25px;">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="control-label " for="">Client Legal Name</label>
                                                            <input readonly class="form-control" name="name"
                                                                value="{{ $sch_name }}" required>
                                                            <input class="form-control" type="hidden" name="sch_id"
                                                                required value="{{ $id }}">

                                                        </div>

                                                    </div>
                                                    <div class="col-md-4"></div>

                                                    <div class="col-sm-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Client Business Details</h5>
                                                                <label class="label-control" for="ntn_number">NTN Number</label>
                                                                    <input readonly class="form-control" type="text" name="ntn_number" value="{{ $user->ntn_number }}">
                                                                
                                    
                                                                <label class="label-control" for="sales_tax">Sales Tax Number</label>
                                                                    <input readonly class="form-control" type="text" name="sales_tax" value="{{ $user->sales_tax_number }}">
                                                                
                                    
                                                                <label class="label-control" for="MD_Name">Enter Name of MD </label>
                                                                    <input class="form-control" readonly type="text" name="MD_Name" value="{{ $user->md_name }}">
                                                               
                                    
                                                                <select class="form-control mt-2" name="entity_type" id="" readonly >
                                                                    <option selected="" disabled>Select type of legal entity</option>
                                                                    <option value="1">AOP</option>
                                                                    <option value="2">Pvt</option>
                                                                    <option value="3">Public Listed Co.</option>
                                                                </select>
                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-sm-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Client Contact Details</h5>
                                                                <label class="label-control" for="contact">Contact Number</label>
                                                                    <input class="form-control" readonly type="text" name="contact" value="{{ $user->contact }}">
                                                                
                                    
                                                                <label class="label-control" for="client_contact_full_name">Full Contact Name</label>
                                                                    <input class="form-control" readonly type="text" name="client_contact_full_name" value="{{ $user->contact_name }}">
                                                                
                                    
                                                                <label class="label-control" for="client_designation">Designation</label>
                                                                    <input class="form-control" readonly type="text" name="client_designation" value="{{ $user->contact_designation }}">
                                                                
                                    
                                                                <label class="label-control" for="contact_department">Department</label>
                                                                    <input class="form-control" readonly type="text" name="contact_department" value="{{ $user->Department  }}">
                                                                
                                    
                                                                <label class="label-control" for="contact_email">Contact Email</label>
                                                                    <input class="form-control" readonly type="email" name="contact_email" value="{{ $user->contact_email }}">
                                                                
                                    
                                                                <label class="label-control" for="contact_cell">Cell Number</label>
                                                                    <input class="form-control" readonly type="text" name="contact_cell" value="{{ $user->cell_number }}">
                                                                
                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Client Designated Address</h5>
                                    
                                                                <label class="label-control" for="contact_designated_add_1">Address Line 1</label>
                                                                <input class="form-control" readonly type="text" name="contact_designated_add_1" value="{{ $user->designated_add_1 }}">
                                    
                                    
                                                                <label class="label-control" for="contact_designated_add_2">Address Line 2</label>
                                                                <input class="form-control" readonly type="text" name="contact_designated_add_2" value="{{ $user->designated_add_2 }}">
                                    
                                    
                                                                <label class="label-control" for="client_designated_city">City</label>
                                                                <input class="form-control" readonly type="text" name="contact_designated_city" value="{{ $user->designated_city }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                    
                                                    <div class="col-sm-6 mt-2">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Corresponding Address</h5>
                                    
                                                                <label  class="label-control" for="contact_corresponding_add_1">Address Line 1</label>
                                                                    <input readonly class="form-control" type="text" name="contact_corresponding_add_1" value="{{ $user->corresponding_add_1 }}">
                                                                
                                    
                                                                <label class="label-control" for="contact_corresponding_add_2">Address Line 2</label>
                                                                    <input readonly class="form-control" type="text" name="contact_corresponding_add_2" value="{{ $user->corresponding_add_2 }}">
                                                                
                                    
                                                                <label class="label-control" for="contact_corresponding_city">City </label>
                                                                    <input readonly class="form-control" type="text" name="contact_corresponding_city" value="{{ $user->corresponding_city }}">
                                                               
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                

                                                <div class="row mt-2" style="margin-left:25px;">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <!--checkboxes-->
                                                            <label class="control-label"
                                                                style=" color: blue"><strong><u>Product Storage
                                                                        Plan</u></strong></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-left:25px;">

                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-primary active btn-xlarge">
                                                            <input value="1" readonly type="radio" name="storage_plan" id="per_item_charge"
                                                                autocomplete="off"  <?php  if($user->storage_plan=='1'){ ?> checked="checked"<?php }?> 
                                                            >
                                                                <i class="bi bi-currency-dollar"></i>&nbsp;<i
                                                                class="bi bi-box-seam"></i>&nbsp;Per Item
                                                            Charge
                                                        </label>
                                                        <label class="btn btn-success btn-xlarge">
                                                            <input value="2" type="radio" readonly name="storage_plan" id="bulk" autocomplete="off"  <?php  if($user->storage_plan=='2'){ ?> checked="checked"
                                                            <?php }?>><i
                                                                class="bi bi-currency-dollar"></i>&nbsp;<i class="bi bi-view-list"></i>&nbsp;Bulk
                                                            Space
                                                        </label>
                                                    </div>

                                                   

                                                </div>

                                                <hr>



                                                <div class="row" style="margin-left:25px;">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <!--checkboxes-->
                                                            <label class="control-label"
                                                                style=" color: red"><strong><u>Fulfillment Fee
                                                                        Plan</u></strong></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-left:25px;">

                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-primary active btn-sm">
                                                            <input value="11" type="radio" readonly name="fulfillment_plan_flat" id="flat" autocomplete="off" <?php  if($user->fulfil_plan=='11'){ ?> checked="checked"
                                                            <?php }?>>
                                                            <i class="bi bi-currency-dollar" ></i>&nbsp;Flat Per Order Charge
                                                        </label>
                                                        <label class="btn btn-success btn-sm">
                                                            <input value="22" type="radio" readonly name="fulfillment_plan_flat" id="tiered" autocomplete="off" <?php  if($user->fulfil_plan=='22'){ ?> checked="checked"
                                                            <?php }?>><i
                                                                class="bi bi-currency-dollar"></i>&nbsp;Tiered Charge
                                                        </label>
                        
                                                        <label class="btn btn-info btn-sm">
                                                            <input value="33" readonly type="radio" name="fulfillment_plan_flat" id="no_of_items"
                                                                autocomplete="off" <?php  if($user->fulfil_plan=='33'){ ?> checked="checked"
                                                                <?php }?>><i class="bi bi-currency-dollar"></i>&nbsp;By No. Of Items
                                                        </label>
                        
                                                        <label class="btn btn-danger btn-sm">
                                                            <input value="44" readonly type="radio" name="fulfillment_plan_flat" id="none" autocomplete="off" <?php  if($user->fulfil_plan=='44'){ ?> checked="checked"
                                                            <?php }?>>None
                                                        </label>
                        
                        
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="row" style="margin-left:25px;">

                                                    <div class="col-md-4">

                                                        <!--Divisions to be shown and hidden-->
                                                        <div class="11 box" style="display: none">

                                                            <div class="form-group">
                                                                <input readonly class="form-control" name="fl_rate"
                                                                    placeholder=" Enter Flat Rate "
                                                                    value="<?php if ($user->fulfil_plan == '11') {
                                                                        echo $user->fl_rate;
                                                                    } ?>">
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4"></div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="22 box" style="display: none">


                                                            <div class="mydiv table-responsive">
                                                                <table
                                                                    class="table table-responsive table-bordered table-striped "
                                                                    id="dynamic_field2">
                                                                    <tr>
                                                                        <th>Start Order</th>

                                                                        <th>End Order</th>

                                                                        <th>Fee</th>


                                                                        <th></th>
                                                                    </tr>


                                                                    <?php  if($user->fulfil_plan=='22'){ 
 
                    $fulfilplan=App\Http\Controllers\MainController::fulfilplans($user->fulfil_plan,$id);
                                           ?>

                                                                    @foreach ($fulfilplan as $user_order)


                                                                        <tr>
                                                                            <td><input class="form-control" name="" id=""
                                                                                    placeholder="Enter Value 1"
                                                                                    value="{{ $user_order->start_order }}"
                                                                                    readonly="">
                                                                                <input class="form-control"
                                                                                    name="start_order[]" id=""
                                                                                    value="{{ $user_order->start_order }}"
                                                                                    type="hidden">
                                                                            </td>
                                                                            <td><input readonly class="form-control"
                                                                                    name="end_order[]" id=""
                                                                                    placeholder="Ente Value 2"
                                                                                    value="{{ $user_order->end_order }}">
                                                                            </td>
                                                                            <td><input readonly class="form-control height"
                                                                                    name="fee_order[]" id="height"
                                                                                    placeholder="Enter Fee"
                                                                                    value="{{ $user_order->fee_order }}"
                                                                                    autocomplete="off"
                                                                                    onkeypress="return isNumberKey(event,this)">
                                                                            </td>
                                                                            <td></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <?php
}
?>
                                                                </table>

                                                                <table class=" table table-responsive">
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>

                                                                        <td style=" width: 9%">
                                                                            <button type="button" name="add2" id="add2"
                                                                                class="btn btn-success bi bi-plus btn-lg"
                                                                                style=" margin-top: 20px;font-size:20px"></button>
                                                                        </td>

                                                                    </tr>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="33 box" style="display: none">


                                                            <div class="mydiv table-responsive">
                                                                <table
                                                                    class="table table-responsive table-bordered table-striped "
                                                                    id="dynamic_field">
                                                                    <tr>
                                                                        <th>Start number of Item</th>

                                                                        <th>End number of Item</th>

                                                                        <th>Fee</th>


                                                                        <th></th>
                                                                    </tr>


                                                                    <?php  if($user->fulfil_plan=='33'){ 
 
                                       $fulfilplan=App\Http\Controllers\MainController::fulfilplans($user->fulfil_plan,$id);
                                           ?>

                                                                    @foreach ($fulfilplan as $itemsorder)



                                                                        <tr>
                                                                            <td>
                                                                                <input readonly class="form-control" name="" id=""
                                                                                    value="0" readonly="readonly">
                                                                                <input class="form-control"
                                                                                    name="start_item[]" readonly id=""
                                                                                    placeholder="Enter Value 1"
                                                                                    value="{{ $itemsorder->start_item }}"
                                                                                    type="hidden">
                                                                            </td>
                                                                            <td><input readonly class="form-control"
                                                                                    name="end_item[]" id=""
                                                                                    placeholder="Ente Value 2"
                                                                                    value="{{ $itemsorder->end_item }}">
                                                                            </td>
                                                                            <td><input readonly class="form-control height"
                                                                                    name="fee_item[]" id="height"
                                                                                    placeholder="Enter Fee"
                                                                                    value="{{ $itemsorder->fee_item }}"
                                                                                    autocomplete="off"
                                                                                    onkeypress="return isNumberKey(event,this)">
                                                                            </td>

                                                                            <td></td>
                                                                        </tr>

                                                                    @endforeach
                                                                    <?php
                                                                            }
                                                                            ?>
                                                                </table>

                                                                <table class=" table table-responsive">
                                                                    <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td style=" width: 9%"><button type="button"
                                                                                name="add" id="add"
                                                                                class="btn btn-success bi bi-plus btn-lg"
                                                                                style=" margin-top: 20px;font-size:20px"></button>
                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="row" style="margin-left:25px;">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <!--checkboxes-->
                                                            <label class="control-label"
                                                                style=" color: green"><strong><u>Payment
                                                                        Plan</u></strong></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-left:25px;">

                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-primary active btn-lg">
                                                            <input value="13" type="radio" readonly name="payment_plan" id="per_day" autocomplete="off"
                                                            <?php  if($user->payment_plan=='13'){ ?> checked="checked"
                                                            <?php }?>>Per Day Charge
                                                        </label>
                        
                        
                                                        <label class="btn btn-success btn-lg">
                                                            <input value="7" type="radio" readonly name="payment_plan" id="weekly" autocomplete="off" <?php  if($user->payment_plan=='7'){ ?> checked="checked"
                                                            <?php }?>>Weekly
                                                            Charge
                                                        </label>
                        
                                                        <label class="btn btn-info btn-lg">
                                                            <input value="12" type="radio" readonly name="payment_plan" id="monthly"
                                                                autocomplete="off" <?php  if($user->payment_plan=='12'){ ?> checked="checked"
                                                                <?php }?>>Monthly
                                                        </label>
                        
                        
                                                    </div>

                                                </div>
                                                <hr>
                                                    @endforeach
                                                    <div class="row" style="margin-left:25px;">
                                                        <div class="col-md-8"></div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div align="end">
                                                                    <button type="button" class="btn btn-danger"
                                                                        onclick="javascript:window.history.back()">Back</button>
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                        {{-- </form> --}}
                            </div>
        </div>

    </div>



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




