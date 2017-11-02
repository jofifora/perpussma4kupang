        <h2 class="judulHalaman">Data Transaksi</h2>

        <form action="<?php echo site_url('v_transaksi/index'); ?>" class="form-inline" method="get">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-right">
                        <div class="form-group" style="margin-top: 10px">
                            <label for="no_a">No. Anggota :</label>
                            <input type="text" class="form-control" name="no_a" id="no_a" placeholder="No. Anggota" value="<?php echo $no_anggota; ?>" />
                        </div> <br>
                        <div class="form-group" style="margin-top: 10px">
                            <label for="nm">Nama :</label>
                            <input type="text" class="form-control" name="nm" id="nm" placeholder="Nama" value="<?php echo $nama; ?>" />
                        </div> <br>      
                        <div class="form-group" style="margin-top: 10px">
                            <label for="kl">Kelas :</label>
                            <input type="text" class="form-control" name="kl" id="kl" placeholder="Kelas" value="<?php echo $kelas; ?>" />
                        </div>
                        <div class="form-group" style="margin-top: 10px">
                            <label for="jr">Jurusan :</label>
                            <input type="text" class="form-control" name="jr" id="jr" placeholder="Jurusan" value="<?php echo $jurusan; ?>" />
                        </div>                     
                        <div class="from-group" style="margin-top: 10px">
                            <label for="jk">Jenis Kelamin :</label>
                            <select class="form-control" name="jk" id="jk">
                                <option value="" <?php echo ($jenis_kelamin=="") ? "selected" : ""; ?>>Semua</option>
                                <option value="Laki-laki" <?php echo ($jenis_kelamin=="Laki-laki") ? "selected" : ""; ?> >Laki-laki</option>
                                <option value="Perempuan" <?php echo ($jenis_kelamin=="Perempuan") ? "selected" : ""; ?> >Perempuan</option>
                            </select>                            
                        </div>
                    </div>   
                    <div class="col-md-4 text-center">
                        <div class="form-group" style="margin-top: 10px">
                            <label for="jd_b">Judul Buku :</label>
                            <input type="text" class="form-control" name="jd_b" id="jd_b" placeholder="Judul Buku" value="<?php echo $judul_buku; ?>" />
                        </div>     
                        <div class="from-group" style="margin-top: 10px">
                            <label for="id_kat">Kategori :</label>
                            <select class="form-control" name="id_kat" id="id_kat">
                                <option value="" <?php echo ($id_kategori=="") ? "selected" : ""; ?>>Semua</option>
                                <?php foreach ($data_kategori as $tj) { ?>
                                <option value="<?php echo $tj->id_kategori; ?>" <?php echo ($id_kategori==$tj->id_kategori) ? "selected" : ""; ?> ><?php echo $tj->nama_kategori; ?></option>
                                <?php } ?>
                            </select>                            
                        </div> 
                        <div class="from-group" style="margin-top: 10px">
                            <label for="id_rk">Rak :</label>
                            <select class="form-control" name="id_rk" id="id_rk">
                                <option value="" <?php echo ($id_rak=="") ? "selected" : ""; ?>>Semua</option>
                                <?php foreach ($data_rak as $tj) { ?>
                                <option value="<?php echo $tj->id_rak; ?>" <?php echo ($id_rak==$tj->id_rak) ? "selected" : ""; ?> ><?php echo $tj->nama_rak; ?></option>
                                <?php } ?>
                            </select>                            
                        </div> 
                        <div class="form-group" style="margin-top: 10px">
                            <label for="th">Tahun Buku :</label>
                            <input type="text" class="form-control" name="th" id="th" placeholder="Tahun" value="<?php echo $tahun; ?>" />
                        </div> <br>
                                                    
                    </div>
                    <div class="col-md-4 text-left" >
                        <div class="form-group" style="margin-top: 10px">
                            <label for="tanggal">Tanggal Peminjaman :</label>
                            <div class="input-group">
                                <input type="text" class="form-control tanggal" name="tgl_pj1" placeholder="yyyy-mm-dd" value="<?php echo $tgl_pj1; ?>">
                                <span class="input-group-addon">Sampai</span>
                                <input type="text" class="form-control tanggal" name="tgl_pj2" placeholder="yyyy-mm-dd" value="<?php echo $tgl_pj2; ?>">
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 10px">
                            <label for="tanggal">Tanggal Pengembalian :</label>
                            <div class="input-group">
                                <input type="text" class="form-control tanggal" name="tgl_pb1" placeholder="yyyy-mm-dd" value="<?php echo $tgl_pb1; ?>">
                                <span class="input-group-addon">Sampai</span>
                                <input type="text" class="form-control tanggal" name="tgl_pb2" placeholder="yyyy-mm-dd" value="<?php echo $tgl_pb2; ?>">
                            </div>
                        </div>
                        <div class="from-group" style="margin-top: 10px">
                            <label for="st_pb">Status Pengembalian :</label>
                            <select class="form-control" name="st_pb" id="st_pb">
                                <option value="" <?php echo ($st_pb=="") ? "selected" : ""; ?>>Semua</option>
                                <option value="1" <?php echo ($st_pb=="1") ? "selected" : ""; ?> >Sudah dikembalikan</option>
                                <option value="2" <?php echo ($st_pb=="2") ? "selected" : ""; ?> >Belum dikembalikan</option>
                            </select>                            
                        </div> 
                    </div>  
                </div>  
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="group-btn">
                            <?php 
                                if ((trim($no_anggota) <> '') || (trim($nama) <> '') || (trim($kelas) <> '') || (trim($jurusan) <> '') || (trim($jenis_kelamin) <> '') || (trim($judul_buku) <> '') || (trim($id_kategori) <> '') || (trim($id_rak) <> '') || (trim($tahun) <> '') || (trim($tgl_pj1) <> '') || (trim($tgl_pj2) <> '') || (trim($tgl_pb1) <> '') || (trim($tgl_pb2) <> '') || (trim($st_pb) <> ''))
                                {
                                    ?>
                                    <a href="<?php echo site_url('v_transaksi'); ?>" class="btn btn-default" style="margin-top: 10px; margin-bottom: 10px">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit" style="margin-top: 10px; margin-bottom: 10px">Cari</button>
                        </div>  
                                                                         
                    </div>
                </div>               
            </div>
        </form>


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