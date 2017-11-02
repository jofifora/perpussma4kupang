        <h2 style="margin-top:0px">V_peminjaman_belum_dikembalikan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php
                	if ($max_buku_pinjam<=$total_rows) {
                		echo anchor(site_url('t_transaksi?id='.$id.'#'),'Tidak bisa tambah. sudah melewati pinjaman buku maximal', 'class="btn btn-primary"'); 
                	} else {
                		echo anchor(site_url('t_pilih_buku?id='.$id),'Tambah', 'class="btn btn-primary"'); 
                	}                	
                	
                ?>
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
				<th>Nama Rak</th>
				<th>Tahun</th>
				<th>Tanggal Pinjam</th>
				<th>Lama Pinjam</th>
				<th>Denda</th>
				<th>Action</th>
            </tr><?php
            $start = 0;
            $total_denda_uang = 0;
            foreach ($t_transaksi_data as $v_peminjaman_belum_dikembalikan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $v_peminjaman_belum_dikembalikan->judul_buku ?></td>
			<td><?php echo $v_peminjaman_belum_dikembalikan->nama_kategori ?></td>
			<td><?php echo $v_peminjaman_belum_dikembalikan->nama_rak ?></td>
			<td><?php echo $v_peminjaman_belum_dikembalikan->tahun ?></td>
			<td><?php echo $v_peminjaman_belum_dikembalikan->tanggal_pinjam ?></td>
			<td><?php 
					$date1 = date_create($v_peminjaman_belum_dikembalikan->tanggal_pinjam);
					$date2 = date_create(date('Y/m/d'));
					$lamaPinjam = 0;
					if ($date1<$date2) {
						$lamaPinjam = date_diff($date1,$date2)->format("%a");
						echo $lamaPinjam;
					} else {
						$lamaPinjam = 0;
						echo $lamaPinjam;
					}
				?></td>
			<td><?php
					if ($lamaPinjam > $max_lama_pinjam) {
						$denda_hari = $lamaPinjam - $max_lama_pinjam;
						$denda_uang = $denda_hari * $denda_per_hari;
						$total_denda_uang = $total_denda_uang + $denda_uang;
						echo "Rp. ".$denda_uang;
					} else {
						echo "Rp. 0";
					}
					
				?></td>
			<td style="text-align:center" width="150px">
				<form action="<?php echo site_url('t_transaksi/kembalikan_buku'); ?>" method="post">
                <input type="hidden" name="id_peminjaman" value="<?php echo $v_peminjaman_belum_dikembalikan->id_peminjaman ?>" /> 
                <input type="hidden" name="id_anggota" value="<?php echo $id; ?>" />
                <input type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')" value="Kembalikan" />                
                </form>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                <a href="#" class="btn btn-primary">Total Denda : <?php echo 'Rp. '.$total_denda_uang ?></a>