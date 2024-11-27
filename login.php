<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $NRP = $_POST['nrp'];
    $Password = $_POST['password'];
    $hitung = 0;

    $sql = ociparse($con, "SELECT * FROM USER_LOGIN WHERE NRP = '$NRP' AND PASSWORD = '$Password'");
    ociexecute($sql);
    while (ocifetch($sql)) {
        $hitung++;
    }
    if ($hitung > 0) {
        $_SESSION['user_is_logged_in'] = true;
        header('location:loginberhasil.php');
?>
        <!-- <script>
            window.location = "loginberhasil.php";
        </script> -->
    <?php
    } else { ?>
        <script>
            window.location = "index.php";
        </script>
<?php
    }
}
?>