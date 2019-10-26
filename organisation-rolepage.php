<?php
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'startup'; 
$role=$_POST["role"];
$sal=$_POST['salary'];
$tech=$_POST['techno']; 
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
session_start();
$email=$_SESSION["email"];
$sql="update organisation set role=\"{$role}\",salary=\"{$sal}\",technology=\"{$tech}\" where email=\"$email\"";
$retval=mysqli_query($conn, $sql); 
if(!$retval){echo"error";}   else{echo"<h2>compamy is register successful...! </h2>";}

mysqli_close($conn);
?>

<!--$sql1="select * from organisation where email='$email'";
$result=mysqli_query($conn,$sql1);
$resu=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($resu as $res) {
$name=$res['name'];
$email=$res['email'];
$password=$res['password'];
$location=$res['location'];
$latitude=$res['latitude'];
$longitude=$res['longitude'];
$phno=$res['phno'];
$web=$res['website'];
$sql3="insert into organisation name,email,password,location,latitude,longitude,phno,website,role,salary,technology values('$name','$email','$password','$location','$latitude','$longitude','$phno','$web','$role','$sal','$tech')";
$retval=mysqli_query($conn, $sql3);  
}
mysqli_close($conn);
?>
*/-->