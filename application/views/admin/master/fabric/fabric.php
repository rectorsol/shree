<div id="content">
  <div id="content-header">
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span4 text-right">
            <a href="#addnew" class="btn btn-primary addNewbtn"  data-toggle="modal" >Add New</a>
          </div>
      </div>
    </div>
  </div>
<div class="container-fluid"><hr>
  <div class="row">
  <div class="col-12">
  <div class="card">
    <div class="card-body">
        <form id="fabricFilter">
          <div class="form-row">
            <div class="col-4">
              <select id="searchByCat" name="searchByCat" class="form-control">
                <option value="">-- Select Category --</option>
                <option value="fabricName">Fabric Name</option>
                <option value="fabHsnCode">Fabric HSN Code</option>
                <option value="fabricType">Fabric Type</option>
                <option value="fabricCode">Fabric Code</option>
              </select>
            </div>
          <div class="col-4">
            <input type="text" name="searchValue" placeholder="Search" id="searchByValue" class="form-control">
          </div>
          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
          <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>  </div>
        </form>
      </div>
      </div>
      <div class="card">
        <div class="card-body">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Fabric List</h5>
          </div>
          <div class="row well">
             &nbsp;&nbsp; &nbsp;&nbsp; <a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>
          </div>

        <div class="widget-content nopadding">
          <table class="table table-striped table-bordered data-table" id="fabric">
              <thead>
                <tr>
                    <th><input type="checkbox" class="sub_chk" id="master" ></th>
                  <th>S/No</th>
                  <th>Fabric Name</th>
                  <th>Fabric HSN Code</th>
                  <th>Fabric Type</th>
                  <th>Fabric Code</th>
                  <th>Purchase</th>
                  <!--<th>Code</th>-->
                  <!--<th>sale Rate</th>-->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($fabric_data>0)
                    {
                      $id=1;
                       foreach ($fabric_data as $value) { ?>
                         <tr class="gradeU" id="tr_<?php echo $value->id?>">
                         <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value->id ?>"></td>
                  <td><?php echo $id ?></td>
                  <td><?php echo $value->fabricName ?></td>
                  <td><?php echo $value->fabHsnCode?></td>
                  <td><?php echo $value->fabricType?></td>
                  <td><?php echo $value->fabricCode?></td>
                  <td><?php echo $value->purchase?></td>
                  <!--<td><?php echo $value->Code?></td>-->
                  <!--<td><?php echo $value->sale_rate?></td>-->
                  <td>
                    <a href="<?php echo '#'.$value->id; ?>" class="text-center tip" data-toggle="modal" data-original-title="Edit">
                    <i class="fas fa-edit blue"></i>
                  </a>

                  <a class="text-danger text-center tip" href="javascript:void(0)" onclick="delete_detail(<?php echo $value->id;?>)" data-original-title="Delete">
                    <i class="mdi mdi-delete red"></i>
                  </a>
                  </td>
                </tr>

                <!-- edit modal wind-->
                <div id="<?php echo $value->id; ?>" class="modal hide" >
                     <div class="modal-dialog" role="document ">
                    <div class="modal-content">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('admin/Fabric/edit/').$value->id ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
                    <div class="modal-header">
                    <h5 class="modal-title">Edit Fabric</h5>
                      <button data-dismiss="modal" class="close" type="button">×</button>
                    </div>
                    <div class="modal-body">
                      <div class="widget-content nopadding">
                          <div class="form-group row">
                            <label class="control-label col-sm-3">Fabric Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="fabricName" value="<?php echo $value->fabricName ?>" id="required">
                            </div>
                          </div>
                          <div class="form-group row">
                              <label class="control-label col-sm-3">Select Fabric HSN Code</label>
                              <div class="col-sm-9">
                                <select name="fabHsnCode" class="form-control">
                                  <?php foreach ($hsn_data as $hsn_value): ?>
                                    <option <?php if ($value->fabHsnCode==$hsn_value->hsn_code) {
                                    ?>selected<?php } ?>  value="<?php echo $hsn_value->hsn_code ?>"><?php echo $hsn_value->hsn_code ?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                            <label class="control-label col-sm-3">Fabric Type</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="fabricType" value="<?php echo $value->fabricType?>" id="required">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3">Fabric Code</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="fabricCode" value="<?php echo $value->fabricCode?>" id="required">
                            </div>
                          </div>

                      </div>
                    </div>
                    <div class="modal-footer">
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                     <input type="submit" value="Update" class="btn btn-primary">
                       <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    <!-- end edit modal wind-->

                <?php $id=$id+1; } } ?>

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

<!-- add modal wind-->
<div id="addnew" class="modal hide">
    <div class="modal-dialog" role="document ">
    <div class="modal-content">
  <form class="form-horizontal" method="post" action="<?php echo base_url('admin/Fabric/addFabric') ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
    <div class="modal-header">
         <h5 class="modal-title">Add Fabric</h5>
      <button data-dismiss="modal" class="close" type="button">×</button>

    </div>
    <div class="modal-body">
      <div class="widget-content nopadding">

          <div class="form-group row">
            <label class="control-label col-sm-3">Fabric Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="fabricName" value="" required id="fabric_name">
              <span id="fabric-error" class="error" style="color:red;"></span>
            </div>
          </div>
          <div class="form-group row">
              <label class="control-label col-sm-3">Select Fabric HSN Code</label>
              <div class="col-sm-9">
                <select name="fabHsnCode" class="form-control">
                  <?php foreach ($hsn_data as $hsn_value): ?>
                    <option value="<?php echo $hsn_value->hsn_code ?>"><?php echo $hsn_value->hsn_code ?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="form-group row">
            <label class="control-label col-sm-3">Fabric Type</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="fabricType" value="" id="required">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-3">Fabric Code</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="fabricCode" value="" id="required">
            </div>
          </div>

      </div>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
     <input type="submit" class="btn btn-primary" id="fabric_btn">
       <a data-dismiss="modal" class="btn" href="#">Cancel</a>
    </div>
    </form>
    </div>
    </div>
  </div>


<script>
  function delete_detail(id)
  {
    var del = confirm("Do you want to Delete");
    if (del== true)
    {
      var sureDel = confirm("Are you sure want to delete");
      if (sureDel == true)
      {
        window.location="<?php echo base_url()?>admin/Fabric/delete/"+id;
      }
    }
  }
</script>
<?php include('js.php'); ?>
