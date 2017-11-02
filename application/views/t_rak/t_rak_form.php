        <h2 class="judulHalaman">Rak <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Rak <?php echo form_error('nama_rak') ?></label>
            <input type="text" class="form-control" name="nama_rak" id="nama_rak" placeholder="Nama Rak" value="<?php echo $nama_rak; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi_rak">Deskripsi Rak <?php echo form_error('deskripsi_rak') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_rak" id="deskripsi_rak" placeholder="Deskripsi Rak"><?php echo $deskripsi_rak; ?></textarea>
        </div>
	    <input type="hidden" name="id_rak" value="<?php echo $id_rak; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_rak') ?>" class="btn btn-default">Cancel</a>
	</form>