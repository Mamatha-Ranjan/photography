<?php
$conn = mysqli_connect("localhost","root","") or die("could not connect to server");
 mysqli_select_db($conn,"photography") or die("could not connect to database");
?>