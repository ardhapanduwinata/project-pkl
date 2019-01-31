
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

<!-- Morris Charts JavaScript -->
<script src="<?= base_url('assets') ?>/vendor/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/morrisjs/morris.min.js"></script>
<script src="<?= base_url('assets') ?>/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url('assets') ?>/dist/js/sb-admin-2.js"></script>

<script>
    $(document).ready(function() {
        $('table.display').DataTable({
            responsive: true,
            "scrollX": false
        });
    } );
</script>
<script>
    Morris.Bar({
        element: 'graph',
        data: <?php echo $chart_bar;?>,
        xkey: 'jurusan',
        ykeys: ['jumlah'],
        labels: ['jumlah'],
        barColors: [
            '#364374'
        ]
    });
    Morris.Donut({
        element: 'graph2',
        data: <?php echo $chart;?>,
        colors: [
            '#550000',
            '#801515',
            '#A33643',
            '#D46A6A',
            '#FFAAAA',
            '#F1BABE',
            '#BA8B8F',
            '#AE8588',
            '#A2787B',
            '#7C5B5D',
            '#674B4D',
            '#453839'
        ],
        formatter: function (x) { return "Jumlah: "+ x }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            $("#wrapper.toggled").find("#sidebar-wrapper").find(".collapse").collapse("hide");
        });
    });
</script>