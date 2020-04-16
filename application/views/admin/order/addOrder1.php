<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">


                <form method="post" id="order">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h5 class="modal-title"><i class="fa fa-plus"></i> Create Order</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                              <div class="col-md-3">
                                  <label>Order Type</label>
                                  <select name="order_type"  class="form-control" id="selectType">
                                  <option value="">Select Order Type</option>
                                  <?php foreach ($all_Order as $value): ?>
                                    <option value="<?php echo $value['orderType'];?>"> <?php echo $value['orderType'];?></option>
                                 <?php endforeach;?>
                                  </select>
                              </div>

                                <div class="col-md-3">
                                    <label>Session</label>
                                    <select name="" class="form-control">
                                        <option>Select Session</option>
                                        <?php foreach ($all_session as $value): ?>
                                          <option value="<?php echo $value['financial_year'];?>"> <?php echo $value['financial_year'];?></option>
                                       <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form><br>
                <form method="post" id="fresh_form" action="<?php echo base_url('admin/Orders/add_fresh_data')?>">
                    <div class="modal-content">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-3">
                            <label>Enter Order Number</label>
                            <input type="text" class="form-control" name="order_number" required readonly value="<?php echo $order_number;?>" >
                        </div>
                        <div class="col-md-3">
                            <label>Customer Name</label>
                            <input type="text" class="form-control" name="customer_name" required value="">
                        </div>

                        <div class="col-md-2 align-center" id="rd_bt"><br>
                           <input type="hidden" value="FRESH" name="order_type">
                           <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                           <input type="submit" name="action" id="btn"  class="btn btn-info btn-block" value="ORDER" />
                        </div>
                     </div>
                     <hr>
                   </div>
                        <div class="modal-body">
                            <div class="row" id="fresh_data">

                            </div>
                        </div>
                          </div>
                </form><br>

                <form method="post" id="order_form" action="<?php echo base_url('admin/Orders/add_prm')?>">
                    <div class="modal-content">
                        <div class="modal-header">
                          <div class="col-md-3">
                              <label>Enter Old Order</label>
                              <input type="text" class="form-control" name="order_number" value="" id="order_id" >
                          </div>
                          <!-- <div class="col-md-2 align-center" id="rd_bt"><br>
                             <input type="hidden" value="PRM" name="order_type">
                             <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                             <input type="submit" name="action"  class="btn btn-info btn-block" value="ORDER" />
                          </div> -->
                        </div>
                        <div class="modal-body" >
                            <div class="row" id="order_value">


                            </div>
                          <!-- <div class="row"><br><br>
                             <div class="form-group" id="prm_field"></div>
                          </div> -->
                        </div>
                        </div>

                      </div>
                </form>

            </div>

          </div>
     </div>
</div>
<?php include('order_js.php');?>
