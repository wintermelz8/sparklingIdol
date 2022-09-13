<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : delete.php -->

<?php
// fail sambungan ke pangkalan data
include 'sambungdb.php';
// mulakan session
session_start();

// sekatan pengguna - semak jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['idurusetia'])) {
  //ke laman logmasuk.php untuk log masuk
  header('location:logmasuk.php');
}
?>

<!-- PROSES DELETE -->
<?php 
if ($_GET['q'] == 1) {
  //proses memadam rekod bagi peserta
  // mendapatkan nokp yang dipilih untuk dipadam
  if (isset($_GET['id'])) {
    $nokp = $_GET['id'];

    //penyataan sql untuk memadam data daripada jadual peserta dan lagu
    $padam = mysqli_query($db, "DELETE lagu.*, peserta.* FROM lagu INNER JOIN peserta ON lagu.idlagu = peserta.idlagu WHERE peserta.nokp = '$nokp' ");
    //mesej pop-up apabila proses memadam berjaya dan dibawa semula ke laman SENARAI PESERTA
   echo "<script>alert('Maklumat murid berjaya dipadam.');
    window.location='senarai.php?q=1'</script>";
  }
}
?>

<?php 
if ($_GET['q'] == 2) {
  //proses memadam rekod bagi juri
  // mendapatkan idjuri yang dipilih untuk dipadam
  if (isset($_GET['idjuri'])) {
    $idjuri = $_GET['idjuri'];

  //penyataan sql untuk memadam data daripada jadual juri
  $padam = mysqli_query($db, "DELETE FROM juri WHERE idjuri = '$idjuri' ");
  //mesej pop-up apabila proses memadam berjaya dan dibawa semula ke laman SENARAI JURI
  echo "<script>alert('Maklumat juri berjaya dipadam.');
       window.location='senarai.php?q=3'</script>";
  }
}
?>
