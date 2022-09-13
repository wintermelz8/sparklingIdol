<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : logmasuk.php -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SPARKLING IDOL</title>
  </head>
  <body>
    <div style="width:50%; margin: 0px auto; text-align:center;">
      <p>SPARKLING IDOL</p>
        <hr>
        <p>URUSETIA</p>
        <hr>
        <!-- BORANG LOG MASUK -->
        <form action="proseslogin.php?q=1" method="post">
          <input type="text" name="username" placeholder="Nama Urusetia">
          <input type="password" name="pwd" placeholder="Katalaluan">
          <br><br>
          <button type="submit" name="login">LOG MASUK</button>
          <br>
          <hr>
          <a href="daftarurusetia.php" type="submit" name="signup">DAFTAR MASUK</a> 
          <br>
          <a href="index.php" type="submit" name="signup">LAMAN UTAMA</a>
        </form>
        <!-- TAMAT BORANG LOG MASUK -->
    </div>
  </body>
</html>
