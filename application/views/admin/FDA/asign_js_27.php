

<script type="text/javascript">
  $(document).ready(function() {
    var feb = '';
        $("#table tr").click(function(){
           $(this).toggleClass('selected');
           var value=$(this).find('td:first').html();
          // alert(value);
        });

$('.Asign').on('click', function(e){
    var selected = [];
    $("#table tr.selected").each(function(){
      selected.push($('td:first', this).html());
    });
    alert(feb);

    var csrf_name = $("#get_csrf_hash").attr('name');
    var csrf_val = $("#get_csrf_hash").val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('admin/FDA/submit_value') ?>",
      data: {'selected' : selected, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
      datatype: 'json',
      success: function(data){
          $("#show").html(data);
      }

    });
});




  $("#fabric tr").click(function(){
   $(this).toggleClass('selected');
   var fabricnNme=$(this).find('td:first').html();

  var csrf_name = $("#get_csrf_hash").attr('name');
  var csrf_val = $("#get_csrf_hash").val();
  $.ajax({
    type: "POST",
    url: "<?php echo base_url('admin/FDA/get_fabric_name') ?>",
    data: {'fabricnNme' : fabricnNme, '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php  echo $this->security->get_csrf_hash(); ?>'},
    datatype: 'json',
    success: function(data){
        $("#show").html(data);
    }

  });

});
// $('.ok').on('click', function(e){
//     var selected = [];
//     $("#fabric tr.selected").each(function(){
//         selected.push($('td:first', this).html());
//     });
//     alert(selected);
// });
// $("#design tr").on('click', function(){
//   console.log(11);
// $(this).toggleClass('selected');
// var value=$(this).find('td:first').html();
//  alert(value);
// });

});

</script>
