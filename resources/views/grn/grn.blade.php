@extends("sidebar")
 @section("content")
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
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
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <style>
        .mydiv{ border:5px solid blue;}
        .mydiv {
            min-height: 300px;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php



                echo '<a href="grn" ><button class="btn btn-primary" style="background-color: #01a5c9;
                                border-color: #01a5c9;">
                            <span class="glyphicon glyphicon-folder-close"></span>
                            Back
                        </button>';

                ?>

            </h1>
            <br>


            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section>
           @if($func=='add')

            <div class="container">
                <div class="well">
                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12"> <a href="#">GRN number :   <span class="badge">{{$grn_id}}</span></a><br><br> <br>  </div></div>

                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12">
                            <form name="add_name" id="add_name">
                                {{csrf_field()}}
                                <div class="table-responsive">
                                    <table class="table table-responsive">
                                        <tr>
                                                <td>


                                                <label class="control-label" for="v_id">Clients</label>
                                                <select type="text" class="form-control" name="sch_id" id ="sch_id" tabindex="1" required>
                                                 
                                                    @foreach($users2 as $user2)
                                                        <option value="{{$user2->sch_id}}">{{$user2->sch_name}}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                 <td>
                                <label class="control-label" for="v_id">Session</label>
                                <select type="text" class="form-control"  id ="session_id "  name="session_id">
                                                        @foreach($session as $session1)
                                                        <option value="{{$session1->id}}">{{$session1->session_number }}</option>
                                                        @endforeach

                                </select>
                            </td>
                                            <td>


                                                <label class="control-label" for="v_id">Vendor</label>
                                                <select type="text" class="form-control" name="v_id" id ="v_id" tabindex="2" required>
                                                    <option value="">Select vendor</option>
                                                    @foreach($users1 as $user1)
                                                        <option value="{{$user1->vend_id}}">{{$user1->vend_name}}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                            <td>
                                                <label class="control-label " for="">D/O</label>
                                                <input class="form-control"  name="do" required="required" id="do" tabindex="3">
                                                <input class="form-control"  name="grn_id" required type="hidden"  value="{{$grn_id}}">
                                                <input class="form-control"  name="func" required type="hidden"  value="add">
                                            </td>
                                            <td>
                                                <label class="control-label " for="">P/O</label>
                                                <input class="form-control"  name="po" required id="po" tabindex="4">
                                            </td>
                                            <td> <label class="control-label " for="">Delivery Date</label>
                                                <input type="date" name="todate" id="todate" min="1000-01-01" max="3000-12-31" class="form-control" value=""></td>
                                        </tr>
                                    </table>
                                    <div class="mydiv table-responsive">
                                        <table class="table table-responsive" id="dynamic_field">

                                            <tr>
                                                <td style=" width: 2%; "><span class="badge" style=" margin-top:35px;">1</span></td>
                                                <td>
                                                    <label class="control-label " for="">Product barcode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="span_1"></span>
                                                    <input class="form-control name_list code"  name="code[]"  id="code1" required  placeholder="Enter Product Code" onblur="check_code(1);">

                                                </td>
                                                <td>
                                                    <label class="control-label " for="">Quantity</label>
                                                    <input class="form-control name_list quantity"  name="quantity[]" required type="number"  id="quantity1"  placeholder="Enter Product Quantity">
                                                </td>

                                            </tr>
                                        </table>
                                    </div>
                                    <table class=" table table-responsive">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td style=" width: 9%"><button type="button" name="add" id="add" class="btn btn-success glyphicon-plus btn-lg" style=" margin-top: 20px;font-size:20px"></button></td>
                                        </tr>

                                    </table>
                                    <table>
                                        <tr>
                                            <td colspan="3" style=" height: 50px">
                                                     <input type="button" name="submit" id="submit" class="btn btn-info btn-lg" value="Submit" onclick="add_new_grn();" />
                                                



                                            </td></tr>
                                    </table>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

      @endif
        </section>
        <section>

            @if($func=='edit')
                @foreach($users as $user)
            <div class="container">
                <div class="well">
                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12"> <a href="#">GRN number :   <span class="badge">{{$user->grn_id}}</span></a><br><br> <br>  </div></div>
                    <div class="row">
                        <div class=" col-lg-12 col-md-12 col-sm-12">
                            <form name="add_name" id="add_name" >
                                {{csrf_field()}}
                                <input class="form-control"  type="hidden" name="grn_id" id ="grn_id"  value="{{$user->grn_id}}">
                                <input class="form-control"  type="hidden" name="func"   value="edit">
                                <div class="table-responsive">
                                    <table class="table" >
                                        <tr>
<td>


                                                <label class="control-label" for="v_id">Clients</label>
                                                <select type="text" class="form-control" name="sch_id" id="sch_id" tabindex="1" required>
                                                    <option value="">Select school</option>
                                                    <?php
                                                    foreach ($users3 as $user3){



                                                        if( $user3->sch_id== $user->client_id){


                                                            $selected = 'selected = "selected"' ;
                                                        }else{
                                                            $selected='';
                                                        }

                                                        echo "<option value=".$user3->sch_id." $selected>".$user3->sch_name."</option>";

                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                <label class="control-label" for="v_id">Session</label>
                                <select type="text" class="form-control"  id ="session_id "  name="session_id">
                                                        @foreach($session as $session1)
                                                        <option value="{{$session1->id}}" <?php if($session1->id==$_GET['session_id']){ ?> selected="selected" <?php }?>>{{$session1->session_number }}</option>
                                                        @endforeach

                                </select>
                            </td>
                                            <td>


                                                <label class="control-label" for="v_id">Vendor</label>
                                                <select type="text" class="form-control" name="v_id" id ="v_id2" tabindex="8" required="required">
                                                    <option value="">Select vendor</option>';
                                                    <?php
                                                    foreach ($users1 as $user1){



                                                        if( $user1->vend_id== $user->vend_id){


                                                            $selected = 'selected = "selected"' ;
                                                        }else{
                                                            $selected='';
                                                        }

                                                        echo "<option value=".$user1->vend_id." $selected>".$user1->vend_name."</option>";

                                                    }
                                                    ?>
                                                </select>

                                            </td>
                                            <td>
                                                <label class="control-label " for="">D/O</label>
                                                <input class="form-control"  name="do" id ="do2" required="required" value="{{$user->do}}">
                                            </td>
                                            <td> <label class="control-label " for="">P/O</label>
                                                <input class="form-control"  name="po" id ="po2" required="required" value="{{$user->po}}"></td>
                                            <td> <label class="control-label " for="">Delivery Date</label>
                                                <input type="date" name="todate" min="1000-01-01"
                                                       max="3000-12-31" class="form-control" value="{{$user->todate}}">
                                            
                                            </td>
                                        </tr>
                                        @endforeach
                                        <?php
                                      foreach ($users2 as $user2){
                                        ?>
                                        <input class="form-control"  type="hidden" name="grnd_id[]" id ="grnd_id"  value="{{$user2->grnd_id}}">
                                        <tr>

                                            <td>
                                                <label class="control-label " for="">Product Barcode</label>
                                                <input class="form-control name_list code2"  name="code1[]"  id="code_"  value="{{$user2->grnd_code}}">
                                            </td>
                                            <td>
                                                <label class="control-label " for="">Quantity</label>
                                                <input class="form-control name_list quantity2"  name="quantity1[]"  id ="quantity2" value="{{$user2->quantity}}">
                                                <input class="form-control name_list quantity2"  name="rem_stack_fit1[]"  id ="rem_stack_fit2" value="{{$user2->rem_stack_fit}}" type="hidden">
                                            </td>
                                            <td><button type="button" name="remove" id="" class="btn btn-danger btn_remove" style=" margin-top: 20px" onclick="delproduct({{$user2->grnd_id}})">X</button></td>
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
                                                    <label class="control-label " for="">Product Barcode</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="span_1"></span>
                                                    <input class="form-control name_list code2"  name="code[]"  id="code1"  placeholder="Enter Product Code" onblur="check_code(1);">
                                                </td>
                                                <td>
                                                    <label class="control-label " for="">Quantity</label>
                                                    <input class="form-control name_list quantity2"  name="quantity[]" id="quantity2" placeholder="Enter Product Quantity">
                                                </td>
                                                <td style=" width: 9%"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <table class=" table table-responsive">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td style=" width: 9%"><button type="button" name="add" id="add" class="btn btn-success glyphicon-plus btn-lg" style=" margin-top: 20px;font-size:20px"></button></td>
                                        </tr>

                                    </table>
                                    <table>
                                        <tr>
                                            <td colspan="3" style=" height: 50px">
                                                <input type="button" name="update" id="update" class="btn btn-info btn-lg" value="Update" onclick="myFunction_update();"/>
                                            </td></tr>
                                    </table>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

                @endif
        </section>

    <!-- /.content -->
    </div>
</div>

</body>
</html>
@endsection
@include("footer")
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

    })
   function add_new_grn() {
  
      var val= document.getElementsByClassName("name_list code");
       var count=val.length;


           
        if( document.add_name.v_id.value == "" ) {
            alert( "Please select any vendor!" );
            document.add_name.v_id.focus() ;
            return false;

        }
        if( document.add_name.do.value == "" ) {
            alert( "Please insert D/O!" );
            document.add_name.do.focus() ;
            return false;

        }
        if( document.add_name.po.value == "" ) {
            alert( "Please insert P/O!" );
            document.add_name.po.focus() ;
            return false;
        }

        for (i=1;i<=count;i++){

          if( document.forms["add_name"]['code'+i+''].value.length==0) {
                document.forms["add_name"]['code'+i+''].focus() ;

            }
            else
           if( document.forms["add_name"]['quantity'+i+''].value.length==0) {
                document.forms["add_name"]['quantity'+i+''].focus() ;
            }
        else{

if(i==count){

                    $.ajax({
            url:"add_grn",
            method:"POST",
            data:$('#add_name').serialize(),
            success:function(data)
            {
                if(data==1){
                    alert("Data Submitted");
                    window.location=document.referrer;
                }else{
                    alert(data);
                    // $('#add_name')[0].reset();
                }}
        });
               }
            }
           }


    }

    function delproduct(grn_data_id){

        var grn_data_id = grn_data_id;
       // document.write(grn_data_id);

        $.ajax({
            url:"{{route("del_grnd_prod")}}",
            method:"GET",
            data: 'action=removedata&grnd_id='+grn_data_id,
            success:function(data)
            {
                if(data==1){
                    window.location.reload();
                    alert("Data Submitted");

                }else{
                    $('#add_name')[0].reset();
                    alert(data);

                }}
        });
        //document.write(grn_data_id);
    }
    function myFunction_update(){

        $.ajax({
            url:"add_grn",
            method:"POST",
            data:$('#add_name').serialize(),
            success:function(data)
            {
                if(data==1){
                    alert("Data Submitted");
                    window.location=document.referrer;
                }else{
                    alert(data);
                    // $('#add_name')[0].reset();
                }}
        });
    }
    function check_code(val){
        var code1  = document.getElementById('code'+val+'').value;
//        document.write(code1);
        $.ajax({
            url:"check_code",
            method:"get",
            data:'pitem_code=' + code1,
            success:function(data)
            {
                if(data==''){
                    username_state = true;
                    $('#code'+val+'').parent().removeClass();
                    $('#code'+val+'').parent().addClass("form_success");
                    $('#code'+val+'').siblings("span").text('Sorry... Product Not Available');
                    document.getElementById("xxx").disabled = false;
                }else{
                    username_state = false;
                    $('#code'+val+'').parent().removeClass();
                    $('#code'+val+'').parent().addClass("form_error");
                    $('#code'+val+'').siblings("span").text(data);
                    // document.getElementById("xxx").disabled = true;
                    // check_name(val);
                }
            }
        });

    }

</script>