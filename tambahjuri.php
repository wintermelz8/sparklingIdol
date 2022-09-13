<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : tambahjuri.php -->

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

<!-- sambungan pada headerurusetia.php ----->
<?php include 'headerurusetia.php'; ?>

<!-- <body> / isi kandungan -->
<!-- proses untuk menambah juri -->
<!-- paparan laman MAKLUMAT JURI -->
<br><br>
<div style="width:55%; margin: 0px auto;">
  <h2>Tambah Juri</h2><br>
  <h3>Maklumat Juri</h3><br>

  <!-- ke laman paparan SENARAI JURI -->
  <a href="senarai.php?q=3"><button> SENARAI JURI </button></a><br><br>

  <!-- BORANG TAMBAH JURI-->
  <form action="" method="post" enctype="multipart/form-data">
    <label>Nama Juri : </label>
    <input type="text" name="nama" placeholder="nama juri">
    <br>
    <label>Katalaluan Juri : </label>
    <input type="text" name="katalaluan" placeholder="katalaluan">
    <br><br>
    <button type="submit" name="tambah">SIMPAN</button>
    <hr>
  </form>
  <!-- BORANG TAMBAH JURI TAMAT -->
  </div>

  <!-- PROSES TAMBAH REKOD BARU JURI -->
  <?php
  // jika butang SIMPAN diklik
  if (isset($_POST['tambah'])) {
    $juri = $_POST['nama'];
    $pwd = $_POST['katalaluan'];
    $idurusetia = $_SESSION['idurusetia'];

    // tambah rekod baru ke jadual juri
    $tambah = "INSERT INTO juri VALUES ('', '$juri', '$pwd', '$idurusetia')";
    // semak jika rekod berjaya disimpan
    if (mysqli_query($db, $tambah)) {
      echo "<script>alert('Berjaya disimpan!.');
        window.location = 'senarai.php?q=3'</script>";
    } else {
      echo "<script>alert('Ralat! Sila daftar semula.');</script>";
    }

  }
?>

<!-- PROSES TAMAT -->
<!-- </body> tamat -->