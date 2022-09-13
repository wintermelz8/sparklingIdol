<!--sparkling idol-->
<!--by: windah limbai-->
<!--file: importpeserta.php-->

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
<!-- USER INTERFACE -->
<br>
<hr>
<!-- BORANG MENGIMPORT FAIL CSV -->
<label><h3><b>Import Maklumat Peserta</b></h3></label>
<form action="importpeserta.php" method="post" enctype="multipart/form-data">
  <label><h4><b>Pilih Fail CSV</b></h4></label>
  <input type="file" name="fail">
  <br>
  <button type="submit" name="import">IMPORT</button>
  <hr>
</form>
<!-- TAMAT BORANG -->
<!-- USER INTERFACE TAMAT -->

<!-- PROSES MENAMBAH REKOD DARI FAIL CSV KE JADUAL DALAM PANGKALAN DATA -->
<?php
// jika butang import diklik
if(isset($_POST['import'])) {
  if($_FILES['fail']['name']) {
    $filename = explode(".", $_FILES['fail']['name']);
    // semak jika fail csv
    if($filename[1] == 'csv') {
      $handle = fopen($_FILES['fail']['tmp_name'], "r");
      fgetcsv($handle);
      while($data = fgetcsv($handle)) {
        // tambah rekod ke jadual lagu
        $insert = mysqli_query($db, "INSERT INTO lagu VALUES ('$data[0]','$data[1]','$data[2]')");

        // tambah rekod ke jadual peserta
        $tambah = mysqli_query($db, "INSERT INTO peserta VALUES ('$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')");
      }
      fclose($handle);
      // mesej pop-up jika rekod berjaya masuk jadual
      echo "<script>alert('Maklumat peserta berjaya direkodkan.');</script>";
    }
  }
}
?>
<!-- PROSES TAMAT -->
<!-- </body> tamat -->