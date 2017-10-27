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
        <h2 style="margin-top:0px">T_peminjaman <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Buku <?php echo form_error('id_buku') ?></label>
            <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder="Id Buku" value="<?php echo $id_buku; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Anggota <?php echo form_error('id_anggota') ?></label>
            <input type="text" class="form-control" name="id_anggota" id="id_anggota" placeholder="Id Anggota" value="<?php echo $id_anggota; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pinjam <?php echo form_error('tanggal_pinjam') ?></label>
            <input type="text" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" placeholder="Tanggal Pinjam" value="<?php echo $tanggal_pinjam; ?>" />
        </div>
	    <input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_peminjaman') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>