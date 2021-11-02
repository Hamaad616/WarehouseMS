

            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h3> Good Receipt Note</h3>
                            <?php
                            if((session()->get("flag")=='1') || (session()->get("flag")=='12')){
                            ?>
                            <button class="btn btn-primary" style="background-color: #2f54c4; border-color:#2f54c4;" onclick="javascript:window.location = 'view_grn_field?func=add&sch_id={{ $_GET['sch_id'] }}';">
                            <span class="glyphicon glyphicon-folder-close"></span>
                            Add New GRN
                            </button>
                            <?php
                            }
                            ?>
                        <?php
                         if((session()->get("flag")=='9')){
                            ?>
                            <button class="btn btn-primary" style="background-color: #2f54c4; border-color:#2f54c4;" onclick="javascript:window.location = 'view_grn_field?func=add';">
                            <span class="glyphicon glyphicon-folder-close"></span>
                            Add New GRN
                            </button>
                            <?php
                         }
                            ?>
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="" class="table table-bordered  example1">


                                    <thead>
                                    <tr style="background-color:#2f54c4;color: white">
                                        <th style=" width: 8%">GRN #</th>
                                        <th>Vendor</th>
                                        <th>Session</th>
                                        <th>P/O</th>
                                        <th>D/O</th>


                                        <th>Total Qty</th>
                                        <th>Date</th>
                                        <?php
                                       if((session()->get("flag")=='1') || (session()->get("flag")=='9')){
                                        ?>
                                        <th>Action</th>
                                        <?php  } ?>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($users as $user)
                                    
                                    <?php
                                    
//              $users155=DB::select("SELECT * from grn_details where grn_id=".$user->grn_id." and grnd_flag='1'");
//
//              $new_val = array();
//           if(!empty($users155)){
//          foreach ($users155 as $users152){
//                  
//                   
//                     $new_val[] = $users152->grnd_id;
//                   
//                    // $ids = join("','",$new_val);   
//                    
//                     
//                     }
                     // print_r($new_val);
                    // echo "SELECT SUM(quantity) AS mainqty FROM item_stock WHERE grnd_id IN(".implode(',',$new_val).")";
                    $sqll=DB::select("SELECT sum(`rem_stack_fit`) as mainqty from grn_details where grn_id =".$user->grn_id." and grnd_flag='1'");
                     foreach ($sqll as $sqll2) {
                         if($sqll2->mainqty == '0'){
                            
                              $textrow  = '';
                              $disabled ='';
                         }else{
                          
                           $textrow  = 'p-3 mb-2 bg-danger text-white';
                           $disabled ='';
                         }
                         
                     }
                    
                    
        //   }
//        if($users152->grnd_id  ){
//             $flag = 'disabled="disabled"';
//             $flag2 = 'readonly="readonly"';
//             $text  = "Product Already received";
//        }        }
//}else{
//    $flag = '';
//    $flag2 = '';
//    $text  = '';
//}

    ?>
                                    <tr class="{{$textrow}}">
                                    <td>
                                        <?php
                            if((session()->get("flag")=='9')){
                            ?>
                                        <a href="grn_details?grn_id={{$user->grn_id}}&sch_id={{ $_GET['sch_id'] }}'"><span class="badge">{{$user->grn_id}}</span></a>
                                    <?php
                            }else{
                                ?>
                                         <a href="grn_details?grn_id={{$user->grn_id}}&sch_id={{$_GET['sch_id']}}"><span class="badge">{{$user->grn_id}}</span></a>
                                <?php
                            }
                                    ?>
                                    </td>
                                    <td>{{$user->vend_name}}</td>
                                     <td>{{$user->session_number}}</td>
                                    <td>{{$user->po}}</td>
                                    <td>{{$user->do}}</td>
                                    <td><?php echo $user->qty; ?></td>
       <td>
 <?php  
                                        if($user->vend_name=='Recycle'){
                                        echo date("d-m-Y", strtotime($user->date_time));
                                        }else{
                                         echo date("d-m-Y", strtotime($user->todate));    
                                        }
                                        ?>
</td>
                                     <?php
                                      if((session()->get("flag")=='1') || (session()->get("flag")=='9')){
                                      ?>
                                                <td style="width: 15%;">
                                                <a href="javascript:changeStatus({{$user->grn_id}},<?php echo($user->grn_status == 1) ? "0" : "1"; ?>,<?php  echo $_GET['sch_id']?>) " class="<?php echo($user->grn_status== 1) ? "btn btn-warning btn-sm ".$disabled : "btn btn-danger btn-sm ".$disabled  ?>"><?php echo ($user->grn_status == 1) ? "ON" : "OFF" ?></a>
                                                <a href="view_grn?func=edit&grn_id={{$user->grn_id}}&sch_id=<?php  echo $_GET['sch_id']?>&session_id={{$user->session_id}}" class="btn btn-success <?php echo $disabled;?>"><span class="glyphicon glyphicon-edit <?php echo $disabled;?>" data-toggle="tooltip" title="Edit"></span></a>
                                                <a href='chgrnst?func=del&grn_id={{$user->grn_id}}&sch_id=<?php  echo $_GET['sch_id']?>'onclick="return confirm('Are you sure?')"  class="btn btn-danger <?php echo $disabled;?>" ><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Remove"></span></a>
                                                </td>

                                            <?php
                                            }
                                            ?>
                                        </tr>

                                    @endforeach
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
    $(function (){

    $(document).ready(function() {
    $('.example1').DataTable( {
        iDisplayLength: 150,
             ordering: false,
             
       
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

});
                         
</script>


<script>
    function changeStatus(id, status,sch_id) {
        //alert(id);
        if (confirm("Do you want to change status ?")) {
            document.frmChangeStatus.action.value = "changeStatus";
            document.frmChangeStatus.id.value = id;
            document.frmChangeStatus.sch_id.value = sch_id;
            document.frmChangeStatus.status.value = status;
            document.frmChangeStatus.submit();
        }
    }

</script>
<form name="frmChangeStatus" action="chgrnst" method="post" >
    {{csrf_field()}}
    <input type="hidden" name="action" value="" />
    <input name="id" type="hidden" value="" />
    <input name="func" type="hidden" value="status" />
    <input name="status" type="hidden" value="" />
    <input name="sch_id" type="sch_id" value="" />
</form>




     <script src="https://cdn.datatables.net/buttons/1.5.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
</body>
</html>
@endsection
@include("footer")


