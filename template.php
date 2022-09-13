<!--sparkling idol-->
<!--by: windah limbai-->
<!--file: template.php-->

<?php
// fail sambungan ke pangkalan data
include 'sambungdb.php';
// mulakan session
session_start();

// sekatan pengguna - semak jika pengguna sudah mendaftar masuk
if(isset($_SESSION['idurusetia'])) {
    // ke laman logmasuk.php untuk log masuk
    header('location:logmasuk.php');
}
?>

<!--sambungan pada header.php-->
<?php include 'headerurusetia.php'; ?>

<!-- <body> / isi kandungan -->

<!-- </body> tamat -->