@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <style>
        .btn-xlarge {
            padding: 18px 28px;
            font-size: 22px; //change this to your desired size
            line-height: normal;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            border-radius: 8px;
        }

    </style>



    <div class="card">
        <h4 class="card-header">Product Entry <small>request your product entry</small> </h4>
        <div class="card-body">
            <form action="{{ route('submit_user_request') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Product Name</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Description</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Category</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">SKU-ID</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="e.g. 50042">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">SKU Barcode</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputState">Reorder Level</label>
                        <input min="10" max="50" type="number" class="form-control" id="reorder_level">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputZip">Retail Price</label>
                        <input type="number" min="10" max="50" class="form-control" id="inputZip">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputZip">Product Picture</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>


                </div>

                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Product Storage Plan</h5>
                                <small>Select any plan</small><br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary active btn-xlarge">
                                        <input value="1" type="radio" name="storage_plan" id="per_item_charge"
                                            autocomplete="off" checked> <i class="bi bi-currency-dollar"></i>&nbsp;<i
                                            class="bi bi-box-seam"></i>&nbsp;Per Item
                                        Charge
                                    </label>
                                    <label class="btn btn-success btn-xlarge">
                                        <input value="2" type="radio" name="storage_plan" id="bulk" autocomplete="off"><i
                                            class="bi bi-currency-dollar"></i>&nbsp;<i
                                            class="bi bi-view-list"></i>&nbsp;Bulk Space
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Fulfillment Fee Plan</h5>
                                <small>Select any plan</small><br>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary active btn-sm">
                                        <input value="11" type="radio" name="fulfillment_plan_flat" id="flat"
                                            autocomplete="off">
                                        <i class="bi bi-currency-dollar"></i>&nbsp;Flat Per Order Charge
                                    </label>
                                    <label class="btn btn-warning btn-sm">
                                        <input value="22" type="radio" name="fulfillment_plan_flat" id="tiered"
                                            autocomplete="off"><i class="bi bi-currency-dollar"></i>&nbsp;Tiered Charge
                                    </label>

                                    <label class="btn btn-info btn-sm">
                                        <input value="33" type="radio" name="fulfillment_plan_flat" id="no_of_items"
                                            autocomplete="off"><i class="bi bi-currency-dollar"></i>&nbsp;By No. Of Items
                                    </label>

                                    <label class="btn btn-danger btn-sm">
                                        <input value="44" type="radio" name="fulfillment_plan_flat" id="none"
                                            autocomplete="off">None
                                    </label>


                                </div>

                                <div class="row" style="margin-top: 5px;">

                                    <div class="col-md-6">

                                        <!--Divisions to be shown and hidden-->
                                        <div class="11 box" style="display: none">


                                            <div class="form-group">

                                                <input class="form-control" name="fl_rate" placeholder=" Enter Flat Rate">
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
                                                <table class="table table-responsive table-bordered table-striped "
                                                    id="dynamic_field2">
                                                    <tr>
                                                        <th>Start Order</th>

                                                        <th>End Order</th>

                                                        <th>Fee</th>


                                                        <th></th>
                                                    </tr>






                                                    <tr>
                                                        <td><input class="form-control" name="" id=""
                                                                placeholder="Enter Value 1" value="0" readonly="">
                                                            <input class="form-control" name="start_order[]" id=""
                                                                value="0" type="hidden">
                                                        </td>
                                                        <td><input class="form-control" name="end_order[]" id=""
                                                                placeholder="Ente Value 2" value=""></td>
                                                        <td><input class="form-control height" name="fee_order[]"
                                                                id="height" placeholder="Enter Fee" value=""
                                                                autocomplete="off"
                                                                onkeypress="return isNumberKey(event,this)">
                                                        </td>

                                                        <td></td>
                                                    </tr>
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
                                                <table class="table table-responsive table-bordered table-striped "
                                                    id="dynamic_field">
                                                    <tr>
                                                        <th>Start number of Item</th>

                                                        <th>End number of Item</th>

                                                        <th>Fee</th>


                                                        <th></th>
                                                    </tr>






                                                    <tr>
                                                        <td>
                                                            <input class="form-control" name="" id="" value="0"
                                                                readonly="readonly">
                                                            <input class="form-control" name="start_item[]" id=""
                                                                placeholder="Enter Value 1" value="0" type="hidden">
                                                        </td>
                                                        <td><input class="form-control" name="end_item[]" id=""
                                                                placeholder="Ente Value 2" value=""></td>
                                                        <td><input class="form-control height" name="fee_item[]" id="height"
                                                                placeholder="Enter Fee" value="" autocomplete="off"
                                                                onkeypress="return isNumberKey(event,this)">
                                                        </td>

                                                        <td></td>
                                                    </tr>
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
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Payment Plan</h5>
                                <small>Select any plan</small>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary active btn-lg">
                                        <input value="13" type="radio" name="payment_plan" id="per_day" autocomplete="off"
                                            checked>Per Day Charge
                                    </label>


                                    <label class="btn btn-warning btn-lg">
                                        <input value="7" type="radio" name="payment_plan" id="weekly"
                                            autocomplete="off">Weekly
                                        Charge
                                    </label>

                                    <label class="btn btn-info btn-lg">
                                        <input value="12" type="radio" name="payment_plan" id="monthly"
                                            autocomplete="off">Monthly
                                    </label>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <br>
        <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit">Submit Your Request</button>
        </div>
        </form>
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


@endsection
