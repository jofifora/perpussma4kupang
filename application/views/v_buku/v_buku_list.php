<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">V_buku List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('v_buku/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('v_buku/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('v_buku'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Buku</th>
		<th>Judul Buku</th>
		<th>Id Kategori</th>
		<th>Nama Kategori</th>
		<th>Deskripsi Kategori</th>
		<th>Id Rak</th>
		<th>Nama Rak</th>
		<th>Deskripsi Rak</th>
		<th>Tahun</th>
		<th>Stok</th>
		<th>Eksemplar</th>
		<th>Action</th>
            </tr><?php
            foreach ($v_buku_data as $v_buku)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $v_buku->id_buku ?></td>
			<td><?php echo $v_buku->judul_buku ?></td>
			<td><?php echo $v_buku->id_kategori ?></td>
			<td><?php echo $v_buku->nama_kategori ?></td>
			<td><?php echo $v_buku->deskripsi_kategori ?></td>
			<td><?php echo $v_buku->id_rak ?></td>
			<td><?php echo $v_buku->nama_rak ?></td>
			<td><?php echo $v_buku->deskripsi_rak ?></td>
			<td><?php echo $v_buku->tahun ?></td>
			<td><?php echo $v_buku->stok ?></td>
			<td><?php echo $v_buku->eksemplar ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('v_buku/read/'.$v_buku->),'Read'); 
				echo ' | '; 
				echo anchor(site_url('v_buku/update/'.$v_buku->),'Update'); 
				echo ' | '; 
				echo anchor(site_url('v_buku/delete/'.$v_buku->),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('v_buku/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('v_buku/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>