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
        <h2 style="margin-top:0px">V_buku <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Buku <?php echo form_error('id_buku') ?></label>
            <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder="Id Buku" value="<?php echo $id_buku; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Judul Buku <?php echo form_error('judul_buku') ?></label>
            <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku" value="<?php echo $judul_buku; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kategori <?php echo form_error('id_kategori') ?></label>
            <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kategori <?php echo form_error('nama_kategori') ?></label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi_kategori">Deskripsi Kategori <?php echo form_error('deskripsi_kategori') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_kategori" id="deskripsi_kategori" placeholder="Deskripsi Kategori"><?php echo $deskripsi_kategori; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Id Rak <?php echo form_error('id_rak') ?></label>
            <input type="text" class="form-control" name="id_rak" id="id_rak" placeholder="Id Rak" value="<?php echo $id_rak; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Rak <?php echo form_error('nama_rak') ?></label>
            <input type="text" class="form-control" name="nama_rak" id="nama_rak" placeholder="Nama Rak" value="<?php echo $nama_rak; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi_rak">Deskripsi Rak <?php echo form_error('deskripsi_rak') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_rak" id="deskripsi_rak" placeholder="Deskripsi Rak"><?php echo $deskripsi_rak; ?></textarea>
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
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('v_buku') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>