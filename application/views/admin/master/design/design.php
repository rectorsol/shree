
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
        <form id="designFilter">
          <div class="form-row">
            <div class="col-4">
              <select id="searchByCat" name="searchByCat" class="form-control">
                <option value="">-- Select Category --</option>
                <option value="designName">Design Name</option>
                <option value="designCode">Design Code</option>
                <option value="stitch">Stitch</option>
                <option value="dye">Dye</option>
                <option value="matching">Matching</option>
                <option value="saleRate">Sale Rate</option>
                <option value="htCattingRate">HT Catting Rate</option>
                <option value="fabricName">Design On</option>
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
              <h5>Design List</h5>
          </div>
        <div class="widget-content nopadding">
           <div class="row well">
         	    &nbsp; &nbsp;&nbsp;  <a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>
         	      &nbsp;&nbsp;<a type="button" class="btn btn-info pull-left print_all btn-success" style="color:#fff;"><i class="fa fa-print"></i></a>


           </div><br>
          <table class="table table-striped  table-responsive  table-bordered data-table table-responsive" id="design">
              <thead>
                <tr class="odd" role="row">
                  <th><input type="checkbox" class="sub_chk" id="master" ></th>
                  <th>S/No</th>
                  <th>Design Name</th>
                  <th>Design Series</th>
                  <th>Design Code</th>
                  <th>Emb Rate</th>
                  <th>Stitch</th>
                  <th>Dye</th>
                  <th width="40%">Matching</th>
                  <th>Sale Rate</th>
                  <th>HT Catting Rate</th>
                  <th>Design Image</th>
                   <th>Fabric Name</th>
                  <th>Bar Code</th>
                  <th>Design On</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // echo "<pre>";
                // print_r($design_data); exit();
                if($design_data>0)
                    {
                      $id=1;
                      foreach ($design_data as $value) { ?>
                      <tr class="gradeU" id="tr_<?php echo $value->id?>">

                        <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value->id ?>"></td>
                        <td><?php echo $id ?></td>
                        <td><?php echo $value->designName;?></td>
                        <td><?php echo $value->designSeries;?></td>
                        <td><?php echo $value->desCode?></td>
                        <td><?php echo $value->rate?></td>
                        <td><?php echo $value->stitch?></td>
                        <td><?php echo $value->dye?></td>
                        <td width="40%"><?php echo $value->matching?></td>
                        <td><?php echo $value->sale_rate?></td>
                        <td><?php echo $value->htCattingRate?></td>
                        <td>
                          <div class="actions">
                          <a class="btn default btn-outline image-popup-vertical-fit el-link" href="<?php echo base_url('/upload/')?><?php echo $value->designPic; ?>"> <img src="<?php echo base_url('/upload/')?><?php echo $value->designPic; ?>" alt="image" style="height: 40px; width: 40px;">
                          </a>

                          </div>
                        </td>
                         <td><?php echo $value->fabricName;?></td>
                        <td><?php echo $value->barCode?></td>
                        <td><?php echo $value->designOn?></td>
                        <td>
                          <a href="<?php echo '#'.$value->id; ?>" class="text-center tip" data-toggle="modal" data-original-title="Edit">
                          <i class="fas fa-edit blue"></i>
                          </a>

                          <a class="text-danger text-center tip" href="javascript:void(0)" onclick="delete_detail(<?php echo $value->id;?>)" data-original-title="Delete">
                            <i class="mdi mdi-delete red"></i>
                          </a>
                        <a class="text-center tip" target="_blank" href="<?php echo base_url('admin/design/design_print/').$value->id ?>">
                        <i class="fa fa-print" aria-hidden="true"></i></a>
                           </td>
                      </tr>

                <!-- edit modal wind-->
                <div id="<?php echo $value->id; ?>" class="modal hide" >
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                  <form class="form-horizontal" method="post" action="<?php echo base_url('admin/Design/edit/').$value->id ?>" name="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="modal-header">

                      <h3>Edit Design</h3>
                      <button data-dismiss="modal" class="close" type="button">×</button>
                    </div>
                    <div class="modal-body">
                      <div class="widget-content nopadding">

                          <div class="form-group row">
                            <label class="control-label col-sm-3">Design Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="designName" value="<?php echo $value->designName ?>">
                            </div>
                          </div>
                            <div class="form-group row">
                            <label class="control-label col-sm-3">Design Series</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="designSeries" value="<?php echo $value->designSeries?>">
                            </div>
                          </div>
                          <!--<div class="form-group row">-->
                          <!--  <label class="control-label col-sm-3">Design Code</label>-->
                          <!--  <div class="col-sm-9">-->
                          <!--    <input type="text" class="form-control" name="designCode" value="<?php echo $value->designCode?>" >-->
                          <!--  </div>-->
                          <!--</div>-->
                          <div class="form-group row">
                            <label class="control-label col-sm-3">Stitch</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="stitch" value="<?php echo $value->stitch?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3">Dye</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="dye" value="<?php echo $value->dye?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3">Matching</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="matching" value="<?php echo $value->matching?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="control-label col-sm-3">TH Catting Rate</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="htCattingRate" value="<?php echo $value->htCattingRate?>">
                            </div>
                          </div>

                          <div class="form-group row">
                              <label class="control-label col-sm-3">Design Pic</label>
                              <div class="col-sm-2">
                                 <img src="<?php echo base_url('/upload/')?><?php echo $value->designPic; ?>" alt="image" style="height: 50px; width: 50px;">
                              </div>
                              <div class="col-sm-7">
                                <input type="file" class="form-control" value="<?php echo $value->designPic?>" name="designPic" >
                              </div>

                          </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3">Design On</label>
                                    <div class="col-sm-9">


                            <select name="designOn" class="form-control">
                                <?php foreach ($febType as $rec): ?>
                                <option <?php if ($value->designOn==$rec->fabricType) {
                                    ?>selected<?php } ?>  value="<?php echo $rec->fabricType ?>"><?php echo $rec->fabricType ?></option>
                                <?php endforeach;?>
                            </select>
                                    </div>
                            </div>
                          <div class="form-group row">
                            <label class="control-label col-sm-3">Fabric name</label>
                            <div class="col-sm-9">
                              <select name="fabricName" class="form-control">
                                <?php foreach ($febName as $rec): ?>
                                <option <?php if ($value->fabricName==$rec->fabricName) {
                                    ?>selected<?php } ?>  value="<?php echo $rec->fabricName ?>"><?php echo $rec->fabricName ?></option>
                                <?php endforeach;?>
                              </select>
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
                  <div>
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
  <!-- <form class="form-horizontal" id="addDesign" method="post" action="<?php echo base_url('admin/Design/addDesign') ?>" name="basic_validate"  enctype="multipart/form-data"> -->
  <form class="form-horizontal" id="addDesign" method="post" action="<?php echo base_url('admin/Design/addDesign') ?>"  name="basic_validate"  enctype="multipart/form-data">
    <div class="modal-header">
        <h5 class="modal-title">Add Design</h5>
          <button data-dismiss="modal" class="close" type="button">×</button>

    </div>
    <div class="modal-body">
      <div class="widget-content nopadding">
         <span id="design-error" class="error" style="color:red;"></span>
          <div class="form-group row">
            <label class="control-label col-sm-3">Design Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="designName" value="" id="design_name">
            </div>
          </div>
            <div class="form-group row">
                <label class="control-label col-sm-3">Design Series</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="designSeries" value="" id="designSeries">
                    </div>
               </div>
                <div class="form-group row">
              <label class="control-label col-sm-3">Fabric Name</label>
              <div class="col-sm-9">
                <select name="fabricName" id="fabricName" class="form-control">
                  <?php foreach ($febName as $rec): ?>
                    <option value="<?php echo $rec->fabricName;?>"> <?php echo $rec->fabricName;?></option>
                 <?php endforeach;?>
                </select>
              </div>
            </div>
          <!--<div class="form-group row">-->
          <!--  <label class="control-label col-sm-3">Design Code</label>-->
          <!--  <div class="col-sm-9">-->
          <!--    <input type="text" class="form-control" name="designCode" value="" id="design_code">-->
          <!--     <span id="design-error" class="error" style="color:red;"></span>-->
          <!--  </div>-->
          <!--</div>-->
          <div class="form-group row">
            <label class="control-label col-sm-3">Stitch</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="stitch" value="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-3">Dye</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="dye" value="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-3">Matching</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="matching" value="" >
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3">TH Catting Rate</label>
            <div class="col-sm-9">
              <input type="number" class="form-control" name="htCattingRate" value="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-3">Design Pic</label>
            <div class="col-sm-9">
              <input type="file" class="form-control" name="designPic" value="">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-3">Design On</label>
            <div class="col-sm-9">
              <!--<input type="text" class="form-control" name="designOn" value="">-->
                <input type="text" class="form-control" name="designOn" id="designOn" value="">
            </div>
          </div>



        </div>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <input type="submit" class="btn btn-primary" id="design_btn">
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
         window.location="<?php echo base_url()?>admin/Design/delete/"+id;
      }
    }
  }
</script>
<?php include('design_js.php'); ?>
