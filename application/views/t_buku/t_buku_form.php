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
        <h2 style="margin-top:0px">T_buku <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul Buku <?php echo form_error('judul_buku') ?></label>
            <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku" value="<?php echo $judul_buku; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kategori <?php echo form_error('id_kategori') ?></label>
            <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Rak <?php echo form_error('id_rak') ?></label>
            <input type="text" class="form-control" name="id_rak" id="id_rak" placeholder="Id Rak" value="<?php echo $id_rak; ?>" />
        </div>
	    <div class="form-group">
            <label for="year">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stok <?php echo form_error('stok') ?></label>
            <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Eksemplar <?php echo form_error('eksemplar') ?></label>
            <input type="text" class="form-control" name="eksemplar" id="eksemplar" placeholder="Eksemplar" value="<?php echo $eksemplar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ebook <?php echo form_error('ebook') ?></label>
            <input type="text" class="form-control" name="ebook" id="ebook" placeholder="Ebook" value="<?php echo $ebook; ?>" />
        </div>
	    <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_buku') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>