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

    $sql = ociparse($con, "INSERT INTO BUKU VALUES ('$IDBuku', '$NamaBuku', '$PengarangBuku', '$Eksemplar', TO_DATE('$Tanggalterbit','YYYY/MM/DD'))"); ?>
    <script>
        window.location = "landingpage.php#buku";
    </script>
    <?php
    
    ociexecute($sql);
}
    ?>