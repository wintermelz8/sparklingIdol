<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : markah.php -->

<?php
// fail sambungan ke pangkalan data
include 'sambungdb.php';
// mulakan session
session_start();

// sekatan pengguna - semak jika pengguna sudah mendaftar masuk
if(!isset($_SESSION['idjuri'])) {
  //ke laman logmasuk.php untuk log masuk
  header('location:loginjuri.php');
}
?>

<!-- sambungan pada headerurusetia.php ----->
<?php include 'headerjuri.php'; ?>

<?php
// dapatkan nokp dari laman KEPUTUSAN MARKAH (senaraijuri.php?q=1)
if (isset($_GET['id'])) {
  $nokp = $_GET['id'];
}
?>

<?php
// semak dan dapatkan data nama dari jadual peserta berdasarkan nokp
$sql = mysqli_query($db, "SELECT nama FROM peserta WHERE nokp = '$nokp' ");
$query = mysqli_fetch_array($sql);
?>
<!-- <body> / isi kandungan -->
<br><br>
<div style="width:70%; margin: 0px auto;">
  <h2>Penilaian Pertandingan Nyanyian</h2>
  <br><b>Nama Peserta : <?php echo $query['nama'] ?></b><br><br>
  <!-- BORANG MARKAH AKHIR -->
  <form action="" method="post" enctype="multipart/form-data">
    <table border=1; style="text-align:center; width:70%; margin: auto;">
    <tr>
      <th>Pitching <br> (120 markah)</th>
      <th>Tempo <br> (90 markah)</th>
      <th>Ton/Mutu Suara <br> (45 markah)</th>
      <th>Gaya Persembahan <br> (30 markah)</th>
      <th>Pakaian <br> (15 markah)</th>
    </tr>
    <tr>
      <td><input type="number" name="pitching" max="120" min="0"></td>
      <td><input type="number" name="tempo" max="90" min="0"></td>
      <td><input type="number" name="suara" max="45" min="0"></td>
      <td><input type="number" name="persembahan" max="30" min="0"></td>
      <td><input type="number" name="pakaian" max="15" min="0"></td>
    </tr>
    </table>
    <br>
    <button type="submit" name="markah">SIMPAN</button>
    <hr>
  </form>
  <!-- BORANG MARKAH AKHIR TAMAT -->
</div>

<!-- PROSES TAMBAH REKOD BARU MARKAH -->
<?php
// jika butang SIMPAN diklik
if (isset($_POST['markah'])) {
  $idjuri = $_SESSION['idjuri'];
  $pitching = $_POST['pitching'];
  $tempo = $_POST['tempo'];
  $suara = $_POST['suara'];
  $persembahan = $_POST['persembahan'];
  $pakaian = $_POST['pakaian'];
  $total = $pitching + $tempo + $suara + $persembahan + $pakaian;

  // tambah rekod baru ke jadual markah
  $query = mysqli_query($db, "INSERT INTO markah VALUES ('', '$idjuri', '$nokp', '$pitching', '$tempo', '$suara', '$persembahan', '$pakaian', '$total') ");
  // apabila data telah dimasukkan ke dalam jadual
  echo "<script>alert('Berjaya didaftarkan!');</script>";
  // terus ke paparan keputusan peserta
  header('location:senaraijuri.php?q=2&id='.$nokp.'');
}
?>
<!-- PROSES TAMAT -->
<!-- </body> tamat -->