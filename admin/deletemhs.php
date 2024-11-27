<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $NRP = $_POST['nrp'];

    $sql = ociparse($con, "DELETE FROM MAHASISWA WHERE NRP='$NRP' ");
?>
    <script>
        window.location = "landingpage.php#mahasiswa";
    </script>
<?php
    ociexecute($sql);
}
?>