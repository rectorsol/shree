
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">


        <form method="post" id="" action="<?php echo base_url('admin/Orders/edit_order_product/').$order_data->product_order_id?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus"></i> EDIT ORDER NUMBER: <?php echo $order_data->product_order_id ?></h5>
            </div>
            <div class="modal-body">
              <div class="row overflow-auto">
                <div class="col-md-1">
                  <label>Sr.No.</label>
                  <input type="text" class="form-control" name="series_number" value="<?php echo $order_data->series_number;?>" id="">
                </div>
                <div class="col-md-2">
                  <label>Order Barcode</label>
                  <input type="text" class="form-control" name="order_barcode" value="<?php echo $order_data->order_barcode;?>">
                </div>
                <div class="col-md-2">
                  <label>Order No.</label>
                  <input type="text" class="form-control" name="order_number" value="<?php echo $order_data->order_number;?>">
                </div>
                 <div class="col-md-2">
                  <label>Customer Name</label>
                  <input type="text"  class="form-control" name="customer_name" value="<?php echo $order_data->customer_name;?>">
                </div>
                <div class="col-md-2">
                  <label>Fabric Name</label>
                  <input type="text"  class="form-control" name="fabric_name" value="<?php echo $order_data->fabric_name;?>">
                </div>
                <div class="col-md-1">
                  <label>Hsn</label>
                  <input type="text" class="form-control" name="hsn" value="<?php echo $order_data->hsn;?>">
                </div>
                <div class="col-md-2">
                  <label>Design Name</label>
                  <input type="text" class="form-control"  name="design_name" value="<?php echo $order_data->design_name;?>">
                </div>
                <div class="col-md-2">
                  <label>Design Code</label>
                  <input type="text" class="form-control" name="design_code"  value="<?php echo $order_data->design_code;?>">
                </div>
                <div class="col-md-1">
                  <label>Stitch</label>
                  <input type="text" class="form-control"  name="stitch" value="<?php echo $order_data->stitch;?>">
                </div>
                <div class="col-md-1">
                  <label>Dye</label>
                  <input type="text" class="form-control" name="dye" value="<?php echo $order_data->dye;?>">
                </div>
                <div class="col-md-2">
                  <label>Matching</label>
                  <input type="text" class="form-control" name="matching" value="<?php echo $order_data->matching;?>">
                </div>
                <div class="col-md-1">
                  <label>Unit</label>
                  <input type="text" name="unit" class="form-control" value="<?php echo $order_data->unit;?>">
                </div>
                <div class="col-md-1">
                  <label>Quantity</label>
                  <input type="text" class="form-control" name="quantity" value="<?php echo $order_data->quantity;?>">
                </div>
                <div class="col-md-1">
                  <label>priority</label>
                  <input type="text" class="form-control" name="priority" value="<?php echo $order_data->priority;?>">
                </div>
                
                <div class="col-md-1">
                  <label>Remark</label>
                  <input type="text" class="form-control" name="remark" value="<?php echo $order_data->remark;?>">
                </div>
              </div>
              <hr>
              <div class="col-md-3 align-center"><br>
                <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="submit"  id="order_btn2" class="btn btn-info btn-block" value="update " />
              </div>
            </div>
          </div>
        </form><br><br>
      </div>
    </div>
  </div>
</div>
<?php include('order_js.php');?>
