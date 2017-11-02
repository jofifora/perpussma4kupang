    <div class="jumbotron">
      <div class="container">
        <h1>Selamat Datang..</h1>
        <?php  
        if (trim($status)=='kepsek') {
        echo '<p>Ini adalah Sistem Informasi Perpustakaan pada SMAN 4 Kota Kupang. Anda sekarang sedang login menggunakan Akun Kepala Sekolah. Sebagai Kepala Sekolah anda mempunyai hak untuk melihat semua data yang ada di SI Perpustakaan ini.</p>
        <p><a class="btn btn-primary btn-lg" href="'.base_url('t_buku').'" role="button">Lihat data buku &raquo;</a></p>';
        } elseif (trim($status)=='admin') {
        echo '<p>Ini adalah Sistem Informasi Perpustakaan pada SMAN 4 Kota Kupang. Anda sekarang sedang login menggunakan Akun Admin. Sebagai admin anda mempunyai hak untuk mengatur semua data yang ada di SI Perpustakaan ini.</p>
        <p><a class="btn btn-primary btn-lg" href="'.base_url('t_buku').'" role="button">Lihat data buku &raquo;</a></p>';
        } else {
          echo '<p>Salah Login</p>
        <p><a class="btn btn-primary btn-lg" href="'.base_url('t_buku').'" role="button">Lihat data buku &raquo;</a></p>';
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