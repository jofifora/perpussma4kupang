    <div class="jumbotron">
      <div class="container">
        <h1>Selamat Datang <?php echo $nama; ?>..</h1>
        <p>Ini adalah Sistem Informasi Perpustakaan pada SMAN 4 Kota Kupang. Anda sekarang sedang login menggunakan Akun Siswa.</p>
        <?php
        if ($jumlah_belum_dikembalikan > 0) {
          echo "<p>Anda mempunyai ".$jumlah_belum_dikembalikan." buku yang dipinjam</p>";
          echo "<p><a class='btn btn-primary btn-lg' href='".base_url('siswa/t_peminjaman')."' role='button'>Data Peminjaman &raquo;</a></p>";
        } else {
          echo "<p><a class='btn btn-primary btn-lg' href='".base_url('siswa/t_ebook')."' role='button'>Lihat E-Book &raquo;</a></p>";
        }
        ?>
      
      </div>
    </div>
      <!-- Example row of columns -->

    <div class="container" style="text-align:center;">
      <!-- Example row of columns -->
      <div class="row" >
        <?php
            foreach ($ebook_data as $t_ebook)
            {
                ?>
        <div class="col-md-4">
          <h2><?php echo $t_ebook->nama_ebook ?></h2>
          <?php
              if (trim($t_ebook->tempat_ebook) == '') {              
          ?>
          <p><a class="btn btn-default" href="#" >Belum Upload</a></p>
          <?php
              } else {
          ?>
          <p><a class="btn btn-default" href="<?php echo site_url("t_ebook/read/".$t_ebook->id_ebook) ?>" target="_blank">Baca &raquo;</a></p>
          <?php
              }
          ?>
          
        </div>
        <?php } ?>
      </div>
    </div>