        <h2 style="margin-top:0px">T_anggota List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t_anggota/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t_anggota/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t_anggota'); ?>" class="btn btn-default">Reset</a>
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
		<th>No Anggota</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Jurusan</th>
		<th>Jenis Kelamin</th>
		<th>Password</th>
		<th>Action</th>
            </tr><?php
            foreach ($t_anggota_data as $t_anggota)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t_anggota->no_anggota ?></td>
			<td><?php echo $t_anggota->nama ?></td>
			<td><?php echo $t_anggota->kelas ?></td>
			<td><?php echo $t_anggota->jurusan ?></td>
			<td><?php echo $t_anggota->jenis_kelamin ?></td>
			<td><?php echo $t_anggota->password ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('t_anggota/read/'.$t_anggota->id_anggota),'Read'); 
				echo ' | '; 
				echo anchor(site_url('t_anggota/update/'.$t_anggota->id_anggota),'Update'); 
				echo ' | '; 
				echo anchor(site_url('t_anggota/delete/'.$t_anggota->id_anggota),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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