<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
<div class="col-md-12 ">
    <div class="card">
          <div class="card-body">
            <form id="frcFilter">
              <div class="form-row"><div class="col-2">
              <h5>Filter by Category</h5>
                </div>
                <div class="col-4">
                  <select id="searchByCat" name="searchByCat" class="form-control">
                    <option value="">-- Select Category --</option>
                    <option value="challan_date">Date</option>
                    <option value="challan_to">Party Name</option>
                    <option value="challan_no">Challan no</option>
                    <option value="fabric_type">Fabric Type</option>
                    
                  </select>
                </div>
                <div class="col-4">
                  <input type="text" name="searchValue" class="form-control" value="" placeholder="Search"
                   >
                </div>
                <input type="hidden" name="type" value="return" >
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
                    <h4 class="card-title">Return Challan List</h4>
                    <hr>

                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <div class="row well">
                            <div class="col-6"><a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             &nbsp;&nbsp;<a type="button" class="btn btn-info pull-left print_all btn-success" style="color:#fff;"><i class="fa fa-print"></i></a>
                             </div>
                            <div class="col-6">
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
                                   <input type="hidden" name="type" value="return" >
                                  <div class="col-2">
                                  <label>Search</label>  
                                  <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                                    value="<?=$this->security->get_csrf_hash();?>" />
                                  <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>
                                </div>
                                </div>
                              </form></div>
                            </div><hr>
                            <table class="table table-bordered data-table text-center table-responsive">
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
                                        $id=1;
                                        foreach ($frc_data as $value) { ?>
                                        <tr class="gradeU" id="tr_<?php echo $value['id']?>">

                                          <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['id'] ?>"></td>
                                          <td><?php echo $value['challan_date'];?></td>

                                          
                                          <td><?php echo $value['sort_name'];?></td>
                                         <td><?php echo $value['challan_no'];?></td>
                                           <td><?php echo $value['fabric_type'];?></td>
                                          
                                         
                                          <td><?php echo $value['total_quantity']?></td>
                                          <td><?php echo $value['unitName']?></td>
                                          <td><?php echo $value['total_amount']?></td>
                                          
                                          
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
