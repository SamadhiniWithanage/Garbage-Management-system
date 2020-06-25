<?php 
	
	include_once 'main.php';
	//checking user logged in or not
	$user =new User();
	


/*insert modifications */

$fname_error = '';
$lname_error = '';
$email_error = '';
$nic_error = '';
$password_error = '';
$address_error = '';
$phone_error = '';
$userType_error = '';




/**end of modifications */




	if(isset($_REQUEST['submit'])){

/*new code* */
		if (empty($_POST["fname"])) {
			$fname_error = "<p>Please Enter Name</p>";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/", $_POST["fname"])) {
				$fname_error = "<p>Only Letters and whitespace allowed</p>";
			}
		}


		if (empty($_POST["lname"])) {
			$lname_error = "<p>Please Enter Name</p>";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/", $_POST["lname"])) {
				$lname_error = "<p>Only Letters and whitespace allowed</p>";
			}
		}



		if (empty($_POST["email"])) {
			$email_error = "<p>Please Enter Email</p>";
		} else {
			if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
				$email_error = "<p>Invalid Email formate</p>";
			}
		}

		if (empty($_POST["nic"])) {
			$nic_error = "<p>Please Enter NIC</p>";
		} else {
			if (!preg_match("/^[0-9vV]*$/", $_POST["nic"])) {
				$nic_error = "<p>invalid format</p>";
			}
		}

		if (empty($_POST["password"])) {
			$password_error = "<p>Please Enter Password</p>";
		}

		if (empty($_POST["address"])) {
			$address_error = "<p>Please Enter address</p>";
		}

		if (empty($_POST["phone"])) {
			$phone_error = "<p>Please Enter Phone No</p>";
		} else {
			if (!preg_match("/^[0-9]*$/", $_POST["phone"])) {
				$phone_error = "<p>invalid format</p>";
			}
		}

		if (empty($_POST["usertype"])) {
			$userType_error = "<p>Please select User Type</p>";
		}

		


		if ($fname_error == "" && $email_error == ""&& $lname_error == "" && $nic_error == ""&& $password_error == "" && $address_error == ""&& $phone_error == "" && $userType_error == "") {
			extract($_REQUEST);
			$register =$user->reg_user($fname, $lname, $email, $nic, $password, $address, $phone, $usertype);

			if($register){

				//registration successful	
					echo 'resistration successful';
					header("location:home.php");
				}
		}


/*------------end of new code*/


		//extract($_REQUEST);
		//$register =$user->reg_user($fname, $lname, $email, $nic, $password, $address, $phone, $usertype);

/*		if($register){

		//registration successful	
			echo 'resistration successful';
		} */
		else{
		//ragistration failed
			echo 'registration faild';
		
		}
	}

?>





<!DOCTYPE html>
	<html lang="en">
		<head>
		  <title>registration form </title>
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
		  <h2> Registor </h2>

		  <form action="" method="post" name="reg">
		  
			<br>
		  
			<div class="form-group">
			  <label for="name"> First Name :</label>
			  <input type="text" class="form-control" id="fname" placeholder="Enter your first name here..." name="fname">
			  <span class="text-danger"><?php echo $fname_error; ?></span> 
			</div>
			
			<div class="form-group">
			  <label for="name"> Last Name :</label>
			  <input type="text" class="form-control" id="lname" placeholder="Enter your last name here..." name="lname" >
			  <span class="text-danger"><?php echo $fname_error; ?></span> 
			</div>
		  
			<div class="form-group">
			  <label for="email">Email :</label>
			  <input type="email" class="form-control" id="email" placeholder="Enter your email here..." name="email" >
			  <span class="text-danger"><?php echo $email_error; ?></span>
			</div>
			
			
			<div class="form-group">
			  <label for="email">NIC :</label>
			  <input type="text" class="form-control" id="nic" placeholder="Enter your NIC here..." name="nic" >
			  <span class="text-danger"><?php echo $nic_error; ?></span>
			</div>
			
			
			<div class="form-group">
			  <label for="email">Password :</label>
			  <input type="password" class="form-control" id="password" placeholder="Enter your password here..." name="password" >
			  <span class="text-danger"><?php echo $password_error; ?></span>
			</div>
			
			
			<div class="form-group">
			  <label for="address">Address :</label>
			  <textarea class="form-control" rows="5" id="address" placeholder="Enter your address here..." name="address"></textarea> 
			  <span class="text-danger"><?php echo $address_error; ?></span>
			</div>
			
			
			
			<div class="form-group">
			  <label for="phone">Phone No :</label>
			  <input type="text" class="form-control" id="phone" placeholder="Enter your phone no here..." name="phone">
			  <span class="text-danger"><?php echo $phone_error; ?></span>
			</div>
			
			
		    <div class="form-group">
			  <label for="usertype">Please Select Your User Type :</label><br>
			  	<input type="radio" name="usertype" value="Saller" > Saller<br>
  				<input type="radio" name="usertype" value="Buyer"  > Buyer<br>
				  <span class="text-danger"><?php echo $userType_error; ?></span>
  			</div>	
			

			<div class="float-right">
			<pre class="tab"> <button type="submit" class="btn btn-primary" name="submit" value="Register">Submit</button>  
			</div>

			<div class="float-right">
				<button type="reset" value="Reset" class="btn btn-primary" name="reset">Reset</button> </pre>
			</div>
			
		  </form>
		</div>

		</body>
</html>
