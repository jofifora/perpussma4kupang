        <h2 style="margin-top:0px">T_pengembalian <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Peminjaman <?php echo form_error('id_peminjaman') ?></label>
            <input type="text" class="form-control" name="id_peminjaman" id="id_peminjaman" placeholder="Id Peminjaman" value="<?php echo $id_peminjaman; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pengembalian <?php echo form_error('tanggal_pengembalian') ?></label>
            <input type="text" class="form-control" name="tanggal_pengembalian" id="tanggal_pengembalian" placeholder="Tanggal Pengembalian" value="<?php echo $tanggal_pengembalian; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Denda <?php echo form_error('denda') ?></label>
            <input type="text" class="form-control" name="denda" id="denda" placeholder="Denda" value="<?php echo $denda; ?>" />
        </div>
	    <input type="hidden" name="id_pengembalian" value="<?php echo $id_pengembalian; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_pengembalian') ?>" class="btn btn-default">Cancel</a>
	</form>