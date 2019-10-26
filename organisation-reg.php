<?php
$name=$_POST['name'];
$phno=$_POST['phno'];
$email=$_POST['mail'];
$area=$_POST['address1'];
$latitude1=$_POST['latitude'];
$longitude1=$_POST['longitude'];
$web=$_POST['website'];
$password=$_POST['pass'];
$no=$_POST['empno'];
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'startup';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  


	$sql="insert into organisation(name,email,password,location,latitude,longitude,phno,website,empno) values('$name','$email','$password','$area','$latitude1','$longitude1','$phno','$web','$no')";
	if(mysqli_query($conn, $sql)){  
		 echo "Success";
		 header('location:organisation-login.html');
		}

	 else{  
			echo "Register Again ". mysqli_error($conn);  
		}  
		mysqli_close($conn);

?>
