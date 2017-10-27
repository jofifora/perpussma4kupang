<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T_admin List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>User Name</th>
		<th>Password</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($t_admin_data as $t_admin)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_admin->user_name ?></td>
		      <td><?php echo $t_admin->password ?></td>
		      <td><?php echo $t_admin->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>