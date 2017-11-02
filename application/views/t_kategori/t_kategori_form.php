        <h2 class="judulHalaman">Kategori <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kategori <?php echo form_error('nama_kategori') ?></label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi_kategori">Deskripsi Kategori <?php echo form_error('deskripsi_kategori') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_kategori" id="deskripsi_kategori" placeholder="Deskripsi Kategori"><?php echo $deskripsi_kategori; ?></textarea>
        </div>
	    <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_kategori') ?>" class="btn btn-default">Cancel</a>
	</form>