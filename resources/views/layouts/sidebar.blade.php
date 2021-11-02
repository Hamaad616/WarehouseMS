
<?php
use App\Http\Controllers\MainController;
$users=MainController::sidebar_item();
$client=MainController::sidebar_client();
$academic_session=MainController::sidebar_session();
 
?>
<header class="main-header" style="background-color: #2f54c4">
    <!-- Logo -->
    <a href="" class="logo" style="background-color: #2f54c4">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
Data Technologies                                                      
        </span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><strong>
Data Technologies
            
            </strong></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #2f54c4">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu" >
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="blank-profile.jpg" class="user-image" alt="User Image" >
                        <span class="hidden-xs"><?php  echo $value=session()->get("username");?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="blank-profile.jpg" class="img-circle" alt="User Image">

                            <p>
                                <?php  echo $value=session()->get("username");?>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

            </ul>
        </div>
    </nav>
</header>

<?php
if(session()->get("flag")=='1'){
  
  
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>




<?php
//echo $id;
?>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="padding: 10px 215px 10px 15px;"></li>

<?php


if(($id=='')||($id=='0')){
?>
            <?php
//echo $id;
?>

            <li><a href="school_table"><i class="fa fa-pencil-square-o"></i>Clients </a></li>
            <li><a href="warehouse"><i class="fa fa-pencil-square-o"></i>Warehouses </a></li>
           <?php
}else{
    
    
?>
            <?php
//echo $id;
?>
            <li><a href="school_table"><i class="fa fa-pencil-square-o"></i>Clients </a></li>
            <li><a href="warehouse"><i class="fa fa-pencil-square-o"></i>Warehouses </a></li>
            <li><a href="stock_item?sch_id=<?php echo $id ;?>"><i class="fa fa-pencil-square-o"></i>Category</a></li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Items</span>
                    <span class="pull-right-container">

                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($users as $user){

                    <li><a href="product_item_table?sch_id=<?php echo $id ;?>&item_type={{$user->item_type}}&item_id={{$user->item_id}}&item_name={{$user->item_name}}"><i class="fa fa-pencil-square-o"></i>{{$user->item_name}}</a></li>
                    @endforeach
                </ul>
            </li>
<!--            <li><a href="vendor1?sch_id=1"><i class="fa fa-pencil-square-o"></i>Vendor</a></li>-->

<!--            <li><a href="publisher?sch_id=1"><i class="fa fa-pencil-square-o"></i>Publisher</a></li>-->
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Stock</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">


                    <li><a href="grn?sch_id=<?php echo $id ;?>"><i class="fa fa-pencil-square-o"></i> GRN  </a></li>
                    <li><a href="stock_in?sch_id=<?php echo $id ;?>"><i class="fa fa-pencil-square-o"></i>Stock In </a></li>
<!--                    <li><a href="stock_in?func=out"><i class="fa fa-pencil-square-o"></i>Stock Out </a></li>-->




                </ul>

            </li>
            
         
 
<!--            <li><a href="open_balance?sch_id=1"><i class="fa fa-pencil-square-o"></i>Opening Balance</a></li>
            <li><a href="physical_stock_smart?sch_id=1"><i class="fa fa-pencil-square-o"></i>Physical stock</a></li>      -->
                   
                   
               <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Billing</span>
                    <span class="pull-right-container">

                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                  

<!--<li><a href="billing_table?sch_id=<?php echo $id ;?>&bill_type=1&item_name=Storage Charge (item wise)"><i class="fa fa-pencil-square-o"></i>Storage Charge (item wise)</a></li>
<li><a href="billing_table?sch_id=<?php echo $id ;?>&bill_type=2&item_name=Return Charge (Item wise)"><i class="fa fa-pencil-square-o"></i>Return Charge (Item wise)</a></li>-->
<li><a href="billing_table?sch_id=<?php echo $id ;?>&bill_type=3&item_name=Fulfillment Charges"><i class="fa fa-pencil-square-o"></i>Fulfillment Charges</a></li>
                  
                </ul>
            </li>         
            <li><a href="search?sch_id=<?php echo $id ;?>"><i class="fa fa-pencil-square-o"></i>Search</a></li>
            

           <?php
}
?>
             
        </ul>

   

    </section>

  
    <!-- /.sidebar -->

</aside>
<?php } ?>

<?php
if(session()->get("flag")=='2'){
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href=""><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>





            <li><a href="pm_req?func=pm"><i class="fa fa-pencil-square-o"></i>Requisition</a></li>
<!--            <li><a href="w2w_req?func=pm"><i class="fa fa-pencil-square-o"></i>Warehouse Requisition </a></li>-->
<!--             <li><a href="pm_req_pending?func=pm"><i class="fa fa-pencil-square-o"></i>Pending Orders </a></li>-->
<!--            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Box </span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">


                    <li><a href="item_recvd?func=i"><i class="fa fa-pencil-square-o"></i>Open Item </a></li>
                    <li><a href="item_recvd?func=c"><i class="fa fa-pencil-square-o"></i>Study pack </a></li>
                   </ul>

            </li>-->

<!--            <li><a href="school_table?sch_id={{session()->get("sch_id")}}"><i class="fa fa-pencil-square-o"></i>School</a></li>
            <li><a href="class_table?sch_id={{session()->get("sch_id")}}"><i class="fa fa-pencil-square-o"></i>Class</a></li>-->
<!--            <li><a href="subject_table?sch_id={{session()->get("sch_id")}}"><i class="fa fa-pencil-square-o"></i>Subject</a></li>-->
            <li><a href="stock_item?sch_id={{session()->get("sch_id")}}"><i class="fa fa-pencil-square-o"></i>Category</a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Stock</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">


                    <li><a href="grn?sch_id={{session()->get("sch_id")}}"><i class="fa fa-pencil-square-o"></i> GRN  </a></li>
                    <li><a href="stock_in?sch_id={{session()->get("sch_id")}}"><i class="fa fa-pencil-square-o"></i>Stock In </a></li>
<!--                    <li><a href="stock_in?func=out"><i class="fa fa-pencil-square-o"></i>Stock Out </a></li>-->
<!--                    <li><a href="sell_return"><i class="fa fa-pencil-square-o"></i>Sales Return</a></li>-->
                    <?php
                    if(session()->get("sch_id")=='1'){
                     ?>
                    
<!--                    <li><a href="purchase_return?sch_id=1"><i class="fa fa-pencil-square-o"></i>Purchase Return</a></li>-->
                    <?php
                    }
                    ?>
                    <?php
                    if(session()->get("sch_id")=='11'){
                     ?>
                    
<!--                    <li><a href="purchase_return?sch_id=11"><i class="fa fa-pencil-square-o"></i>Purchase Return</a></li>-->
                    <?php
                    }
                    ?>
    <!--                    <li><a href="house_return"><i class="fa fa-pencil-square-o"></i>House Return</a></li>-->
                    


                </ul>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Items</span>
                    <span class="pull-right-container">

                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($users as $user){

                    <li><a href="product_item_table?item_type={{$user->item_type}}&item_id={{$user->item_id}}&item_name={{$user->item_name}}"><i class="fa fa-pencil-square-o"></i>{{$user->item_name}}</a></li>
                    @endforeach
                </ul>
            </li>

<li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Misc Reports</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="serch_grn?func=serch_grn"><i class="fa fa-pencil-square-o"></i> GRN By #   </a></li> 
                    <li><a href="serch_req?func=search"><i class="fa fa-pencil-square-o"></i> GRN By Date  </a></li> 
                    <li><a href="serch_po?func=search_po"><i class="fa fa-pencil-square-o"></i>GRN By PO # </a></li>
                    <li><a href="search_vendor?func=search_vendor"><i class="fa fa-pencil-square-o"></i>GRN By Vendor </a></li>
                     <li><a href="search_vendor?func=search_vendor_items"><i class="fa fa-pencil-square-o"></i>GRN By Vendor Items</a></li>
                     <li><a href="search_item?func=search_item"><i class="fa fa-pencil-square-o"></i>GRN By Item </a></li>
                   <li><a href="serch_req_requision?func=search"><i class="fa fa-pencil-square-o"></i>Search Requisition </a></li>
<!--                   <li><a href="class_set_details2?func=search_item"><i class="fa fa-pencil-square-o"></i>NA Dispatch Report </a></li>-->
                    <?php
                    if(session()->get("sch_id")=='1'){
                     ?>
                   
<!--                    <li><a href="search_class_item2?func=disp_report_by_class"><i class="fa fa-pencil-square-o"></i> TSS Dispatch Report </a></li>-->
                   <?php
                    }
                    ?>
                   <?php
                    if(session()->get("sch_id")=='11'){
                     ?>
                   
<!--                    <li><a href="search_class_item2?func=disp_report_by_class"><i class="fa fa-pencil-square-o"></i> TCS Dispatch Report </a></li>-->
                   <?php
                    }
                    ?>
                 </ul>

            </li>
            
<!--            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <?php
                    if(session()->get("sch_id")=='1'){
                     ?>
                    <span>TSS Stock Report</span>
                    <?php
                    }
                    ?>
                    <?php
                    if(session()->get("sch_id")=='11'){
                     ?>
                    <span>TCS Stock Report</span>
                    <?php
                    }
                    ?>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    
                    <?php
                    if(session()->get("sch_id")=='1'){
                     ?>
                   <li><a href="search_item2?func=search_item"><i class="fa fa-pencil-square-o"></i>TSS Stock Report </a></li>
                   <li><a href="search_class_item2?func=search_item_by_class"><i class="fa fa-pencil-square-o"></i>TSS Stock Report By Class </a></li>
                     @foreach($academic_session as $academic ){

                    <li><a href="search_item2?func=search_item&session_id={{$academic->id}}&session_name={{$academic->session_number}}"><i class="fa fa-file"></i>{{$academic->session_number}}</a></li>
                    @endforeach
                  
                   <?php
                    }
                    ?>
                   <?php
                    if(session()->get("sch_id")=='11'){
                     ?>
                    
                     @foreach($academic_session as $academic){

                    <li><a href="search_item2?func=search_item&session_id={{$academic->id}}&session_name={{$academic->session_number}}"><i class="fa fa-file"></i>{{$academic->session_number}}</a></li>
                    @endforeach
                   <li><a href="search_item2?func=search_item"><i class="fa fa-pencil-square-o"></i>TCS Stock Report </a></li>
                   <li><a href="search_class_item2?func=search_item_by_class"><i class="fa fa-pencil-square-o"></i>TCS Stock Report By Class </a></li>
                  
                   <?php
                    }
                    ?>
                 </ul>

            </li>-->
            <li><a href="search"><i class="fa fa-pencil-square-o"></i>search</a></li>
        </ul>

    </section>
</aside>

<?php
}

if(session()->get("flag")=='3'){
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="admin.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href="index.php"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
           <li><a href="sch_req"><i class="fa fa-pencil-square-o"></i>Requisition</a></li>
<!--            <li><a href="pm_req_pending?func=pm"><i class="fa fa-pencil-square-o"></i>Pending Orders </a></li>-->
<!--           <li><a href="sell_return?func=sm"><i class="fa fa-pencil-square-o"></i>Sales Return</a></li>-->
<!--            <li><a href="school_table"><i class="fa fa-pencil-square-o"></i>School</a></li>
            <li><a href="class_table?sch_id={{session()->get("sch_id")}}"><i class="fa fa-pencil-square-o"></i>Class</a></li>
            <li><a href="subject_table"><i class="fa fa-pencil-square-o"></i>Subject</a></li>-->
            <li><a href="stock_item"><i class="fa fa-pencil-square-o"></i>Category</a></li>
<!--            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Stock</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">


                    <li><a href="grn?sch_id={{session()->get("sch_id")}}"><i class="fa fa-pencil-square-o"></i> GRN  </a></li>
                    <li><a href="stock_in?sch_id={{session()->get("sch_id")}}"><i class="fa fa-pencil-square-o"></i>Stock In </a></li>
                    <li><a href="stock_in?func=out"><i class="fa fa-pencil-square-o"></i>Stock Out </a></li>




                </ul>

            </li>-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Items</span>
                    <span class="pull-right-container">

                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($users as $user){

                    <li><a href="product_item_table?item_type={{$user->item_type}}&item_id={{$user->item_id}}&item_name={{$user->item_name}}"><i class="fa fa-pencil-square-o"></i>{{$user->item_name}}</a></li>
                    @endforeach
                </ul>
            </li>

 <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="serch_grn?func=serch_grn"><i class="fa fa-pencil-square-o"></i> GRN By #   </a></li> 
                    <li><a href="serch_req?func=search"><i class="fa fa-pencil-square-o"></i> GRN By Date  </a></li> 
                    <li><a href="serch_po?func=search_po"><i class="fa fa-pencil-square-o"></i>GRN By PO # </a></li>
                    <li><a href="search_vendor?func=search_vendor"><i class="fa fa-pencil-square-o"></i>GRN By Vendor </a></li>
                     <li><a href="search_item?func=search_item"><i class="fa fa-pencil-square-o"></i>GRN By Item </a></li>
                   <li><a href="serch_req_requision?func=search"><i class="fa fa-pencil-square-o"></i>Search Requisition </a></li>
<!--                   <li><a href="class_set_details2?func=search_item"><i class="fa fa-pencil-square-o"></i>NA Dispatch Report </a></li>-->
                    <?php
                    if(session()->get("sch_id")=='1'){
                     ?>
<!--                   <li><a href="search_item2?func=search_item"><i class="fa fa-pencil-square-o"></i>TSS Stock Report </a></li>
                   <li><a href="search_class_item2?func=search_item_by_class"><i class="fa fa-pencil-square-o"></i>TSS Stock Report By Class </a></li>-->
<!--                    <li><a href="search_class_item2?func=disp_report_by_class"><i class="fa fa-pencil-square-o"></i> TSS Dispatch Report </a></li>-->
                   <?php
                    }
                    ?>
                   <?php
                    if(session()->get("sch_id")=='11'){
                     ?>
<!--                   <li><a href="search_item2?func=search_item"><i class="fa fa-pencil-square-o"></i>TCS Stock Report </a></li>
                   <li><a href="search_class_item2?func=search_item_by_class"><i class="fa fa-pencil-square-o"></i>TCS Stock Report By Class </a></li>-->
                    <?php
                    if(session()->get("id")=='18'){
                     ?>
<!--                     <li><a href="search_item2?func=search_item&session_id=1&session_name=2019-2020"><i class="fa fa-pencil-square-o"></i>TCS Stock Report </a></li>-->
<?php
                    }
                     ?>
<!--                    <li><a href="search_class_item2?func=disp_report_by_class"><i class="fa fa-pencil-square-o"></i> TCS Dispatch Report </a></li>-->
                   <?php
                    }
                    ?>
                 </ul>

            </li>
            <li><a href="search"><i class="fa fa-pencil-square-o"></i>search</a></li>
        </ul>
    </section>
</aside>

<?php
}


if(session()->get("flag")=='4'){
?>

    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

    <ul class="sidebar-menu" data-widget="tree">
    
    
    
                   <li class="header"></li>
                    @foreach($client as $clients){
                    
 <li><a href="book_collector?sch_id={{$clients->sch_id}}"><i class="fa fa-pencil-square-o"></i>{{$clients->sch_name}}</a></li>
                       @endforeach
               
    
    </ul>
    </section>
    </aside>

<?php
}



if(session()->get("flag")=='5'){
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
<ul class="sidebar-menu" data-widget="tree">
    
    
    
                   <li class="header"></li>
                    @foreach($client as $clients){
                    
 <li><a href="item_packed?sch_id={{$clients->sch_id}}"><i class="fa fa-pencil-square-o"></i>{{$clients->sch_name}}</a></li>
                       @endforeach
               
    
    </ul>
   
    </section>
    </aside>
<?php
}


if(session()->get("flag")=='6'){
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> <?php  echo $value=session()->get("username");?></p>
                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
             <ul class="sidebar-menu" data-widget="tree">
                   <li class="header"></li>
                    @foreach($client as $clients){
                    
 <li><a href="prd_req?sch_id={{$clients->sch_id}}"><i class="fa fa-pencil-square-o"></i>{{$clients->sch_name}}</a></li>
                       @endforeach
                </ul>

    </section>
</aside>

<?php
}

if(session()->get("flag")=='7'){
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>





            <li><a href="qc_check_packing"><i class="fa fa-pencil-square-o"></i>Packed QC</a></li>

  <li><a href="item_packed?func=qc"><i class="fa fa-pencil-square-o"></i>QC Activities </a></li>


        </ul>
    </section>
</aside>

<?php

}
if(session()->get("flag")=='10'){
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>

 @foreach($client as $clients)
                    
 <li><a href="box?sch_id={{$clients->sch_id}}"><i class="fa fa-pencil-square-o"></i>{{$clients->sch_name}}</a></li>
                       @endforeach



           
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Box List</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">


                    @foreach($client as $clients)
                    
 <li><a href="item_recvd?func=i&sch_id={{$clients->sch_id}}"><i class="fa fa-pencil-square-o"></i>{{$clients->sch_name}}</a></li>
                       @endforeach
                   
                   </ul>

            </li>


        </ul>
    </section>
</aside>

<?php

}
if(session()->get("flag")=='8'){
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Box </span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">


                    <li><a href="box_collection?func=i"><i class="fa fa-pencil-square-o"></i>Open Item </a></li>
                    <li><a href="box_collection?func=c"><i class="fa fa-pencil-square-o"></i>Study pack </a></li>





                </ul>

            </li>







        </ul>
    </section>
</aside>

<?php
}
if(session()->get("flag")=='11'){
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
 <li><a href="box_collection?func=c"><i class="fa fa-pencil-square-o"></i>Box</a></li>
<li class="treeview" style=" background-color: green">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Requisition</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                  
                  <ul class="treeview-menu">


                    @foreach($client as $clients){
                    
 <li><a href="dispatch_request?func=i&sch_id={{$clients->sch_id}}"><i class="fa fa-pencil-square-o"></i>{{$clients->sch_name}} Requisition</a></li>
                       @endforeach
                   
                   </ul>
              

            </li>



                   
                   
                 



 

              <li class="treeview" style=" background-color: green">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Dispatch Now</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                  
                  <ul class="treeview-menu">


                    @foreach($client as $clients){
                    
 <li><a href="view_disp_details_sr?func=i&sch_id={{$clients->sch_id}}&req_type=r"><i class="fa fa-pencil-square-o"></i>{{$clients->sch_name}}</a></li>
                       @endforeach
                   
                   </ul>
              

            </li>
<!--            <li class="treeview" style=" background-color: green">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span> Smart Pending </span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="view_disp_details_sr?w_id=5&rname=CR&sch_id=1&req_type=p"><i class="fa fa-pencil-square-o"></i>CR</a></li>
                    <li><a href="view_disp_details_sr?w_id=3&rname=NR&sch_id=1&req_type=p"><i class="fa fa-pencil-square-o"></i>NR</a></li>
                    <li><a href="view_disp_details_sr?w_id=4&rname=SR&sch_id=1&req_type=p"><i class="fa fa-pencil-square-o"></i>SR</a></li>
           </ul>

            </li>-->
            <li class="treeview" style=" background-color: green">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span> Dispatch Details</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                
                <ul class="treeview-menu">


                    @foreach($client as $clients){
                    
 <li><a href="w2w?func=i&sch_id={{$clients->sch_id}}"><i class="fa fa-pencil-square-o"></i>{{$clients->sch_name}}</a></li>
                       @endforeach
                   
                   </ul>

            </li>
            
        </ul>
    </section>
</aside>

<?php
}
if(session()->get("flag")=='9'){
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            <li><a href="south_req_table"><i class="fa fa-pencil-square-o"></i>School Requisition</a></li>
             <li><a href="w2w_req"><i class="fa fa-pencil-square-o"></i>Warehouse Requisition </a></li>
<!--           <li><a href="pm_req_pending"><i class="fa fa-pencil-square-o"></i>Pending Orders </a></li>-->
          
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Stock</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">


                   
                    <?php
                    if(session()->get("sch_id")=='1'){
                     ?>
                     <li><a href="grn?sch_id=1"><i class="fa fa-pencil-square-o"></i> GRN  </a></li>
                   
                    <li><a href="stock_in?sch_id=1"><i class="fa fa-pencil-square-o"></i>Stock In </a></li>
<!--                    <li><a href="stock_in?func=out"><i class="fa fa-pencil-square-o"></i>Stock Out </a></li>-->
                      <li><a href="open_balance"><i class="fa fa-pencil-square-o"></i>Opening Balance</a></li>
                      <li><a href="physical_stock_r_wise"><i class="fa fa-pencil-square-o"></i>Physical Stock</a></li>
                      <?php
                    }
                    ?>
                       <?php
                    if(session()->get("sch_id")=='11'){
                     ?>
                       <li><a href="grn?sch_id=11"><i class="fa fa-pencil-square-o"></i> GRN  </a></li>
                   
                    <li><a href="stock_in?sch_id=11"><i class="fa fa-pencil-square-o"></i>Stock In </a></li>
<!--                    <li><a href="stock_in?func=out"><i class="fa fa-pencil-square-o"></i>Stock Out </a></li>-->
                      <li><a href="open_balance_city"><i class="fa fa-pencil-square-o"></i>Opening Balance</a></li>
                      <li><a href="physical_stock_r_wise"><i class="fa fa-pencil-square-o"></i>Physical Stock</a></li>
                       <?php
                    }
                    ?>
                       <li><a href="misc_action"><i class="fa fa-pencil-square-o"></i>Scrap Stock/Adjustment</a></li>



                </ul>

            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Transfer</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

              
                  
                    <li><a href="w2w"><i class="fa fa-pencil-square-o"></i>W 2 W </a></li>
                     <li><a href="stock_in_w2w?func=1"><i class="fa fa-pencil-square-o"></i>Stocks</a></li>
<!--                    <li><a href="stock_in_w2w?func=1"><i class="fa fa-pencil-square-o"></i>Study Bags</a></li>
                    <li><a href="stock_in_w2w?func=2"><i class="fa fa-pencil-square-o"></i>Open Items</a></li>-->




                </ul>

            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Production</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="assign_req?func=pc&cls_id=1"><i class="fa fa-pencil-square-o"></i> Playgroup  </a></li> 
                    <li><a href="assign_req?func=pc&cls_id=2"><i class="fa fa-pencil-square-o"></i> Nursery </a></li> 
                    <li><a href="assign_req?func=pc&cls_id=3"><i class="fa fa-pencil-square-o"></i> Kindergarten </a></li> 
                    <li><a href="assign_req?func=pc&cls_id=4"><i class="fa fa-pencil-square-o"></i>Class 1 </a></li>
                    <li><a href="assign_req?func=pc&cls_id=5"><i class="fa fa-pencil-square-o"></i>Class 2 </a></li>
                   <li><a href="assign_req?func=pc&cls_id=6"><i class="fa fa-pencil-square-o"></i>Class 3</a></li>
                   <li><a href="assign_req?func=pc&cls_id=7"><i class="fa fa-pencil-square-o"></i>Class 4 </a></li>
                   <li><a href="assign_req?func=pc&cls_id=8"><i class="fa fa-pencil-square-o"></i>Class 5 </a></li>
                   <li><a href="assign_req?func=pc&cls_id=9"><i class="fa fa-pencil-square-o"></i>Class 6 </a></li>
                   <li><a href="assign_req?func=pc&cls_id=10"><i class="fa fa-pencil-square-o"></i>Class 7 </a></li>
                   <li><a href="assign_req?func=pc&cls_id=11"><i class="fa fa-pencil-square-o"></i>Class 8 </a></li>
                   <li><a href="assign_req?func=pc&cls_id=12"><i class="fa fa-pencil-square-o"></i>Class 9 </a></li>
                   <li><a href="assign_req?func=pc&cls_id=13"><i class="fa fa-pencil-square-o"></i>Class 10 </a></li>
                       
                    
                   
                 </ul>

            </li>
            <li><a href="total_stock"><i class="fa fa-pencil-square-o"></i>Total Stock</a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Items</span>
                    <span class="pull-right-container">

                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($users as $user){

                    <li><a href="product_item_table?item_type={{$user->item_type}}&item_id={{$user->item_id}}&item_name={{$user->item_name}}"><i class="fa fa-pencil-square-o"></i>{{$user->item_name}}</a></li>
                    @endforeach
                </ul>
            </li>
<li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="serch_grn?func=serch_grn"><i class="fa fa-pencil-square-o"></i> GRN By #   </a></li> 
                    <li><a href="serch_req?func=search"><i class="fa fa-pencil-square-o"></i> GRN By Date  </a></li> 
                    <li><a href="serch_po?func=search_po"><i class="fa fa-pencil-square-o"></i>GRN By PO # </a></li>
                    <li><a href="search_vendor?func=search_vendor"><i class="fa fa-pencil-square-o"></i>GRN By Vendor </a></li>
                     <li><a href="search_item?func=search_item"><i class="fa fa-pencil-square-o"></i>GRN By Item </a></li>
                   <li><a href="serch_req_requision?func=search"><i class="fa fa-pencil-square-o"></i>Search Requisition </a></li>
                   <li><a href="class_set_details2?func=search_item"><i class="fa fa-pencil-square-o"></i>NA Dispatch Report </a></li>
                    <?php
                    if(session()->get("sch_id")=='1'){
                     ?>
<!--                   <li><a href="search_item2?func=search_item"><i class="fa fa-pencil-square-o"></i>TSS Stock Report </a></li>
                   <li><a href="search_class_item2?func=search_item_by_class"><i class="fa fa-pencil-square-o"></i>TSS Stock Report By Class </a></li>-->
                    <li><a href="search_class_item2?func=disp_report_by_class"><i class="fa fa-pencil-square-o"></i> TSS Dispatch Report </a></li>
                   <?php
                    }
                    ?>
                   <?php
                    if(session()->get("sch_id")=='11'){
                     ?>
<!--                   <li><a href="search_item2?func=search_item"><i class="fa fa-pencil-square-o"></i>TCS Stock Report </a></li>
                   <li><a href="search_class_item2?func=search_item_by_class"><i class="fa fa-pencil-square-o"></i>TCS Stock Report By Class </a></li>-->
                    <li><a href="search_class_item2?func=disp_report_by_class"><i class="fa fa-pencil-square-o"></i> TCS Dispatch Report </a></li>
                   <?php
                    }
                    ?>
                 </ul>

            </li>

            <li><a href="search"><i class="fa fa-pencil-square-o"></i>search</a></li>
    
        </ul>

    </section>
</aside>

<?php
}
if(session()->get("flag")=='12'){
?>

   <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="blank-profile.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>  <?php  echo $value=session()->get("username");?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>

          <li><a href="dispatch_request"><i class="fa fa-pencil-square-o"></i>School Requisition</a></li>
           <li><a href="w2w_req?func=pm"><i class="fa fa-pencil-square-o"></i>Warehouse Requisition </a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>Stock</span>
                    <span class="pull-right-container">
<!--              <span class="label label-primary pull-right">4</span>-->
                 <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">


                    <li><a href="grn"><i class="fa fa-pencil-square-o"></i> GRN  </a></li>
                    <li><a href="stock_in"><i class="fa fa-pencil-square-o"></i>Stock In </a></li>
<!--                    <li><a href="stock_in?func=out"><i class="fa fa-pencil-square-o"></i>Stock Out </a></li>-->




                </ul>

            </li>

            <li><a href="search"><i class="fa fa-pencil-square-o"></i>search</a></li>

        </ul>

    </section>
    <!-- /.sidebar -->

</aside>
<?php 

} 
?>

@yield('content')





