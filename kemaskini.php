<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : kemaskini.php -->

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
// dapatkan data nokp dari KEPUTUSAN KESELURUHAN (senaraijuri.php?q=2)
if (isset($_GET['nokp'])) {
  $nokp = $_GET['nokp'];
  $idjuri = $_SESSION['idjuri'];

  // semak dan dapatkan data nama dan senarai markah dari jadual peserta dan markah berdasarkan nokp
  $semak = mysqli_query($db, "SELECT peserta.nama, markah.* FROM peserta INNER JOIN markah ON peserta.nokp = markah.nokp WHERE peserta.nokp = '$nokp' AND markah.idjuri = '$idjuri' ");
  $run = mysqli_fetch_array($semak);
}
?>

<!-- <body> / isi kandungan -->
<br><br>
<div style="width:60%; margin: 0px auto;">
  <h2>Kemaskini Markah Penilaian Peserta</h2>
  <br><b>Nama Peserta : <?php echo $run['nama'] ?></b><br><br>
  <!-- BORANG KEMASKINI MARKAH PENILAIAN -->
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
      <input type="hidden" name="upid" value="<?php echo $run['id'] ?>">
      <td><input type="number" name="uppitching" value="<?php echo $run['pitching'] ?>" max="120" min="0"></td>
      <td><input type="number" name="uptempo" value="<?php echo $run['tempo'] ?>" max="90" min="0"></td>
      <td><input type="number" name="upsuara" value="<?php echo $run['suara'] ?>" max="45" min="0"></td>
      <td><input type="number" name="uppersembahan" value="<?php echo $run['persembahan'] ?>" max="30" min="0"></td>
      <td><input type="number" name="uppakaian" value="<?php echo $run['pakaian'] ?>" max="15" min="0"></td>
    </tr>
    </table>
    <br>
    <button type="submit" name="kemaskini"> SIMPAN </button>
    <hr>
  </form>
  <!-- BORANG KEMASKINI MARKAH AKHIR TAMAT -->
</div>

<!-- PROSES KEMASKINI REKOD MARKAH -->
<?php
// jika butang SIMPAN diklik
if (isset($_POST['kemaskini'])) {
  $upid = $_POST['upid'];
  $uppitching = $_POST['uppitching'];
  $uptempo = $_POST['uptempo'];
  $upsuara = $_POST['upsuara'];
  $uppersembahan = $_POST['uppersembahan'];
  $uppakaian = $_POST['uppakaian'];
  $uptotal = $uppitching + $uptempo + $upsuara + $uppersembahan + $uppakaian;

  // kemaskini rekod dalam jadual markah
  $query = mysqli_query($db, "UPDATE markah SET pitching = '$uppitching', tempo = '$uptempo', suara = '$upsuara', persembahan = '$uppersembahan', pakaian = '$uppakaian', jumlahmarkah = '$uptotal' WHERE id = '$upid' ");
  // bila markah dikemaskini
  echo "<script>alert('Markah akhir telah dikemaskini.')
          window.location = 'senaraijuri.php?q=1'</script>";
}
?>
<!-- PROSES TAMAT -->
<!-- </body> tamat -->