<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
 <div class="col-md-12 ">
    <div class="card">
          <div class="card-body">
            <form id="dataCateFilter">
              <div class="form-row">
                <div class="col-4">
                  <select id="searchByCat" name="searchByCat" class="form-control">
                    <option value="">-- Select Category --</option>
                    <option value="challan_date">Date</option>
                    <option value="parent_barcode">PBC</option>
                    <option value="challan_no">color</option>
                    <option value="fabric_type">Fabric Type</option>
                    
                  </select>
                </div>
                <div class="col-4">
                  <input type="text" name="searchValue" class="form-control" value="" placeholder="Search"
                    id="searchByValue">
                </div>
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
                    <h4 class="card-title">2nd PBC List</h4>
                    <hr>

                    <div class="widget-box">
                      <div class="row well">
                            &nbsp;&nbsp;&nbsp; <a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;&nbsp;<a type="button" class="btn btn-info pull-left print_all btn-success" style="color:#fff;"><i class="fa fa-print"></i></a>
                            </div> <hr> 
                            <table class="table table-bordered data-table text-center table-responsive">
                                <thead class="">
                                    <tr class="odd" role="row">
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>Date</th>
                                        <th>PBC</th>
                                        <th>Fabric</th> 
                                        <th>Color</th>
                                        <th>Quantity</th>
                                        <th>Current quantity</th>  
                                        <th>Unit</th>
                                        <th>TC</th>
                                        <th>View Details</th>
                                         <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                        $id=1;
                                        foreach ($pbc_data as $value) { ?>
                                        <tr class="gradeU" id="tr_<?php echo $value['id']?>">

                                          <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['id'] ?>"></td>
                                          <td><?php echo $id ?></td>

                                          
                                          <td><?php echo $value['parent_barcode'];?></td>
                                          <td><?php echo $value['fabricName'];?></td>
                                           <td><?php echo $value['color_name'];?></td>
                                          
                                         
                                          <td><?php echo $value['stock_quantity']?></td>
                                          <td><?php echo $value['current_stock']?></td>
                                          <td><?php echo $value['unitName']?></td>
                                          <td><?php echo $value['tc']?></td>
                                          <td><a href="<?php echo base_url('admin/FRC/Get2ndPbc/').$value['parent_barcode'] ?> ">
                                             View details
                                            </a></td>
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
