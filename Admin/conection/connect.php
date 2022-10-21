<?php
$dbhandle = mysqli_connect("localhost","root", "") or die("No Connection");
mysqli_select_db($dbhandle, "www_project") or die("No Database connected!");
?>