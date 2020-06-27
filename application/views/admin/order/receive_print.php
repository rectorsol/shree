<style>
  .PrintThis table {
    width: '6in';
    padding: 5px 5px;
  }

  .PrintThis table tr td {
    text-align: center;
    padding: 0px 5px;
    vertical-align: top;
  }

  .PrintThis table td {
    font-size: 14px;
    font-weight: 650;
  }

  .PrintThis table table {
    width: 5.0in;
  }

  .PrintThis table table td {
    border: none;
    text-align: left;
  }

  table img {
    width: 1.0in;
    height: 50px;
    display: block;
    margin: 0 auto;
    padding-top: 2px;
  }
</style>

<table border="1" height="5in" width="6in" style="padding:10px 10px 10px 20px;">
  <?php foreach ($data[0] as $value) : ?>
    <tr>
      <td>
        <table>
          <tr>
            <td rowspan="4" width="120px">
              <div>
                <img class="barCodeImage" id="barcode1<?php echo $value['order_barcode']; ?>" />
                <script>
                  JsBarcode("#barcode1<?php echo $value['order_barcode']; ?>", "<?php echo $value['order_barcode']; ?>");
                </script>
              </div>
            </td>
            <td width="90px">SIZE</td>
            <td width="200px">:- <?php echo $value['quantity']; ?> UNIT <?php echo $value['unit']; ?></td>
            <td width="140px">KARIGAR :-</td>
          </tr>
          <tr>
            <td width="90px">FABRIC</td>
            <td width="200px">:- <?php echo $value['fabric_name']; ?></td>
            <td collspan="2" width="140px">……………………………</td>
          </tr>
          <tr>
            <td width="90px">OD NO</td>
            <td width="200px">:- <?php echo $value['order_number']; ?></td>
          </tr>
          <tr>
            <td width="90px">DESIGN NAME</td>
            <td width="200px">:-<?php echo $value['design_name']; ?></td>
            <td>CUTTING :-</td>
          </tr>
          <tr>
            <td rowspan="3">
              <div>
                <img class="barCodeImage" id="barcode1<?php echo $value['order_barcode']; ?>" />
                <script>
                  JsBarcode("#barcode1<?php echo $value['order_barcode']; ?>", "<?php echo $value['order_barcode']; ?>");
                </script>
              </div>
            </td>
            <td width="90px">DESIGN CODE</td>
            <td width="200px">:- <?php echo $value['design_code']; ?></td>
            <td collspan="2">……………………………</td>
          </tr>
          <tr>
            <td width="90px">STITCH</td>
            <td width="200px">:- <?php echo $value['stitch']; ?></td>
          </tr>
          <tr>
            <td width="90px">DYE</td>
            <td width="200px">:- <?php echo $value['dye']; ?></td>
            <td>CHECKING :-</td>
          </tr>
          <tr>
            <td width="120px">CUST.NAME</td>
            <td width="240px" colspan="2">:- <?php echo $value['customer']; ?></td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td width="120px">MATCHING</td>
            <td width="240px" colspan="2">:- <?php echo $value['matching']; ?></td>
          </tr>
        </table>
      </td>
    </tr>
  <?php endforeach; ?>
</table>