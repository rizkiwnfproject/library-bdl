<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $NRP = $_POST['nrp'];
    $IDBuku = $_POST['idbuku'];
    $TanggalPinjam = $_POST['tanggalpinjam'];
    $TanggalKembali = $_POST['tanggalKembali'];

    $sql = ociparse($con, "UPDATE TRANSAKSI_PEMINJAMAN SET ID_BUKU = '$IDBuku', TANGGAL_PINJAM = TO_DATE('$TanggalPinjam','YYYY/MM/DD'), TANGGAL_KEMBALI = TO_DATE('$TanggalKembali','YYYY/MM/DD') WHERE ID_MAHASISWA='$NRP'");
?>
    <script>
        window.location = "landingpage.php#transaksi";
    </script>
<?php
    ociexecute($sql);
}
?>