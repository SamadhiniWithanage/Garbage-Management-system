<?php


session_start();
include_once 'main.php';
$user =new User();
$uid=$_SESSION['userId'];

if(!$user->get_session()){
    header("location:home.php");
}

if (isset($_GET['q'])){
    $user->user_logout();
    header("location:home.php");
}

include 'dbconn.php';

$soldnew=new Sold();

$data = new Databases;
$success_message = '';
if(isset($_POST["submit"]))
{
$insert_data = array(
'PolQty'     => mysqli_real_escape_string($data->con, $_POST['PolQty']),
'MetalQty'    => mysqli_real_escape_string($data->con, $_POST['MetalQty']),
'BuildQty'  => mysqli_real_escape_string($data->con, $_POST['BuildQty'])
);
if($data->insert('buyitem', $insert_data))
{
$success_message = 'Record Added Successfuly';
}
}
?>
<?php
if (isset($success_message)){ echo $success_message;}
?>
<!DOCTYPE html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>PHP CRUD in Bootstrap 4 with search functionality</title>
		
		<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131906273-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-131906273-1');
		</script>
	</head>
	<body>
		
		<div class="container">
			<div class="card">
				<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Give Your Oder</strong>

				<a href="sellerHome.php?q=logout" class="float-right btn btn-dark btn-sm">LOGOUT</a></a>
				<a href="home.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Home</a>

				<a href="" class="float-right btn btn-dark btn-sm">Hello <?php $user->get_firstname($uid); ?></a>
				</div>
				<div class="card-body">
					<div class="col-sm-6">
						<h5 class="card-title">Fields with <span class="text-danger"></span> are mandatory!</h5>
						<form method="post" >
							<div class="form-group">
								<label>Polythene and Plastic <span class="text-danger"></span></label>
								<br>
								<label>Available :<?php $soldnew->calPlastic(); ?> <span class="text-danger"></span></label>

								
								
								<input type="number" min="0" name="PolQty" id="PolQty" class="form-control" placeholder="Enter Quantity (kg)">
							</div>
							<div class="form-group">
								<label>Metal <span class="text-danger"></span></label>
								<br>
								<label>Available : <?php $soldnew->calcMetal(); ?><span class="text-danger"></span></label>
								<input type="number" min="0"  name="MetalQty" idMetalQty class="form-control" placeholder="Enter Quantity (kg)">
							</div>
							<div class="form-group">
								<label>Building Wast <span class="text-danger"></span></label>
								<br>
								<label>Available :<?php $soldnew->calcBuilding(); ?> <span class="text-danger"></span></label>
								<input type="number" min="0" name="BuildQty" id="BuildQty" class="form-control" placeholder="Enter Quantity (kg)">
							</div>
							
							<div class="form-group">
								<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"> Add Order</button>
								<button type="reset" name="reset" value="reset" id="reset" class="btn btn-primary"> Clear</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>