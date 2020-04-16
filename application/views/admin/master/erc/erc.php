
<div id="content">
<div id="content-header">
<div class="container-fluid">
 <div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div id="overlay">
                </div>
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                 <h5>ERC Design List</h5>
                </div>
                <span id='msg'></span>
                <hr>
                 <h4 style="color:red"><?php echo $this->session->flashdata('msg'); ?></h4>
                <!-- <div class="row well">
         	       &nbsp;&nbsp;<a type="button" class="btn btn-info pull-left delete_all  btn-danger" style="color:#fff;"><i class="mdi mdi-delete red"></i></a>&nbsp;
                </div> -->
               <div id="spreadsheet">
               </div>
              <p><button id='download'>Download as CSV</button></p>
            </div>

          </div>
          </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                 <h5>New Design List</h5>
                </div><hr>
                    <table class="table" >
                   <thead>
                     <tr>
                        <th>Design  Name</th>
                        <th>Stitch</th>
                     </tr>
                   </thead>
                <tbody>
                    <?php  foreach ($fresh_designname as $value) { ?>
                        <tr class="gradeU order_row" id="">

                        <td><?php echo $value['designName'];?></td>
                        <td><?php echo $value['stitch'];?></td>


                      </tr>

                    <?php }?>


                </tbody>
        </table>
    </div>
        </div>
     </div>


</div>

  </div>
</div>
</div>
<style>
    #DataTables_Table_0_filter{
        display:none;
    }
</style>

<?php include('erc_js.php');?>
