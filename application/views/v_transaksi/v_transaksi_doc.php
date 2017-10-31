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
        <h2>V_transaksi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Peminjaman</th>
		<th>Id Buku</th>
		<th>Judul Buku</th>
		<th>Id Kategori</th>
		<th>Nama Kategori</th>
		<th>Deskripsi Kategori</th>
		<th>Id Rak</th>
		<th>Nama Rak</th>
		<th>Deskripsi Rak</th>
		<th>Tahun</th>
		<th>Stok</th>
		<th>Eksemplar</th>
		<th>Id Anggota</th>
		<th>No Anggota</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Jurusan</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Pinjam</th>
		<th>Id Pengembalian</th>
		<th>Tanggal Pengembalian</th>
		<th>Denda</th>
		
            </tr><?php
            foreach ($v_transaksi_data as $v_transaksi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $v_transaksi->id_peminjaman ?></td>
		      <td><?php echo $v_transaksi->id_buku ?></td>
		      <td><?php echo $v_transaksi->judul_buku ?></td>
		      <td><?php echo $v_transaksi->id_kategori ?></td>
		      <td><?php echo $v_transaksi->nama_kategori ?></td>
		      <td><?php echo $v_transaksi->deskripsi_kategori ?></td>
		      <td><?php echo $v_transaksi->id_rak ?></td>
		      <td><?php echo $v_transaksi->nama_rak ?></td>
		      <td><?php echo $v_transaksi->deskripsi_rak ?></td>
		      <td><?php echo $v_transaksi->tahun ?></td>
		      <td><?php echo $v_transaksi->stok ?></td>
		      <td><?php echo $v_transaksi->eksemplar ?></td>
		      <td><?php echo $v_transaksi->id_anggota ?></td>
		      <td><?php echo $v_transaksi->no_anggota ?></td>
		      <td><?php echo $v_transaksi->nama ?></td>
		      <td><?php echo $v_transaksi->kelas ?></td>
		      <td><?php echo $v_transaksi->jurusan ?></td>
		      <td><?php echo $v_transaksi->jenis_kelamin ?></td>
		      <td><?php echo $v_transaksi->tanggal_pinjam ?></td>
		      <td><?php echo $v_transaksi->id_pengembalian ?></td>
		      <td><?php echo $v_transaksi->tanggal_pengembalian ?></td>
		      <td><?php echo $v_transaksi->denda ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>