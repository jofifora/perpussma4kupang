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
        <h2>T_pengembalian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Peminjaman</th>
		<th>Tanggal Pengembalian</th>
		<th>Denda</th>
		
            </tr><?php
            foreach ($t_pengembalian_data as $t_pengembalian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_pengembalian->id_peminjaman ?></td>
		      <td><?php echo $t_pengembalian->tanggal_pengembalian ?></td>
		      <td><?php echo $t_pengembalian->denda ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>