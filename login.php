<?php 
session_start();
include_once 'main.php';
$user =new User();

if(isset($_REQUEST['submit'])){
    extract($_REQUEST);
	$login = $user->login($email, $password);
	
  if($login){

        //login success
        //header("location:sellerHome.php");
    }    
    else{
        //login is failed
        //echo 'Wrong user name or password';
    }
}
?>


<!DOCTYPE html>
	<html lang="en">
		<head>
		  <title> login page </title>
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

            
	


		</head>
		<body>


		<div class="container">

		<br>
		  <h2> Login page </h2>

		  <form action="" method="post" name="login">
		  
			<br>
		  

			<div class="form-group">
			  <label for="email">Email :</label>
			  <input type="email" class="form-control" id="email" placeholder="Enter Email Address" name="email" required>
			</div>
			
			
			<div class="form-group">
			  <label for="email">Password :</label>
			  <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
			</div>
			
			

			<div class="float-right">
		     <button type="submit" class="btn btn-primary" name="submit" value="Login">login</button>  
			</div>

		  </form>
		</div>

		</body>
</html>
