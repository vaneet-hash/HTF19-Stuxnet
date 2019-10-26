<?php
session_start();
$name=$_SESSION["name"];

//echo $resu['latitude'];
//echo $resu['name'];
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'startup';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
  }
  $sql4="select * from organisation";
 $result=mysqli_query($conn,$sql4);
 $org = mysqli_fetch_all($result, MYSQLI_ASSOC);
 mysqli_free_result($result);
mysqli_close($conn); 
?>  

<html>
<head> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
</head>
	
	<body >
		<div></div>
		<!--<script src="particles.js"></script>-->
		 <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

	<h4 class="center grey-text">startups</h4>

	<div class="container">
		<div class="row">
			
			<?php foreach($org as $or){ ?>
			<?php if($or['distance']=="0"){ ?>
				<div class="col-sm-3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<form action="result4.php" method="POST" style="width: 100%;">
							<input type=text class="card-text" name='name' value="<?php echo $or['name']; ?>" size="70">
							<input type=text class="card-text" name='ph_no' value="<?php echo $or['phno']; ?>" size="70">
							<input type=text  class="card-text"name='email_id' value="<?php echo $or['email']; ?>" size="70">
							<input type=text  class="card-text"name='location' value="<?php echo $or['location']; ?>" size="70">
							<input type=text  class="card-text"name='technology' value="<?php echo $or['technology']; ?>" size="70">
							
							
							<button type="submit" class="btn btn-primary">invest</button>
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
				
			<?php } ?>

		</div>
	</div>
</body>
</html>