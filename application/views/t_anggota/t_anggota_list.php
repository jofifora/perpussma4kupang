        <h2 class="judulHalaman">Data Anggota</h2>
        <form action="<?php echo site_url('t_anggota/index'); ?>" class="form-inline" method="get">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-right">
                        <div class="form-group" style="margin-top: 10px">
                            <label for="no_anggota">No. Anggota :</label>
                            <input type="text" class="form-control" name="no_anggota" id="no_anggota" placeholder="No. Anggota" value="<?php echo $no_anggota; ?>" />
                        </div> <br>
                        <div class="form-group" style="margin-top: 10px">
                            <label for="nama">Nama :</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                        </div> <br>      
                        <div class="form-group" style="margin-top: 10px">
                            <label for="kelas">Kelas :</label>
                            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="kelas" value="<?php echo $kelas; ?>" />
                        </div>
                    </div>   
                    <div class="col-md-6 text-left">   
                        <div class="form-group" style="margin-top: 10px">
                            <label for="jurusan">Jurusan :</label>
                            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?php echo $jurusan; ?>" />
                        </div>                     
                        <div class="from-group" style="margin-top: 10px">
                            <label for="jenis_kelamin">Jenis Kelamin :</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="" <?php echo ($jenis_kelamin=="") ? "selected" : ""; ?>>Semua</option>
                                <option value="Laki-laki" <?php echo ($jenis_kelamin=="Laki-laki") ? "selected" : ""; ?> >Laki-laki</option>
                                <option value="Perempuan" <?php echo ($jenis_kelamin=="Perempuan") ? "selected" : ""; ?> >Perempuan</option>
                            </select>                            
                        </div>
                        <div class="group-btn">
                            <?php 
                                if ((trim($no_anggota) <> '') || (trim($nama) <> '') || (trim($kelas) <> '') || (trim($jurusan) <> '') || (trim($jenis_kelamin) <> ''))
                                {
                                    ?>
                                    <a href="<?php echo site_url('t_anggota'); ?>" class="btn btn-default" style="margin-top: 10px; margin-bottom: 10px">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit" style="margin-top: 10px; margin-bottom: 10px">Cari</button>
                        </div>                              
                    </div>  
                </div>  
                <div class="row">
                    <div class="col-md-12 text-center">
                          
                    </div>
                </div>               
            </div>
        </form>


        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo (trim($status) == 'kepsek') ? '' : anchor(site_url('t_anggota/create'),'Create', 'class="btn btn-primary"'); ?>
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
		<th>No Anggota</th>
		<th>Nama</th>
        <th>Tgl. Lahir</th>
		<th>Kelas</th>
		<th>Jurusan</th>
		<th>Jenis Kelamin</th>
		<th>Action</th>
            </tr><?php
            foreach ($t_anggota_data as $t_anggota)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t_anggota->no_anggota ?></td>
			<td><?php echo $t_anggota->nama ?></td>
            <td><?php echo $t_anggota->password ?></td>
			<td><?php echo $t_anggota->kelas ?></td>
			<td><?php echo $t_anggota->jurusan ?></td>
			<td><?php echo $t_anggota->jenis_kelamin ?></td>
			<td style="text-align:center" width="140px">
				<?php 
                if (trim($status) == 'kepsek') {
                    echo anchor(site_url('t_anggota/read/'.$t_anggota->id_anggota),'Read'); 
                } else {
                    echo anchor(site_url('t_anggota/read/'.$t_anggota->id_anggota),'Read'); 
                    echo ' | '; 
                    echo anchor(site_url('t_anggota/update/'.$t_anggota->id_anggota),'Update'); 
                    echo ' <br> '; 
                    echo anchor(site_url('t_anggota/delete/'.$t_anggota->id_anggota),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                    echo ' | '; 
                    echo anchor(site_url('t_transaksi?id='.$t_anggota->id_anggota),'Transaksi');
                }                


				
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
		<?php echo anchor(site_url('t_anggota/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t_anggota/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>