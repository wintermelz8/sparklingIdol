<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File  : loginjuri.php -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>SPARKLING IDOL</title>
  </head>
  <body>
    <div style="width:50%; margin: 0px auto; text-align:center;">
      <p>SPARKLING IDOL</p>
        <hr>
        <p>JURI</p>
        <hr>
        <!-- BORANG LOG MASUK -->
        <form action="proseslogin.php?q=2" method="post">
          <input type="text" name="username" placeholder="Nama juri">
          <input type="password" name="pwd" placeholder="Katalaluan">
          <br><br>
          <button type="submit" name="login">LOG MASUK</button>
          <br>
          <br>
          <a href="index.php" type="submit" name="signup">LAMAN UTAMA</a>
        </form>
        <!-- TAMAT BORANG LOG MASUK -->
    </div>
  </body>
</html>
