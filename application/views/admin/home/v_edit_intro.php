<div style="margin: 30px;">
    <h1><?= $judul ?></h1>
</div>

<?php
if($param == "intro") {
foreach ($intro as $a) {?>
    <div style="margin: 30px">
        <div style="z-index: 10; position: absolute; float: right;width: 95%; text-align: right; padding-top: 10px">
            <a style="margin-right: 15px" onclick="return confirm('Anda yakin? Data akan dihapus Permanen!')" href="<?= base_url('admin/homeAdmin/del_intro/'.$a->id_home) ?>">
                <button style="background-color: rgba(255,0,0, 0.8); border-radius: 50%" class="btn btn-default">
                    <i class="fas fa-trash-alt" style="color: white"></i>
                </button>
            </a>
        </div>
        <img width="100%" src="<?= base_url('assets/img/home_content/intro/').$a->image ?>"><br>
    </div>
<?php }
}?>
