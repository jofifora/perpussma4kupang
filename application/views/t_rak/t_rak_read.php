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
        <h2 style="margin-top:0px">T_rak Read</h2>
        <table class="table">
	    <tr><td>Nama Rak</td><td><?php echo $nama_rak; ?></td></tr>
	    <tr><td>Deskripsi Rak</td><td><?php echo $deskripsi_rak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_rak') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>