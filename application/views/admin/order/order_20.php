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
          	                   <a type="button" class="btn btn-primary pull-left delete_all" style="color:#fff;">Delete Selected</a>
                            </div>
                            <table class="table table-bordered data-table text-center table-responsive">
                                <thead class="">
                                    <tr class="odd" role="row">
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>S/No</th>
                                        <th>Series Number</th>
                                        <th>Order Number</th>
                                        <th>Fabric Name</th>
                                        <th>Hsn</th>

                                        <th>Customer Name</th>
                                        <th>Design Barode</th>
                                        <th>Design Name</th>
                                         <th>Design Code</th>
                                        <th>Stitch</th>
                                        <th>Dye</th>
                                        <th>Matching</th>
                                        <th>Remark</th>
                                        <th>Quntity</th>
                                        <th>Unit</th>

                                        <th>Priority</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  if($all_Order>0)
                  {
                  $id=1;
                  foreach ($all_Order as $orders) { ?>
                                      <tr class="gradeU" id="tr_<?php echo $orders['product_order_id']?>">
                                      <td><input type="checkbox" class="sub_chk" data-id="<?php echo $orders['product_order_id'] ?>"></td>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $orders['series_number']; ?></td>
                                        <td><?php echo $orders['order_number']; ?></td>
                                        <td><?php echo $orders['fabric_name']; ?></td>
                                        <td><?php echo $orders['hsn']; ?></td>
                                        <td><?php echo $orders['customer_name'];?></td>
                                        <td><?php echo $orders['design_name']; ?></td>
                                        <td><?php echo $orders['design_code']; ?></td>
                                        <td><?php echo $orders['stitch']; ?></td>
                                        <td><?php echo $orders['dye']; ?></td>
                                        <td><?php echo $orders['matching']; ?></td>
                                        <td><?php echo $orders['remark'];?></td>
                                         <td><?php echo $orders['quantity']; ?></td>
                                        <td><?php echo $orders['unit']; ?></td>
                                        <td><?php echo $orders['order_barcode']; ?></td>
                                        <td><?php echo $orders['priority']; ?></td>
                                        <td><?php echo $orders['order_date'];?></td>
                                        <td>
                                            <a class="text-center tip" href="<?php echo base_url('admin/orders/editOrders/').$orders['product_order_id'] ?>"><abbr title="Edit">
                                            <i class="fas fa-edit"></i></abbr></i></a>

                                            <a class="text-danger text-center tip" href="javascript:void(0)" onclick="delete_detail(<?php echo $orders['product_order_id'];?>)" ><abbr title="Delete">
                                            <i class="mdi mdi-delete"></i></abbr></a>

                                            <a class="text-center tip" class="text-center tip" target="_blank" href="<?php echo base_url('admin/Orders/design_print/').$orders['product_order_id'] ?>">
                                            <i class="fa fa-print" aria-hidden="true"></i></a>

                                        </td>

                                    </tr>
                                    <?php  $id=$id+1; } } ?>
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

<script>
    function delete_detail(id) {
        var del = confirm("Do you want to Delete");
        if (del == true) {

            window.location = "<?php echo base_url()?>admin/Orders/deleteOrders/" + id;
        }
    }
</script>
<?php include('order_js.php');?>
