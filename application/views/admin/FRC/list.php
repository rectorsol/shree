<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">

        <!-- **************** Product List *****************  -->
        <div class="col-md-12 bg-white">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order List</h4>
                    <hr>

                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <div class="row well">
                            &nbsp;&nbsp;&nbsp; <a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <a href="<?php echo base_url('admin/Orders/back') ?>" style="">GO Back</a>
                            </div>
                            <table class="table table-bordered data-table text-center table-responsive">
                                <thead class="">
                                    <tr class="odd" role="row">
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>Date</th>
                                        
                                        <th>Party name</th> 
                                        <th>Challan no</th>
                                        <th>Fabric_id</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>  
                                        
                                        
                                         <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        $id=1;
                                        foreach ($frc_data as $value) { ?>
                                        <tr class="gradeU" id="tr_<?php echo $value['id']?>">

                                          <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['id'] ?>"></td>
                                          <td><?php echo $id ?></td>

                                          
                                          <td><?php echo $value['challan_date'];?></td>
                                         <td><?php echo $value['challan_no'];?></td>
                                           <td><?php echo $value['fabric_id'];?></td>
                                          
                                         
                                          <td><?php echo $value['stock_quantity']?></td>
                                          <td><?php echo $value['unitName']?></td>
                                          
                                          
                                          
                                          <td>

                                            <a href="<?php echo base_url('admin/Orders/edit_order_product_details/').$value['id'] ?> ">
                                              <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="text-danger text-center tip" href="javascript:void(0)" onclick="delete_detail(<?php echo $value['id'];?>)" data-original-title="Delete">
                                              <i class="mdi mdi-delete red"></i>
                                            </a>

                                          </td>
                                        </tr>

                                <?php $id=$id+1; } ?>
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
     
</script>

<?php include('FRC_js.php');?>
