<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bootstrap";

$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysqli_select_db($bd, $mysql_database) or die("Opps some thing went wrong");
?>