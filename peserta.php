<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : peserta.php -->

<!-- fail sambungan ke pangkalan data ----->
<?php include 'sambungdb.php'; ?>
<!-- sambungan pada header.php ----->
<?php include 'header.php'; ?>

<!-- Proses memaparkan senarai peserta dan lagunya-->
<label><h3 style="text-align: center;"><b>Senarai Peserta</b></h3></label>
<br>
<!-- buat table untuk memaparkan senarai peserta dan lagunya -->
<table border=1; style="text-align:center; width:70%; margin: auto;">
  <tr>
    <th>Bil</th>
    <th>Nama Peserta</th>
    <th>Jantina</th>
    <th>Kelas</th>
    <th>Tajuk Lagu</th>
    <th>Penyanyi Asal</th>
  </tr>
  <?php
  // mendapatkan data dari gabungan jadual peserta dan lagu
  $sql = mysqli_query($db, "SELECT peserta.*, lagu.* FROM peserta INNER JOIN lagu ON peserta.idlagu = lagu.idlagu");
  // semak jika data ada
  if (mysqli_num_rows($sql) == 0) {
    echo '<tr><td colspan="6">Peserta belum didaftarkan!</td></tr>';
  } else {
    $no = 1;
    while ($row = mysqli_fetch_array($sql)) {
      $peserta = $row['nama'];
      $jantina = $row['jantina'];
      $kelas = $row['kelas'];
      $tajuklagu = $row['tajuklagu'];
      $penyanyi = $row['penyanyiasal'];
          
      //paparkan data dari gabungan jadual peserta dan lagu
      echo '<tr>
        <td>'.$no++.'</td>
        <td align="left">'.$peserta.'</td>
        <td>'.$jantina.'</td>
        <td>'.$kelas.'</td>
        <td>'.$tajuklagu.'</td>
        <td>'.$penyanyi.'</td>
      <tr>';
    }
  }
?>