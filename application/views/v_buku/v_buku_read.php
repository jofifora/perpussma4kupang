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
        <h2 style="margin-top:0px">V_buku Read</h2>
        <table class="table">
	    <tr><td>Id Buku</td><td><?php echo $id_buku; ?></td></tr>
	    <tr><td>Judul Buku</td><td><?php echo $judul_buku; ?></td></tr>
	    <tr><td>Id Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td>Nama Kategori</td><td><?php echo $nama_kategori; ?></td></tr>
	    <tr><td>Deskripsi Kategori</td><td><?php echo $deskripsi_kategori; ?></td></tr>
	    <tr><td>Id Rak</td><td><?php echo $id_rak; ?></td></tr>
	    <tr><td>Nama Rak</td><td><?php echo $nama_rak; ?></td></tr>
	    <tr><td>Deskripsi Rak</td><td><?php echo $deskripsi_rak; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td>Eksemplar</td><td><?php echo $eksemplar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('v_buku') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>