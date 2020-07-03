<script src="<?php echo base_url('jexcelmaster/') ?>asset/js/jquery.3.1.1.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    var count = 0;
    var total = 0;

    $('#master').on('click', function(e) {
      if ($(this).is(':checked', true)) {
        $(".sub_chk").prop('checked', true);
      } else {
        $(".sub_chk").prop('checked', false);
      }
    });


    $('#add_more').on('click', function() {

      count = count + 1;
      var element = '<tr id=' + count + '>'
      element += '<td><input type="text" class="form-control pbc" name="pbc[]" value="" id=pbc' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control obc" name="obc[]" value=""></td>'
      element += '<td><input type="text" class="form-control " name="orderNo[]" value="" id=orderNo' + count + '></td>'
      element += '<td><input type="text" name="fabric_name[]" class="form-control " id=fabric' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control " name="hsn[]" value="" id=hsn' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control " name="design[]" value="" id=design' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control " name="designCode[]" value="" id=DesignCode' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control " name="dye[]" value="" id=dye' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control " name="matching[]" value="" id=matching' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control" name="quantity[]" value="" id=qty' + count + ' readonly></td>'
      element += '<td><input type="text" name="unit[]" class="form-control unit " id=unit' + count + ' readonly>'
      element += '<td><input type="text" class="form-control" name="job[]" value="" id=job' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control " name="rate[]" value="" id=rate' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control" name="value[]" value="" id=value' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control" name="image[]" value="" id=image' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control " name="days[]" value="" id=days' + count + ' readonly></td>'
      element += '<td><input type="text" class="form-control" name="remark[]" value="" id=remark' + count + ' readonly></td>'
      element += '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
      element += '</tr>';
      $('#fresh_data').append(element);
    });


    $(document).on('click', '.remove', function() {
      $(this).parent().parent().remove();
      count = count - 1;
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
            url: "<?= base_url() ?>admin/frc/delete",
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

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

    $(document).on('change', "input[name='prate[]']", function() {
      var id = $(this).parent().parent().attr("id");
      console.log("id=" + id);
      var q = Number($('#qty' + id + '').val());
      console.log("q=" + q);
      var rate = Number($(this).val());
      var val = rate * q;
      console.log("val=" + val);
      $('#value' + id + '').val(val);
      qty = get_total_value()
      $('#th_total').html(qty)
      console.log("th_total=" + qty);

    });



    $(document).on('change', "input[name='qty[]']", function() {


      qty = get_total_quntity()
      $('#th_qty').html(qty)
      console.log("quantity=" + qty);

    });

    function get_total_quntity() {
      var current = 0;
      $("input[name='qty[]']").each(function() {
        current += Number($(this).val());
        console.log("Current=" + current);
      });
      return Number(current);
    }
    $(document).on('blur', '.obc', function(e) {
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
            // One day Time in ms (milliseconds) 
            var one_day = 1000 * 60 * 60 * 24
            var present_date = new Date();

            // 0-11 is Month in JavaScript 
            var christmas_day = new Date(data[0]['order_date']);

            // To Calculate the result in milliseconds and then converting into days 
            var Result = Math.round(present_date.getTime() - christmas_day.getTime()) / (one_day);

            // To remove the decimals from the (Result) resulting days value 
            var Final_Result = Result.toFixed(0);
            Final_Result = 30- Final_Result;
            fabric = data[0]['fabric_name'];
            $(".msg").html("");
            $('#days' + button_id + '').val(Final_Result);
            $('#pbc' + button_id + '').val(data[0]['pbc']);
            $('#orderNo' + button_id + '').val(data[0]['order_number']);
            $('#design' + button_id + '').val(data[0]['design_name']);
            $('#DesignCode' + button_id + '').val(data[0]['design_code']);
            $('#stitch' + button_id + '').val(data[0]['stitch']);
            $('#dye' + button_id + '').val(data[0]['dye']);
            $('#matching' + button_id + '').val(data[0]['matching']);
            $('#qty' + button_id + '').val(data[0]['quantity']);
            $('#fabric' + button_id + '').val(fabric);
            $('#image' + button_id + '').val(data[0]['image']);
            $("#preview").attr('src', '<?php echo base_url('upload/') ?>' + data[0]['image']);
            $('#hsn' + button_id + '').val(data[0]['hsn']);
            $('#unit' + button_id + '').val(data[0]['unit']);
            if (fabric != "") {
              $('#submit_button').show();
            } else {
              $('#submit_button').hide();
            }
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

    function get_total_value() {
      var current = 0;
      $("input[name='total[]']").each(function() {
        current += Number($(this).val());
        console.log("Current=" + current);
      });
      return Number(current);
    }
    $(document).on('change', "#FromParty", function() {
      var party = $(this).val();


      if (party != "") {
        var csrf_name = $("#get_csrf_hash").attr('name');
        var csrf_val = $("#get_csrf_hash").val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/Dye_transaction/get_godown') ?>",
          data: {
            'party': party,

            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
          },
          datatype: 'json',

          success: function(data) {
            data = JSON.parse(data);

            $("#FromGodown").val(data[0]['subDeptName']);
          }

        });
      } else {
        $("#FromGodown").val('');
      }
    });
    $(document).on('change', "#toParty", function() {
      var party = $(this).val();


      if (party != "") {
        var csrf_name = $("#get_csrf_hash").attr('name');
        var csrf_val = $("#get_csrf_hash").val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/Dye_transaction/get_godown') ?>",
          data: {
            'party': party,

            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
          },
          datatype: 'json',

          success: function(data) {
            data = JSON.parse(data);

            $("#ToGodown").val(data[0]['subDeptName']);
            $("#workType").val(data[0]['job_work_type']);
          }

        });
      } else {
        $("#ToGodown").val('');
        $("#workType").val('');
      }
    });
  });
</script>