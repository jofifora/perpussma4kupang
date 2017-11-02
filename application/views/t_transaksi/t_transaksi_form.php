        <h2 style="margin-top:0px">V_peminjaman_belum_dikembalikan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Peminjaman <?php echo form_error('id_peminjaman') ?></label>
            <input type="text" class="form-control" name="id_peminjaman" id="id_peminjaman" placeholder="Id Peminjaman" value="<?php echo $id_peminjaman; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Buku <?php echo form_error('id_buku') ?></label>
            <input type="text" class="form-control" name="id_buku" id="id_buku" placeholder="Id Buku" value="<?php echo $id_buku; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Judul Buku <?php echo form_error('judul_buku') ?></label>
            <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku" value="<?php echo $judul_buku; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kategori <?php echo form_error('id_kategori') ?></label>
            <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kategori <?php echo form_error('nama_kategori') ?></label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" value="<?php echo $nama_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi_kategori">Deskripsi Kategori <?php echo form_error('deskripsi_kategori') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_kategori" id="deskripsi_kategori" placeholder="Deskripsi Kategori"><?php echo $deskripsi_kategori; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Id Rak <?php echo form_error('id_rak') ?></label>
            <input type="text" class="form-control" name="id_rak" id="id_rak" placeholder="Id Rak" value="<?php echo $id_rak; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Rak <?php echo form_error('nama_rak') ?></label>
            <input type="text" class="form-control" name="nama_rak" id="nama_rak" placeholder="Nama Rak" value="<?php echo $nama_rak; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi_rak">Deskripsi Rak <?php echo form_error('deskripsi_rak') ?></label>
            <textarea class="form-control" rows="3" name="deskripsi_rak" id="deskripsi_rak" placeholder="Deskripsi Rak"><?php echo $deskripsi_rak; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="year">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stok <?php echo form_error('stok') ?></label>
            <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Eksemplar <?php echo form_error('eksemplar') ?></label>
            <input type="text" class="form-control" name="eksemplar" id="eksemplar" placeholder="Eksemplar" value="<?php echo $eksemplar; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Anggota <?php echo form_error('id_anggota') ?></label>
            <input type="text" class="form-control" name="id_anggota" id="id_anggota" placeholder="Id Anggota" value="<?php echo $id_anggota; ?>" />
        </div>
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
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pinjam <?php echo form_error('tanggal_pinjam') ?></label>
            <input type="text" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" placeholder="Tanggal Pinjam" value="<?php echo $tanggal_pinjam; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('v_peminjaman_belum_dikembalikan') ?>" class="btn btn-default">Cancel</a>
	</form>