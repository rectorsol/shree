<script type="text/javascript">
  $(document).ready(function() {


jQuery('#master').on('click', function(e){
 if($(this).is(':checked',true))
 {
   $(".sub_chk").prop('checked', true);
 }
 else
 {
   $(".sub_chk").prop('checked',false);
 }
});


jQuery('.delete_all').on('click', function(e){
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
         url: "<?= base_url()?>admin/Fabric/deletefabric",
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

     $("#fabric_name").on('focusout', function(){

          $("#fabric_name").css("border", "1px solid #DDDDDD");
          $("#fabric_btn").removeAttr("disabled", "TRUE");
          $("#fabric-error").html('');
          var fabricName = $(this).val();
         // alert(fabricName);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/Fabric/fabricExist')?>",
            data: {'fabricName':fabricName, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
            datatype: 'json',
            success: function(data){
              if(data == true){
                 $("#fabric_name").css("border", "2px solid #F47C72");
                 $("#fabric_btn").attr("disabled", "TRUE");
                 $("#fabric-error").html('Design Name Already Exist.');
               }
            }
          });
        });

   });

   </script>
