        <h2 class="judulHalaman">Data Buku</h2>

        <form action="<?php echo site_url('siswa/t_buku/index'); ?>" class="form-inline" method="get">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-4">
                    </div>   
                    <div class="col-md-4">
                        <div class="form-group" style="margin-top: 10px">
                            <label for="judul_buku">Judul Buku :</label>
                            <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku" value="<?php echo $judul_buku; ?>" />
                        </div>     
                        <div class="from-group" style="margin-top: 10px">
                            <label for="id_kategori">Kategori :</label>
                            <select class="form-control" name="id_kategori" id="id_kategori">
                                <option value="" <?php echo ($id_kategori=="") ? "selected" : ""; ?>>Semua</option>
                                <?php foreach ($data_kategori as $tj) { ?>
                                <option value="<?php echo $tj->id_kategori; ?>" <?php echo ($id_kategori==$tj->id_kategori) ? "selected" : ""; ?> ><?php echo $tj->nama_kategori; ?></option>
                                <?php } ?>
                            </select>                            
                        </div> 
                        <div class="from-group" style="margin-top: 10px">
                            <label for="id_rak">Rak :</label>
                            <select class="form-control" name="id_rak" id="id_rak">
                                <option value="" <?php echo ($id_rak=="") ? "selected" : ""; ?>>Semua</option>
                                <?php foreach ($data_rak as $tj) { ?>
                                <option value="<?php echo $tj->id_rak; ?>" <?php echo ($id_rak==$tj->id_rak) ? "selected" : ""; ?> ><?php echo $tj->nama_rak; ?></option>
                                <?php } ?>
                            </select>                            
                        </div> 
                        <div class="form-group" style="margin-top: 10px">
                            <label for="tahun">Tahun :</label>
                            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
                        </div> <br>
                        <div class="group-btn">
                            <?php 
                                if ((trim($judul_buku) <> '') || (trim($id_kategori) <> '') || (trim($id_rak) <> '') || (trim($tahun) <> ''))
                                {
                                    ?>
                                    <a href="<?php echo site_url('siswa/t_buku'); ?>" class="btn btn-default" style="margin-top: 10px; margin-bottom: 10px">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit" style="margin-top: 10px; margin-bottom: 10px">Cari</button>
                        </div>
                    </div>  
                </div>                 
            </div>
        </form>

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
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
                <th>Kategori</th>
                <th>Rak</th>
                <th>Tahun</th>
            </tr><?php
            foreach ($t_buku_data as $t_buku)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $t_buku->judul_buku ?></td>
            <td><?php echo $t_buku->nama_kategori ?></td>
            <td><?php echo $t_buku->nama_rak ?></td>
            <td><?php echo $t_buku->tahun ?></td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>