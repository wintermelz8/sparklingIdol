<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : tambahpeserta.php -->

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
<!-- proses untuk menambah lagu peserta --->
<?php
// paparan laman MAKLUMAT LAGU PESERTA
if ($_GET['q'] == 1) { ?>
  <br><br>
  <div style="width:55%; margin: 0px auto;">
    <h2>Tambah Peserta</h2><br>
    <h3>Maklumat Lagu Peserta</h3>
    <!-- BORANG TAMBAH LAGU -->
    <form action="tambahpeserta.php?q=1" method="post" enctype="multipart/form-data">
      <label>Tajuk Lagu</label>
      <input type="text" name="tajuklagu" placeholder="tajuk lagu">
      <br>
      <label>Penyanyi Asal</label>
      <input type="text" name="penyanyi" placeholder="penyanyi asal">
      <br><br>
      <button type="submit" name="tambah">SETERUSNYA</button>
      <hr>
      <a href="importpeserta.php" type="submit">IMPORT PESERTA</a>
    </form>
  <!-- BORANG TAMBAH LAGU TAMAT -->
  </div>

  <!-- PROSES TAMBAH REKOD BARU LAGU -->
  <?php
  // jika butang SETERUSNYA diklik
  if (isset($_POST['tambah'])) {
    $lagu = $_POST['tajuklagu'];
    $penyanyi = $_POST['penyanyi'];
    $idlagu = uniqid();

    // tambah rekod baru ke jadual lagu
    $tambah = mysqli_query($db, "INSERT INTO lagu VALUES ('$idlagu', '$lagu', '$penyanyi')");
    // pengguna di bawa ke laman tambah MAKLUMAT PESERTA
    header('location:tambahpeserta.php?q=2&id='.$idlagu.'');
  }
}
?>

<!-- proses untuk menambah maklumat peserta --->
<?php 
// paparan laman MAKLUMAT PESERTA
if ($_GET['q'] == 2) { 
  if (isset($_GET['id'])) {
    $idlagu = $_GET['id'];
  }?>
  <br><br>
  <div style="width:55%; margin: 0px auto;">
    <h2>Tambah Peserta</h2><br>
    <h3>Maklumat Peserta</h3>
    <!-- BORANG TAMBAH PESERTA -->
    <form action="tambahpeserta.php?q=2" method="post" enctype="multipart/form-data">
      <label>Nama Peserta</label>
      <input type="text" name="nama" placeholder="nama peserta">
      <br>
      <label>No Kad Pengenalan</label>
      <input type="text" name="nokp" placeholder="Contoh : 020202125677">
      <br>
      <label>Jantina</label>
      <select name="jantina">
        <option value="L">Lelaki</option>
        <option value="P">Perempuan</option>
      </select>
      <br>
      <label>Kelas</label>
      <input type="text" name="kelas" placeholder="kelas">
      <br>
      <input type="hidden" name="idlagu" value = "<?php echo $idlagu ?>">
      <button type="submit" name="tambah">SIMPAN</button>
      <hr>
      <a href="importpeserta.php" type="submit">IMPORT PESERTA</a>
    </form>
  <!-- BORANG TAMBAH PESERTA TAMAT -->
  </div>

  <!-- PROSES TAMBAH REKOD BARU PESERTA -->
  <?php
  // jika butang SIMPAN diklik
  if (isset($_POST['tambah'])) {
    $peserta = $_POST['nama'];
    $nokp = $_POST['nokp'];
    $jantina = $_POST['jantina'];
    $kelas = $_POST['kelas'];
    $idurusetia = $_SESSION['idurusetia'];
    $idlagu = $_POST['idlagu'];

    // tambah rekod baru ke jadual peserta
    $tambah = "INSERT INTO peserta VALUES ('$nokp', '$peserta', '$jantina', '$kelas', '$idurusetia', '$idlagu')";

    // semak jika rekod berjaya disimpan
    if (mysqli_query($db, $tambah)) {
      echo "<script>alert('Berjaya disimpan!.');
        window.location = 'senarai.php?q=1'</script>";
    } else {
      echo "<script>alert('Ralat! Sila daftar semula.');</script>";
    }
  }
}
?>
<!-- PROSES TAMAT -->
<!-- </body> tamat -->