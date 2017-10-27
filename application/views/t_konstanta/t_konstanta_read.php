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
        <h2 style="margin-top:0px">T_konstanta Read</h2>
        <table class="table">
	    <tr><td>Denda Per Hari</td><td><?php echo $denda_per_hari; ?></td></tr>
	    <tr><td>Max Lama Pinjam</td><td><?php echo $max_lama_pinjam; ?></td></tr>
	    <tr><td>Tanggal Simpan</td><td><?php echo $tanggal_simpan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_konstanta') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>