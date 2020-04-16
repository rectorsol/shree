
<script type="text/javascript">
  $(document).ready(function() {

    $('table').DataTable();

    $("#filter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Branch_detail/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#branch').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#CustomerFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Customer_detail/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#customer').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#jobWorkFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Job_work_party/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#jobWork').find('tbody').html(JSON.parse(response));
        }
      });
    });
      $("#jobWorkTypeFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Job_work_type/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#jobWorktype').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#deptFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Department/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#dept').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#subDeptFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Sub_department/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#subDept').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#hsnFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Hsn/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#hsn').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#fabricFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Fabric/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#fabric').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#designFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Design/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#design').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#sessionFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Session_year/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#session').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#orderTypeFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Order_type/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#orderType').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#dataCateFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Data_category/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#dataCate').find('tbody').html(JSON.parse(response));
        }
      });
    });

    $("#unitFilter").on("submit", function(event) {
      event.preventDefault();
      var form = $(this).serialize();
      console.log(form);
      $.ajax({
        'url': "<?php echo base_url('/admin/Unit/filter'); ?>",
        'type': 'POST',
        'data': form,
        'success': function(response) {
          $('#unit').find('tbody').html(JSON.parse(response));
        }
      });
    });



        	});






  function goPage(newURL) {

    // if url is empty, skip the menu dividers and reset the menu selection to default
    if (newURL != "") {

      // if url is "-", it is this page -- reset the menu:
      if (newURL == "-") {
        resetMenu();
      }
      // else, send page to designated URL
      else {
        document.location.href = newURL;
      }
    }
  }

  // resets the menu selection upon entry to this page:
  function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
  }
</script>

