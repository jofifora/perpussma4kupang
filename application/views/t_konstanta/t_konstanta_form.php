<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T_konstanta <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Denda Per Hari <?php echo form_error('denda_per_hari') ?></label>
            <input type="text" class="form-control" name="denda_per_hari" id="denda_per_hari" placeholder="Denda Per Hari" value="<?php echo $denda_per_hari; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Max Lama Pinjam <?php echo form_error('max_lama_pinjam') ?></label>
            <input type="text" class="form-control" name="max_lama_pinjam" id="max_lama_pinjam" placeholder="Max Lama Pinjam" value="<?php echo $max_lama_pinjam; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Tanggal Simpan <?php echo form_error('tanggal_simpan') ?></label>
            <input type="text" class="form-control" name="tanggal_simpan" id="tanggal_simpan" placeholder="Tanggal Simpan" value="<?php echo $tanggal_simpan; ?>" />
        </div>
	    <input type="hidden" name="id_konstanta" value="<?php echo $id_konstanta; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_konstanta') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>