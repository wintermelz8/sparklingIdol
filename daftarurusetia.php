<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : daftarurusetia.php -->

<?php
// fail sambungan ke pangkalan data
include 'sambungdb.php';

// tetapkan error = false
$error = false;

if (isset($_POST['daftar'])) {
  //dapatkan data daripada input dan tetapkan pemboleh ubah
  $urusetia = $_POST['urusetia'];
  $pwd = $_POST['pwd'];

  //jika masukkan nama mempunyai nombor atau simbol
  if (!preg_match("/^[a-zA-Z ]+$/",$urusetia)) {
    $error = true;
    $urusetia_error = "Nama mesti mengandungi huruf dan ruang (space)";
  }

  // jika masukkan kata laluan kurang daripada 6 aksara
  if(strlen($pwd) < 6) {
    $error = true;
    $pwd_error = "Kata Laluan minimum 6 aksara";
  }

  // jika masukkan kata laluan lebih daripada 12 aksara
  if(strlen($pwd) > 12) {
    $error = true;
    $pwd_error = "Katalaluan maksimum 12 aksara";
  }

  // tambah rekod baru ke jadual urusetia
  if (!$error) {
    if (mysqli_query($db, "INSERT INTO urusetia VALUES ('', '$urusetia', '$pwd')")) {
      // paparan jika berjaya ditambah ke jadual urusetia
      echo "<script>alert('Berjaya didaftarkan! Sila log masuk.');</script>";
    } else {
      // paparan jika tidak berjaya ditambah ke jadual urusetia
      echo "<script>alert('Ralat! Sila daftar semula.');</script>";
    }
  }
}
?>

<!-- USER INTERFACE -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>SPARKLING IDOL</title>
  </head>
  <body>
    <div style="width:55%; margin: 0px auto;">
      <p>DAFTAR URUSETIA</p>
      <hr>
      <!-- BORANG PENDAFTARAN URUSETIA -->
      <form action="daftarurusetia.php" method="post">
        <input type="text" name="urusetia" required placeholder="Nama Urusetia" value="<?php if($error) echo $urusetia; ?>">
        <span style="color:red"><?php if (isset($urusetia_error)) echo $urusetia_error; ?></span>

        <input type="password" name="pwd" required placeholder="Katalaluan" value="<?php if($error) echo $pwd; ?>">
        <span style="color:red"><?php if (isset($pwd_error)) echo $pwd_error; ?></span>

        <br>
        <button type="submit" name="daftar">DAFTAR</button>
        <hr>
        <a href="logmasuk.php">LOG MASUK</a>
      </form>
          <!-- TAMAT BORANG PENDAFTARAN -->
    </div>
  </body>
</html>
