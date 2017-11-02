        <h2 class="judulHalaman">E-Book <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Ebook <?php echo form_error('nama_ebook') ?></label>
            <input type="text" class="form-control" name="nama_ebook" id="nama_ebook" placeholder="Nama Ebook" value="<?php echo $nama_ebook; ?>" />
        </div>
        <input type="hidden" name="tempat_ebook" value="<?php echo $tempat_ebook; ?>" /> 
	    <input type="hidden" name="id_ebook" value="<?php echo $id_ebook; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_ebook') ?>" class="btn btn-default">Cancel</a>
	</form>