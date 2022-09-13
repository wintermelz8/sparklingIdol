<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : headerurusetia.php -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>SPARKLING IDOL</title>
  </head>
  <body>
  <!-- fungsi untuk besarkan saiz tulisan -->
  <div>
    <font size="2"><b>&nbsp; &nbsp; Font :</b></font>
    <button class="w3-button" onclick="resizeText(-1)"><font size="2">A-</font></button>
    <button class="w3-button" onclick="resizeText(1)"><font size="2">A+</font></button>
    <script type="text/javascript">
      function resizeText(multiplier) {
        if (document.body.style.fontSize == "") {
          document.body.style.fontSize = "1.0em";
          }
        document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
      }
    </script>
  </div>
  <!-- fungsi untuk besarkan saiz tulisan tamat -->

  <!-- memasukkan gambar untuk header -->
  <div style="text-align:center;">
    <img width="1200" height="300" src="img/webheader.png" style="display: inline; margin: 0 1px;">
  </div>
  <!-- tamat -->
  
  <!-- menu navigasi -->
  <div style="text-align:center;">
    <a href="senarai.php?q=1">Utama</a> |
    <a href="tambahpeserta.php?q=1">peserta</a> |
    <a href="tambahjuri.php?q=3">juri</a> |
    <a href="senarai.php"?q=2">keputusan keseluruhan</a> | 
	<a href="carianrekod.php">laporan</a> |
	<a href="logkeluar.php">logkeluar</a> |
  </div>
  <!-- menu navigasi tamat -->
  </body>