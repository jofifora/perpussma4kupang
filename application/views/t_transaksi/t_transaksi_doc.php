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
        <h2>V_peminjaman_belum_dikembalikan List</h2>
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
		
            </tr><?php
            foreach ($v_peminjaman_belum_dikembalikan_data as $v_peminjaman_belum_dikembalikan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->id_peminjaman ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->id_buku ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->judul_buku ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->id_kategori ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->nama_kategori ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->deskripsi_kategori ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->id_rak ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->nama_rak ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->deskripsi_rak ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->tahun ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->stok ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->eksemplar ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->id_anggota ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->no_anggota ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->nama ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->kelas ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->jurusan ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->jenis_kelamin ?></td>
		      <td><?php echo $v_peminjaman_belum_dikembalikan->tanggal_pinjam ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>