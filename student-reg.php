<?php
$name=$_POST['name'];
$phno=$_POST['phno'];
$email=$_POST['mail'];
$area=$_POST['address1'];
$latitude1=$_POST['latitude'];
$longitude1=$_POST['longitude'];
$password=$_POST['pass'];
$conn=new mysqli('localhost','root','','startup');
if($conn->connect_error)
{
	die('Connection Failed : '.$conn->connect_error);
}
else
{
	$sql="insert into student(name,email,password,location,latitude,longitude,phno) values('$name','$email','$password','$area','$latitude1','$longitude1','$phno')";
	if(mysqli_query($conn, $sql)){  
		 echo "Success";
		}

	 else{  
			echo "Register Again ". mysqli_error($conn);  
		}  
		mysqli_close($conn);
}
?>
