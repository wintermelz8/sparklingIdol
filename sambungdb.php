<!-- sparkling idol -->
<!-- by : windah limbai -->
<!-- File : sambungdb.php -->

<!-- membuat sambungan akses ke pangkalan data -->
<!-- (host, username, password, dbname) -->
<?php
$db = mysqli_connect("localhost", "root", "", "idol") or die("Error " . mysqli_error($db));
?>