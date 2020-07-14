<div id="content">
  <div id="content-header">
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span4 text-right">
          <a href="#addnew" class="btn btn-primary addNewbtn" data-toggle="modal">Add New</a>
        </div>
        <hr>
      </div>
    </div>
  </div>

  <!-- add modal wind-->
  <div id="addnew" class="modal hide">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="card">

          <div class="card-body">
            <form class="form-horizontal" method="post" action="<?php echo base_url('admin/EMB/add_emb') ?>" name="basic_validate" novalidate="novalidate">
              <div class="modal-header">
                <h5 class="modal-title">Add Detail</h5>
                <button data-dismiss="modal" class="close" type="button">×</button>
              </div>
              <div class="modal-body">
                <div class="widget-content nopadding">
                  <div class="form-group row"> <label class="control-label col-sm-3">Design</label>
                    <div class="col-sm-9">
                     <select name="design" class="form-control">
                        <option value="">Select Design</option>
                        <?php foreach ($designname as $value): ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['designName'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-8">
                      <label>Job Worker</label>
                      <select name="job[]" class="form-control">
                        <option value="">Select Job Worker</option>
                        <?php foreach ($worker as $value): ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label>Rate</label>
                      <input type="text" class="form-control" name="rate[]" value="">
                    </div>
                    
                    <div class="col-md-2">
                      <label>Action</label>
                      <button type="button" name="add" id="add_fresh" class="btn btn-primary btn-sm">+</button>
                    </div>
                  </div>
                  <div id="fresh_field">
                  </div>



                  <div class="card-footer float-right">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <input type="submit" class="btn btn-primary">
                  </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form id="jobWorkTypeFilter">
            <div class="form-row">
              <div class="col-4">
                <select id="searchByCat" name="searchByCat" class="form-control">
                  <option value="">-- Select Category --</option>
                  <option value="type">Type</option>
                  <option value="Job">Job</option>
                  <option value="Rate">Rate</option>
                 
                </select>
              </div>
              <div class="col-4">
                <input type="text" name="searchValue" value="" placeholder="Search" id="searchByValue" class="form-control">
              </div>
              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
              <button type="submit" class="btn btn-info"> <i class="fas fa-search"></i> Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
    <div class="col-12">
     
      <div class="card">
        <div class="card-body">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Emb List</h5>
            </div>
            <div class="row well">
              &nbsp;&nbsp;&nbsp;&nbsp;<a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-striped table-bordered data-table" id="jobWorktype">
                <thead>
                  <tr>
                    <th><input type="checkbox" class="sub_chk" id="master"></th>
                    <th>S/No</th>
                    <th>Design</th>
                    <th>Job Work Party</th>
                    <th>Rate</th>
                  
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                        if($emb>0)
                        {
                        $id=1;
                        foreach ($emb as $value) { ?>
                  <tr class="gradeU" id="tr_<?php echo $value['id']?>">
                    <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['id'] ?>"></td>
                    <td><?php echo $id?></td>
                    <td><?php foreach ($designname as $row): ?>
                       <?php if($value['designName']==$row['id']) {echo $row['designName'];}?> 
                        <?php endforeach; ?></td>
                    <td><?php foreach ($worker as $row): ?>
                         <?php if($value['workerName']==$row['id']) {echo $row['name'];}?> 
                        <?php endforeach; ?></td>
                    <td><?php echo $value['rate']?></td>
                   

                    <td>
                      <a href="<?php echo '#'.$value['id']; ?>" class="text-center tip" data-toggle="modal" data-original-title="Edit">
                        <i class="fas fa-edit blue"></i>
                      </a>
                      &nbsp;&nbsp;&nbsp;
                      <a class="text-danger text-center tip" href="javascript:void(0)" onclick="delete_detail(<?php echo $value['id'];?>)" data-original-title="Delete">
                        <i class="mdi mdi-delete red"></i>
                      </a>
                    </td>
                  </tr>
                  <!-- Edit modal wind-->
                  <div id="<?php echo $value['id'];?>" class="modal hide">
                    <div class="modal-dialog" role="document ">
                      <div class="modal-content">
                        <form class="form-horizontal" method="post" action="<?php echo base_url('admin/EMB/update/').$value['id']; ?>" name="basic_validate" id="basic_validate" novalidate="novalidate">
                          <div class="modal-header">
                            <h5 class="modal-title">Edit Detail</h5>
                            <button data-dismiss="modal" class="close" type="button">×</button>

                          </div>
                          <div class="modal-body">
                            <div class="widget-content nopadding">
                             <div class="form-group row">
                                <label class="control-label col-sm-3">Job Work Party</label>
                                <div class="col-sm-9"><select name="job" class="form-control">
                        <option value="">Select Job Worker</option>
                        <?php foreach ($worker as $row): ?>
                        <option value="<?php echo $row['id']; ?>" <?php if($value['workerName']==$row['id']) {echo "selected";}?> ><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                                  
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="control-label col-sm-3">Rate</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="rate" value="<?php echo $value['rate']?>">
                                </div>
                              </div>
                              

                              <div class="modal-footer">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                <input type="submit" value="Update" class="btn btn-primary">
                                <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                              </div>
                        </form>
                      </div>
                    </div>
                  </div>


            </div>
          </div>
          <!-- End Edit modal wind-->
          <?php $id=$id+1;  } } ?>
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


<div id="addNewRow" class="row" style="display: none">
    <div class="row">
      <div class="col-md-8">
                    
                      <select name="job[]" class="form-control">
                        <option value="">Select Job Worker</option>
                        <?php foreach ($worker as $value): ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-2">
                      
                      <input type="text" class="form-control" name="rate[]" value="">
                    </div>
      <div class="col-md-2">
        <button type="button" name="remove" class="btn btn-danger btn-sm btn_remove">X</button>
      </div>
    </div>
</div>

<script>
  function delete_detail(id) {
    var del = confirm("Do you want to Delete");
    if (del == true) {
      var sureDel = confirm("Are you sure want to delete");
      if (sureDel == true) {
        window.location = "<?php echo base_url()?>admin/EMB/delete/" + id;
      }

    }
  }
</script>
<style>
  #DataTables_Table_0_previous {
    display: none;
  }

  #DataTables_Table_0_paginate {
    display: none;
  }

  select {
    width: 120px;
    height: 35px;
    box-sizing: border-box;
    border-color: #e9ecef;
  }
</style>

<?php include('emb_js.php');?>
