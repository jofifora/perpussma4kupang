
        <h2 style="margin-top:0px">T_anggota <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post" class="form-input">
	    <div class="form-group">
            <label for="varchar">No Anggota <?php echo form_error('no_anggota') ?></label>
            <input type="text" class="form-control" name="no_anggota" id="no_anggota" placeholder="No Anggota" value="<?php echo $no_anggota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kelas <?php echo form_error('kelas') ?></label>
            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jurusan <?php echo form_error('jurusan') ?></label>
            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?php echo $jurusan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="jenis_kelamin" value="">
                <option value="Laki-laki" <?php echo ($jenis_kelamin == "Laki-laki") ? ("selected") : ("") ;?> >Laki-laki</option>
                <option value="Perempuan" <?php echo ($jenis_kelamin == "Perempuan") ? ("selected") : ("") ;?> >Perempuan</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo $link_kembali ?>" class="btn btn-default">Cancel</a>
	</form>