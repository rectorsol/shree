<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?php echo base_url('admin/FRC/addFrc')?>">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus"></i> Create Chalan</h5>
            </div>
            <div class="modal-body">
              <div class="row">
               

                <div class="col-md-3">
                  <label>From Godown</label>
                  <select name="fromGodown" class="form-control" id='Select_Session'>
                    <option>Select Godown</option>
                    <?php foreach ($branch_data as $value): ?>
                    <option value="<?php echo $value->id;?>"> <?php echo $value->sort_name;?></option>
                    <?php endforeach;?>
                  </select>
                </div>

                <div class="col-md-3">
                  <label>To Godown</label>
                  <select name="toGodown" class="form-control" id="Select_Category">
                    <option>Select Godown </option>
                    <?php foreach ($branch_data as $value): ?>
                    <option value="<?php echo $value->id?>"> <?php echo $value->sort_name;?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              <div class="col-md-3">
                  <label>DATE</label>
                  <input type="date" class="form-control" name="PBC_date" value="<?php echo date('Y-m-d')?>">
                </div>
                <div class="col-md-3">
                  <label>Challan No</label>
                  <input type="text" class="form-control" name="PBC_challan" value="">
                </div>
               
              </div> <hr>
               <table id="fresh_form" class="remove_datatable">
                <thead>
                  
                  <th>PBC</th>
                  <th>Fabric_Name</th>
                  <th>Hsn</th> 
                   <th>Fabric_Type</th>
                  <th>Quantity</th>
                  <th>Unit     </th>  
                  <th>AD NO</th>
                  <th>DOC. Chalan No</th>
                  <th>Purchase code</th>
                 <th>Option</th>
                </thead>
                <tbody id="fresh_data">
                  <tr id="0">
                    
                    <td><input type="text" class="form-control pbc" name="pbc[]" value=""></td>
                    <td><select name="fabric_name[]" class="form-control fabric_name " >
                          <option>Fabric</option>
                           <?php foreach ($febName as $value): ?>
                          <option value="<?php echo $value->id;?>"> <?php echo $value->fabricName;?></option>
                            <?php endforeach;?>
                     </select> </td>
                    <td><input type="text" class="form-control " name="hsn[]" value="" id='hsn0'></td>
                    <td><input type="text" class="form-control" name="fabType[]" value=""></td>
                    <td><input type="text" class="form-control" name="quantity[]" value=""></td>
                    <td><select name="unit[]" class="form-control unit " >
                          <option>Unit</option>
                           <?php foreach ($unit as $value): ?>
                          <option value="<?php echo $value['id'];?>"> <?php echo $value['unitName'];?></option>
                            <?php endforeach;?>
                     </select></td>
                   
                    <td> <input type="text" class="form-control" name="ADNo[]" value=""></td>
                    <td> <input type="text" class="form-control" name="challan[]" value=""></td>
                    <td><input type="text" class="form-control" name="pcode[]" value=""></td>
                    <td> <button type="button" name="add_more" id="add_more" class="btn btn-success">+</button></td>
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

<?php include('FRC_js.php');?>
