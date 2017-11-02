        <h2 class="judulHalaman">Transaksi Read</h2>
        <table class="table">
	    <tr><td>Id Peminjaman</td><td><?php echo $id_peminjaman; ?></td></tr>
	    <tr><td>Id Buku</td><td><?php echo $id_buku; ?></td></tr>
	    <tr><td>Judul Buku</td><td><?php echo $judul_buku; ?></td></tr>
	    <tr><td>Id Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td>Nama Kategori</td><td><?php echo $nama_kategori; ?></td></tr>
	    <tr><td>Deskripsi Kategori</td><td><?php echo $deskripsi_kategori; ?></td></tr>
	    <tr><td>Id Rak</td><td><?php echo $id_rak; ?></td></tr>
	    <tr><td>Nama Rak</td><td><?php echo $nama_rak; ?></td></tr>
	    <tr><td>Deskripsi Rak</td><td><?php echo $deskripsi_rak; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td>Eksemplar</td><td><?php echo $eksemplar; ?></td></tr>
	    <tr><td>Id Anggota</td><td><?php echo $id_anggota; ?></td></tr>
	    <tr><td>No Anggota</td><td><?php echo $no_anggota; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td>Jurusan</td><td><?php echo $jurusan; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Tanggal Pinjam</td><td><?php echo $tanggal_pinjam; ?></td></tr>
	    <tr><td>Id Pengembalian</td><td><?php echo $id_pengembalian; ?></td></tr>
	    <tr><td>Tanggal Pengembalian</td><td><?php echo $tanggal_pengembalian; ?></td></tr>
	    <tr><td>Denda</td><td><?php echo $denda; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('v_transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>