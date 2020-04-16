
<div id="content">
  <div id="content-header">
      <div class="container-fluid">
        <div class="row-fluid">

      </div>
    </div>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                      <div id="feedback">
                        <h4>Select Fabric Name:</h4>
                      </div>
                <form action="">
                    <table class="table" id="fabric">

                        <th><b>Fabric Name</b></th>
                      <tbody>
                      <?php   $id=0; foreach($fabric_data as $value): $id++;?>
                      <tr>
                          <!-- <td style="display:none;"><?php echo $value['id'];?></td> -->
                     <td id="<?php echo $value['fabricType'];?>"><?php echo $value['fabricName'];?></td>
                     </tr>
                   </tbody>
                     <?php endforeach;?>
                   </table>
                    </div>
                    <div class="col-sm-8" id="show">

                    </div>
                   </form>
                    
                </div>

            </div>
         </div>
      </div>

   </div>
    </div>

  </div>
</div>
</div>
<!-- add modal wind-->

<!-- End add modal wind-->
<style>
td { padding: 5px; cursor: pointer;}

.selected {
    background-color: #7460ee;
    color: #FFF;
}


</style>
<?php include('asign_js.php'); ?>
