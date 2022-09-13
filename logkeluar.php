<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : logkeluar.php -->
<!--hapuskan session dan kembali ke index.php--->
<?php
session_start();
session_destroy();
header('location:index.php');
?>
