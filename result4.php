
<?php
$name1=$_POST['name'];
$ph_no1=$_POST['ph_no'];
$email_id1=$_POST['email_id'];
$location=$_POST['location'];
$technology=$_POST['technology'];

?>
<html>
<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	</head>
	<body>
		
		<div class="card" style="width: 18rem;margin-top: 50px;margin-left: 50px;">
			
				<div class="card z-depth-0">
						<div class="card-body">

		<form action="invest-table.php" method="POST">
			<div class="card-title" style="color:green">A personal note to donor </div>
			<div class="card-text"> Name of company</div>
			<input type=text  class="card-text" name="name" value="<?php echo $name1;?>">
			<div class="card-text"> Phone no:</div>
			<input type=text class="card-text" name="ph_no" value="<?php echo $ph_no1;?>">
			<div class="card-text"> Emailid</div>
			<input type=text  class="card-text"name="email_id" value="<?php echo $email_id1;?>" size="30">
			<div class="card-text"> location</div>
			<input type=text  class="card-text"name="location" value="<?php echo $location;?>">
			<div class="card-text"> technology</div>
			<input type=text  class="card-text"name="technology" value="<?php echo $technology;?>">
			<div class="card-text"> amount to invest </div>
			<input type="number" name="budget">
			<br>
			shares<br>
			<input type="text" name="share">
			<br>

			<button type="submit" class="btn btn-primary">send</button>


		</form>
	</div>
</div>
</div>
	</body>
</html>