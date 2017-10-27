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
        <h2>T_peminjaman List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Buku</th>
		<th>Id Anggota</th>
		<th>Tanggal Pinjam</th>
		
            </tr><?php
            foreach ($t_peminjaman_data as $t_peminjaman)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_peminjaman->id_buku ?></td>
		      <td><?php echo $t_peminjaman->id_anggota ?></td>
		      <td><?php echo $t_peminjaman->tanggal_pinjam ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>