<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : carianrekod.php -->

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

<!-- sambungan pada headerurusetia.php -->
<?php include 'headerurusetia.php'; ?>

<!-- <body> / isi kandungan -->
<!-- USER INTERFACE -->
<br>
<!-- BORANG CARIAN REKOD PERINCIAN KEPUTUSAN PESERTA -->
<?php
  //mendapatkan data dalam jadual peserta
  $carian = mysqli_query($db, "SELECT * FROM peserta");
?>
<!-- menetapkan 'form' carian -->
<form action="laporanpeserta.php" method="post" enctype="multipart/form-data">
  <label><b>Laporan Penilaian Pertandingan Nyanyian</b></label> <br>
  <hr>
  <!-- menetapkan pilihan berdasarkan nama peserta dan nokp yang terdapat dalam jadual peserta -->
  <select name="carian">
    <option> -- Pilih Peserta -- </option>
    <?php 
      while ($row = mysqli_fetch_array($carian)) {
        $nokp = $row['nokp'];
        $peserta = $row['nama'];

        echo '<option value=" '.$nokp.' ">'.$peserta.'</option>';
      }
    ?>
  </select>
  <br><br>
  <!-- butang untuk carian -->
  <input type="submit" value="JANA LAPORAN">
  <br>
</form>
<!-- TAMAT BORANG CARIAN -->
<!-- TAMAT USER INTERFACE -->
<!-- </body> tamat -->