        <h2 style="margin-top:0px">V_transaksi List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Judul Buku</th>
        		<th>Nama Kategori</th>
        		<th>No Anggota</th>
        		<th>Nama</th>
        		<th>Kelas</th>
        		<th>Jurusan</th>
        		<th>Jenis Kelamin</th>
        		<th>Tanggal Pinjam</th>
        		<th>Tanggal Pengembalian</th>
        		<th>Denda</th>
        		<th>Action</th>
            </tr><?php
            foreach ($v_transaksi_data as $v_transaksi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $v_transaksi->judul_buku ?></td>
			<td><?php echo $v_transaksi->nama_kategori ?></td>
			<td><?php echo $v_transaksi->no_anggota ?></td>
			<td><?php echo $v_transaksi->nama ?></td>
			<td><?php echo $v_transaksi->kelas ?></td>
			<td><?php echo $v_transaksi->jurusan ?></td>
			<td><?php echo $v_transaksi->jenis_kelamin ?></td>
			<td><?php echo $v_transaksi->tanggal_pinjam ?></td>
			<td><?php 
                    if (trim($v_transaksi->id_pengembalian) == '') {
                        echo "Belum dikembalikan";
                    } else {
                        echo $v_transaksi->tanggal_pengembalian; 
                    }
                ?></td>
			<td><?php echo $v_transaksi->denda ?></td>
			<td style="text-align:center" width="70px">
				<?php 
				echo anchor(site_url('v_transaksi/read/'.$v_transaksi->id_peminjaman),'Read','class="btn btn-primary"'); 
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