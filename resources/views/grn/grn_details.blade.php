@extends("layouts.app")
@section('content')

    <?php
    use APP\Http\Controllers\MainController;
    
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" id="bootstrap-css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
                 folder instead of downloading all of them to reduce the load. -->
        <!-- DataTables -->
        <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js">
    </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style type="text/css">
            /*Styling for errors on form*/
            .form_error span {
                width: 80%;
                height: 35px;
                margin: 3px 10%;
                font-size: 1.1em;
                color: #D83D5A;
            }

            .form_error input {
                border: 1px solid #D83D5A;
                display: block;

                width: 100%;

                height: 34px;

                padding: 6px 12px;

                font-size: 14px;

                line-height: 1.42857143;

                color: #555;

                background-color: #fff;

                background-image: none;

                border: 1px solid #ccc;
            }

            /*Styling in case no errors on form*/
            .form_success span {
                width: 80%;
                height: 35px;
                margin: 3px 10%;
                font-size: 1.1em;
                color: green;
            }

            .form_success input {
                border: 1px solid green;
                display: block;

                width: 100%;

                height: 34px;

                padding: 6px 12px;

                font-size: 14px;

                line-height: 1.42857143;

                color: #555;

                background-color: #fff;

                background-image: none;

                border: 1px solid #ccc;
            }

            #error_msg {
                color: red;
                /*  text-align: center;*/
                /*  margin: 10px auto;*/
            }



            .card {

                position: relative;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 1px solid rgba(0, 0, 0, .125);
                border-radius: .25rem;

            }


            .text-white {

                color: #fff !important;

            }

            .p-4 {

                padding: 1.5rem !important;

            }

            .flex-row-reverse {

                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important;

            }

            .d-flex {

                display: -ms-flexbox !important;
                display: flex !important;

            }

            .bg-dark {

                background-color: #343a40 !important;

            }


            .p-0 {

                padding: 0 !important;

            }

            .card-body {

                -ms-flex: 1 1 auto;
                flex: 1 1 auto;
                padding: 1.25rem;

            }

            * {

                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;

            }

            .p-5 {

                padding: 3rem !important;

            }

            body,
            #main-container {
                height: auto;
            }

        </style>


        <style>
            @media print {
                table {
                    border: solid #000 !important;
                    border-width: 10px 10px 10px 10px !important;
                }

                th,
                td {
                    border: solid #000 !important;
                    border-width: 10px 10px 10px 10 !important;
                }
            }

        </style>

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">


            <!-- Left side column. contains the logo and sidebar -->


            <!-- Content Wrapper. Contains page content -->
            <div class="card">
                <!-- Content Header (Page header) -->
                    <h1 class="card-header">
                               &nbsp; GRN Information

                                <a style="float: left" class="btn btn-primary" style="border-color:#31869b;" onclick="javascript:window.history.back()">
                                    <span class="bi bi-arrow-left"></span> Back
                                </a>
                            </div>

                        </div>
                    </h1>

                    <div class="card-body">

                    <div class="container">
                        <div class="row" id='printMe'>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="row p-5">
                                            <style type="text/css" media="print">
                                                table {
                                                    border-collapse: collapse;
                                                    border: 1px solid #000;
                                                }

                                                td {
                                                    border: 1px solid #000;
                                                }

                                                th {
                                                    border: 1px solid #000;
                                                }

                                            </style>
                                            <?php
                                            //$getTaxCharge = array(
                                            //                        array(
                                            //                            'amount_range_from' => 0,
                                            //                            'amount_range_to' => 500,
                                            //                            'tax_percentage' => 20,
                                            //                             ),
                                            //                        array(
                                            //                            'amount_range_from' => 501,
                                            //                            'amount_range_to' => 1000,
                                            //                            'tax_percentage' => 18,
                                            //                             ),
                                            //                        array(
                                            //                            'amount_range_from' => 500001,
                                            //                            'amount_range_to' => 1000000,
                                            //                            'tax_percentage' =>20,
                                            //                             ),
                                            //                        array(
                                            //                            'amount_range_from' => 1000001,
                                            //                            'amount_range_to' => 100000000000,
                                            //                            'tax_percentage' =>30,
                                            //                             )
                                            //
                                            //                    );
                                            //$calculateTaxOnAmount = 502;
                                            //    $remainingAmount      = $calculateTaxOnAmount;
                                            //    $amount               = $calculateTaxOnAmount;
                                            //    $arrayAmount          = array();
                                            //    foreach ($getTaxCharge as $key => $value){
                                            //        $resultArray = array();
                                            //        if ($calculateTaxOnAmount > $value['amount_range_to']) {
                                            //            $sum                       = $value['amount_range_to'] - $value['amount_range_from'];
                                            //            $resultArray['amount']     = $sum;
                                            //            $resultArray['percentage'] = $value['tax_percentage'];
                                            //            array_push($arrayAmount, $resultArray);
                                            //            echo $sum;
                                            //            echo "<br>";
                                            //           echo  $remainingAmount = $remainingAmount - $sum;
                                            //           echo "<br>";
                                            //        } else {
                                            //            $resultArray['amount']     = $remainingAmount;
                                            //            $resultArray['percentage'] = $value['tax_percentage'];
                                            //            array_push($arrayAmount, $resultArray);
                                            //            break;
                                            //        }
                                            //    }
                                            //    $resultantTaxAmount = 0;
                                            //    foreach ($arrayAmount as $key => $value) {
                                            //        $cal                = (($value['amount'] * $value['percentage']));
                                            //        $resultantTaxAmount = $resultantTaxAmount + $cal;
                                            //    }
                                            //    echo round($resultantTaxAmount);
                                            ?>


                                            <table class="table " style=" width: 100%; font-size: 14px">

                                                <thead>
                                                    <tr>
                                                        <th class="border-0  font-weight-bold">
                                                            <img src="{{ asset('img/date-technology.png') }}"
                                                                class=" img-responsive">
                                                            <?php
                                                if($sch_id=='11'){
                                                    ?>
                                                            <br>
                                                            <span style="font-size: 20px; text-align: left">Ideal
                                                                Creation</span>
                                                            <?php
                                                }
                                                ?>

                                                        </th>

                                                        <th class="border-0  font-weight-bold">


                                                            @foreach ($users as $user)
                                                                <p class="font-weight-bold mb-1">GRN # {{ $user->grn_id }}
                                                                </p>
                                                                <p class="text-muted">Date : <?php echo date('d-M-Y', strtotime($user->date_time)); ?></p>


                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="padding-top: 10px">
                                                        <td style=" vertical-align: bottom; width: 50%">
                                                            <div class="col-md-6">
                                                                <p class="mb-1"> {{ $user->sch_name }}</p>
                                                                <p class="font-weight-bold mb-4">Vendor Information</p>
                                                                <p class="mb-1">{{ $user->vend_name }}</p>

                                                                <p class="mb-1">Lahore, Pakistan</p>

                                                            </div>

                                                        </td>
                                                        <td style=" vertical-align: bottom; width: 50%; text-align: right">
                                                            <div class="col-md-6 ">
                                                                <p class="font-weight-bold mb-4">GRN Details</p>
                                                                <p class="mb-1"><span class="text-muted">P/O
                                                                        #: </span>{{ $user->po }}</p>
                                                                <p class="mb-1"><span class="text-muted">D/O
                                                                        #: </span> {{ $user->do }}</p>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>



                                        </div>

                                        <div class="row p-5">
                                            <div class="col-md-12">
                                                <table class="table table-bordered " style=" width: 100% ; font-size: 14px">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-0  font-weight-bold"></th>
                                                            <!--                                                      <th class="border-0  font-weight-bold"></th>-->
                                                            <th class="border-0  font-weight-bold"></th>
                                                            <th class="border-0  font-weight-bold"></th>
                                                            <th class="border-0  font-weight-bold"></th>
                                                            <th class="border-0  font-weight-bold"></th>
                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                colspan="" style=" border-color: green"></th>
                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                colspan="2" style=" border-color: blue"> Per Item Flat Rate
                                                            </th>
                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                colspan="3" style=" border-color: blue">Incremental Rate
                                                            </th>

                                                            <th></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="border-0  font-weight-bold">Sr #</th>
                                                            <!--                                                <th class="border-0  font-weight-bold">Grn #</th>-->
                                                            <th class="border-0 text-uppercase small font-weight-bold">
                                                                Barcode</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">In
                                                                Code</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">
                                                                Description</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold">
                                                                Quantity</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                style=" border-color: green">Item Dimensions (L*W*H) = Cuft
                                                            </th>

                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                style=" border-color: blue"> Rate</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                style=" border-color: blue">Fee</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                style=" border-color: blue">Volume</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                style=" border-color: blue">Rate</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                style=" border-color: blue">Fee</th>
                                                            <th class="border-0 text-uppercase small font-weight-bold"
                                                                style=" border-color: blue">Total</th>
                                                            <?php
                                                 if((session()->get("flag")=='1') || (session()->get("flag")=='12') || (session()->get("flag")=='9')){
                                                ?>
                                                            <th class="border-0 text-uppercase small font-weight-bold">Push
                                                                Stock</th>
                                                            <?php
                                                }
                                                ?>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $qty = 0;
                                                        $qty_price = 0;
                                                        $qty_price_vol = 0;
                                                        $count = 1;
                                                        ?>
                                                        <tr>

                                                            @foreach ($users1 as $user1)
                                                                <td><span class="badge"><?php echo $count; ?></span>
                                                                </td>
                                                                <!--                                                    <td><span class="badge"><?php //echo $user1->grn_id;
?></span></td>-->

                                                                <td>{{ $user1->grnd_code }}</td>

                                                                <?php
                                                                $lenght = $user1->length / 12;
                                                                $width = $user1->width / 12;
                                                                $height = $user1->height / 12;
                                                                $lenght1 = number_format($lenght, 1);
                                                                $width1 = number_format($width, 1);
                                                                $height1 = number_format($height, 1);
                                                                $pp22 = $lenght1 * $width1 * $height1;
                                                                $pp2 = number_format($pp22, 1);
                                                                
                                                                if ($user1->fee_plan == '1') {
                                                                    $fl_rate = $user1->fl_rate;
                                                                } else {
                                                                    $fl_rate = '0';
                                                                }
                                                                
                                                                ?>
                                                                <td>{{ $user1->in_code }}</td>
                                                                <td>{{ $user1->pitem_title }}</td>
                                                                <td>{{ $tqty = $user1->quantity }}</td>
                                                                <td style=" border-color: green">
                                                                    ({{ $lenght1 }}*{{ $width1 }}*{{ $height1 }})
                                                                    = {{ $pp22 }}</td>

                                                                <td style=" border-color: blue">{{ $fl_rate }}</td>
                                                                <td style=" border-color: blue">
                                                                    {{ $pp = $user1->quantity * $fl_rate }}</td>
                                                                <td style=" border-color: blue" colspan="2">

                                                                    <?php
                                                      if($user1->fee_plan == '2'){
                                                          ?>

                                                                    <table class="table table-bordered"
                                                                        style=" width: 100% ; font-size: 14px">

                                                                        <?php
                                                                        
                                                                        $user = main::get_fee_plan2($user1->pitem_id, $user1->quantity);
                                                                        
                                                                        ?>
                                                                        <?php
                                                                        
                                                                        $calculateTaxOnAmount = $user1->quantity;
                                                                        $remainingAmount = $calculateTaxOnAmount;
                                                                        $amount = $calculateTaxOnAmount;
                                                                        $arrayAmount = [];
                                                                        foreach ($user as $value) {
                                                                            $resultArray = [];
                                                                            if ($calculateTaxOnAmount > $value->end) {
                                                                                $sum = $value->end - $value->start;
                                                                                $resultArray['amount'] = $sum;
                                                                                $resultArray['percentage'] = $value->fee;
                                                                                array_push($arrayAmount, $resultArray);
                                                                        
                                                                                $remainingAmount = $remainingAmount - $sum;
                                                                            } else {
                                                                                $resultArray['amount'] = $remainingAmount;
                                                                                $resultArray['percentage'] = $value->fee;
                                                                                array_push($arrayAmount, $resultArray);
                                                                                break;
                                                                            }
                                                                        }
                                                                        $resultantTaxAmount = 0;
                                                                        
                                                                        foreach ($arrayAmount as $key => $value) {
                                                                            $cal = $value['amount'] * $value['percentage'];
                                                                            $resultantTaxAmount = $resultantTaxAmount + $cal;
                                                                        }
                                                                        
                                                                        ?>

                                                                        @foreach ($user as $userr)

                                                                            <?php
                                                                            $plan = $userr->start . '-' . $userr->end;
                                                                            $inc_rate = $userr->fee;
                                                                            
                                                                            $min = $userr->start + $userr->end;
                                                                            
                                                                            $min2 = $user1->quantity - $min;
                                                                            ?>
                                                                            <tr>
                                                                                <td style=" border-color: blue">
                                                                                    {{ $plan }}</td>
                                                                                <td style=" border-color: blue">
                                                                                    {{ $ee = $inc_rate }}</td>







                                                                            </tr>

                                                                        @endforeach

                                                                    </table>

                                                                </td>

                                                                <td style=" border-color: blue">
                                                                    <table class="table table-bordered" style=" width: 100% ; font-size: 14px">
                                                                        <?php
                                                    foreach ($arrayAmount as $key => $value) {
                                                    ?>
                                                                        <tr>
                                                                            <td style=" border-color: blue">
                                                                                {{ $value['amount'] }} *
                                                                                {{ $value['percentage'] }} =
                                                                                {{ $pp2 = $value['amount'] * $value['percentage'] }}
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                    }
                                                    ?>
                                                                    </table>




                                                                </td>

                                                                <td style=" border-color: blue">


                                                                    <?php
                                                                    
                                                                    // print_r($user);
                                                                    
                                                                    echo $pp2 = round($resultantTaxAmount);
                                                                    ?>

                                                                </td>
                                                                <?php
                                                      }else{
                                                          ?>
                                                                <td style=" border-color: blue"></td>
                                                                <td style=" border-color: blue">
                                                                    {{ $pp = $user1->quantity * $fl_rate }}</td>
                                                                <?php
                                                      }
                                                      ?>

                                                                <?php
                                                   if((session()->get("flag")=='1') || (session()->get("flag")=='12') || (session()->get("flag")=='9')){
                                                    ?>


                                                                <td>
                                                                    <?php if($user1->rem_stack_fit ==0){
                                                            echo "<span style='color:green'>Done<span>";
                                                        }else{
                                                        ?>
                                                                     <a class="btn btn-danger" href="{{ url('push_stock', ['grnd_id' =>$user1->grnd_id, 'product_name'=>$user1->pitem_title,'grnd_code' => $user1->grnd_code, 'qty'=>$user1->quantity, 'rem' => $user1->rem_stack_fit, 'length'=>$lenght1, 'width'=>$width1, 'height'=> $height1, 'product_id'=> $user1->pitem_id, 'client_id'=> $user1->client_id]) }}"><span width="300" height="300" class="bi bi-box-arrow-in-down" data-toggle="tooltip" title="Move To Rack"></span></a>
                                                                    <?php
                                                        }
                                                        }

                                                        ?>

                                                                </td>




                                                                <?php
                                                                $count = $count + 1;
                                                                $v = $user1->quantity;
                                                                $qty = $qty + $v;
                                                                $qty_price = $qty_price + $pp;
                                                                $qty_price_vol = $qty_price_vol + $pp2;
                                                                ?>
                                                        </tr>

                                                        @endforeach

                                                        <tr>
                                                            <td colspan="4"></td>
                                                            <td style=" color: red"><strong> {{ $qty }}</strong>
                                                            </td>
                                                            <td style=" border-color: green"></td>
                                                            <td style=" border-color: blue"></td>
                                                            <td style=" border-color: blue; color: red">
                                                                <strong>{{ $qty_price }}</strong>
                                                            </td>

                                                            <td style=" border-color: blue" colspan="2"></td>
                                                            <td style=" border-color: blue; color: red">
                                                                <strong>{{ $qty_price_vol }}</strong>
                                                            </td>
                                                            <td style=" border-color: blue; color: red">
                                                                <strong>{{ $qty_price + $qty_price_vol }}</strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>


                                                </table>
                                            </div>

                                        </div>

                                        <div class="d-flex flex-row-reverse bg-dark p-4">
                                            <!--                                  <table class="table  text-white p-4" style=" width: 100% ; font-size: 16px; text-align: right">
                                                   
                                              <td class="text-right">
                                                  <div class="py-3 px-5 text-right"></div></td>
                                              <td class="text-right">
                                                <div class="py-3 px-3 text-right">
                                                <div>Total Quantity</div>
                                                <div class="h2 font-weight-light">{{ $qty }}</div>
                                            </div>
                                                </td>
                                                
                                                
                                                <td class="text-right">
                                                <div class="py-3 px-4 text-right">
                                                <div >Billing- Total Quantity</div>
                                                <div class="h2 font-weight-light">{{ $qty }} * 5 = {{ $qty * 5 }}</div>
                                            </div>
                                                </td>
                                            </table>-->

                                            <!--
                                            <div class="py-3 px-5 text-right">
                                                                            <div class="mb-2">Discount</div>
                                                                            <div class="h2 font-weight-light">10%</div>
                                            </div>

                                            <div class="py-3 px-5 text-right">
                                                                            <div class="mb-2">Sub - Total amount</div>
                                                                            <div class="h2 font-weight-light">$32,432</div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-light mt-5 mb-5 text-center small"><img src="{{ asset('img/print-icon.png') }}"
                                onclick="printDiv('printMe')" style=" width: 50px"></div>

                    </div>



                    <br><br><br><br>

                </div>



            </div>
            <!-- /.content-wrapper -->
        </div>

        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            };
        </script>
        <script>
            function grnqty_function(rem) {
                //        var quantity   = $('#qty').val();
                var quantity = document.getElementById('qty').value;
                //       document.write(rem);
                document.write(quantity);
                if (quantity <= rem) {
                    //          username_state = true;
                    //          $('#quantity').parent().removeClass();
                    //          $('#quantity').parent().addClass("form_success");
                    //          $('#quantity').siblings("span").text('Yes Product Qty Available');
                    //          document.getElementById("xxx").disabled = false;


                } else {
                    //          username_state = false;
                    //          $('#quantity').parent().removeClass();
                    //          $('#quantity').parent().addClass("form_error");
                    //          $('#quantity').siblings("span").text('Sorry... Product Qty Greater then Remaining Qty ');
                    //          document.getElementById("xxx").disabled = true;
                }






            };
        </script>
@endsection
