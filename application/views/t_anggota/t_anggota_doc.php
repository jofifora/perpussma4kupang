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
        <h2>T_anggota List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Anggota</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Jurusan</th>
		<th>Jenis Kelamin</th>
		<th>Password</th>
		
            </tr><?php
            foreach ($t_anggota_data as $t_anggota)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_anggota->no_anggota ?></td>
		      <td><?php echo $t_anggota->nama ?></td>
		      <td><?php echo $t_anggota->kelas ?></td>
		      <td><?php echo $t_anggota->jurusan ?></td>
		      <td><?php echo $t_anggota->jenis_kelamin ?></td>
		      <td><?php echo $t_anggota->password ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>