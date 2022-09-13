<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : proseslogin.php -->

<?php
// fail sambungan ke pangkalan data
include 'sambungdb.php';
// mulakan session
session_start();
?>

<!-- PROSES LOG MASUK URUSETIA -->
<?php
if ($_GET['q'] == 1) {
  // tetapkan pembolehubah bagi data yang dimasukkan di input
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];

  // semak jika nama dan katalaluan ada dalam pangkalan data
  $query = mysqli_query($db, "SELECT * FROM urusetia WHERE urusetia = '$username' AND katalaluan = '$pwd'");
  // semak rekod dalam jadual urusetia
  if ($user = mysqli_fetch_array($query)) {
    // tetapkan nokp kepada $_SESSION['idurusetia']
    $_SESSION['idurusetia'] = $user['idurusetia'];
    // ke laman SENARAI PESERTA
    header("Location: senarai.php?q=1");
  } else {
  // paparan jika gagal log masuk
  echo "<script>alert('Log Masuk Gagal. Sila cuba lagi.')</script>";
   // ke laman logmasuk.php
  header("location:logmasuk.php");
  }
}
// TAMAT PROSES LOG MASUK URUSETIA

// PROSES LOG MASUK JURI
if ($_GET['q'] == 2) {
  // tetapkan pembolehubah bagi data yang dimasukkan di input
  $username = $_POST['username'];
  $pwd = $_POST['pwd'];

  // semak jika nama dan katalaluan ada dalam pangkalan data
  $query = mysqli_query($db, "SELECT * FROM juri WHERE juri = '$username' AND katalaluan = '$pwd'");
  // semak rekod dalam jadual juri
  if ($user = mysqli_fetch_array($query)) {
    // tetapkan nokp kepada $_SESSION['idjuri']
    $_SESSION['idjuri'] = $user['idjuri'];
    // ke laman SENARAI PESERTA
    header("Location: senaraijuri.php?q=1");
  } else {
  // paparan jika gagal log masuk
  echo "<script>alert('Log Masuk Gagal. Sila cuba lagi.')</script>";
   // ke laman loginjuri.php
  header("location:loginjuri.php");
  }
} 
// TAMAT PROSES LOG MASUK JURI
?> 