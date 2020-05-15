<script src="<?php echo base_url('jexcelmaster/')?>asset/js/jquery.3.1.1.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
 
    var count =0;
    var total= 0;
    
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
     element += '<td><input type="text" class="form-control pbc" name="pbc[]" value=""></td>'
      element += '<td> <select name="fabric_name[]" class="form-control fabric_name select2" >'
         element +=            '<option>Fabric</option>'
         element +=            '<?php foreach ($febName as $value): ?>'
         element +=            '<option value="<?php echo $value->id;?>"> <?php echo $value->fabricName;?></option>'
         element +=          '<?php endforeach;?>'
          element +=         '</select></td>'
      element += '<td><input type="text" class="form-control" name="hsn[]" value="" id=hsn'+count+'></td>'
      element += '<td><input type="text" class="form-control" name="fabType[]" value=""></td>'
      element += '<td><input type="text" class="form-control" name="Tquantity[]" value=""></td>'
      element += '<td><select name="unit[]" class="form-control unit " >'
      element += '<option>Unit</option>'
       element += '<?php foreach ($unit as $value): ?>'
      element += '<option value="<?php echo $value['id'];?>"> <?php echo $value['unitName'];?></option>'
      element += '                      <?php endforeach;?>'
       element += '              </select></td>'
      element += '<td> <input type="text" class="form-control" name="ADNo[]" value=""></td>'
      element +=              '<td> <input type="text" class="form-control" name="challan[]" value=""></td>'
      element +=              '<td><input type="text" class="form-control" name="pcode[]" value=""></td>'
      element += '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
      element += '</tr>';
      $('#fresh_data').append(element);
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
    
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

 jQuery('.print_all').on('click', function(e) {
  var allVals = [];
   $(".sub_chk:checked").each(function() {
     allVals.push($(this).attr('data-id'));
   });
   //alert(allVals.length); return false;
   if(allVals.length <=0)
   {
     alert("Please select row.");
   }
   else {
     //$("#loading").show();
     WRN_PROFILE_DELETE = "Are you sure you want to Print this rows?";
     var check = confirm(WRN_PROFILE_DELETE);
     if(check == true){
       //for server side
     var join_selected_values = allVals.join(",");
     // alert (join_selected_values);exit;
     var ids = join_selected_values.split(",");
     var data = [];
     $.each(ids, function(index, value){
       if (value != "") {
         data[index] = value;
       }
     });
       $.ajax({
         type: "POST",
         url: "<?= base_url()?>admin/PrintThis/Recieve_Challan_multiprint",
         cache:false,
         data: {'ids' : data, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
         success: function(response)
         {
           $("body").html(response);
         }
       });
              //for client side

     }
   }
 });

 });
</script>
