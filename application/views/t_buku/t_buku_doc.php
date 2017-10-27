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
        <h2>T_buku List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Judul Buku</th>
		<th>Id Kategori</th>
		<th>Id Rak</th>
		<th>Tahun</th>
		<th>Stok</th>
		<th>Eksemplar</th>
		<th>Ebook</th>
		
            </tr><?php
            foreach ($t_buku_data as $t_buku)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_buku->judul_buku ?></td>
		      <td><?php echo $t_buku->id_kategori ?></td>
		      <td><?php echo $t_buku->id_rak ?></td>
		      <td><?php echo $t_buku->tahun ?></td>
		      <td><?php echo $t_buku->stok ?></td>
		      <td><?php echo $t_buku->eksemplar ?></td>
		      <td><?php echo $t_buku->ebook ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>