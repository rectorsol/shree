
<?php //echo print_r($fabric_data);exit;?>
<div class="container-fluid"><hr>
  <div class="row">
  <div class="col-sm-4">
    <div class="card">
          <div class="card-body">
              <p id="feedback">
              <span>Select Fabric Name:</span> <span id="select-result">none</span>.
              </p>

              <ol id="selectable">
                <?php foreach($fabric_data as $value):?>
                <li class="ui-widget-content"><?php echo $value['fabricName'];?></li>
               <?php endforeach;?>
              </ol>

          </div>
   </div>
</div>

<div class="col-sm-8">
  <div class="card">
        <div class="card-body">
            <p id="feedback">
            <span>Apply FDA:</span> <span id="select-result">none</span>.
            </p>

            <ol id="selectable">
              
              <li class="ui-widget-content">Item 1</li>
              <li class="ui-widget-content">Item 2</li>
              <li class="ui-widget-content">Item 3</li>
              <li class="ui-widget-content">Item 4</li>
              <li class="ui-widget-content">Item 5</li>
              <li class="ui-widget-content">Item 6</li>
            </ol>
        </div>
 </div>
</div>

</div>
</div>

  <style>
    #feedback { font-size: 1.4em; }
    #selectable .ui-selected { color: gray; }
    #selectable { list-style-type: none; margin: 0; padding: 0; width: 50%; }
    #selectable li { margin: 3px; padding: 0.7em; font-size: 1.4em; height: 18px; }
  </style>

<script>
function delete_detail(id)
{
  var del = confirm("Do you want to Delete");
  if (del== true)
  {
    var sureDel = confirm("Are you sure want to delete");
    if (sureDel == true)
    {
      window.location="<?php echo base_url()?>admin/Branch_detail/delete/"+id;
    }

  }
}
</script>
<?php include('asign_js.php'); ?>
