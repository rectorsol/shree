<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <!-- **************** Product List *****************  -->
    <div class="col-md-12 bg-white">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Challan Receive Detail</h4>

                <hr>
                <div class="row ">

                    <div class="col-md-2 "><button class="btn btn-info print_all"><i class="fa fa-print "></i> Print </button> </div>

                </div>
                <hr>
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <div class="widget-content nopadding">


                            <table class=" table-bordered data-table text-center table-responsive" id="frc">
                                <!-- <caption style='caption-side : top' class=" text-info ">
                                    <div class="row well container">
                                        <div class="col-4">
                                            <h6> Challan No - <span class="label label-primary"> <?php echo $frc_data[0]['challan_no'] ?></span>
                                            </h6>
                                        </div>
                                        <div class="col-4">
                                            <h6> Challan From - <span class="label label-primary"> <?php echo $pbc[0]['sub1'] ?></span>
                                            </h6>
                                        </div>
                                        <div class="col-4">
                                            <h6> Challan To - <span class="label label-primary"> <?php echo $pbc[0]['sub2'] ?></span>
                                            </h6>
                                        </div>
                                    </div>
                                </caption> -->
                                <thead class="bg-dark text-white">
                                    <tr class="odd" role="row">
                                        <th><input type="checkbox" class="sub_chk" id="master"></th>
                                        <th>PBC</th>
                                        <th>OBC</th>
                                        <th>Order No</th>
                                        <th>Fabric</th>
                                        <th>Hsn</th>
                                        <th>Design Name </th>
                                        <th>Design Code</th>
                                        <th>Dye </th>
                                        <th>Matching</th>
                                        <th>Current Qty</th>
                                        <th>Unit</th>
                                        <th>Image</th>
                                        <th>Days Rem</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c = 1;
                                    $total_qty = 0.00;
                                    $total_val = 0.00;

                                    foreach ($frc_data as $value) {
                                        $total_qty += $value['quantity'];
                                    ?>
                                        <tr class="gradeU">

                                            <td><input type="checkbox" class="sub_chk" data-id="<?php echo $value['trans_meta_id'] ?>"></td>
                                            <td><?php echo $value['pbc']; ?></td>

                                            <td><?php echo $value['order_barcode']; ?></td>
                                            <td><?php echo $value['order_number']; ?></td>

                                            <td><?php echo $value['fabric_name']; ?></td>
                                            <td><?php echo $value['hsn']; ?></td>
                                            <td><?php echo $value['design_name']; ?></td>

                                            <td><?php echo $value['design_code'] ?></td>


                                            <td><?php echo $value['dye'] ?></td>
                                            <td><?php echo $value['matching']; ?></td>
                                            <td><?php echo $value['quantity']; ?></td>
                                            <td><?php echo $value['unit']; ?></td>
                                            <td><?php echo $value['image']; ?></td>
                                            <td><?php echo $value['days_left']; ?></td>
                                            <td><?php echo $value['remark']; ?></td>
                                        </tr>

                                    <?php $c = $c + 1;
                                    } ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th> </th>
                                        <th></th>
                                        <th></th>
                                        <th>  </th>
                                        <th> </th>
                                        <th> </th>
                                        <th>total</th>
                                        <th><?php echo $total_qty; ?></th>
                                        <th></th>
                                        <th></th>
                                        <th> </th>
                                        <th></th>
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
                    url: "<?= base_url() ?>admin/Transaction/return_print_multiple",
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