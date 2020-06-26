<script src="<?php echo base_url('jexcelmaster/') ?>asset/js/jquery.3.1.1.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // $('#fresh_form').hide();
    $('#order_form').hide();
    // $('#prm_form').hide();
    var count = 0;
    var counter = 0;
    var stype = 0;
    $("#add_order").on('click', function() {
      var order_type = $('#selectType').val();
      $('#order_type').val(order_type);
      var category = $('#Select_Category').val();
      $('#category1').val(category);
      $('#category').val(category);
      var session = $('#Select_Session').val();
      $('#session1').val(session);
      $('#session').val(session);
      stype = $('#selectType').val();
      var des = '<input type="text" class="form-control design_barcode" value="">';
      var ord = '<input type="text" name="old_barcode[]" class="form-control order_barcode" value="">';
      if (order_type == "" || category == "" || session == "") {
        alert("Please select some value");
      } else {
        $('#order_form').show();
        $.ajax({
          type: "get",
          url: "<?php echo base_url('admin/orders/getOrder_id') ?>",

          success: function(data) {
            data = JSON.parse(data);
            console.log('count=' + data['count']);
            counter = Number(data['count']);
            console.log('counter=' + counter);
            $('#order_number').val(data['orderno']);
            var obc = 'O' + data['count'];
            $('#obc0').val(obc);
          }
        });
        if (stype == 1) {
          $('#tdbarcode0').html(des);
          $('#barcode_head').html('Design Barcode');
        } else if (stype == 2) {
          $('#tdbarcode0').html(ord);
          $('#barcode_head').html('Order Barcode');
        } else {
          $('#tdbarcode0').html(des);
          $('#barcode_head').html('Design Barcode');
        }
      }



    });
    $(document).on('change', '#type', function(e) {
      var type = $(this).val();
      var id = $(this).parent().parent().attr("id");
      var fab = '<input type="text" class="form-control fabric_name" name="fabric_name[]" value="" id=fabric' + id + '>';
      var fab1 = '<select name="fabric_name[]" class="form-control fabric_name select2" id=fabric' + id + '>'
      fab1 += '<option>Select Fabric</option>'
      fab1 += '<?php foreach ($febName as $value) : ?>'
      fab1 += '<option value="<?php echo $value->fabricName; ?>" > <?php echo $value->fabricName; ?></option>'
      fab1 += '<?php endforeach; ?>'
      fab1 += '</select>';
      var des = '<input type="text" name="design_name[]" class="form-control" value="" id=designName' + id + '>';
      var des1 = '<select name="design_name[]" class="form-control design_name select2" id=designName' + id + ' >'
      des1 += '<option>Select Design</option>'

      des1 += '</select>';

      if (type == 1) {
        $('#designCode' + id + '').val("");
        $('#stitch' + id + '').val("");
        $('#dye' + id + '').val("");
        $('#matching' + id + '').val("");
        $('#hsn' + id + '').val("");
        $('#unit' + id + '').val("");
        $('#tdfab' + id + '').html(fab);
        $('#tddesign' + id + '').html(des);
      } else if (type == 2) {
        $('#designCode' + id + '').val("");
        $('#stitch' + id + '').val("");
        $('#dye' + id + '').val("");
        $('#matching' + id + '').val("");
        $('#hsn' + id + '').val("");
        $('#unit' + id + '').val("");
        $('#tdfab' + id + '').html(fab1);
        $('#tddesign' + id + '').html(des1);
      } else {
        $('#tdfab' + id + '').html(fab);
        $('#tddesign' + id + '').html(des);
      }
    });
    $(document).on('change', '.fabric_name', function(e) {
      var fabric = $(this).val();
      console.log(fabric);
      var button_id = $(this).parent().parent().attr("id");
      console.log(button_id);
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/orders/getFabricDesign') ?>",
        data: {

          'id': fabric,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },

        success: function(data) {
          data = JSON.parse(data);

          $('#hsn' + button_id + '').val(data.febName[0]['fabHsnCode']);
          $('#unit' + button_id + '').val(data.febName[0]['unit']);
          var html = '';
          data.design.forEach(myFunction);

          function myFunction(value, index, array) {

            html += '  <option value=' + array[index]['design_id'] + '>' + array[index]['designName'] + '</option>';

          }
          $('#designName' + button_id + '').append(html);
        }
      });
    });
    $(document).on('change', '.design_name', function(e) {
      var id = $(this).val();
      console.log(id);
      var button_id = $(this).parent().parent().attr("id");
      console.log(button_id);
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/orders/getDesign') ?>",
        data: {

          'id': id,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },

        success: function(data) {
          data = JSON.parse(data);

          $('#designCode' + button_id + '').val(data[0]['designCode']);
          $('#stitch' + button_id + '').val(data[0]['stitch']);
          $('#dye' + button_id + '').val(data[0]['dye']);
          $('#matching' + button_id + '').val(data[0]['matching']);

        }
      });
    });
    $(document).on('blur', '.design_barcode', function(e) {
      var design = $(this).val();
      console.log(design);
      var button_id = $(this).parent().parent().attr("id");
      console.log(button_id);
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/orders/getDesignDetails') ?>",
        data: {

          'id': design,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },

        success: function(data) {
          data = JSON.parse(data);
          if (data != "") {
            fabric = data[0]['fabricName'];
            $(".msg").html("");
            $('#designName' + button_id + '').val(data[0]['designName']);
            $('#designCode' + button_id + '').val(data[0]['desCode']);
            $('#stitch' + button_id + '').val(data[0]['stitch']);
            $('#dye' + button_id + '').val(data[0]['dye']);
            $('#matching' + button_id + '').val(data[0]['matching']);
            $('#fabric' + button_id + '').val(fabric);
            $('#image' + button_id + '').val(data[0]['designPic']);
            $("#preview").attr('src', '<?php echo base_url('upload/') ?>' + data[0]['designPic']);
            var csrf_name = $("#get_csrf_hash").attr('name');
            var csrf_val = $("#get_csrf_hash").val();
            $.ajax({
              type: "POST",
              url: "<?php echo base_url('admin/orders/getFabricDetails') ?>",
              data: {

                'id': fabric,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
              },

              success: function(data) {
                data = JSON.parse(data);

                $('#hsn' + button_id + '').val(data[0]['fabHsnCode']);
                $('#unit' + button_id + '').val(data[0]['unit']);
              }
            });
          } else {
            $(".msg").html("<h6 class='text-danger'><b>Design Not Found </b></h6>");
            $('#designName' + button_id + '').val("");
            $('#designCode' + button_id + '').val('');
            $('#stitch' + button_id + '').val('');
            $('#dye' + button_id + '').val('');
            $('#matching' + button_id + '').val('');
            $('#image' + button_id + '').val('');
          }

        }
      });
    });

    $(document).on('blur', '.order_barcode', function(e) {
      var order = $(this).val();
      console.log(order);
      var button_id = $(this).parent().parent().attr("id");
      console.log(button_id);
      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/orders/getOrderDetails') ?>",
        data: {

          'id': order,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },

        success: function(data) {
          data = JSON.parse(data);
          if (data != "") {
            fabric = data[0]['fabric_name'];
            $(".msg").html("");
            $('#designName' + button_id + '').val(data[0]['design_name']);
            $('#designCode' + button_id + '').val(data[0]['design_code']);
            $('#stitch' + button_id + '').val(data[0]['stitch']);
            $('#dye' + button_id + '').val(data[0]['dye']);
            $('#matching' + button_id + '').val(data[0]['matching']);
            $('#fabric' + button_id + '').val(fabric);
            $('#image' + button_id + '').val(data[0]['image']);
            $("#preview").attr('src', '<?php echo base_url('upload/') ?>' + data[0]['image']);
            $('#hsn' + button_id + '').val(data[0]['hsn']);
            $('#unit' + button_id + '').val(data[0]['unit']);

          } else {
            $(".msg").html("<h6 class='text-danger'><b>Design Not Found </b></h6>");
            $('#designName' + button_id + '').val("");
            $('#designCode' + button_id + '').val('');
            $('#stitch' + button_id + '').val('');
            $('#dye' + button_id + '').val('');
            $('#matching' + button_id + '').val('');
            $('#image' + button_id + '').val('');
          }

        }
      });
    });

    $('#master').on('click', function(e) {
      if ($(this).is(':checked', true)) {
        $(".sub_chk").prop('checked', true);
      } else {
        $(".sub_chk").prop('checked', false);
      }
    });

    $('#add_more').on('click', function() {
      var des = '<input type="text" class="form-control design_barcode" value="">';
      var ord = '<input type="text" name="old_barcode[]" class="form-control order_barcode" value="">';
      count = count + 1;
      counter = counter + 1;
      var element = '<tr id=' + count + '>'
      element += '<td><input type="text" class="form-control" readonly value=' + (count + 1) + '></td>'
      element += '<td> <select name="type[]" class="form-control  " id="type">'
      element += '                    <option>Select Type</option>'
      element += '                    <option value="1" >Barcode </option>'
      element += '                     <option value="2" > Manual </option>'
      element += '               </select></td>'
      element += '<td> <input type="text" class="form-control" name="serial_number[]" value="" ></td>'
      element += '<td id=tdbarcode' + count + '></td>'
      element += ' <td id=tdfab' + count + '><input type="text" class="form-control fabric_name" readonly  name="fabric_name[]" value="" id=fabric' + count + '></td>'
      element += '<td><input type="text" class="form-control" name="hsn[]" value="" readonly id=hsn' + count + '></td>'

      element += '<td id=tddesign' + count + '><input type="text" name="design_name[]" class="form-control" value="" readonly id=designName' + count + '></td>'
      element += '<td> <input type="text" name="design_code[]" class="form-control" value="" readonly id=designCode' + count + '></td>'
      element += '<td><input type="text" class="form-control" name="stitch[]" value="" readonly id=stitch' + count + '></td>'
      element += '<td>  <input type="text" class="form-control" name="dye[]" value="" readonly id=dye' + count + '></td>'
      element += '<td><input type="text" class="form-control" name="matching[]" value="" readonly id=matching' + count + '></td>'
      element += '<td><input type="text" class="form-control" name="quantity[]" value=""></td>'
      element += '<td><input type="text" name="unit[]" class="form-control unit" value="" readonly id=unit' + count + '></td>'
      element += '<td><input type="text" name="image[]" class="form-control unit" value="" readonly id=image' + count + '></td>'
      element += '<td>  <input type="text" class="form-control" name="priority[]"  value="30"></td>'
      element += '<td> <input type="text" class="form-control" name="order_barcode[]" readonly value=O' + counter + ' id=obc' + count + '></td>'
      element += '<td><input type="text" class="form-control" name="remark[]" value=""></td>'
      element += '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
      element += '</tr>';
      $('#fresh_data').append(element);
      if (stype == 1) {
        $('#tdbarcode' + count + '').html(des);
        $('#barcode_head').html('Design Barcode');
      } else if (stype == 2) {
        $('#tdbarcode' + count + '').html(ord);
        $('#barcode_head').html('Order Barcode');
      } else {
        $('#tdbarcode' + count + '').html(des);
        $('#barcode_head').html('Design Barcode');
      }
    });

    // $('#add_more_prm').on('click', function() {
    //   count = count + 1;
    //   var element = '<tr id=' + count + '>'
    //   element += '<td><input type="text" class="form-control" readonly value=' + (count + 1) + '></td>'
    //   element += '<td> <input type="text" class="form-control" name="serial_number[]" value="" required></td>'
    //   element += '<td> <input type="text" name="old_barcode[]" class="form-control" value=""></td>'
    //   element += '<td> <input type="text" class="form-control fabric_name" readonly  name="fabric_name[]" value="" id=fabric' + count + '></td>'
    //   element += '<td><input type="text" class="form-control" name="hsn[]" value="" id=hsnp' + count + ' readonly></td>'
    //   element += '<td><input type="text" name="design_name[]" class="form-control" value="" id=designNamep' + count + ' readonly></td>'
    //   element += '<td> <input type="text" name="design_code[]" class="form-control" value="" id=designCodep' + count + ' readonly></td>'
    //   element += '<td><input type="text" class="form-control" name="stitch[]" value="" id=stitchp' + count + ' readonly></td>'
    //   element += '<td>  <input type="text" class="form-control" name="dye[]" value="" id=dyep' + count + ' readonly></td>'
    //   element += '<td><input type="text" class="form-control" name="matching[]" value="" id=matchingp' + count + ' readonly></td>'
    //   element += '<td><input type="text" class="form-control" name="quantity[]" value=""></td>'
    //   element += '<td><input type="text" name="unit[]" class="form-control unit" value="" id=unitp' + count + ' readonly></td>'
    //   element += '<td><input type="text" name="image[]" class="form-control unit" value="" id=imagep' + count + ' readonly></td>'
    //   element += '<td>  <input type="text" class="form-control" name="priority[]"  value="30" required></td>'
    //   element += '<td> <input type="text" class="form-control" name="order_barcode[]" value="" id=obc' + count + '></td>'
    //   element += '<td><input type="text" class="form-control" name="remark[]" value="" required></td>'
    //   element += '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
    //   element += '</tr>';
    //   $('#prm_data').append(element);
    // });

    $(document).on('click', '.remove', function() {
      $(this).parent().parent().remove();
      counter = counter - 1;
    });

    $('.delete_all').on('click', function(e) {
      var allVals = [];
      $(".sub_chk:checked").each(function() {
        allVals.push($(this).attr('data-id'));
      });
      //alert(allVals.length); return false;
      if (allVals.length <= 0) {
        alert("Please select row.");
      } else {
        //$("#loading").show();
        WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";
        var check = confirm(WRN_PROFILE_DELETE);
        if (check == true) {
          //for server side
          var join_selected_values = allVals.join(",");
          // alert (join_selected_values);exit;

          $.ajax({
            type: "POST",
            url: "<?= base_url() ?>admin/orders/deleteorder",
            cache: false,
            data: {
              'ids': join_selected_values,
              '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(response) {

              //referesh table
              $(".sub_chk:checked").each(function() {
                var id = $(this).attr('data-id');
                $('#tr_' + id).remove();
              });
            }
          });
        }
      }
    });
    $(".order_row").click(function() {
      // alert ('ok');
      var oreder_id = $(this).attr('id');
      ///alert(oreder_id);

      var csrf_name = $("#get_csrf_hash").attr('name');
      var csrf_val = $("#get_csrf_hash").val();
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('admin/Orders/get_order_details') ?>",
        data: {
          'oreder_id': oreder_id,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        datatype: 'json',
        success: function(data) {
          $("#content_body").html(data);
        }
      });
    });
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

    $('.order_number').on('blur', function() {
      var order = $(this).val();
      if (order == '') {
        return;
      }
      $.ajax({
        url: '<?php echo base_url('admin/orders/CheckOrder'); ?>',
        type: 'post',
        data: {
          'order': order,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        success: function(response) {
          if (response == 'taken') {
            $(".msg").html("<h6 class='text-danger'><b>Order already exists</b></h6>");
            $('.order_number').css("border-bottom", "1px solid red");
          } else {
            $(".msg").html("");
            $('.order_number').css("border-bottom", "1px solid green");
          }
        }
      });
    });

    $("body").keypress(function(e) {
      if (e.which == 13) {
        return false;
      }
    });
  });
</script>