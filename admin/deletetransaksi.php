<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $NRP = $_POST['nrp'];
    $IDBuku = $_POST['idbuku'];

    $sql = ociparse($con, "DELETE FROM TRANSAKSI_PEMINJAMAN WHERE ID_MAHASISWA='$NRP' AND ID_BUKU='$IDBuku'");
    
?>
    <script>
        window.location = "landingpage.php#transaksi";
    </script>
<?php
    ociexecute($sql);
}
?>
