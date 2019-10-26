<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Org Dash</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body >
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Startup Finder</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">About</a>
        <a class="p-2 text-dark" href="#">Contact</a>
        <form action="student-auth.php" method="post">
        <label for="search">Search: </label>
        <select class="technologies" name="tech">
          <option value="IOT">IOT</option>
          <option value="BLOCKCHAIN">BLockchain</option>
          <option value="AI">AI</option>
          <option value="CLOUD">CLoud</option>
        </select>
        <button type="submit" name="search">Go</button>
    </form>
      </nav>
    </div>
    <div class="org-dash">
      <div class="container align-items-center">
      <form  id=dash action="donorFormphp.php" method="post">
          <h3 class="color-b">Student Dash</h3>
            <h4>Edit</h4>
      <table>
        <tr>
          <td>
            <label><b>Name:</b></label>
          </td>
          <td><input type="text"  name="Name" required autofocus style="border-radius: 5px;"></td>
        </tr>
        <tr>
          <td>
            <label><b>Phone:</b></label>
          </td>
          <td><input type="text"  name="phone" required autofocus style="border-radius: 5px;"></td>
          <br>
        </tr>
        <tr>
          <td>
            <label for=""><b>Email:</b></label>
          </td>
          <td>
            <input type="text"  name="email" required autofocus style="border-radius: 5px;"><br>
          </td>
        </tr>
        <tr>
          <td>
            <label><b>Change password</b></label>
          </td>
          <td><input type="text"  name="newpass" required autofocus style="border-radius: 5px;"></td>
        </tr>
        <tr>
          <td>
          </td>
          <td><button type="submit">submit</button></td>
        </tr>
      </table>
<!--<button>submit</button>-->
    <div><input type="hidden" id="latitude" name="latitude"></div>
    <div><input type="hidden" id="longitude" name="longitude"></div>
    <div id="geometry"></div>


  </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
<?php
 
session_start();

$latitude=" ";
$longitude=" ";

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
$sql = "SELECT * FROM student where email='$username1' and password='$password1'";  
$retval=mysqli_query($conn, $sql);  
  
if(mysqli_query($conn, $sql)){ 
$result=mysqli_fetch_all($retval,MYSQLI_ASSOC);

//echo "you are a authorized user";
foreach ($result as $resu) {
$_SESSION["latitude"]=$resu["latitude"];
$_SESSION["longitude"]=$resu["longitude"];
$_SESSION["name"]=$resu["name"];
}
}


?>