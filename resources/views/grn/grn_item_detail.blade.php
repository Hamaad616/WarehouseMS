<?php
use APP\Http\Controllers\main;

?>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
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
    
    
    <script src="https://cdn.datatablegrn_item_details.net/buttons/1.5.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/export/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
</head>
    <style type="text/css">
        .page-header{
            margin: 20px 0 0 0;
            font-size: 12px;
        }
        .table-bordered {
            border: 1px solid #ddd;
        }
        
        
    </style>

<?php
                    if(session()->get("sch_id")=='11'){
                     ?>
                       <input type="text" value="The City School " id="sch_name">
                           <?php
                    }
                    ?>
                             <?php
                    if(session()->get("sch_id")=='1'){
                     ?>
                       <input type="text" value="The Smart School" id="sch_name">
                           <?php
                    }
                    ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <!-- Left side column. contains the logo and sidebar -->


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--                    <h1>
                                    Items
                                </h1>-->
          
                           <div class="row">
                            <form  name="add_req" id="add_req" method="post" enctype="multipart/form-data">
                                 {{csrf_field()}}
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <div class="table-responsive"  id="t1" >
                                        <table class="table table-responsive">
                                            <tr >

                                                

                                              
                                                

                                                <td>


                                                <label class="control-label" for="grn_id">Enter Grn #</label>
                                                <input type="text" name="grn_id" id="grn_id" class="form-control">

                                            </td>
                                                <td style=" padding-top: 30px">
                                                    <button type="button" class="btn btn-primary btn-lg " name="submit" id="sbt1"  onclick="submit_item_detail_view();" style=" background-color: #2f54c4">Submit</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                               
                                  




                                </div>
                                <div class="col-lg-2">
                                    
                                  
                                </div>
                            </form>
                        </div>
         
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h3> GRN by ID</h3>
                           
                        <div class="box">
                           
                            <div class="box-body" id="exa">
                                <table id="example1" class="table table-bordered table-striped example1">


                                    <thead>
                                    <tr style="background-color:#2f54c4;color: white">
                                        <th style=" width: 8%">GRN #</th>
                                        
                                        <th>Vendor</th>
                                        <th>Item</th>
                                         <th>Qty</th>
                                        <th>P/O</th>
                                        <th>D/O</th>
                                       
                                        <th>Date</th>
                                        
                                    </tr>
                                    </thead>

                                    <tbody>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>


                </div>
            </div>

            <!------------------------------------------------------Bage Table------------------------------------------------------------>


  
        </section>



    </div>
    <!-- /.content-wrapper -->
</div>

<script>
   
     function submit_item_detail_view() {

 
     
        
      $.ajax({
                            url:"insert_req_sch_single",
                            method:"POST",
                            data:$('#add_req').serialize()+'&func='+8,
                            success:function(data)
                            {
  //alert(data);
                                if(data !='Something Wrong'){
                                 //   $('#add_req').html(data);
                               //console.log(data);
            var res2='';
               var count='1';
            var subqty='';
            res2 +='<table id="example1" class="table table-bordered table-striped example1">';


                                res2 +='<thead>';
                                res2 +='<tr style="background-color:#31869b;color: white">';
                                  res2 +='<th>Sr #</th>';
                                    res2 +='<th>GRN #</th>';
                                     res2 +='<th>Vendor/Supplier</th>';
                                       res2 +='<th>Barcode</th>';
                                  res2 +='<th>Item</th>';
                                     res2 +='<th>Total Qty</th>';
                                   res2 +=' <th>P/O</th>';
                                    res2 +='<th>D/O</th>';
                                 
                                   res2 +=' <th>Date</th>';
                                    
                                    
                                res2 +='</tr>';
                               res2 +='</thead>';

                                res2 +='<tbody>';
            $.each (data, function (key, value) {
            res2 +=
            '<tr>'+
            '<td>'+count+'</td>'+
                '<td><a href="grn_details?grn_id='+value.grn_id+'&sch_id='+value.sch_id+'"><span class="badge">'+value.grn_id+'</span></a></td>'+
                '<td>'+value.vend_name+'</td>'+
                '<td>'+value.pitem_code+'</td>'+
                 '<td>'+value.pitem_title+'</td>'+
                 '<td>'+thousands_separators(value.quantity)+'</td>'+
                '<td>'+value.po+'</td>'+
                '<td>'+value.do+'</td>'+
                 
           '<td>'+value.date_time+'</td>'+
           '</tr>';
   subqty = +subqty + +value.quantity;
count++;
   });
     
                              res2 +='<tr><td>.</td><td>.</td><td>.</td><td>.</td>.<td style=color:red> Total</td><td style=color:red>'+thousands_separators(subqty)+'</td><td>.</td><td>.</td><td>.</td></tr>';   
                               res2 +='<tbody></table>';      
                              
                                $('#exa').html(res2);
                             // document.write(data);
//                              $('#add_req')[0].reset();
//                               $('#add_req')[1].reset();
                          $(function () {
$(document).ready(function(){
    var schname= document.getElementById("sch_name").value;
    $('.example1').DataTable({
            "iDisplayLength": 50,
             "ordering": false,
            dom: 'Bfrtip',
         buttons: [
            {
                extend: 'copy',
              
            },
            {
                extend: 'csv',
               
            },
            {
                extend: 'excel',
              
            },
            {
                extend: 'pdf',
              
            },
            {
                extend: 'print',
                     title: schname+'GRN by ID',
               customize: function ( win ) {
                $(win.document.body)
                    .css( 'font-size', '10px' );

                $(win.document.body).find( 'table' )
                    .css( 'font-size', '10px' );
             $(win.document.body).find('h1').css('font-size', '10pt');
            }
            },
        ]
            
        });
});
});
                                }else{
                                    // document.write(data)
                                  alert('No GRN Found');
                                     $('#add_req')[0].reset();
                                }}
                        });
                }
            
        
   
    
    $(function () {
    var schname= document.getElementById("sch_name").value;
        $('.example1').DataTable({
            "iDisplayLength": 25,
            dom: 'Bfrtip',
         buttons: [
            {
                extend: 'copy',
              
            },
            {
                extend: 'csv',
               
            },
            {
                extend: 'excel',
              
            },
            {
                extend: 'pdf',
              
            },
            {
                extend: 'print',
                     title: schname+'GRN by ID',
               customize: function ( win ) {
                $(win.document.body)
                    .css( 'font-size', '10px' );

                $(win.document.body).find( 'table' )
                    .css( 'font-size', '10px' );
              $(win.document.body).find('h1').css('font-size', '10pt');
            }
            },
        ]
            
        });
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
    });
    
    
     function thousands_separators(num)
  {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
  }
</script>







</body>
</html>
@endsection
@include("footer")


