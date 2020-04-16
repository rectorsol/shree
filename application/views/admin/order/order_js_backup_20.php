<script type="text/javascript">
$(document).ready(function() {
$('#fresh_form').hide();

$('#order_form').hide();

$("#selectType").on('change', function(){

  var type = $(this).val();
  if(type == 'FRESH'){
    $('#order_form').hide();
      $('#fresh_form').show();
  }else if (type == 'ORDER') {
      $('#fresh_form').hide();

        $('#order_form').show();
  }else {
      $('#fresh_form').show();
  }
});

$("#old_barcode").on('change', function(){
    var obc = $(this).val();
          var csrf_name = $("#get_csrf_hash").attr('name');
          var csrf_val = $("#get_csrf_hash").val();
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/Orders/get_old_barcode') ?>",
            data: {'obc' : obc, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
            datatype: 'json',
            success: function(data){
               $("#order_value").html(JSON.parse(data));
            }
          });
        });
        
          $("#design_code").on('change', function(){
            var design_code = $(this).val();
                  var csrf_name = $("#get_csrf_hash").attr('name');
                  var csrf_val = $("#get_csrf_hash").val();
                  $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('admin/Orders/get_designcode') ?>",
                    data: {'design_code' : 	design_code, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
                    datatype: 'json',
                    success: function(data){
                       $("#fresh_data").html(JSON.parse(data));
                    }
                  });
                });
                
        $('#master').on('click', function(e){
         if($(this).is(':checked',true))
         {
           $(".sub_chk").prop('checked', true);
         }
         else
         {
           $(".sub_chk").prop('checked',false);
         }
        });
        
        $('.delete_all').on('click', function(e) {
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
     WRN_PROFILE_DELETE = "Are you sure you want to delete this row?";
     var check = confirm(WRN_PROFILE_DELETE);
     if(check == true){
       //for server side
     var join_selected_values = allVals.join(",");
     // alert (join_selected_values);exit;

       $.ajax({
         type: "POST",
         url: "<?= base_url()?>admin/orders/deleteorder",
         cache:false,
         data: {'ids' : join_selected_values, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
         success: function(response)
         {

           //referesh table
           $(".sub_chk:checked").each(function() {
              var id = $(this).attr('data-id');
              $('#tr_'+id).remove();
           });


         }
       });
              //for client side

     }
   }
 });
        
                

});

   </script>
