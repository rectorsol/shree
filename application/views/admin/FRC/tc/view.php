<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
 
        <!-- **************** Product List *****************  -->
        <div class="col-md-12 bg-white">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">TC Challan Receive Detail</h4>
                    <hr>

                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <div class="row well" >
                             <div class="col-6"> <a type="button" class="btn btn-info pull-left print_all btn-success" style="color:#fff;"><i class="fa fa-print"></i></a>
                             </div>
                            </div><hr>
                            <table class=" table-bordered data-table text-center table-responsive" id="frc">
                                <thead class="bg-dark text-white">
                                    <tr class="odd" role="row">
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>Date</th>
                                        
                                        <th>PBC</th> 
                                        <th>Fabric </th>
                                        
                                        <th>Total qty</th>
                                       
                                        <th>Curr qty</th> 
                                        
                                         
                                          <th>Color</th>
                                          <th>unit</th> 
                                       
                                        <th>TC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        $c=1;$total_qty=0.00;$total_val=0.00;
                                        
                                        foreach ($frc_data as $value) { 
                                          $total_qty+=$value['stock_quantity'];
                                        $total_val+=$value['tc'];?>
                                        <tr class="gradeU" id="tr_<?php echo $value['fsr_id']?>">

                                          <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['fsr_id'] ?>"></td>
                                          <td><?php echo $value['created_date'];?></td>

                                         
                                          <td><?php echo $value['parent'];?></td>
                                         <td><?php echo $value['fabricName'];?></td>
                                          
                                          
                                          <td><?php echo $value['stock_quantity']?></td>
                                         
                                          <td><?php echo $value['current_stock']?></td>
                                          <td><?php echo $value['color_name']?></td>
                                          <td><?php echo $value['stock_unit'];?></td>
                                          
                                           <td><?php echo $value['tc'];?></td>
                                         
                                        </tr>

                                <?php $c=$c+1; } ?>
                                </tbody class="bg-dark text-white"><tfoot>
                                <tr > <th></th><th></th>
 <th></th>
                   <th>Total</th>
                  <th id="th_qty"><?php echo $total_qty ?></th>
                  <th></th>  
                 
                  
              
                  <th></th>
                  <th>Total</th>
                  <th id="th_total" ><?php echo $total_val ?></th>
                  </tr></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    function delete_detail(id) {
        var del = confirm("Do you want to Delete");
        if (del == true) {
            window.location = "<?php echo base_url()?>admin/Orders/deleteOrders/" + id;
        }
    }
   
   jQuery('.print_all').on('click', function(e) {
  var allVals = [];
   $(".sub_chk:checked").each(function() {
     allVals.push($(this).attr('data-id'));
   });
   //alert(allVals.length); return false;
   if(allVals.length <=0)
   {
     alert("Please select row.");
   }
   else {
     //$("#loading").show();
     WRN_PROFILE_DELETE = "Are you sure you want to Print this rows?";
     var check = confirm(WRN_PROFILE_DELETE);
     if(check == true){
       //for server side
     var join_selected_values = allVals.join(",");
     // alert (join_selected_values);exit;
     var ids = join_selected_values.split(",");
     var data = [];
     $.each(ids, function(index, value){
       if (value != "") {
         data[index] = value;
       }
     });
       $.ajax({
         type: "POST",
         url: "<?= base_url()?>admin/FRC/return_print_multiple",
         cache:false,
         data: {'ids' : data,'title':'TC List Details','type':'tc', '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
         success: function(response)
         {
           $("body").html(response);
         }
       });
              //for client side

     }
   }
 });  
</script>


