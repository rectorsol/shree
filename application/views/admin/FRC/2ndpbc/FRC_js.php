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
     
    
    $('#add_more2').on('click', function() {
       
      count=count+1;
     var element = ' <tr id='+count+'>'
    element += '<td><input type="text" class="form-control sno" name="sno[]" value='+(count+1)+' readonly></td>'
    element += '<td><input type="date" class="form-control date" name="date[]" value="<?php echo date('Y-m-d')?>"></td>'
    element += '<td><input type="text" class="form-control qty" name="quantity[]" id="qty'+count+'"></td>'
    element += '<td><input type="text" name="tc[]" class="form-control " value="" id="tc'+count+'"></td>'
    element += '<td><input type="text" class="form-control" name="color[]" value="" id="color'+count+'"></td>'
    element += '<td><input type="text" name="rate[]" class="form-control " value="" id="rate'+count+'"></td>'
    element += '<td><input type="text" name="value[]" class="form-control " value="" id="value'+count+'"></td>'
    element += '<td><input type="text" name="2pbc[]" class="form-control " value="" id="2pbc'+count+'"></td>'
    element += '<td> <button type="button" name="remove"  class="btn btn-danger btn-xs remove">-</button></td>'
    element += '</tr>'
     
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

  $('#pbc').on('change' , function(e) {
      var pbc =$(this).val();
      
      var csrf_name = $("#get_csrf_hash").attr('name');
        var csrf_val = $("#get_csrf_hash").val();
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('admin/FRC/getPBC') ?>",
          data: {
            
            'id': pbc,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php  echo $this->security->get_csrf_hash(); ?>'
          },
         
          success: function(data) {
            data =JSON.parse(data);
             if(data!=""){
               
               var date =data[0]['created'];
               var d= date.split(" ",1);
               $("#msg").html("");
               $('#fabric_id').val(data[0]['fabric_id']);
               $('#fabric').val(data[0]['fabricName']);
             $('#Tquantity').val(data[0]['stock_quantity']);
             $('#date').val(d);
             $('#challan_no').val(data[0]['challan_no']);
             $('#ad_no').val(data[0]['ad_no']);
             $('#Cur_quantity').val(data[0]['stock_quantity']);
            
             }else{
               $("#msg").html("<h6 class='text-danger'><b>PBC Not Found </b></h6>");
                $('#fabric').val("");
             $('#quantity').val("");
             $('#date').val("");
             $('#challan_no').val("");
             $('#ad_no').val("");
             $('#Cur_quantity').val("");
             }
           
          }
        });
    });

     
      $(document).on('change', "input[name='quantity[]']", function() {
        
            total= Number($('#Tquantity').val());
          console.log("total=" +total);
          qty=get_current_quntity()
          $('#Cur_quantity').val(qty)
          console.log(qty);
          if(qty>total){
          alert("enter value less than current qauntity");
          $(this).val("");
        }else{
          
          console.log(qty);
        }
        });

        $(document).on('change', "input[name='rate[]']", function() {
       var id =$(this).parent().parent().attr("id");
       console.log("id="+id);
       var q = Number($('#qty' + id + '').val());
       console.log("q="+q);
        var rate=Number($(this).val());
        var val=rate*q;
        console.log("val="+val);
         $('#value' + id + '').val(val); 
        });
  
        function get_current_quntity(){
            var current = 0;
            $("input[name='quantity[]']").each(function(){
              current += Number($(this).val());
              console.log("Current="+current);
            });
            return Number(total - current);
        }
        

 });
</script>
