        <h2 class="judulHalaman">Data Buku</h2>

        <form action="<?php echo site_url('t_buku/index'); ?>" class="form-inline" method="get">
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
                                    <a href="<?php echo site_url('t_buku'); ?>" class="btn btn-default" style="margin-top: 10px; margin-bottom: 10px">Reset</a>
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
                <?php echo (trim($status) == 'kepsek') ? '' : anchor(site_url('t_buku/create'),'Create', 'class="btn btn-primary"'); ?>
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
                <th>Kategori</th>
                <th>Rak</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Eksemplar</th>
                <th>Action</th>
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
            <td><?php echo $t_buku->stok ?></td>
            <td><?php echo $t_buku->eksemplar ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                if (trim($status) == 'kepsek') {
                    echo anchor(site_url('t_buku/read/'.$t_buku->id_buku),'Read'); 
                } else {
                    echo anchor(site_url('t_buku/read/'.$t_buku->id_buku),'Read'); 
                    echo ' | '; 
                    echo anchor(site_url('t_buku/update/'.$t_buku->id_buku),'Update'); 
                    echo ' | '; 
                    echo anchor(site_url('t_buku/delete/'.$t_buku->id_buku),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                }                
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('t_buku/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('t_buku/word'), 'Word', 'class="btn btn-primary"'); ?>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>