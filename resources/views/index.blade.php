
<?php
use App\Http\Controllers\MainController;

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
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("bower_components/font-awesome/css/font-awesome.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("bower_components/Ionicons/css/ionicons.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("dist/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset("dist/css/skins/_all-skins.min.css")}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset("bower_components/morris.js/morris.css")}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset("bower_components/jvectormap/jquery-jvectormap.css")}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset("bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset("bower_components/bootstrap-daterangepicker/daterangepicker.css")}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">


    <style type="text/css">
        /*      div .jumbotron h1{
                  text-align: center;
              }*/
        body {
            background:#2A2C31;
        }

        #centerMe {
            margin:20% 25%;
            height:50px;
            width:700px;
        }

        .title{
            color:#3c8dbc;
            font-family:'Montserrat', 'Helvetica', 'Arial', sans-serif;
            float:left;
            font-size:38px;
            line-height:20px;
            padding:20px 5px;
            font-weight:200;
            text-shadow: none;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            -ms-font-smoothing: antialiased;
            font-smoothing: antialiased
        }

        .hidden{
            display: none;
        }
        .live{
            margin: 0px;
        }
        .floatLeft {
            float:left;
        }

        #textWrapper {
            height:40px;
            width:320px;
            margin-bottom: 100px;
            float:right;
        }

        .bottom {
            margin: 75px 0 30px 0;
            opacity:0;
        }


        .rotate {
            -webkit-transition:all 0.9s;
            -moz-transition:all 0.9s;
            -ms-transition:all 0.9s;
            -o-transition:all 0.9s;
            transition:all 0.9s;
            -webkit-transition-timing-function:ease-out;
            -moz-transition-timing-function:ease-out;
            -ms-transition-timing-function:ease-out;
            -o-transition-timing-function:ease-out;
            transition-timing-function:ease-out;
            -webkit-transform:rotate(-360deg);
            -moz-transform:rotate(-360deg);
            -ms-transform:rotate(-360deg);
            -o-transform:rotate(-360deg);
            transform:rotate(-360deg);
        }
    </style>

    <style>
        
        .app-div {display: none;}
.app-icon .fa {transition: background-color 0.5s ease;}
.app-icon .fa:hover {background: black;}
.app-icon.active{color:green;}

        #codepen-footer, #codepen-footer * {
            -webkit-box-sizing: border-box !important;
            -moz-box-sizing: border-box !important;
            box-sizing: border-box !important;
        }
        #codepen-footer {
            display: block !important;
            position: fixed !important;
            top: auto !important;
            bottom: 0 !important;
            left: 0 !important;
            right: auto !important;
            width: 100% !important;
            padding: 0 10px !important;
            margin: 0 !important;
            height: 30px !important;
            line-height: 30px !important;
            font-size: 10px !important;
            color: #eeeeee !important;
            background-color: #505050 !important;
            text-align: left !important;
            background: -webkit-linear-gradient(top, #505050, #383838) !important;
            background: -moz-linear-gradient(top, #505050, #383838) !important;
            background: -ms-linear-gradient(top, #505050, #383838) !important;
            background: -o-linear-gradient(top, #505050, #383838) !important;
            border-top: 1px solid black !important;
            border-bottom: 1px solid black !important;
            border-radius: 0 !important;
            border-image: none !important;
            box-shadow: inset 0 1px 0 #6e6e6e, 0 2px 2px rgba(0, 0, 0, 0.4) !important;
            z-index: 300 !important;
            font-family: "Lucida Grande", "Lucida Sans Unicode", Tahoma, sans-serif !important;
            letter-spacing: 0 !important;
            word-spacing: normal !important;
            word-spacing: 0 !important;
            -webkit-transform: none !important;
            -moz-transform: none !important;
            -ms-transform: none !important;
            -o-transform: none !important;
            transform: none !important;
        }
        #codepen-footer a {
            color: #a7a7a7 !important;
            text-decoration: none !important;
            text-shadow: none !important;
            border: 0 !important;
        }
        #codepen-footer a:hover {
            color: white !important;
        }
        #codepen-footer:before,
        #codepen-footer:after {
            display: none;
        }
        
        ul li{
  display: inline;
}
    </style>
      <style>
                            div.ex1 {
  min-height: 200px;
}
/* Dashed red border */
hr.new2 {
  border-top: 2px dashed blue;
}

.active a {background-color:red}
                         </style> 
   
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



<!-- Content Wrapper. Contains page content -->
  <?php
if(session()->get("flag")=='14'){
 
?>
<div class="content-wrapper" style="margin-left:0px;">
        <!-- Content Header (Page header) -->
          <section class="content-header">
        <div class="buttons">
            <h3>
<a  class=" btn btn info showSingle" target="1">Smart School</a> &nbsp;&nbsp;&nbsp;&nbsp;
<a  class="btn btn info showSingle" target="2">City School</a></h3>

</div>
<br>
<div id="div1" class="targetDiv" style="display:none">
    
   <div class="container-fluid">
      
      
                    <?php
                    $sch_id='1';
                     $usercr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountcr = count($usercr_count);  
                    ?>
                       
                <div class="row">
                    <div class="col-md-4" >
                     <h1> <span class = "label label-primary">Central Region</span> </h1>
                     <hr class="new2"> 
                     
                   <h5 style="color:red">Total Requisition count :{{$wordCountcr}}</h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
                                                  
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><a href="sch_req_details?type={{$user->req_type}}&req_id={{$user->req_id}}&status={{$user->status}}&sch_id={{$sch_id}}&region_id={{$user->reg_id}}" target="blank"><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                   
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <h1><span class = "label label-success">South Region</span> </h1>
                  <hr class="new2"> 
                   <?php
                     $usersr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountsr = count($usersr_count);  
                    ?>
                   <h5 style="color:red">Total Requisition count :{{$wordCountsr}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                 
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><a href="sch_req_details?type={{$user->req_type}}&req_id={{$user->req_id}}&status={{$user->status}}&sch_id={{$sch_id}}&region_id={{$user->reg_id}}" target="blank"><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <h1> <span class = "label label-warning">North Region</span> </h1> 
                 <hr class="new2"> 
                  <?php
                     $usernr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountnr = count($usernr_count);  
                    ?>
                   <h5 style="color:red">Total Requisition count :{{$wordCountnr}} </h3>
                   <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
       $usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                 
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
      
           <hr class="new2">
             <div class="row">
                    <div class="col-md-4" >
                    <?php
$usercrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountcr_disp = count($usercrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition Dispatch count: {{$wordCountcr_disp}} </h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Delivery date&Time</th>
                                
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                   
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <?php
$usersrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountsr_disp = count($usersrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition Dispatch count : {{$wordCountsr_disp}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                   <th>Delivery date&Time</th>
                                 
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                     <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <?php
$usernrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountnr_disp = count($usernrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition  Dispatch count :{{$wordCountnr_disp}}  </h3>
                     <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.status='4' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                   <th>Delivery date&Time</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                   <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                 
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
           
           <hr class="new2">
             <div class="row">
                    <div class="col-md-4" >
                    <?php
$usercrpend_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountcr_pen = count($usercrpend_count);       
?>
                   <h5 style="color:red">Total Requisition Pending count: {{$wordCountcr_pen}} </h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                      
                                      
                                       <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           
                                                if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <?php
$usersrpend_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountsr_pen = count($usersrpend_count);       
?>
                   <h5 style="color:red">Total Requisition Pending count : {{$wordCountsr_pen}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                      <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <?php
$usernrpen_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountnr_pen = count($usernrpen_count);       
?>
                   <h5 style="color:red">Total Requisition  Pending count :{{$wordCountnr_pen}}  </h3>
                     <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.status='0' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                  <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
        
  </div>

</div>
<div id="div2" class="targetDiv" style="display:none">
    
    
      <div id="divB" class="div">
   
    <br>
 <div class="container-fluid">
         
                    <?php
                    $sch_id='11';
                     $usercr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountcr = count($usercr_count);  
                    ?>
                       
                <div class="row">
                    <div class="col-md-4" >
                     <h1> <span class = "label label-primary">Central Region</span> </h1>
                     <hr class="new2"> 
                     
                   <h5 style="color:red">Total Requisition count :{{$wordCountcr}}</h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
                                                  
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                   
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <h1><span class = "label label-success">South Region</span> </h1>
                  <hr class="new2"> 
                   <?php
                     $usersr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountsr = count($usersr_count);  
                    ?>
                   <h5 style="color:red">Total Requisition count :{{$wordCountsr}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                 
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <h1> <span class = "label label-warning">North Region</span> </h1> 
                 <hr class="new2"> 
                  <?php
                     $usernr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountnr = count($usernr_count);  
                    ?>
                   <h5 style="color:red">Total Requisition count :{{$wordCountnr}} </h3>
                   <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
       $usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                 
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
      
           <hr class="new2">
             <div class="row">
                    <div class="col-md-4" >
                    <?php
$usercrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountcr_disp = count($usercrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition Dispatch count: {{$wordCountcr_disp}} </h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Delivery date&Time</th>
                                
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                   
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <?php
$usersrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountsr_disp = count($usersrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition Dispatch count : {{$wordCountsr_disp}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                   <th>Delivery date&Time</th>
                                 
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                     <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <?php
$usernrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountnr_disp = count($usernrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition  Dispatch count :{{$wordCountnr_disp}}  </h3>
                     <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.status='4' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                   <th>Delivery date&Time</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                   <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                 
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
           
           <hr class="new2">
             <div class="row">
                    <div class="col-md-4" >
                    <?php
$usercrpend_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountcr_pen = count($usercrpend_count);       
?>
                   <h5 style="color:red">Total Requisition Pending count: {{$wordCountcr_pen}} </h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                      
                                      
                                       <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           
                                                if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <?php
$usersrpend_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountsr_pen = count($usersrpend_count);       
?>
                   <h5 style="color:red">Total Requisition Pending count : {{$wordCountsr_pen}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                      <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <?php
$usernrpen_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountnr_pen = count($usernrpen_count);       
?>
                   <h5 style="color:red">Total Requisition  Pending count :{{$wordCountnr_pen}}  </h3>
                     <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.status='0' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                  <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
        </div>
   
    </div>

</div>

</div>


</section> 
<!-- Main content -->
        
</div>
<?php
}  

else if(session()->get("flag")=='13'){
 
?>
<div class="content-wrapper" style="margin-left:0px;">
        <!-- Content Header (Page header) -->
          <section class="content-header">
        <div class="buttons">
            <h3>
<a  class=" btn btn info showSingle" target="1">Smart School</a> &nbsp;&nbsp;&nbsp;&nbsp;
<a  class="btn btn info showSingle" target="2">City School</a></h3>

</div>
<br>
<div id="div1" class="targetDiv" style="display:none">
    
   <div class="container-fluid">
      
      
                    <?php
                    $sch_id='1';
                     $usercr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountcr = count($usercr_count);  
                    ?>
                       
                <div class="row">
                    <div class="col-md-4" >
                     <h1> <span class = "label label-primary">Central Region</span> </h1>
                     <hr class="new2"> 
                     
                   <h5 style="color:red">Total Requisition count :{{$wordCountcr}}</h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
                                                  
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><a href="sch_req_details?type={{$user->req_type}}&req_id={{$user->req_id}}&status={{$user->status}}&sch_id={{$sch_id}}&region_id={{$user->reg_id}}" target="blank"><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                   
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <h1><span class = "label label-success">South Region</span> </h1>
                  <hr class="new2"> 
                   <?php
                     $usersr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountsr = count($usersr_count);  
                    ?>
                   <h5 style="color:red">Total Requisition count :{{$wordCountsr}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                 
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><a href="sch_req_details?type={{$user->req_type}}&req_id={{$user->req_id}}&status={{$user->status}}&sch_id={{$sch_id}}&region_id={{$user->reg_id}}" target="blank"><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <h1> <span class = "label label-warning">North Region</span> </h1> 
                 <hr class="new2"> 
                  <?php
                     $usernr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountnr = count($usernr_count);  
                    ?>
                   <h5 style="color:red">Total Requisition count :{{$wordCountnr}} </h3>
                   <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
       $usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                 
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
      
           <hr class="new2">
             <div class="row">
                    <div class="col-md-4" >
                    <?php
$usercrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountcr_disp = count($usercrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition Dispatch count: {{$wordCountcr_disp}} </h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Delivery date&Time</th>
                                
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                   
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <?php
$usersrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountsr_disp = count($usersrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition Dispatch count : {{$wordCountsr_disp}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                   <th>Delivery date&Time</th>
                                 
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                     <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <?php
$usernrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountnr_disp = count($usernrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition  Dispatch count :{{$wordCountnr_disp}}  </h3>
                     <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.status='4' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                   <th>Delivery date&Time</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                   <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                 
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
           
           <hr class="new2">
             <div class="row">
                    <div class="col-md-4" >
                    <?php
$usercrpend_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountcr_pen = count($usercrpend_count);       
?>
                   <h5 style="color:red">Total Requisition Pending count: {{$wordCountcr_pen}} </h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                      
                                      
                                       <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           
                                                if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <?php
$usersrpend_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountsr_pen = count($usersrpend_count);       
?>
                   <h5 style="color:red">Total Requisition Pending count : {{$wordCountsr_pen}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                      <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <?php
$usernrpen_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountnr_pen = count($usernrpen_count);       
?>
                   <h5 style="color:red">Total Requisition  Pending count :{{$wordCountnr_pen}}  </h3>
                     <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.status='0' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                  <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
        
  </div>

</div>
<div id="div2" class="targetDiv" style="display:none">
    
    
      <div id="divB" class="div">
   
    <br>
 <div class="container-fluid">
         
                    <?php
                    $sch_id='11';
                     $usercr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountcr = count($usercr_count);  
                    ?>
                       
                <div class="row">
                    <div class="col-md-4" >
                     <h1> <span class = "label label-primary">Central Region</span> </h1>
                     <hr class="new2"> 
                     
                   <h5 style="color:red">Total Requisition count :{{$wordCountcr}}</h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
                                                  
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                   
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <h1><span class = "label label-success">South Region</span> </h1>
                  <hr class="new2"> 
                   <?php
                     $usersr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountsr = count($usersr_count);  
                    ?>
                   <h5 style="color:red">Total Requisition count :{{$wordCountsr}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                 
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <h1> <span class = "label label-warning">North Region</span> </h1> 
                 <hr class="new2"> 
                  <?php
                     $usernr_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                     requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id");
                     $wordCountnr = count($usernr_count);  
                    ?>
                   <h5 style="color:red">Total Requisition count :{{$wordCountnr}} </h3>
                   <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
       $usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                 
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
      
           <hr class="new2">
             <div class="row">
                    <div class="col-md-4" >
                    <?php
$usercrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountcr_disp = count($usercrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition Dispatch count: {{$wordCountcr_disp}} </h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Delivery date&Time</th>
                                
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                   
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <?php
$usersrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountsr_disp = count($usersrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition Dispatch count : {{$wordCountsr_disp}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                   <th>Delivery date&Time</th>
                                 
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                     <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <?php
$usernrdisp_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountnr_disp = count($usernrdisp_count);       
?>
                   <h5 style="color:red">Total Requisition  Dispatch count :{{$wordCountnr_disp}}  </h3>
                     <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.status='4' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='4')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition Dispatch List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                   <th>Delivery date&Time</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                   <td>{{ date('d-m-Y H:i', strtotime($user->deleivery_date_time))}}</td>
                                 
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
           
           <hr class="new2">
             <div class="row">
                    <div class="col-md-4" >
                    <?php
$usercrpend_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountcr_pen = count($usercrpend_count);       
?>
                   <h5 style="color:red">Total Requisition Pending count: {{$wordCountcr_pen}} </h3>
                     <div class="box" >
                        <!-- /.box-header -->
                        
                                                     <?php
$usercr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='5' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                        <div class="box-body">
                             <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1 " style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usercr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                   
                                    <td>{{$user->po}}</td>
                                      <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                      
                                      
                                       <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           
                                                if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                   <?php
$usersrpend_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountsr_pen = count($usersrpend_count);       
?>
                   <h5 style="color:red">Total Requisition Pending count : {{$wordCountsr_pen}} </h3>
                      <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usersr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where  requisition.reg_id='4' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                           <div class="box-body">
                                <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                            <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                    
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usersr as $user)
                                    
                                <tr>
                                    <td><span class="badge">{{$user->req_id}}</span></a></td>
                                    <td>{{$user->br_name}}</td>
                                  
                                    <td>{{$user->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                      <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                           </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                  <?php
$usernrpen_count=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0'  and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id ");
$wordCountnr_pen = count($usernrpen_count);       
?>
                   <h5 style="color:red">Total Requisition  Pending count :{{$wordCountnr_pen}}  </h3>
                     <div class="box">
                        <!-- /.box-header -->
                        
                                                     <?php
$usernr=DB::select("SELECT requisition.reg_id,requisition.sch_id,requisition.req_type,school.sch_name,school_branch.br_name,requisition.req_id,requisition.req_created_date_time,requisition.deleivery_date_time,requisition.dispatch_flag,
                      requisition.po,requisition.status,requisition.req_status,region.reg_name from region,requisition,school,school_branch where requisition.reg_id='3' and requisition.sch_id='$sch_id'  and requisition.req_flag=1  and requisition.req_type='2' and requisition.status='0' and requisition.sch_id=school.sch_id and requisition.br_id=school_branch.br_id and requisition.reg_id=region.reg_id and DATE(requisition.req_created_date_time) = (SELECT MAX(DATE(requisition.req_created_date_time)) FROM requisition where requisition.reg_id='3' and requisition.sch_id='$sch_id' and requisition.req_flag=1 and requisition.req_type='2' and requisition.status='0')");
       ?>
                     
                        <div class="box-body">
                            <h5 style="color:blue">Most Recent Requisition Pending List</h3>
                             <div class="ex1"> 
                            <table id="example1" class="table table-bordered table-striped example1" style=" font-size: 10px">


                                <thead>
                                <tr style="background-color:#31869b;color: white">
                                    <th>Requisition #</th>
                                    <th>Branch</th>
                                   
                                    <th>P/O</th>
                                    <th>Created Date&Time</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($usernr as $usernrlist)
                                    
                                <tr>
                                    <td><span class="badge">{{$usernrlist->req_id}}</span></a></td>
                                    <td>{{$usernrlist->br_name}}</td>
                                   
                                    <td>{{$usernrlist->po}}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($user->req_created_date_time))}}</td>
                                  <td>
                                     <?php
                                            
                                     if($user->dispatch_flag==0 ){

                                    if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                               echo  "<label class=label style='color: blue'>Aproval</lable>";
                                                   
                                                }
                                        
                                      }else if(($user->dispatch_flag==1) || ($user->dispatch_flag==2)){

                                    echo  "<label class=label style='color:#f00cf4'> Dispatch Request Send</lable>"; 
                                    
                                      }else{
                                           if($user->status===1){
                                          
                                         echo  "<label class=label style='color:#f1c40f '>Production In Process</lable>";
                                        }
                                      else if($user->status===2){
                                          
                                         echo  "<label class=label style='color:red'>Production Completed</lable>";
                                        }
                                            else if($user->status===3){
                                              
                                            echo  "<label class=label style='color:#f00cf4'>Dispatch Pending</lable>";
                                            
                                            
                                            }
                                               else if($user->status===4){
                                                
                                                 echo  "<label class=label style='color: green'>Delivered</lable>";
                                                }
                                                
                                                else if($user->status===5){
                                                
                                                 echo  "<label class=label style='color: green'>W2w</lable>";
                                                }
                                                else{
                                             echo  "<label class=label style='color:green'>Dispatch Done</lable>";
                                                   
                                                }
                                                
                                             
                                            
                                             }    
                                      
                                            ?>
                               
                                          </td>
                                         </tr>
                                   @endforeach

                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                 </div>
                 </div>
        </div>
   
    </div>

</div>

</div>


</section> 
<!-- Main content -->
        
</div>
<?php
}else{
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
      <!-- Main content -->
      
      
        <div class="container">
            <div class="row">
                <div  id="centerMe">
                    <div class="floatLeft responsive" >
<!--                        -->
                        <div class="title" style=" color:#2f54c4"> Welcome  <?php echo session()->get("username");?></div>

                    </div>

                </div>
            </div>
        </div>   
      </div>
        <?php
}
        ?>

 </div>
    
          <script>
  jQuery(function(){
    jQuery('.showSingle').click(function(){
          var objdiv = $('#div'+$(this).attr('target'));
          var toggleDisplay = false;
          if(objdiv.css('display')=="none"){
                toggleDisplay = true;
          }
          jQuery('.targetDiv').hide();
          jQuery('#div'+$(this).attr('target')).toggle(toggleDisplay);
    });
});
  </script>
  
<script>
    $(function () {
        $('.example1').DataTable({
            "iDisplayLength": 25,
        })
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

