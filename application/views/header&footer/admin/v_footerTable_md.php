<!-- jQuery -->
<script src="<?=base_url('assets')?>/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url('assets')?>/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url('assets')?>/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?=base_url('assets')?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets')?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url('assets')?>/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<script>
    $(document).ready(function() {
        $('table.display').DataTable({
            responsive: true,
            "scrollX": false
        });
    } );
</script>