<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
    <div class="col-md-12 ">
    <div class="card">
          <div class="card-body">
            <form id="frcFilter">
              <div class="form-row"> <div class="col-2">
              <h5>Filter by Category</h5>
                </div>
                <div class="col-4">
                  <select id="searchByCat" name="searchByCat" class="form-control">
                    <option value="">-- Select Category --</option>
                    <option value="challan_date">Date </option>
                    <option value="challan_to">Party Name</option>
                    <option value="challan_no">Challan no</option>
                    <option value="fabric_type">Fabric Type</option>
                    <option value="total_amount">Total amount</option>
                  </select>
                </div>
                <div class="col-4">
                  <input type="text" name="searchValue" class="form-control" value="" placeholder="Search"
                    >
                </div>
                 <input type="hidden" name="type" value="recieve" >
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                  value="<?=$this->security->get_csrf_hash();?>" />
                <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>
              </div>
            </form>

          </div>
        </div>
</div>


        <!-- **************** Product List *****************  -->
        <div class="col-md-12 bg-white">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Challan Receive List</h4>
                    <hr>

                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <div class="row well" >
                             <div class="col-6"> <a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;<a type="button" class="btn btn-info pull-left print_all btn-success" style="color:#fff;"><i class="fa fa-print"></i></a>
                             </div><div class="col-6">
                            
                             <form id="frc_dateFilter" > 
                           
                                <div class="form-row " >
                                  <div class="col-5">
                               <label>Date From</label> 
                                    <input type="date" name="date_from" class="form-control" value="<?php echo date('Y-m-d')?>" 
                                      >
                                  </div>
                                  <div class="col-5">
                                <label>Date To</label>  
                                    <input type="date" name="date_to" class="form-control" value="<?php echo date('Y-m-d')?>" 
                                      >
                                  </div>
                                  <div class="col-2">
                                   <label>Search</label>  
                                   <input type="hidden" name="type" value="recieve" >
                                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                    value="<?=$this->security->get_csrf_hash();?>" />
                                  <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>
                                </div>
                                </div>
                              </form>
                            </div>
                            </div><hr>
                            <table class="table table-bordered data-table text-center table-responsive" id="frc">
                                <thead class="">
                                    <tr class="odd" role="row">
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>Date</th>
                                        
                                        <th>Party name</th> 
                                        <th>Challan no</th>
                                        <th>Fabric Type</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>  
                                        <th>Total amount</th> 
                                        
                                         <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        $c=1;
                                        foreach ($frc_data as $value) { ?>
                                        <tr class="gradeU" id="tr_<?php echo $value['fc_id']?>">

                                          <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['fc_id'] ?>"></td>
                                          <td><?php echo $value['challan_date'];?></td>

                                          <td><?php echo $value['sort_name'];?></td>
                                         <td><?php echo $value['challan_no'];?></td>
                                           <td><?php echo $value['fabric_type'];?></td>
                                          
                                          <td><?php echo $value['total_quantity']?></td>
                                          <td><?php echo $value['unitName']?></td>
                                          <td><?php echo $value['total_amount']?></td>
                                          
                                          <td>

                                            <a href="<?php echo base_url('admin/Orders/edit_order_product_details/').$value['fc_id'] ?> ">
                                              <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <!-- </a> -->
                                            <a class="text-center tip" target="_blank" href="<?php echo base_url('admin/frc/recieve_print/').$value['fc_id'] ?>">
                        <i class="fa fa-print" aria-hidden="true"></i></a>
                                          </td>
                                        </tr>

                                <?php $c=$c+1; } ?>
                                </tbody>
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
         url: "<?= base_url()?>admin/PrintThis/Recieve_Challan_multiprint",
         cache:false,
         data: {'ids' : data, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
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

<?php include('FRC_js.php');?>
