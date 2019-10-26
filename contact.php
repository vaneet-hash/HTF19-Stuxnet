
<?php
$name=$_POST['name'];
$phno=$_POST['phno'];
$email=$_POST['mail'];
$message=$_POST['message'];
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'startup';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  


	$sql="insert into report(name,email,phno,message) values('$name','$email','$phno','$message')";
	if(mysqli_query($conn, $sql)){  
		 echo " reported Successfully";
		 
		}

	 else{  
			echo "Register Again ". mysqli_error($conn);  
		}  
		mysqli_close($conn);

?>
