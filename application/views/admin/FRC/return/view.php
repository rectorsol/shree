<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->



  <!-- **************** Product List *****************  -->
  <div class="col-md-12 bg-white">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Challan Return Detail</h4>
        <hr>

        <div class="widget-box">
          <div class="widget-content nopadding">
            
           
            <table class="table-bordered data-table text-center table-responsive" id="frc">
              <caption style='caption-side : top' class=" text-info ">
                <div class="row well container">
                  <div class="col-4">
                    <h6> Challan No - <span class="label label-primary"> <?php echo $frc_data[0]['challan_no']?></span>
                    </h6>
                  </div>
                  <div class="col-4">
                    <h6> Challan From - <span class="label label-primary"> <?php echo $pbc[0]['sub1']?></span>
                    </h6>
                  </div>
                  <div class="col-4">
                    <h6> Challan To - <span class="label label-primary"> <?php echo $pbc[0]['sub2']?></span>
                    </h6>
                  </div>
                </div>
              </caption>
              <thead class="bg-dark text-white">
                <tr class="odd" role="row">
                  <th><input type="checkbox" class="sub_chk" id="master"></th>
                  <th>Date</th>

                  <th>PBC</th>

                  <th>Fabric </th>
                  <th>Hsn </th>
                  <th>Total qty</th>

                  <th>curr qty</th>



                  <th>Ad_no</th>
                  <th>P _code </th>

                  <th>T_value</th>
                </tr>
              </thead>
              <tbody>
                <?php
                                        $c=1;$total_qty=0.00;$total_val=0.00;
                                        foreach ($frc_data as $value) { 
                                           $total_qty+=$value['stock_quantity'];
                                        $total_val+=$value['total_value'];?>
               
                <tr class="gradeU" id="tr_<?php echo $value['fsr_id']?>">

                  <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['fsr_id'] ?>"></td>
                  <td><?php echo $value['created_date'];?></td>


                  <td><?php echo $value['parent'];?></td>
                  <td><?php echo $value['fabricName'];?></td>
                  <td><?php echo $value['hsn'];?></td>

                  <td><?php echo $value['stock_quantity']?></td>

                  <td><?php echo $value['current_stock']?></td>

                  <td><?php echo $value['ad_no'];?></td>
                  <td><?php echo $value['purchase_code'];?></td>

                  <td><?php echo $value['total_value'];?></td>

                </tr>

                <?php $c=$c+1; } ?>

              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th>Total</th>
                  <th id="th_qty"><?php echo $total_qty ?></th>
                  <th></th>

                  <th></th>


                  <th>Total</th>
                  <th id="th_total"><?php echo $total_val ?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>


<script>
  
</script>

<?php include('FRC_js.php');?>
