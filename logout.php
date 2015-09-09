<?php
session_start();
session_destroy(); // perintah menghapus semua session yg ada
//header("location:login.php"); // mengalihkan halaman ke login.php
echo "<meta HTTP-EQUIV='REFRESH' content='0; url=login.php'>";
?>