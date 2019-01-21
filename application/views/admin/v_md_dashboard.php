<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fas fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php $b=0; foreach($form_masuk as $a){$b++;}echo $b++ ?></div>
                        <div>Jumlah Form Permohonan yang Masuk</div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('admin/manageData/permohonan/semua')?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fas fa-user-edit fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php $b=0; foreach($diproses as $a){$b++;}echo $b++ ?></div>
                        <div><br>Jumlah yang sedang Diproses</div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('admin/manageData/permohonan/diproses')?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fas fa-user-plus fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php $b=0; foreach($diterima as $a){$b++;}echo $b++ ?></div>
                        <div><br>Jumlah yang sudah Diterima</div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('admin/manageData/permohonan/diterima')?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fas fa-user-minus fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php $b=0; foreach($ditolak as $a){$b++;}echo $b++ ?></div>
                        <div><br>Jumlah yang<br> telah Ditolak</div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('admin/manageData/permohonan/ditolak')?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Jumlah Pengajuan Magang Berdasarkan Jurusan Mahasiswa
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="graph"></div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
        <!-- /.panel -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Jumlah Pengajuan Magang Berdasarkan divisi
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="graph2"></div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
</div>