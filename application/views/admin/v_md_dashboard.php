
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
            <?php
            $attributes = array('id' => 'myform');
            echo form_open('admin/manageData/permohonan/',$attributes);?>
            <input type="hidden" id="filter" name="filter" value="Semua">
            <a href="#" onclick="document.getElementById('myform').submit()">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            <?php echo form_close();?>
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
            <?php
            $attributes = array('id' => 'myform1');
            echo form_open('admin/manageData/permohonan/',$attributes);?>
            <input type="hidden" id="filter" name="filter" value="Diproses">
            <a href="#" onclick="document.getElementById('myform1').submit()">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            <?php echo form_close();?>
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
            <?php
            $attributes = array('id' => 'myform2');
            echo form_open('admin/manageData/permohonan/',$attributes);?>
            <input type="hidden" id="filter" name="filter" value="Diterima">
            <a href="#" onclick="document.getElementById('myform2').submit()">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            <?php echo form_close();?>
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
            <?php
            $attributes = array('id' => 'myform3');
            echo form_open('admin/manageData/permohonan/',$attributes);?>
            <input type="hidden" id="filter" name="filter" value="Ditolak">
            <a href="#" onclick="document.getElementById('myform3').submit()">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            <?php echo form_close();?>
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