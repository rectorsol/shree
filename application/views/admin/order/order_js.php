<script src="<?php echo base_url('jexcelmaster/')?>asset/js/jquery.3.1.1.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#fresh_form').hide();
    $('#order_form').hide();
    $('#prm_form').hide();
    var count =0;
    

    $("#add_order").on('click', function() {
      $('#order_form').show();
      var order_type = $('#selectType').val();
      $('#order_type').val(order_type);
      var category = $('#Select_Category').val();
      $('#category1').val(category);
      $('#category').val(category);
      var session = $('#Select_Session').val();
      $('#session1').val(session);
      $('#session').val(session);
      var stype = $('#selectType').val();
      if (stype == 1) {
        $('#prm_form').hide();
        $('#fresh_form').show();
      } else if (stype == 2) {
        $('#fresh_form').hide();
        $('#prm_form').show();
      } else {
        $('#fresh_form').show();
      }
    }); 
 $(document).on('change', '#type', function(e) { 
var type = $(this).val();
var fab = '<input type="text" class="form-control fabric_name" name="fabric_name[]" value="" >';
var fab1='<select name="fabric_name[]" class="form-control fabric_name " >'
                        fab1+=  '<option>Select Fabric</option>'
                         fab1+=   '<?php foreach ($febName as $value): ?>'
                        fab1+=   '<option value="<?php echo $value->id;?>" > <?php echo $value->fabricName;?></option>'
                          fab1+=   '<?php endforeach;?>'
                    fab1+=  '</select>';
  var des='<input type="text" name="design_name[]" class="form-control" value="" >';
  var des1='<select name="fabric_name[]" class="form-control fabric_name " >'
                        des1+=  '<option>Select Design</option>'
                      
                    des1+=  '</select>';    
   var id = $(this).parent().parent().attr("id");                               
 if (type == 1) {
        $('#tdfab'+ id + '').html(fab);
        $('#tddesign'+ id + '').html(des);
      } else if (type == 2) {
         $('#tdfab'+ id + '').html(fab1);
        $('#tddesign'+ id + '').html(des1);
      } else {
       $('#tdfab'+ id + '').html(fab);
        $('#tddesign'+ id + '').html(des);
      }
 });
$(document).on('change', '.fabric_name', function(e) {
      var fabric =$(this).val();
      console.log(fabric);
      var button_id = $(this).parent().parent().attr("id");
       console.log(button_id);  
      var csrf_name = $("#get_csrf_hash").attr('name');
        var csrf_val = $("#get_csrf_hash").val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/orders/getFabricDetails') ?>",
          data: {
            
            'id': fabric,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
          },
         
          success: function(data) {
            data =JSON.parse(data);
             
            $('#hsn'+ button_id + '').val(data[0]['fabHsnCode']);
             $('#unit'+ button_id + '').val(data[0]['unit']);
          }
        });
    });
    
    $(document).on('blur', '.design_name', function(e) {
      var design =$(this).val();
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
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
          },
         
          success: function(data) {
            data =JSON.parse(data);
             if(data!=""){
               $(".msg").html("");
               $('#designName'+ button_id + '').val(data[0]['designName']);
             $('#designCode'+ button_id + '').val(data[0]['designCode']);
             $('#stitch'+ button_id + '').val(data[0]['stitch']);
             $('#dye'+ button_id + '').val(data[0]['dye']);
             $('#matching'+ button_id + '').val(data[0]['matching']);
             $('#fabric_name'+ button_id + '').val(data[0]['fabricName']);
             $('#image'+ button_id + '').val(data[0]['designPic']);
              $("#preview").attr('src','<?php echo base_url('upload/') ?>'+data[0]['designPic']);
             }else{
               $(".msg").html("<h6 class='text-danger'><b>Design Not Found </b></h6>");
                $('#designName'+ button_id + '').val("");
             $('#designCode'+ button_id + '').val('');
             $('#stitch'+ button_id + '').val('');
             $('#dye'+ button_id + '').val('');
             $('#matching'+ button_id + '').val('');
             $('#image'+ button_id + '').val('');
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
      
      count=count+1;
      var element = '<tr id='+count+'>'
      element +='<td><input type="text" class="form-control" readonly value='+(count+1)+'></td>'
      element += '<td> <input type="text" class="form-control" name="serial_number[]" value="" ></td>'
      element += '<td> <input type="text" class="form-control design_name"  value="" ></td>'
      element += '<td> <select name="fabric_name[]" class="form-control fabric_name select2" >'
         element +=            '<option>Select Fabric</option>'
         element +=            '<?php foreach ($febName as $value): ?>'
         element +=            '<option value="<?php echo $value->id;?>"> <?php echo $value->fabricName;?></option>'
         element +=          '<?php endforeach;?>'
          element +=         '</select></td>'
      element += '<td><input type="text" class="form-control" name="hsn[]" value="" id=hsn'+count+'></td>'
      
      element += '<td><input type="text" name="design_name[]" class="form-control" value="" id=designName'+count+'></td>'
      element += '<td> <input type="text" name="design_code[]" class="form-control" value="" id=designCode'+count+'></td>'
      element += '<td><input type="text" class="form-control" name="stitch[]" value="" id=stitch'+count+'></td>'
      element += '<td>  <input type="text" class="form-control" name="dye[]" value="" id=dye'+count+'></td>'
      element += '<td><input type="text" class="form-control" name="matching[]" value="" id=matching'+count+'></td>'
      element += '<td><input type="text" class="form-control" name="quantity[]" value=""></td>'
      element += '<td><input type="text" name="unit[]" class="form-control unit" value="" id=unit'+count+'></td>'
      element += '<td><input type="text" name="image[]" class="form-control unit" value="" id=image'+count+'></td>'
      element += '<td>  <input type="text" class="form-control" name="priority[]"  value="30"></td>'
      element += '<td> <input type="text" class="form-control" name="order_barcode[]" value=""></td>'
      element += '<td><input type="text" class="form-control" name="remark[]" value=""></td>'
      element += '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
      element += '</tr>';
      $('#fresh_data').append(element);
    });

    $('#add_more_prm').on('click', function() {
      count=count+1;
      var element = '<tr id='+count+'>'
      element +='<td><input type="text" class="form-control" readonly value='+(count+1)+'></td>'
      element += '<td> <input type="text" class="form-control" name="serial_number[]" value="" required></td>'
      element += '<td> <input type="text" name="old_barcode[]" class="form-control" value=""></td>'
      element += '<td> <select name="fabric_name[]" class="form-control fabric_name select2" >'
         element +=            '<option>Select Fabric</option>'
         element +=            '<?php foreach ($febName as $value): ?>'
         element +=            '<option value="<?php echo $value->id;?>"> <?php echo $value->fabricName;?></option>'
         element +=          '<?php endforeach;?>'
          element +=         '</select></td>'
      element += '<td><input type="text" class="form-control" name="hsn[]" value="" id=hsnp'+count+'></td>'
      
      element += '<td><input type="text" name="design_name[]" class="form-control" value="" id=designNamep'+count+'></td>'
      element += '<td> <input type="text" name="design_code[]" class="form-control" value="" id=designCodep'+count+'></td>'
      element += '<td><input type="text" class="form-control" name="stitch[]" value="" id=stitchp'+count+'></td>'
      element += '<td>  <input type="text" class="form-control" name="dye[]" value="" id=dyep'+count+'></td>'
      element += '<td><input type="text" class="form-control" name="matching[]" value="" id=matchingp'+count+'></td>'
      element += '<td><input type="text" class="form-control" name="quantity[]" value=""></td>'
      element += '<td><input type="text" name="unit[]" class="form-control unit" value="" id=unitp'+count+'></td>'
      element += '<td><input type="text" name="image[]" class="form-control unit" value="" id=imagep'+count+'></td>'
      element += '<td>  <input type="text" class="form-control" name="priority[]"  value="30" required></td>'
      element += '<td> <input type="text" class="form-control" name="order_barcode[]" value="" required></td>'
      element += '<td><input type="text" class="form-control" name="remark[]" value="" required></td>'
      element += '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
      element += '</tr>';
      $('#prm_data').append(element);
  });

    $(document).on('click', '.remove', function() {
      $(this).parent().parent().remove();count=count-1;
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
            url: "<?= base_url()?>admin/orders/deleteorder",
            cache: false,
            data: {
              'ids': join_selected_values,
              '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
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
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
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
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
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
