<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $NRP = $_POST['nrp'];
    $Nama = $_POST['nama'];
    $Alamat = $_POST['alamat'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Jurusan = $_POST['jurusan'];
    $sql = ociparse($con, "INSERT INTO MAHASISWA VALUES ('$NRP', '$Nama', '$Alamat', '$Password', '$Email', '$Jurusan')");
    ociexecute($sql);
?>
    <script>
        window.location = "landingpage.php#mahasiswa";
    </script>
<?php

}
?>