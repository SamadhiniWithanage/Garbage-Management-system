<?php
include_once("soldItemsFunc.php");
$soldnew=new Sold();

$plastic_error = '';
$metal_error = '';
$building_error = '';



if(isset($_POST['submit']))
{
$plastic=$_POST['plastic'];
$metal=$_POST['metal'];
$building=$_POST['building'];



if (empty($_POST["plastic"])) {
	$plastic_error = "<p>Please Enter Quantitty</p>";
} else {
	if (!preg_match("/^[0-9]*$/", $_POST["plastic"])) {
		$plastic_error= "<p>Only numbers can be inserted</p>";
	}
}

if (empty($_POST["metal"])) {
	$metal_error = "<p>Please Enter Quantitty</p>";
} else {
	if (!preg_match("/^[0-9]*$/", $_POST["metal"])) {
		$metal_error = "<p>Only numbers can be inserted</p>";
	}
}

if (empty($_POST["building"])) {
	$building_error = "<p>Please Enter Quantitty</p>";
} else {
	if (!preg_match("/^[0-9]*$/", $_POST["building"])) {
		$building_error = "<p>Only numbers can be inserted</p>";
	}
}


if ($plastic_error == "" && $metal_error == ""&& $building_error == "") {
	$sql=$soldnew->insert($plastic,$metal,$building);
	if($sql)
	{
		echo "<script>alert('Data inserted');</script>";
	}
}
//$sql=$soldnew->insert($plastic,$metal,$building);

else
{
echo "<script>alert('Data not inserted');</script>";
}
}
 ?>



<!DOCTYPE html>
	<html lang="en">
		<head>
		  <title> sold Items </title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


	


		</head>
		<body>


		<div class="container">

		
		  <h2> Enter Sold Items</h2>

		  
			

		  <form action="" method="post" name="sold">

			
			<div class="form-group">
			
			  <label for="polythine">polythine(kg) :</label> 
			
			  <input type="text" class="form-control" id="plastic" placeholder="Quantity" name="plastic">
			  <span class="text-danger"><?php echo $plastic_error; ?></span> 
			
			</div>
			
			<div class="form-group">
			
			  <label for="Metal">Metal (kg) :</label> 
			
			  <input type="text" class="form-control" id="metal" placeholder="Quantity" name="metal">
			  <span class="text-danger"><?php echo $metal_error; ?></span> 
			
			
			</div>
			
			<div class="form-group">
			
			  <label for="building">Building Waste (kg) :</label> 
			
			  <input type="text" class="form-control" id="building" placeholder="Quantity" name="building">
			  <span class="text-danger"><?php echo $building_error; ?></span> 
			
			
			</div>
			
			<div class="form-group">
			
			<div class="float-right">
			<button type="submit" class="btn btn-primary" name="submit" value="Login">submit</button>  
			
			</div>
			
			  
			
			
			</div>
			
		  </form>
		</div>

		</body>
</html>