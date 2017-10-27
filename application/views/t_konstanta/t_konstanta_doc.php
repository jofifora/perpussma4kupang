<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T_konstanta List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Denda Per Hari</th>
		<th>Max Lama Pinjam</th>
		<th>Tanggal Simpan</th>
		
            </tr><?php
            foreach ($t_konstanta_data as $t_konstanta)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_konstanta->denda_per_hari ?></td>
		      <td><?php echo $t_konstanta->max_lama_pinjam ?></td>
		      <td><?php echo $t_konstanta->tanggal_simpan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>