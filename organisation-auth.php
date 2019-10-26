<?php  
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'startup';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
//echo 'Connected successfully<br/>';  
$username1=$_POST["email"];
$password1=$_POST["password"]; 
$sql = "SELECT * FROM organisation where email='$username1' and password='$password1'";  
$retval=mysqli_query($conn, $sql);  
 
if(mysqli_num_rows($retval) > 0){  
echo "you are a authorized user";
//listing companies relavent to his technologies.
session_start();
$_SESSION["email"]=$username1;

 header("location:organisation-rolepage.html");
}
else{  
echo "Invalid Details";
}  
mysqli_close($conn);  
?>  