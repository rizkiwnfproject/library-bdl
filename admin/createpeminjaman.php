<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $NRP = $_POST['nrp'];
    $IDBuku = $_POST['idbuku'];
    $TanggalPinjam = $_POST['tanggalpinjam'];
    $TanggalKembali = $_POST['tanggalKembali'];

    $sql = ociparse($con, "INSERT INTO TRANSAKSI_PEMINJAMAN VALUES ('$NRP', '$IDBuku', TO_DATE('$TanggalPinjam','YYYY/MM/DD'), TO_DATE('$TanggalKembali','YYYY/MM/DD'))");
    
?>
    <script>
        window.location = "landingpage.php#transaksi";
    </script>
<?php
    ociexecute($sql);
}
?>
