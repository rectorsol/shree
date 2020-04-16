
<!-- All Jquery -->
<!-- ============================================================== -->

<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url('optimum/admin') ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url('optimum/admin') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('optimum/admin') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url('optimum/admin') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url('optimum/admin') ?>/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url('optimum/admin') ?>/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url('optimum/admin') ?>/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- Charts js Files -->
<script src="<?php echo base_url('optimum/admin') ?>/assets/libs/flot/excanvas.js"></script>

<script src="<?php echo base_url('optimum/admin') ?>/assets/extra-libs/multicheck/jquery.multicheck.js"></script> -->
<script src="<?php echo base_url('optimum/admin') ?>/assets/extra-libs/DataTables/datatables.min.js"></script>

<script src="<?php echo base_url('optimum/admin') ?>/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url('optimum/admin') ?>/assets/libs/magnific-popup/meg.init.js"></script>
<script src="<?php echo base_url('optimum/admin') ?>/assets/libs/toastr/build/toastr.min.js"></script>
<script src="<?php echo base_url('optimum/admin') ?>/assets/libs/select2/dist/js/select2.min.js"></script>

<?php include('js.php'); ?>

<script type="text/javascript">
$(document).ready(function(){
  <?php if ($this->session->flashdata()):?>
    <?php if ($this->session->flashdata('error')): ?>
      toastr.error('Faild!', '<?php echo $this->session->flashdata('msg') ?>');
    <?php else: ?>
      toastr.success('Success!', '<?php echo $this->session->flashdata('msg') ?>');
    <?php endif; ?>
  <?php endif; ?>
});


</script>

</body>

</html>
