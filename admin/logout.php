<?php
session_start();
if (isset($_SESSION['user_is_logged_in'])) {
    unset($_SESSION['user_is_logged_in']);
}
echo "<script>
		alert('Anda Telah Logout');
		window.location.href = '../index.php';
	  </script>";
?>