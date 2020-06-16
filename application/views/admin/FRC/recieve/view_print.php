

<style>
  .PrintThis table {
    width: 100%;
  }

  .PrintThis table tr td {
    text-align: center;
    padding: 0px 5px;
    vertical-align: top;
  }

  .PrintThis table td {
    font-size: 12px;
    font-weight: 700;
  }

  .PrintThis table table {
    width: 300px;
  }

  .PrintThis table table td {
    border: none;
    text-align: left;
  }
</style>
<h4 class="card-title"><?php echo $title;?></h4>
<table>
  <caption style='caption-side : top' class=" text-info ">
    <div class="row well container">
      <div class="col-4">
        <h6> Challan No - <span class="label label-primary"> <?php echo $frc_data[0]->challan_no?></span>
        </h6>
      </div>
      <div class="col-4">
        <h6> Challan From - <span class="label label-primary"> <?php echo $frc_data[0]->challan_from?></span>
        </h6>
      </div>
      <div class="col-4">
        <h6> Challan To - <span class="label label-primary"> <?php echo $frc_data[0]->challan_to?></span>
        </h6>
      </div>
    </div>
  </caption>
  <thead>
    <tr class="odd" role="row">

      <th>Date</th>

      <th>PBC</th>
      <th>Fabric </th>
      <th>Hsn </th>
      <th>Total qty</th>

      <th>Curr qty</th>


      <th>Color</th>
      <th>Ad_no</th>
      <th>P_ code </th>
      <th>P _rate </th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <?php
                                        $c=1;$total_qty=0.00;$total_val=0.00;
                                        
                                        foreach ($frc_data as $value) { 
                                          $total_qty+=$value->stock_quantity;
                                        $total_val+=$value->total_value;?>
    <tr class="gradeU">


      <td><?php echo $value->created_date;?></td>

      <td><?php echo $value->parent_barcode;?></td>
      <td><?php echo $value->fabricName;?></td>
      <td><?php echo $value->hsn;?></td>

      <td><?php echo $value->stock_quantity?></td>

      <td><?php echo $value->current_stock?></td>
      <td><?php echo $value->color_name?></td>
      <td><?php echo $value->ad_no;?></td>
      <td><?php echo $value->purchase_code;?></td>
      <td><?php echo $value->purchase_rate;?></td>
      <td><?php echo $value->total_value;?></td>

    </tr>

    <?php $c=$c+1; } ?>
  </tbody>
  <tr>
    <th></th>
    <th></th>
    <th></th>
    <th>Total</th>
    <th id="th_qty"><?php echo $total_qty ?></th>
    <th></th>
    <th> </th>
    <th></th>

    <th></th>
    <th>Total</th>
    <th id="th_total"><?php echo $total_val ?></th>
  </tr>
</table>
