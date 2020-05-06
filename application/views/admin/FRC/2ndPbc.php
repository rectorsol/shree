<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?php echo base_url('admin/FRC/submitPbc')?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus"></i> Create Order</h5>
              <div id='msg'></div>
            </div>
            <div class="modal-body">
              <div class="row">
               

                <div class="col-md-3">
                  <label>parent Barcode</label>
                  <input type="text" class="form-control " name="pbc" value="" id="pbc" >
                </div>

                <div class="col-md-3">
                  <label>Fabric name</label>
                   <input type="text" class="form-control" name="fabric_name" value="" id="fabric" readonly>
                  <input type="hidden" class="form-control" name="fabric_id" value="" id="fabric_id" readonly>
                </div>
              <div class="col-md-3">
                  <label>Quantity</label>
                  <input type="text" class="form-control" name="Tquantity" value="" id='Tquantity' readonly>
                </div>
                <div class="col-md-3">
                  <label>Date</label>
                  <input type="date" class="form-control" name="datex" value="" id='date' readonly>
                </div>
               <div class="col-md-3">
                  <label>Current Quantity</label>
                  <input type="text" class="form-control" name="Cur_quantity" value="" id='Cur_quantity' readonly>
                </div>
                 <div class="col-md-3">
                  <label>Challan no</label>
                  <input type="text" class="form-control" name="challan_no" value="" id='challan_no' readonly>
                </div>
                <div class="col-md-3">
                  <label>AD no</label>
                  <input type="text" class="form-control" name="ad_no" value="" id='ad_no' readonly>
                </div>
              </div> <hr>
               <table id="pbc" class="remove_datatable">
                <thead>
                   <th>S no.</th>
                  <th>Date</th>
                 
                  <th>Current Quantity</th> 
                   <th>TC</th>
                  
                   
                  <th>Color</th>
                  <th>Rate </th>
                  <th>value</th>
                  <th>2nd PBC</th>
                 
                </thead>
                <tbody id="fresh_data">
                  <tr id="0">
                  <td><input type="text" class="form-control sno" name="sno[]" value="1" readonly></td>
                    <td><input type="date" class="form-control date" name="date[]" value="<?php echo date('Y-m-d')?>"></td>
                    <td><input type="text" class="form-control qty" name="quantity[]" value="" id='qty0'></td>
                    <td><input type="text" name="tc[]" class="form-control " value="" id="tc"></td>
                   <td><input type="text" class="form-control" name="color[]" value=""></td>
                    <td><input type="text" name="rate[]" class="form-control " value="" id="rate0"></td>
                    <td><input type="text" name="value[]" class="form-control " value="" id="value0"></td>
                    <td><input type="text" name="2pbc[]" class="form-control " value="" id="2pbc0"></td>
                    <td> <button type="button" name="add_more" id="add_more2" class="btn btn-success">+</button></td>
                  </tr>
                </tbody>
              </table>
              <hr>
              <div class="col-md-3">
              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                  <button type="submit" name="submit"  class="btn btn-success btn-md">Submit</button>
                </div>
            </div>
            
          </div>
          <br>
          
        </form>
      </div>
    </div>
  </div>
</div>
<script>



</script>
<?php include('FRC_js.php');?>
