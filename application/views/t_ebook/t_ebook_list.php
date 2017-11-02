        <h2 class="judulHalaman">Data E-Book</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo (trim($status) == 'kepsek') ? '' : anchor(site_url('t_ebook/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t_ebook/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t_ebook'); ?>" class="btn btn-default">Reset</a>
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
		<th>Judul Ebook</th>
		<th>Action</th>
            </tr><?php
            foreach ($t_ebook_data as $t_ebook)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t_ebook->nama_ebook ?></td>
			<td style="text-align:center" width="200px">

                <?php 

                if (trim($status) == 'kepsek') {
                    echo trim($t_ebook->tempat_ebook) == '' ? 'Belum Upload' : anchor(site_url('t_ebook/read/'.$t_ebook->id_ebook),'Read',array('target' => '_blank', 'class' => 'new_window'));
                } else {
                    echo form_open_multipart('t_ebook/do_upload/'.$t_ebook->id_ebook);
                    echo '<input type="file" name="form_upload'.$t_ebook->id_ebook.'" size="20" />';
                    echo '<input type="submit" value="upload" />';
                    echo '</form>';

                    echo trim($t_ebook->tempat_ebook) == '' ? 'Belum Upload' : anchor(site_url('t_ebook/read/'.$t_ebook->id_ebook),'Read',array('target' => '_blank', 'class' => 'new_window'));            
                    echo ' | '; 
                    echo anchor(site_url('t_ebook/update/'.$t_ebook->id_ebook),'Update'); 
                    echo ' | '; 
                    echo anchor(site_url('t_ebook/delete/'.$t_ebook->id_ebook),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    
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
		<?php echo anchor(site_url('t_ebook/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t_ebook/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>