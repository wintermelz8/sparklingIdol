<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : index.php -->

<!-- fail sambungan ke pangkalan data -->
<?php include 'sambungdb.php'; ?>

<!-- sambungan pada header.php ----->
<?php include 'header.php'; ?>

<!-- Proses memaparkan senarai peserta, markah dan ranking untuk lihat kedudukan peserta -->
<br>
<label><h3 style="width:60%; margin: auto;"><b>KEDUDUKAN</b></h3></label>
<br>
<!-- buat table untuk memaparkan senarai peserta, markah dan ranking -->
<table border=1; style="text-align:center; width:60%; margin: auto;">
  <tr>
    <th>Kedudukan</th>
    <th>Nama Peserta</th>
    <th>Tajuk Lagu</th>
    <th>Markah</th>
  </tr>
  <?php
    // mendapatkan data dari gabungan jadual peserta, lagu dan markah
    $sql = mysqli_query($db, "SELECT peserta.nama, peserta.nokp, SUM(markah.jumlahmarkah) as sum, lagu.tajuklagu FROM peserta INNER JOIN markah ON peserta.nokp = markah.nokp INNER JOIN lagu ON peserta.idlagu = lagu.idlagu GROUP BY nokp ORDER BY sum DESC");
    // semak jika data ada
    if (!$sql || mysqli_num_rows($sql) == 0) {
      echo '<tr><td colspan="4">Peserta belum dinilai!</td></tr>';
    } else {
      $rank = 0;
      $markahakhir = false;
      $rows = 0;
      while ($row = mysqli_fetch_array($sql)) {
        $rows++;
        if ($markahakhir != $row['sum'] ) {
          $markahakhir = $row['sum'];
          $rank = $rows;
          $peserta = $row['nama'];
          $tajuklagu = $row['tajuklagu'];
        }
        //paparkan data dari gabungan jadual peserta, lagu dan markah
        echo '<tr>
          <td><b>'.$rank.'</b></td>
          <td align="left">'.$peserta.'</td>
          <td>'.$tajuklagu.'</td>
          <td>'.$markahakhir.'</td>
        <tr>';
      }
    }
?>