<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : header.php -->

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
    <a href="index.php">Utama</a> |
    <a href="peserta.php">Peserta</a> |
    <a href="logmasuk.php">Urusetia</a> |
    <a href="loginjuri.php">Juri</a> 
  </div>
  <!-- menu navigasi tamat -->
  </body>