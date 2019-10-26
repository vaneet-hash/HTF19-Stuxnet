<?php
session_start();
echo $_SESSION['name'];
$latitude=$_SESSION['latitude'];
$longitude=$_SESSION['longitude'];
echo $latitude;
echo "</br";
echo $longitude;
?>
