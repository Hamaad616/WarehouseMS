<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>


<style>
    body {
        min-height: 100vh;
        background-size: cover;
        font-family: 'Lato', sans-serif;
        color: rgba(116, 116, 116, 0.667);
        background: linear-gradient(140deg, #fff, 50%, hsla(220, 3%, 21%, 0.801))
    }

    .container-fluid {
        margin-top: 200px
    }

    p {
        font-size: 14px;
        margin-bottom: 7px
    }

    .small {
        letter-spacing: 0.5px !important
    }

    .card-1 {
        box-shadow: 2px 2px 10px 0px rgb(108, 167, 190)
    }

    hr {
        background-color: rgba(248, 248, 248, 0.667)
    }

    .bold {
        font-weight: 500
    }

    .change-color {
        color: #4776bc !important
    }

    .card-2 {
        box-shadow: 1px 1px 3px 0px rgb(112, 115, 139)
    }

    .fa-circle.active {
        font-size: 8px;
        color: #4776bc
    }

    .fa-circle {
        font-size: 8px;
        color: #aaa
    }

    .rounded {
        border-radius: 2.25rem !important
    }

    .progress-bar {
        background-color: #4776bc !important
    }

    .progress {
        height: 5px !important;
        margin-bottom: 0
    }

    .invoice {
        position: relative;
        top: -70px
    }

    .Glasses {
        position: relative;
        top: -12px !important
    }

    .card-footer {
        background-color: #4776bc;
        color: #fff
    }

    h2 {
        color: rgb(0, 51, 92);
        letter-spacing: 2px !important
    }

    .display-3 {
        font-weight: 500 !important
    }

    @media (max-width: 479px) {
        .invoice {
            position: relative;
            top: 7px
        }

        .border-line {
            border-right: 0px solid rgb(226, 206, 226) !important
        }
    }

    @media (max-width: 700px) {
        h2 {
            color: rgb(0, 51, 92);
            font-size: 17px
        }

        .display-3 {
            font-size: 28px;
            font-weight: 500 !important
        }
    }

    .card-footer small {
        letter-spacing: 7px !important;
        font-size: 12px
    }

    .border-line {
        border-right: 1px solid rgb(226, 206, 226)
    }

</style>

<div class="container-fluid my-5 d-flex justify-content-center">
    <div class="card card-1">
        <div class="card-header bg-white">
            <div class="media flex-sm-row flex-column-reverse justify-content-between ">
                <div class="col my-auto">
                    <h4 class="mb-0">Ordered by <span class="change-color"> <?php $client_id = \App\Models\requisitions::where('req_id', $req_id)->first(); ?>
                            <?php $client_details = App\Models\clients::where('sch_id', $client_id->sch_id)->first(); ?> {{ strtoupper($client_details->sch_name) }}</span></h4>
                </div>
                <div class="col-auto text-center my-auto pl-0 pt-sm-4"> <img
                        class="img-fluid my-auto align-items-center mb-0 pt-3" src="https://i.imgur.com/7q7gIzR.png"
                        width="115" height="115">
                    <p class="mb-4 pt-0 Glasses">Client Image</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            @foreach ($requisitions as $requisition)

                <div class="row justify-content-between mb-3">
                    <div class="col-auto">
                        <h6 class="color-1 mb-0 change-color">Details</h6>
                    </div>
                    <div class="col-auto "> <b>PO : {{ $requisition->po }}</b> </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card card-2">
                            <div class="card-body">
                                @foreach ($requisition_details as $requisition_detail)
                                    <div class="media">
                                        <?php $product_details = DB::table('product_item')
                                            ->where('pitem_code', $requisition_detail->product_code)
                                            ->get(); ?>
                                        @foreach ($product_details as $product)
                                            <div class="sq align-self-center "> <img
                                                    class="img-fluid my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0"
                                                    src="{{ asset('uploads/'. $product->img) }}" width="135" height="135" />
                                            </div>
                                        @endforeach
                                        <div class="media-body my-auto text-right">
                                            <div class="row my-auto flex-column flex-md-row">
                                                <div class="col my-auto">
                                                    <h6 class="mb-0">
                                                        {{ $requisition_detail->product_code }} </h6>
                                                </div>
                                                <div class="col-auto my-auto"> <?php $product_details = DB::table('product_item')
    ->where('pitem_code', $requisition_detail->product_code)
    ->get(); ?>
                                                    @foreach ($product_details as $product)
                                                        {{ $product->pitem_title }}
                                                    @endforeach
                                                </div>
                                                <div class="col my-auto"> Qty : {{ $requisition_detail->quantity }}
                                                </div>
                                                {{-- <div class="col my-auto">
                                                    <h6 class="mb-0">&#8377;3,600.00</h6>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-3 ">
                                    <div class="row">
                                        <div class="col-md-3 mb-3"> <small> Track Order <span><i
                                                        class=" ml-2 fa fa-refresh"
                                                        aria-hidden="true"></i></span></small>
                                        </div>
                                        <div class="col mt-auto">
                                            <div class="progress my-auto">
                                                <div class="progress-bar progress-bar rounded" style="width: 62%"
                                                    role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <div class="media row justify-content-between ">
                                                <div class="col-auto text-right"><span> <small
                                                            class="text-right mr-sm-2"></small> <i
                                                            class="fa fa-circle active"></i> </span></div>
                                                <div class="flex-col"> <span> <small
                                                            class="text-right mr-sm-2">Out
                                                            for delivary</small><i
                                                            class="fa fa-circle active"></i></span>
                                                </div>
                                                <div class="col-auto flex-col-auto"><small
                                                        class="text-right mr-sm-2">Delivered</small><span> <i
                                                            class="fa fa-circle"></i></span></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row mt-4">
                    <div class="col">
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <p class="mb-1 text-dark"><b>Order Details</b></p>
                            </div>
                            <div class="flex-sm-col text-right col">
                                <p class="mb-1"><b>Total Quantity</b></p>
                            </div>
                            <div class="flex-sm-col col-auto">
                                <p class="mb-1">&#8377;4,835</p>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-right col">
                                <p class="mb-1"> <b>Discount</b></p>
                            </div>
                            <div class="flex-sm-col col-auto">
                                <p class="mb-1">&#8377;150</p>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-right col">
                                <p class="mb-1"><b>GST 18%</b></p>
                            </div>
                            <div class="flex-sm-col col-auto">
                                <p class="mb-1">843</p>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="flex-sm-col text-right col">
                                <p class="mb-1"><b>Delivery Charges</b></p>
                            </div>
                            <div class="flex-sm-col col-auto">
                                <p class="mb-1">Free</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="row invoice ">
                    <div class="col">
                        <p class="mb-1"> Invoice Number : 788152</p>
                        <p class="mb-1">Invoice Date : 22 Dec,2019</p>
                        <p class="mb-1">Recepits Voucher:18KU-62IIK</p>
                    </div>
                </div> --}}

            @endforeach
        </div>
        <div class="card-footer">
            <div class="jumbotron-fluid">
                <div class="row justify-content-between ">
                    <div class="col-sm-auto col-auto my-auto"><img class="img-fluid my-auto align-self-center "
                            src="https://i.imgur.com/7q7gIzR.png" width="115" height="115"></div>
                    <div class="col-auto my-auto ">
                        <h2 class="mb-0 font-weight-bold">TOTAL PAID</h2>
                    </div>
                    <div class="col-auto my-auto ml-auto">
                        <h1 class="display-3 ">&#8377; 5,528</h1>
                    </div>
                </div>
                <div class="row mb-3 mt-3 mt-md-0">
                    <div class="col-auto border-line"> <small class="text-white">PAN:AA02hDW7E</small></div>
                    <div class="col-auto border-line"> <small class="text-white">CIN:UMMC20PTC </small></div>
                    <div class="col-auto "><small class="text-white">GSTN:268FD07EXX </small> </div>
                </div>
            </div>
        </div>
    </div>
</div>
