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
        <h2 style="margin-top:0px">T_pengembalian Read</h2>
        <table class="table">
	    <tr><td>Id Peminjaman</td><td><?php echo $id_peminjaman; ?></td></tr>
	    <tr><td>Tanggal Pengembalian</td><td><?php echo $tanggal_pengembalian; ?></td></tr>
	    <tr><td>Denda</td><td><?php echo $denda; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_pengembalian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>