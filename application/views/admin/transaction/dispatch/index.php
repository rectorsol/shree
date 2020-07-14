  <table class=" table-bordered  text-center " id="list">

      <thead class="bg-dark text-white">
          <tr>
              <th><input type="checkbox" class="sub_chk" id="master"></th>
              <th>Barcode</th>
              <th>OBC</th>
              <th>Order No</th>
              <th>Fabric Code</th>
              <th>Fabric</th>
              <th>Hsn</th>
              <th>DBC</th>
              <th>Design Name </th>
              <th>Design Code</th>

              <th>Current Qty</th>
              <th>Unit</th>
              <th>Image barcode</th>

          </tr>
      </thead>
      <tbody><?php
                $id = 1;
                foreach ($trans_data as $value) {
                    $barcode = 'SNS-' . $value['order_barcode'] . '-' . $value['fabricCode'] . '/' . $value['fabricCode'] . '/' . $value['design_code'];
                ?>

              <tr class="gradeU" id="tr_<?php echo $value['trans_meta_id'] ?>">

                  <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['trans_meta_id'] ?>"></td>
                  <td>
                      <div>
                          <img class="barCodeImage" width="100%" id="barcode1<?php echo $value['trans_meta_id']; ?>" />
                          <script>
                              JsBarcode("#barcode1<?php echo $value['trans_meta_id']; ?>", "<?php echo $barcode; ?>");
                          </script>
                      </div>
                  </td>
                  <td><?php echo $value['order_barcode']; ?></td>
                  <td><?php echo $value['order_number']; ?></td>
                  <td><?php echo $value['fabricCode']; ?></td>
                  <td><?php echo $value['fabric_name']; ?></td>
                  <td><?php echo $value['hsn']; ?></td>
                  <td><?php echo $value['design_barcode']; ?></td>
                  <td><?php echo $value['design_name']; ?></td>
                  <td><?php echo $value['design_code']; ?></td>
                  <td><?php echo $value['quantity']; ?></td>
                  <td><?php echo $value['unit']; ?></td>
                  <td>
                      <div>
                          <img class="barCodeImage" width='100%' id="barcode2<?php echo $value['trans_meta_id']; ?>" />
                          <script>
                              JsBarcode("#barcode2<?php echo $value['trans_meta_id']; ?>", "<?php echo $value['finish_qty']; ?>");
                          </script>
                      </div>
                  </td>


              </tr>

          <?php $id = $id + 1;
                } ?></tbody>
  </table>