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
      element += '<td><select name="pbc[]" class="form-control " >'
       element +=               '<option>Select </option>'
     element +=              '<?php foreach ($pbc as $value): ?>'
        element +=              '<option value="<?php echo $value['parent_barcode'];?>"> <?php echo $value['parent_barcode'];?></option>'
       element +=               '<?php endforeach;?>'
       element +=             '</select></td>'
      element += '<td><input type="text" class="form-control obc" name="obc[]" value=""></td>'
      element += '<td><input type="text" class="form-control " name="orderNo[]" value="" id=orderNo'+count+' readonly></td>'
      element += '<td><input type="text" name="fabric_name[]" class="form-control " id=fabric'+count+' readonly></td>'
      element += '<td><input type="text" class="form-control " name="hsn[]" value="" id=hsn'+count+' readonly></td>'
      element += '<td><input type="text" class="form-control " name="design[]" value="" id=design'+count+' readonly></td>'
      element += '<td><input type="text" class="form-control " name="designCode[]" value="" id=DesignCode'+count+' readonly></td>'
      element += '<td><input type="text" class="form-control " name="dye[]" value="" id=dye'+count+' readonly></td>'
      element += '<td><input type="text" class="form-control " name="matching[]" value="" id=matching'+count+' readonly></td>'
      element += '<td><input type="text" class="form-control" name="quantity[]" value="" id=qty'+count+' readonly></td>'
      element += '<td><input type="text" name="unit[]" class="form-control unit " id=unit'+count+' readonly>'
      element += '<td><input type="text" class="form-control" name="image[]" value="" id=image'+count+' readonly></td>'            
      element += '<td><input type="text" class="form-control " name="days[]" value="" id=days'+count+' readonly></td>' 
      element += '<td><input type="text" class="form-control" name="remark[]" value="" id=remark'+count+' readonly></td>' 
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

    $(document).on('change' ,'.obc', function(e) {
      var pbc =$(this).val();
      var id =$(this).parent().parent().attr("id");
       console.log("id="+id);
      var csrf_name = $("#get_csrf_hash").attr('name');
        var csrf_val = $("#get_csrf_hash").val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/transaction/getOBC') ?>",
          data: {
            
            'id': pbc,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
          },
         
          success: function(data) {
            data =JSON.parse(data);
             if(data!=""){
                
            
               $("#msg").html("");
               $('#hsn'+ id + '').val(data[0]['hsn']);
               $('#fabric'+ id + '').val(data[0]['fabric_name']);
             $('#qty'+ id + '').val(data[0]['quantity']);
             $('#days'+ id + '').val(data[0]['order_date']);
              $('#design'+ id + '').val(data[0]['design_name']);
              $('#dye'+ id + '').val(data[0]['dye']);
             $('#matching'+ id + '').val(data[0]['matching']);
             $('#DesignCode'+ id + '').val(data[0]['design_code']);
             $('#unit'+ id + '').val(data[0]['unit']);
             $('#orderNo'+ id + '').val(data[0]['order_number']);
            $('#remark'+ id + '').val(data[0]['remark']);
            $('#image'+ id + '').val(data[0]['image']);
             }else{
               $("#msg").html("<h6 class='text-danger'><b>PBC Not Found </b></h6>");
                 $('#hsn'+ id + '').val();
               $('#fabric'+ id + '').val();
             $('#qty'+ id + '').val();
             $('#days'+ id + '').val();
              $('#design'+ id + '').val();
              $('#dye'+ id + '').val();
             $('#matching'+ id + '').val();
             $('#DesignCode'+ id + '').val();
             $('#unit'+ id + '').val();
             $('#orderNo'+ id + '').val();
            $('#remark'+ id + '').val();
            $('#image'+ id + '').val();
             }
           
          }
        });
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
 $(document).on('change',"#FromParty", function() {
      var party = $(this).val();
      
      
      if(party != "") {
        var csrf_name = $("#get_csrf_hash").attr('name');
        var csrf_val = $("#get_csrf_hash").val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/Dye_transaction/get_godown') ?>",
          data: {
            'party': party,
            
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
          },
          datatype: 'json',
         
          success: function(data) {
            data =JSON.parse(data);
            
            $("#FromGodown").val(data[0]['subDeptName']);
          }

        });
      }else{
        $("#FromGodown").val('');
      }
    });
 $(document).on('change',"#toParty", function() {
      var party = $(this).val();
      
      
      if(party != "") {
        var csrf_name = $("#get_csrf_hash").attr('name');
        var csrf_val = $("#get_csrf_hash").val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/Dye_transaction/get_godown') ?>",
          data: {
            'party': party,
            
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
          },
          datatype: 'json',
         
          success: function(data) {
            data =JSON.parse(data);
            
            $("#ToGodown").val(data[0]['subDeptName']);
            $("#workType").val(data[0]['job_work_type']);
          }

        });
      }else{
        $("#ToGodown").val('');$("#workType").val('');
      }
    });
 });
</script>
