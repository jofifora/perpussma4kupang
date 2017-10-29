        <h2 style="margin-top:0px">T_peminjaman Read</h2>
        <table class="table">
	    <tr><td>Id Buku</td><td><?php echo $id_buku; ?></td></tr>
	    <tr><td>Id Anggota</td><td><?php echo $id_anggota; ?></td></tr>
	    <tr><td>Tanggal Pinjam</td><td><?php echo $tanggal_pinjam; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_peminjaman') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>