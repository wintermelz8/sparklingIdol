<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : laporanpeserta.php -->

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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <title>SPARKLING IDOL</title>
</head>
<body>
  <?php 
  // mendapatkan data dan menetapkan nama pembolehubah dari kotak carian pada carianrekod.php
  if (isset($_POST['carian'])) {
    $nokp = $_POST['carian'];
  }
  
  // semak dan dapatkan data dari gabungan jadual markah, peserta dan lagu berdasarkan nokp yang dipilih
  $sql = mysqli_query($db, "SELECT SUM(markah.pitching) as sumpitch, SUM(markah.tempo) as sumtempo, SUM(markah.suara) as sumsuara, SUM(markah.persembahan) as sumpersembahan, SUM(markah.pakaian) as sumpakaian, SUM(markah.jumlahmarkah) as sum, peserta.*, lagu.* FROM markah INNER JOIN peserta ON markah.nokp = peserta.nokp INNER JOIN lagu ON peserta.idlagu = lagu.idlagu WHERE markah.nokp = $nokp GROUP BY nokp ");
    // semak jika data ada
  if (!$sql || mysqli_num_rows($sql) == 0) {
    echo 'Tiada maklumat peserta';
    echo '<br><a href="carianrekod.php"><button>KEMBALI</button></a>';
  } else {
    while ($row = mysqli_fetch_array($sql)) {
      $peserta = $row['nama'];
      $nokp = $row['nokp'];
      $jantina = $row['jantina'];
      $kelas = $row['kelas'];
      $lagu = $row['tajuklagu'];
      $pitch = $row['sumpitch'];
      $tempo = $row['sumtempo'];
      $suara = $row['sumsuara'];
      $persembahan = $row['sumpersembahan'];
      $pakaian = $row['sumpakaian'];
      $markah = $row['sum'];
      $lagu = $row['tajuklagu'];
      $penyanyi = $row['penyanyiasal'];
          
      //paparkan data dari jadual markah, peserta dan lagu
      echo
      '<h3 style="text-align:center;">Laporan Penilaian Pertandingan Nyanyian <br> sparkling idol <br>' .$peserta.' </h3><br>
      <label>Nama : </label> <b>'.$peserta.'</b> <br>
      <label>No Kad Pengenalan : </label> <b>'.$nokp.'</b> <br>
      <label>Jantina : </label> <b>'.$jantina.'</b> <br>
      <label>Kelas : </label> <b>'.$kelas.'</b> <br>
      <label>Tajuk Lagu : </label> <b>'.$lagu.'</b> <br>
      <label>Penyanyi Asal : </label> <b>'.$penyanyi.'</b> <br><br>
      <b>Markah</b> <br>
      <table style="text-align:center;" border = 1>
        <tr>
          <th>Pitching <br> (120 markah)</th>
          <th>Tempo <br> (90 markah)</th>
          <th>Ton/Mutu Suara <br> (45 markah)</th>
          <th>Gaya Persembahan <br> (30 markah)</th>
          <th>Pakaian <br> (15 markah)</th>
          <th>Jumlah Markah <br> (300 markah)</th>
        </tr>
        <tr>
          <td>'.$pitch.'</td>
          <td>'.$tempo.'</td>
          <td>'.$suara.'</td>
          <td>'.$persembahan.'</td>
          <td>'.$pakaian.'</td>
          <td>'.$markah.'</td>
        </tr>
      </table> '; ?>

      <hr>
      <center>
        <!-- butang untuk mencetak laporan -->
        <input type="button" value="CETAK" onClick="window.print()">
        <!-- butang untuk kembali ke laman utama -->
        <a href="senarai.php?q=1"><button>MENU UTAMA</button></a>
      </center>
    <?php
    }
  }
  ?>
</body>
</html>