<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?php echo base_url('admin/Orders/add_new_order')?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus"></i> Create Order</h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-3">
                  <label>Order Type</label>
                  <select name="order_type" class="form-control" id="selectType">
                    <option value="">Select Order Type</option>
                    <?php foreach ($all_Order as $value): ?>
                    <option value="<?php echo $value['id'];?>"> <?php echo $value['orderType'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>

                <div class="col-md-3">
                  <label>Session</label>
                  <select name="session" class="form-control" id='Select_Session'>
                    <option>Select Session</option>
                    <?php foreach ($all_session as $value): ?>
                    <option value="<?php echo $value['id'];?>"> <?php echo $value['financial_year'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>

                <div class="col-md-3">
                  <label>Data Category</label>
                  <select name="category" class="form-control" id="Select_Category">
                    <option>Select Data Category</option>
                    <?php foreach ($data_cat as $value): ?>
                    <option value="<?php echo $value['id'];?>"> <?php echo $value['dataCategory'];?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="col-md-3">
                  <button type="button" name="add_more" id="add_order" class="btn btn-success btn-md">Select Order Type</button>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div id="order_form" class="card overflow-auto">
            <div class="card-header">
              <h5 class="card-title"><i class="fa fa-plus"></i>ENTER NEW ORDER DETAILS</h5>
              <div class='float-right msg'>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <label>ORDER NUMBER</label>
                  <input type="text" class="form-control order_number" name="order_number" required>
                </div>
                <div class="col-md-3">
                  <label>CUSTOMER NAME</label>
                 <select name="customer_name" class="form-control" >
                    <option>Select Customer</option>
                    <?php foreach ($customer as $value): ?>
                    <option value="<?php echo $value['id'];?>"> <?php echo $value['name'];?></option>
                    <?php endforeach;?>
                  </select>
                </div><div class="col-md-2"></div>
                <div class="col-md-4"><label>IMAGE</label><img src="" alt="" id="preview" style="width:100px">  </div>
              </div>
              <hr>
              <table id="fresh_form" class="remove_datatable">
                <thead>
                  <th>#</th><th>Type</th>
                  <th>Serial N0.</th>
                  <th>Design Barcode</th>
                  <th>Fabric_Name</th>
                  <th>Hsn</th> 
                  
                  <th>Design Name</th>
                  <th>Design Code</th>
                  <th>Stitch</th>
                  <th>Dye</th>
                  <th>Matching</th>
                  <th>Quantity</th><th>Unit</th>  <th>Image</th>
                  <th>priority</th>
                  <th>Order Barcode</th>
                  <th>Remark</th>
                  <th>Option</th>
                </thead>
                <tbody id="fresh_data">
                  <tr id="0">
                    <td><input type="text" class="form-control" readonly value="1"></td>
                     <td> <select name="type[]" class="form-control  " id='type'>
                          <option>Select Type</option>
                          
                          <option value="1" >Barcode </option>
                           <option value="2" > Manual </option> 
                     </select></td>
                    <td><input type="text" class="form-control" name="serial_number[]" value=""></td>
                    <td><input type="text" class="form-control design_name"  value=""></td>
                    <td id='tdfab0'><input type="text" class="form-control fabric_name" name="fabric_name[]" value="" >
                     </td>
                    <td><input type="text" class="form-control " name="hsn[]" value="" id='hsn0'></td>
                     
                    <td id='tddesign0'><input type="text" name="design_name[]" class="form-control" value="" id='designName0'></td>
                    <td> <input type="text" name="design_code[]" class="form-control" value="" id='designCode0'></td>
                    <td><input type="text" class="form-control" name="stitch[]" value="" id='stitch0'></td>
                    <td> <input type="text" class="form-control" name="dye[]" value="" id='dye0'></td>
                    <td><input type="text" class="form-control" name="matching[]" value="" id='matching0'></td>
                   
                    <td><input type="text" class="form-control" name="quantity[]" value=""></td>
                    <td><input type="text" name="unit[]" class="form-control " value="" id="unit0"></td>
                    <td><input type="text" name="image[]" class="form-control image" value="" id="image0"></td>
                    <td> <input type="text" class="form-control" name="priority[]" value="30"></td>
                    <td> <input type="text" class="form-control" name="order_barcode[]" value=""></td>
                    <td><input type="text" class="form-control" name="remark[]" value=""></td>
                    <td> <button type="button" name="add_more" id="add_more" class="btn btn-success">+</button></td>
                  </tr>
                </tbody>
              </table>
              <table id="prm_form" class="remove_datatable">
                <thead>
                  <th>#</th>
                   <th>Serial N0.</th> 
                  <th>old Barcode</th>
                  <th>Fabric_Name</th>
                  <th>Hsn</th>
                  
                  <th>Design Name</th>
                  <th>Design Code</th>
                  <th>Stitch</th>
                  <th>Dye</th>
                  <th>Matching</th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Image</th>
                  <th>priority</th>
                  <th>Order Barcode</th>
                  <th>Remark</th>
                  <th>Option</th>
                </thead>
                <tbody id="prm_data">
                  <tr id="0">
                   <td><input type="text" class="form-control" readonly value="1"></td>
                   
                    <td><input type="text" class="form-control" name="serial_number[]" value=""></td>
                    <td> <input type="text" name="old_barcode[]" class="form-control" value=""></td>
                    <td> <select name="fabric_name[]" class="form-control fabric_name select2" >
                          <option>Select Fabric</option>
                           <?php foreach ($febName as $value): ?>
                          <option value="<?php echo $value->id;?>" > <?php echo $value->fabricName;?></option>
                            <?php endforeach;?>
                     </select></td>
                    <td><input type="text" class="form-control hsn" name="hsn[]" value="" id='hsnp0' ></td>
                   
                    <td><input type="text" name="design_name[]" class="form-control" value="" id='designNamep0'></td>
                    <td> <input type="text" name="design_code[]" class="form-control" value="" id='designCodep0'></td>
                    <td><input type="text" class="form-control" name="stitch[]" value="" id='stitchp0'></td>
                    <td> <input type="text" class="form-control" name="dye[]" value="" id='dyep0'></td>
                    <td><input type="text" class="form-control" name="matching[]" value="" id='matchingp0'></td>
                    
                    <td><input type="text" class="form-control" name="quantity[]" value=""></td>
                     <td><input type="text" name="unit[]" class="form-control unit" value="" id="unitp0"></td>
                     <td><input type="text" name="image[]" class="form-control image" value="" id="imagep0"></td>
                    <td> <input type="text" class="form-control" name="priority[]" value="30"></td>
                    <td> <input type="text" class="form-control" name="order_barcode[]" value=""></td>
                    <td><input type="text" class="form-control" name="remark[]" value=""></td>
                    <td> <button type="button" name="add_more" id="add_more_prm" class="btn btn-success">+</button></td>
                  </tr>
                </tbody>
              </table>
              <div class="col-md-3 align-center"><br>
                <input type="hidden" id="get_csrf_hash" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="submit" name="action" id="order_btn" class="btn btn-info btn-block" value="CREATE " />
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include('order_js.php');?>
