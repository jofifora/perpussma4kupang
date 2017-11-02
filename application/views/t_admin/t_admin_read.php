        <h2 class="judulHalaman">Admin Read</h2>
        <table class="table">
	    <tr><td>User Name</td><td><?php echo $user_name; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_admin') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
