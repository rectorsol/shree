<script src="<?php echo base_url('optimum/barcode/dist/JsBarcode.all.js'); ?>"></script>
<script>
    function textToBase64Barcode(text) {
        var canvas = document.createElement("canvas");
        JsBarcode(canvas, text, {
            format: "CODE39"
        });
        return canvas.toDataURL("image/png");
    }
</script>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <!-- **************** Product List *****************  -->
    <div class="col-md-12 bg-white">
        <div class="card">
            <div class="card-body" id="Print">
                <h4 class="card-title">Challan Receive Detail</h4>

                <hr>
                <a type="button" class="btn btn-info pull-left print_all btn-success" style="color:#fff;"><i class="fa fa-print"></i></a>
                <hr>
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <div class="widget-content nopadding">
                            <table class=" table-bordered data-table text-center " id="list">

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

                        </div>
                    </div>
                </div>
                <hr>



            </div>
        </div>

    </div>
</div>
<script>
    jQuery('.print_all').on('click', function(e) {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });
        //alert(allVals.length); return false;
        if (allVals.length <= 0) {
            alert("Please select row.");
        } else {
            //$("#loading").show();
            WRN_PROFILE_DELETE = "Are you sure you want to Print this rows?";
            var check = confirm(WRN_PROFILE_DELETE);
            if (check == true) {
                //for server side
                var join_selected_values = allVals.join(",");
                // alert (join_selected_values);exit;
                var ids = join_selected_values.split(",");
                var data = [];
                $.each(ids, function(index, value) {
                    if (value != "") {
                        data[index] = value;
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>admin/Transaction/print_packing_slip",
                    cache: false,
                    data: {
                        'ids': data,

                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    success: function(response) {
                        var w = window.open('about:blank');
                        w.document.open();
                        w.document.write(response);
                        w.document.close();
                    }
                });
                //for client side

            }
        }
    });
</script>