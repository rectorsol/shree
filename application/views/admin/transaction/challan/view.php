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
                <div class="row ">

                   
                    <div class="col-md-4 "><input type="text" id="obc" class="form-control" placeholder="OBC Recieve"> </div>
                    <div class="col-md-2 "><input type="button" id="search" class="btn btn-success" value='Search'> </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">

                        <table class="table-box">
                            <tr>
                                <td><label>From</label></td>
                                <td>
                                    <div class="col-md-12">
                                        <label>Job Work Party Name</label>
                                        <input type="text" name="FromParty" class="form-control" value='<?php echo $trans_data[0]['fromParty']; ?>' readonly>

                                    </div>
                                </td>
                                <td><label>From Godown</label>
                                    <input type="text" class="form-control " name="FromGodown" value="<?php echo $trans_data[0]['from_godown']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td><label>To</label>
                                </td>
                                <td>
                                    <div class="col-md-12">
                                        <label>Job Work Party Name</label>
                                        <select name="toParty" class="form-control" id="toParty" readonly>
                                            <option>Select </option>

                                        </select>
                                    </div>
                                </td>
                                <td><label>To Godown</label><input type="text" class="form-control " value="<?php echo $trans_data[0]['to_godown']; ?>" readonly></td>

                            </tr>
                            <tr>
                                <td><label>Job Work type</label></td>
                                <td>
                                    <div class="col-md-12"><input type="text" class="form-control " value="<?php echo $trans_data[0]['jobworkType']; ?>" readonly></div>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td><label>Challan No</label></td>
                                            <td><input type="text" class="form-control " name="challan" value="<?php echo $trans_data[0]['challan_no']; ?>" readonly></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-4 "><img src="" alt=""> </div>
                </div>
                <hr>

                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <div class="widget-content nopadding">


                            <table class=" table-bordered data-table text-center ">

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
                                    $rec = 1;
                                    foreach ($frc_data as $value) {
                                        $total_qty += $value['quantity'];
                                        if ($value['stat'] == 'recieved') {
                                            $rec += 1;
                                        }
                                    ?>
                                        <tr class="<?php if ($value['stat'] == 'pending') {
                                                        echo "bg-secondary text-white";
                                                    } ?>">

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
                                        <th> </th>
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
                </div><hr>
                <?php if($c==$rec) {?>
                <div >
                    <form action="<?php echo base_url('admin/Transaction/recieve/')  ?>" method="post">
                        <input type="hidden" name="trans_id" value="<?php echo $trans_data[0]['transaction_id']; ?>">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <button type="submit" name="submit" class="btn btn-success btn-md">Recieve</button>
                    </form>
                </div>
                <?php }?>
            </div>
        </div>

    </div>
</div>


<script>
    $(document).on('click', '#search', function(e) {
        var obc = $('#obc').val();



        var csrf_name = $("#get_csrf_hash").attr('name');
        var csrf_val = $("#get_csrf_hash").val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/transaction/recieve_obc') ?>",
            data: {
                'trans_id': '<?php echo $trans_data[0]['transaction_id']; ?>',
                'obc': obc,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            },

            success: function(data) {
                if (data == 0) {
                    toastr.error('Failed!', "OBC did not match");
                } else if (data == 1) {
                    toastr.success('Success!', "Recieved successfully");

                } else if (data == 2) {
                    toastr.error('Failed!', "Something went wrong..Status not updated");
                } else {
                    toastr.error('Failed!', data);
                }


            }
        });
    });
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