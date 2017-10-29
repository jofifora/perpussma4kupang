        <h2 style="margin-top:0px">T_peminjaman List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t_peminjaman/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t_peminjaman/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t_peminjaman'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Buku</th>
		<th>Id Anggota</th>
		<th>Tanggal Pinjam</th>
		<th>Action</th>
            </tr><?php
            foreach ($t_peminjaman_data as $t_peminjaman)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t_peminjaman->id_buku ?></td>
			<td><?php echo $t_peminjaman->id_anggota ?></td>
			<td><?php echo $t_peminjaman->tanggal_pinjam ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('t_peminjaman/read/'.$t_peminjaman->id_peminjaman),'Read'); 
				echo ' | '; 
				echo anchor(site_url('t_peminjaman/update/'.$t_peminjaman->id_peminjaman),'Update'); 
				echo ' | '; 
				echo anchor(site_url('t_peminjaman/delete/'.$t_peminjaman->id_peminjaman),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('t_peminjaman/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t_peminjaman/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>