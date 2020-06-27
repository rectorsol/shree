<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">


        <form method="post" id="" action="<?php echo base_url('admin/Orders/edit_order_product/') . $order_data->order_id ?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus"></i> EDIT ORDER NUMBER: <?php echo $order_data->order_id ?></h5>
            </div>
            <div class="modal-body">
              <table class="remove_datatable">
                <tr>
                  <td >Sr.No.</td>
                  <td><input type="text" class="form-control" name="series_number" value="<?php echo $order_data->series_number; ?>" id="">
                  </td>

                  <td>Order Barcode</td>
                  <td><input type="text" class="form-control" readonly name="order_barcode" value="<?php echo $order_data->order_barcode; ?>">
                  </td>
                </tr>
                <tr>
                  <td>Order No.</td>
                  <td><input type="text" class="form-control" readonly name="order_number" value="<?php echo $order_data->order_number; ?>">
                  </td>

                  <td>Customer Name</td>
                  <td><input type="text" class="form-control" name="customer_name" value="<?php echo $order_data->customer_name; ?>">
                  </td>
                </tr>
                <tr>

                  <td>Fabric Name</td>
                  <td><input type="text" class="form-control" name="fabric_name" value="<?php echo $order_data->fabric_name; ?>">
                  </td>

                  <td>Hsn</td>
                  <td><input type="text" class="form-control" name="hsn" value="<?php echo $order_data->hsn; ?>">
                  </td>
                </tr>
                <tr>
                  <td>Design Name</td>
                  <td><input type="text" class="form-control" name="design_name" value="<?php echo $order_data->design_name; ?>">
                  </td>

                  <td>Design Code</td>
                  <td><input type="text" class="form-control" name="design_code" value="<?php echo $order_data->design_code; ?>">
                  </td>
                </tr>
                <tr>
                  <td>Stitch</td>
                  <td><input type="text" class="form-control" name="stitch" value="<?php echo $order_data->stitch; ?>">
                  </td>

                  <td>Dye</td>
                  <td><input type="text" class="form-control" name="dye" value="<?php echo $order_data->dye; ?>">
                  </td>
                </tr>
                <tr>
                  <td>Matching</td>
                  <td><input type="text" class="form-control" name="matching" value="<?php echo $order_data->matching; ?>">
                  </td>

                  <td>Unit</td>
                  <td><input type="text" name="unit" class="form-control" value="<?php echo $order_data->unit; ?>">
                  </td>
                </tr>
                <tr>
                  <td>Quantity</td>
                  <td><input type="text" class="form-control" name="quantity" value="<?php echo $order_data->quantity; ?>">
                  </td>

                  <td>priority</td>
                  <td><input type="text" class="form-control" name="priority" value="<?php echo $order_data->priority; ?>">
                  </td>
                </tr>

                <tr>
                  <td>Remark</td>
                  <td><input type="text" class="form-control" name="remark" value="<?php echo $order_data->remark; ?>">
                  </td>
                </tr>
              </table>

              <div class="col-md-3 align-center"><br>
                <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="submit" id="order_btn2" class="btn btn-info btn-block" value="update " />
              </div>

            </div>
        </form><br><br>
      </div>
    </div>
  </div>
</div>
<?php include('order_js.php'); ?>