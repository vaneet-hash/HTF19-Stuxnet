<?php
$name=$_POST['name'];
$phno=$_POST['phno'];
$email=$_POST['mail'];
$password=$_POST['pass'];
$conn=new mysqli('localhost','root','','startup');
if($conn->connect_error)
{
	die('Connection Failed : '.$conn->connect_error);
}
else
{
	$sql="insert into investor(name,email,password,phno) values('$name','$email','$password','$phno')";
	$res=mysqli_query($conn, $sql);
	if($res){  
		 echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
		 header('location:invester-das.html');

		}

	 else{  
			echo "<script type='text/javascript'>alert('failed!')</script>" . mysqli_error($conn);  
					 header('location:invester-reg.html');

		}  
		mysqli_close($conn);
}
?>
