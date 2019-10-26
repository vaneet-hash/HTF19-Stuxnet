
<?php
session_start();
$latitude=$_SESSION["latitude"];
$longitude=$_SESSION["longitude"];
$name=$_SESSION["name"];
$tech=$_POST["tech"];
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
$sql2="select * from organisation where technology='$tech'";
$res=mysqli_query($conn,$sql2);
if(mysqli_query($conn, $sql2)){  
 //echo "successfully connected to organisation"; 
// echo "<br>" ;
}else{  
echo "Not able to send it: ". mysqli_error($conn);  
}  
$result=mysqli_fetch_all($res,MYSQLI_ASSOC);
//mysqli_close($conn);  
foreach ($result as $resu) {
	$lat1=$latitude/57.3;
	$long1=$longitude/57.3;
	$lat2=$resu['latitude']/57.3;
	$long2=$resu['longitude']/57.3;
	$dlong=$long2-$long1;
	$dlat=$lat2-$lat1;
	$ans=pow(sin($dlat / 2), 2) +cos($lat1) * cos($lat2) * pow(sin($dlong / 2), 2); 
	$ans2=2*asin(sqrt($ans));
	//$ans2=$ans2*6371;
	//$ans2=var_dump(round($ans2,6));
	$ans2= round($ans2,6);
	//echo $ans2;
	//echo "<br>";
	$var=mysqli_real_escape_string($conn,$resu['email']);
$sql3="update organisation set distance=\"{$ans2}\" where email=\"{$var}\"";	
$res1=mysqli_query($conn,$sql3);
echo mysqli_error($conn);
if($res1){  
 //echo "successfully inserted"; 
	//mysqli_close($conn);
}
}
$sql4="select * from organisation order by -distance DESC";
 $result=mysqli_query($conn,$sql4);
 $org = mysqli_fetch_all($result, MYSQLI_ASSOC);
 mysqli_free_result($result);

$sql5="update organisation set distance=0 ";
mysqli_query($conn,$sql5);
mysqli_close($conn); 
  
?>  
<!DOCTYPE html>
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

	<h4 class="center grey-text">startups near me are</h4>

	<div class="container">
		<div class="row">
			
			<?php echo $org[0]['distance']==0;?>

			<?php foreach($org as $or){ ?>
			<?php if($or['distance']!="0"){ ?>
				<div class="col-sm-3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<form action="result1.php" method="POST" style="width: 100%;">
							<input type=text class="card-text" name='name' value="<?php echo $or['name']; ?>" size="70">
							<input type=text class="card-text" name='ph_no' value="<?php echo $or['phno']; ?>" size="70">
							<input type=text  class="card-text"name='email_id' value="<?php echo $or['email']; ?>" size="70">
							<input type=text  class="card-text"name='location' value="<?php echo $or['location']; ?>" size="70">
							<input type=text  class="card-text"name='technology' value="<?php echo $or['technology']; ?>" size="70">
							
							<button type="submit" class="btn btn-primary">contact</button>
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