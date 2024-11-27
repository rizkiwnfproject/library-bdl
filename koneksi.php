<?php
$con = ocilogon("hr","hr","localhost:1521/orcl");
if (!$con)
   echo "Koneksi ke DB Oracle Gagal";
?>