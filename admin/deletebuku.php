<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include '../koneksi.php';
if (isset($_POST['submit'])) {
    $IDBuku = $_POST['id'];

    $sql = ociparse($con, "DELETE FROM BUKU WHERE ID = '$IDBuku'");
?>
    <script>
        window.location = "landingpage.php#buku";
    </script>
<?php
    ociexecute($sql);
}
?>
