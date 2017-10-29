        <h2 style="margin-top:0px">T_buku List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t_buku/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t_buku/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t_buku'); ?>" class="btn btn-default">Reset</a>
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
		<th>Judul Buku</th>
		<th>Id Kategori</th>
		<th>Id Rak</th>
		<th>Tahun</th>
		<th>Stok</th>
		<th>Eksemplar</th>
		<th>Ebook</th>
		<th>Action</th>
            </tr><?php
            foreach ($t_buku_data as $t_buku)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t_buku->judul_buku ?></td>
			<td><?php echo $t_buku->id_kategori ?></td>
			<td><?php echo $t_buku->id_rak ?></td>
			<td><?php echo $t_buku->tahun ?></td>
			<td><?php echo $t_buku->stok ?></td>
			<td><?php echo $t_buku->eksemplar ?></td>
			<td><?php echo $t_buku->ebook ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('t_buku/read/'.$t_buku->id_buku),'Read'); 
				echo ' | '; 
				echo anchor(site_url('t_buku/update/'.$t_buku->id_buku),'Update'); 
				echo ' | '; 
				echo anchor(site_url('t_buku/delete/'.$t_buku->id_buku),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('t_buku/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t_buku/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>