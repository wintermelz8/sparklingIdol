<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : senaraijuri.php -->

<?php
// fail sambungan ke pangkalan data
include 'sambungdb.php';
// mulakan session
session_start();

// sekatan pengguna - semak jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['idjuri'])) {
  //ke laman loginjuri.php untuk log masuk
  header('location:loginjuri.php');
}
?>

<!-- sambungan pada headerurusetia.php -->
<?php include 'headerjuri.php'; ?>

<!-- <body> / isi kandungan -->
<!-- Proses memaparkan senarai peserta untuk memasukkan markah -->
<?php 
// paparan pada laman KEPUTUSAN MARKAH
if ($_GET['q'] == 1) { ?>
  <br>
  <center>
    <label><h3><b>KEPUTUSAN MARKAH</b></h3></label>
  </center>
  <br>
  <!-- buat table untuk senarai peserta -->
  <table border="1" style="width:70%; margin: auto; text-align: center;">
    <tr>
      <th>Bil</th>
      <th>Nama Peserta</th>
      <th>Tajuk Lagu</th>
      <th>Tindakan</th>
    </tr>
    <?php
    // mendapatkan data dari jadual peserta dan lagu
    $sql = mysqli_query($db, "SELECT peserta.nokp, peserta.nama, lagu.tajuklagu FROM peserta INNER JOIN lagu ON peserta.idlagu = lagu.idlagu");
    // semak jika data ada
    if (!$sql || mysqli_num_rows($sql) == 0) {
      echo '<tr><td colspan="4">Peserta belum didaftarkan!!</td></tr>';
    } else {
      $no = 1;
      while ($row = mysqli_fetch_array($sql)) {
        $nokp = $row['nokp'];
        $nama = $row['nama'];
        $lagu = $row['tajuklagu'];
        $idjuri = $_SESSION['idjuri'];

        // semak markah dari jadual markah berdasarkan nokp dan juri yang dipilih
        $query = mysqli_query($db, "SELECT jumlahmarkah FROM markah WHERE nokp = '$nokp' AND idjuri = '$idjuri' ");
        $semak = mysqli_num_rows($query);
        
        // semak jika markah sudah dimasukkan
        if ($semak == 0) {
          echo '<tr>
            <td>'.$no++.'</td>
            <td align="left">'.$nama.'</a></td>
            <td>'.$lagu.'</td>
            <td><a href="markah.php?id='.$nokp.'"><button style="background:orange;"> ISI MARKAH </button></a></td>
          <tr>';
        } else { // jika markah sudah dimasukkan
           echo '<tr>
            <td>'.$no++.'</td>
            <td align="left">'.$nama.'</a></td>
            <td>'.$lagu.'</td>
            <td><a href="senaraijuri.php?q=2&id='.$nokp.'"><button style="background:yellow;"> PAPAR </button></a></td>
        <tr>';
        }
       
      }
    }
  echo '</table>';
}
?>

<!-- Proses memaparkan markah peserta -->
<?php 
// paparan laman KEPUTUSAN PESERTA
if ($_GET['q'] == 2) { 
    // dapatkan data nokp dari laman KEPUTUSAN MARKAH (senaraijuri.php?q=1)
    if (isset($_GET['id'])) {
      $nokp = $_GET['id'];
    }

    $idjuri = $_SESSION['idjuri'];
?>
  <br>
  <center>
    <label><h3><b>KEPUTUSAN PESERTA</b></h3></label>
  </center>
  <br>
  <!-- buat table untuk senarai peserta bersama markahnya -->
  <table border="1" style="width:70%; margin: auto; text-align: center;">
    <tr>
      <th>Bil</th>
      <th>Nama Peserta</th>
      <th>Pitching <br> (120 markah)</th>
      <th>Tempo <br> (90 markah)</th>
      <th>Ton/Mutu Suara <br> (45 markah)</th>
      <th>Gaya Persembahan <br> (30 markah)</th>
      <th>Pakaian <br> (15 markah)</th>
      <th>Jumlah Markah <br> (300 markah)</th>
      <th>Tindakan</th>
    </tr>
    <?php
    // mendapatkan data dari jadual markah dan peserta berdasarkan nokp yang dipilih
    $sql = mysqli_query($db, "SELECT markah.*, peserta.nama FROM markah INNER JOIN peserta ON markah.nokp = peserta.nokp WHERE markah.nokp = '$nokp' AND markah.idjuri = '$idjuri' ");
    // semak jika data ada
    if (!$sql || mysqli_num_rows($sql) == 0) {
      echo '<tr><td colspan="8">Peserta belum didaftarkan!!</td></tr>';
    } else {
      $no = 1;
      while ($row = mysqli_fetch_array($sql)) {
        $nama = $row['nama'];
        $pitching = $row['pitching'];
        $tempo = $row['tempo'];
        $suara = $row['suara'];
        $persembahan = $row['persembahan'];
        $pakaian = $row['pakaian'];
        $jumlah = $row['jumlahmarkah'];
          
        //paparkan data dari jadual markah dan peserta
        echo '<tr>
          <td>'.$no++.'</td>
          <td align="left">'.$nama.'</td>
          <td>'.$pitching.'</td>
          <td>'.$tempo.'</td>
          <td>'.$suara.'</td>
          <td>'.$persembahan.'</td>
          <td>'.$pakaian.'</td>
          <td>'.$jumlah.'</td>
          <td><a href="kemaskini.php?nokp='.$nokp.'"><button> KEMASKINI </button></a></td>
        <tr>';
      }
    }
  echo '</table><br>';
  echo '<center><a href="senaraijuri.php?q=1"><button> KEMBALI </button></a></center>';
}
?>