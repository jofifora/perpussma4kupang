        <h2 class="judulHalaman">Buku <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Judul Buku <?php echo form_error('judul_buku') ?></label>
            <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku" value="<?php echo $judul_buku; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Kategori <?php echo form_error('id_kategori') ?></label>
            <select class="form-control" name="id_kategori" id="id_kategori" placeholder="Kategori" value="">
                <?php foreach ($data_kategori as $key) {?>
                <option value="<?php echo $key->id_kategori ?>" <?php echo ($id_kategori == $key->id_kategori) ? ("selected") : ("") ;?> ><?php echo($key->nama_kategori) ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="int">Rak <?php echo form_error('id_rak') ?></label>
            <select class="form-control" name="id_rak" id="id_rak" placeholder="Rak" value="">
                <?php foreach ($data_rak as $key) {?>
                <option value="<?php echo $key->id_rak ?>" <?php echo ($id_rak == $key->id_rak) ? ("selected") : ("") ;?> ><?php echo($key->nama_rak) ?></option>
                <?php } ?>
            </select>
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
        <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo $link_kembali ?>" class="btn btn-default">Cancel</a>
    </form>