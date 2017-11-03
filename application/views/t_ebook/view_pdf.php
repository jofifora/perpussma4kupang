<?php
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $nama_ebook . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
@readfile($tempat_ebook);
?>
