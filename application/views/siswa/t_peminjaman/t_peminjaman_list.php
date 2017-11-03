        <h2 class="judulHalaman">Data Peminjaman</h2>

        <table class="table table-bordered" style="margin-bottom: 20px">
            <tr>
                <td>No. Anggota</td>
                <td><?php echo $no_a; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?php echo $nm; ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><?php echo $kl; ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><?php echo $jr; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><?php echo $jk; ?></td>
            </tr>
        </table>

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Nama Kategori</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Pengembalian</th>
                <th>Denda</th>
            </tr><?php
            $start = 0;
            $total_denda_uang = 0;
            foreach ($t_peminjaman_data as $t_peminjaman)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $t_peminjaman->judul_buku ?></td>
            <td><?php echo $t_peminjaman->nama_kategori ?></td>
            <td><?php echo $t_peminjaman->tanggal_pinjam ?></td>
            <td><?php echo (trim($t_peminjaman->tanggal_pengembalian) == '') ? 'Belum dikembalikan' : $t_peminjaman->tanggal_pengembalian;  ?></td>
            <td><?php 
                if (trim($t_peminjaman->tanggal_pengembalian) == '') {
                    $date1 = date_create($t_peminjaman->tanggal_pinjam);
                    $date2 = date_create(date('Y/m/d'));
                    $lamaPinjam = 0;
                    if ($date1<$date2) {
                        $lamaPinjam = date_diff($date1,$date2)->format("%a");
                        //echo $lamaPinjam;
                    } else {
                        $lamaPinjam = 0;
                        //echo $lamaPinjam;
                    }
                    if ($lamaPinjam > $max_lama_pinjam) {
                        $denda_hari = $lamaPinjam - $max_lama_pinjam;
                        $denda_uang = $denda_hari * $denda_per_hari;
                        $total_denda_uang = $total_denda_uang + $denda_uang;
                        echo "Rp. ".$denda_uang;
                    } else {
                        echo "Rp. 0";
                    }
                } else {
                    echo "Rp. ".$t_peminjaman->denda;
                }                
                        
                ?></td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                <a href="#" class="btn btn-primary">Total denda belum dibayar : <?php echo 'Rp. '.$total_denda_uang ?></a>
            </div>
                <div class="col-md-6 text-right">
                    <?php echo $pagination ?>
                </div>
        </div>