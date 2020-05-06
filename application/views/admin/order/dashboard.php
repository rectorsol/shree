<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#home"
                aria-selected="true">HOME</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#get_pending" aria-selected="false">PENDING
                <span class="badge badge-pill badge-info"><?php echo $order_count->pending ?></span></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#get_cancel" aria-selected="false">CANCEL
                <span class="badge badge-pill badge-secondary"><?php echo $order_count->cancel ?></span></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#get_complete"
                aria-selected="false">COMPLETED <span
                  class="badge badge-pill badge-success"><?php echo $order_count->done ?></span></a></li>
          </ul>
          <div class="tab-content tabcontent-border">
            <div id="home" class="tab-pane active show" role="tabpanel">
              <p>
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                      <div class="card card-hover">
                        <div class="box bg-info text-center">
                          <h1 class="font-light text-white">
                            <i class="mdi mdi-information"></i>
                          </h1>
                          <h4 class="font-light text-white"><?php echo $order_count->total; ?></h4>
                          <h5 class="text-white">TOTAL ORDERS</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                      <div class="card card-hover">
                        <div class="box bg-danger text-center">
                          <h1 class="font-light text-white">
                            <i class="mdi mdi-lan-pending"></i>
                          </h1>
                          <h4 class="font-light text-white"><?php echo $order_count->pending; ?></h4>
                          <h5 class="text-white">PENDING ORDERS</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                      <div class="card card-hover">
                        <div class="box bg-warning text-center">
                          <h1 class="font-light text-white">
                            <i class="mdi mdi-alert"></i>
                          </h1>
                          <h4 class="font-light text-white"><?php echo $order_count->cancel; ?></h4>
                          <h5 class="text-white">CANCEL ORDERS</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                      <div class="card card-hover">
                        <div class="box bg-primary text-center">
                          <h1 class="font-light text-white">
                            <i class="mdi mdi-border-outside"></i>
                          </h1>
                          <h4 class="font-light text-white"><?php echo $order_count->inprocess; ?></h4>
                          <h5 class="text-white">INPROCESS ORDERS</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                      <div class="card card-hover">
                        <div class="box bg-success text-center">
                          <h1 class="font-light text-white">
                            <i class="mdi mdi-check"></i>
                          </h1>
                          <h4 class="font-light text-white"><?php echo $order_count->done ?></h4>
                          <h5 class="text-white">DONE ORDERS</h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </p>
            </div>
            <div id="get_pending" class="tab-pane fade p-20" role="tabpanel">
              <h3>ORDER PENDING</h3>
              <hr>
              <div class="row ">

                <div class="col-md-11 "><button class="btn btn-danger cancel_all" href="#Cancel" data-toggle="modal"
                    data-original-title="Edit"><i class="mdi mdi-delete "></i> Cancel</button> </div>
                <div class="col-md-1 ">
                  <button class="btn btn-primary done_all" >Done</button>
                </div>
              </div>
                
              <p>
                <table class="table table-bordered data-table text-center table-responsive">
                  <thead class="">
                    <tr class="odd" role="row">
                      <th><input type="checkbox"  id="master"></th>
                     
                      <th>Series Number</th>
                      <th>Order Number</th>
                      <th>Fabric Name</th>
                      <th>Hsn</th>
                      <th>Design Name</th>
                      <th>Design Code</th>
                      <th>Stitch</th>
                      <th>Dye</th>
                      <th>Matching</th>
                      <th>Remark</th>
                      <th>Quantity</th>
                      <th>Unit</th>
                      <th>Priority</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($get_pending as $value): ?>
                    <tr class="gradeU" id="tr_<?php echo $value['product_order_id']?>">
                      <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['product_order_id'] ?>">
                      </td>
                      
                      <td><?php echo $value['series_number']?></td>
                      <td><?php echo $value['product_order_id'];?></td>
                      <td><?php echo $value['fabric_name'];?></td>
                      <td><?php echo $value['hsn'];?></td>
                      <td><?php echo $value['design_name']?></td>
                      <td><?php echo $value['design_code']?></td>
                      <td><?php echo $value['stitch']?></td>
                      <td><?php echo $value['dye']?></td>
                      <td><?php echo $value['matching']?></td>
                      <td><?php echo $value['remark']?></td>
                      <td><?php echo $value['quantity']?></td>
                      <td><?php echo $value['unit']?></td>
                      <td><?php echo $value['priority']?></td>
                    </tr>
                  
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </p>
            </div>
            <div id="get_cancel" class="tab-pane fade p-20" role="tabpanel">
              <h3>CANCEL ORDER</h3>
              <p>
                <table class="table table-bordered data-table text-center table-responsive">
                  <thead class="">
                    <tr class="odd" role="row">
                      
                      <th>Series Number</th>
                      <th>Order Number</th>
                      <th>Fabric Name</th>
                      <th>Hsn</th>
                      <th>Design Name</th>
                      <th>Design Code</th>
                      <th>Stitch</th>
                      <th>Dye</th>
                      <th>Matching</th>
                      <th>Remark</th>
                      <th>Quntity</th>
                      <th>Unit</th>
                      <th>Cause of Cancel</th>
                      <th>Date of Cancel</th>
                      <th>Priority</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($get_cancel as $value): ?>
                    <tr class="gradeU" id="tr_<?php echo $value['product_order_id']?>">
                      
                      <td><?php echo $value['series_number']?></td>
                      <td><?php echo $value['product_order_id'];?></td>
                      <td><?php echo $value['fabric_name'];?></td>
                      <td><?php echo $value['hsn'];?></td>
                      <td><?php echo $value['design_name']?></td>
                      <td><?php echo $value['design_code']?></td>
                      <td><?php echo $value['stitch']?></td>
                      <td><?php echo $value['dye']?></td>
                      <td><?php echo $value['matching']?></td>
                      <td><?php echo $value['remark']?></td>
                      <td><?php echo $value['quantity']?></td>
                      <td><?php echo $value['unit']?></td>
                       <td><?php echo $value['name']?></td>
                       <td><?php echo $value['date']?></td>
                      <td><?php echo $value['priority']?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </p>
            </div>
            <div id="get_complete" class="tab-pane fade p-20" role="tabpanel">
              <h3>Program in P.G List</h3>
              <div class="row ">

                <div class="col-md-11 "><button class="btn btn-danger cancel_all2" href="#Cancel" data-toggle="modal"
                    data-original-title="Edit"><i class="mdi mdi-delete "></i> Cancel</button> </div>
               
              </div>
              
              <p>
                <table class="table table-bordered data-table text-center table-responsive">
                  <thead class="">
                    <tr class="odd" role="row">
                      <th><input type="checkbox"  id="master2"></th>
                      <th>Series Number</th>
                      <th>Order Number</th>
                      <th>Fabric Name</th>
                      <th>Hsn</th>
                      <th>Design Name</th>
                      <th>Design Code</th>
                      <th>Stitch</th>
                      <th>Dye</th>
                      <th>Matching</th>
                      <th>Remark</th>
                      <th>Quntity</th>
                      <th>Unit</th>
                      <th>Priority</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($get_complete as $value): ?>
                    <tr class="gradeU" id="tr_<?php echo $value['product_order_id']?>">
                      <td><input type="checkbox" class="sub_chk2" data-id="<?php echo $value['product_order_id'] ?>">
                      </td>
                      <td><?php echo $value['series_number'];?></td>
                      <td><?php echo $value['product_order_id'];?></td>
                      <td><?php echo $value['fabric_name'];?></td>
                      <td><?php echo $value['hsn'];?></td>
                      <td><?php echo $value['design_name'];?></td>
                      <td><?php echo $value['design_code'];?></td>
                      <td><?php echo $value['stitch'];?></td>
                      <td><?php echo $value['dye'];?></td>
                      <td><?php echo $value['matching'];?></td>
                      <td><?php echo $value['remark'];?></td>
                      <td><?php echo $value['quantity'];?></td>
                      <td><?php echo $value['unit'];?></td>
                      <td><?php echo $value['priority'];?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </p>
            </div>
          </div>
          <div id="Cancel" class="modal hide">
                <div class="modal-dialog" role="document ">
                  <div class="modal-content">
                    <form action="<?php echo base_url('admin/Orders/cancel_status/'); ?>" method="POST">
                      <div class="modal-header">
                        <h5 class="modal-title">Cause Of Cancel</h5>
                        <button data-dismiss="modal" class="close" type="button">×</button>

                      </div>
                      <div class="modal-body">
                        <div class="widget-content nopadding">
                          <div class="form-group row">
                            <label class="control-label col-sm-3">Cause</label>
                            <div class="col-sm-9">
                              <select name="cause" id="" class="form-control"><option value="">Select Cause</option>
                              <?php foreach($cause as $row){?>
                                  <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                             <?php }?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3">Cancel Date</label>
                            <div class="col-sm-9">
                              <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d')?>"
                                >
                                <input type="hidden" name="ids" id="ids">
                               
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                       <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <input type="submit" value="Cancel" class="btn btn-primary" >
                        <a data-dismiss="modal" class="btn" href="#">Close</a>
                      </div>
                   </form>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('#master').on('click', function (e) {
    if ($(this).is(':checked', true)) {
      $(".sub_chk").prop('checked', true);
    } else {
      $(".sub_chk").prop('checked', false);
    }
  });
 
      $('.cancel_all').on('click', function(e) {
      var allVals = [];
      $(".sub_chk:checked").each(function() {
        allVals.push($(this).attr('data-id'));
      });
      //alert(allVals.length); return false;
      if (allVals.length <= 0) {
        alert("Please select row.");
      } else {
        //$("#loading").show();
        WRN_PROFILE_DELETE = "Are you sure you want to cancel this row?";
        var check = confirm(WRN_PROFILE_DELETE);
        if (check == true) {
          //for server side
          var join_selected_values = allVals.join(",");
          $("#ids").val(join_selected_values);
        }
      }
    });
    $('.cancel_all2').on('click', function(e) {
      var allVals = [];
      $(".sub_chk2:checked").each(function() {
        allVals.push($(this).attr('data-id'));
      });
      //alert(allVals.length); return false;
      if (allVals.length <= 0) {
        alert("Please select row.");
      } else {
        //$("#loading").show();
        WRN_PROFILE_DELETE = "Are you sure you want to cancel this row?";
        var check = confirm(WRN_PROFILE_DELETE);
        if (check == true) {
          //for server side
          var join_selected_values = allVals.join(",");
          $("#ids").val(join_selected_values);
        }
      }
    });
 $('.done_all').on('click', function(e) {
      var allVals = [];
      $(".sub_chk:checked").each(function() {
        allVals.push($(this).attr('data-id'));
      });
      //alert(allVals.length); return false;
      if (allVals.length <= 0) {
        alert("Please select row.");
      } else {
        //$("#loading").show();
        WRN_PROFILE_DELETE = "Are you sure you want to do this row?";
        var check = confirm(WRN_PROFILE_DELETE);
        if (check == true) {
          //for server side
          var join_selected_values = allVals.join(",");
          // alert (join_selected_values);exit;

          $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/Orders/done_status') ?>",
            cache: false,
            data: {
              'ids': join_selected_values,
              '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(response) {
              location.reload(true);
             
            }
          });
        }
      }
    });
    $('#master2').on('click', function(e) {
       console.log("master2");
      if ($(this).is(':checked', true)) {
        $(".sub_chk2").prop('checked', true);
      } else {
        $(".sub_chk2").prop('checked', false);
      }
    });
</script>