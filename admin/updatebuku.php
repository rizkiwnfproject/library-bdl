<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $IDBuku = $_POST['id'];
    $NamaBuku = $_POST['namabuku'];
    $PengarangBuku = $_POST['pengarangBuku'];
    $Eksemplar = $_POST['eksemplar'];
    $Tanggalterbit = $_POST['tanggalterbit'];
    $hitung = 0;

    $sql = ociparse($con, "UPDATE BUKU SET NAMA_BUKU = '$NamaBuku', PENGARANG = '$PengarangBuku', EKSEMPLAR = '$Eksemplar', WAKTU_PENERBITAN = TO_DATE('$Tanggalterbit','YYYY/MM/DD') WHERE ID = '$IDBuku'"); ?>
    <script>
        window.location = "landingpage.php#buku";
    </script>
    <?php
    
    ociexecute($sql);
}
    ?>