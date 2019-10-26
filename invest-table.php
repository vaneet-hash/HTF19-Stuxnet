<?php
session_start();
$iname=$_SESSION["iemail"];
$cname=$_POST["name"];
$share=$_POST['share'];
$amount=$_POST['budget'];
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'startup';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
  }
  
  $sql2="insert into investtable(iname,cname,share,budget)values('$iname','$cname','$share','$amount')";
  $res=mysqli_query($conn,$sql2);
if($res){  
 
}else{  
echo "Not able to send it: ". mysqli_error($conn);  
}  

?>