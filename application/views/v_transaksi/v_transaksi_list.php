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
        <h2 style="margin-top:0px">V_transaksi List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('v_transaksi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('v_transaksi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('v_transaksi'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
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
		<th>Action</th>
            </tr><?php
            foreach ($v_transaksi_data as $v_transaksi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
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
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('v_transaksi/read/'.$v_transaksi->),'Read'); 
				echo ' | '; 
				echo anchor(site_url('v_transaksi/update/'.$v_transaksi->),'Update'); 
				echo ' | '; 
				echo anchor(site_url('v_transaksi/delete/'.$v_transaksi->),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('v_transaksi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('v_transaksi/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>