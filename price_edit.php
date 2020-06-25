<?php
require('dbconn.php');
$data = new Databases;
$priceId=$_GET['priceId'];
$query = " SELECT * FROM price where priceId='".$priceId."' " ;
$result = mysqli_query($data->con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>PHP CRUD in Bootstrap 4 with search functionality</title>
		
		<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<title>View Records</title>
	</head>
	<title>Update Record</title>
</head>
<body>
	<div class="card-body">
		<div class="form">
			<h1>Update Record</h1>
			<?php
			$status = "";
			$buyerPolPrice_error = '';
				$buyerMetPrice_error= '';
				$buyerBldPrice_error= '';
			if(isset($_POST['new']) && $_POST['new']==1)
			{
			$priceId=$_REQUEST['priceId'];
			$buyerPolPrice =$_REQUEST['buyerPolPrice'];
			$buyerMetPrice =$_REQUEST['buyerMetPrice'];
			$buyerBldPrice =$_REQUEST['buyerBldPrice'];
			//$submittedby = $_SESSION["userbuyerPolPrice"];
			if (isset($_POST["update"])) {
					if (empty($_POST["buyerPolPrice"])) {
					$buyerPolPrice_error = "<p>Place Enter buyer Polethyn Price</p>";
					} else {
						if (!is_numeric($_POST["buyerPolPrice"])) {
						$buyerPolPrice_error = "<p>Letters not allowed</p>";
						}
					}
					if (empty($_POST["buyerMetPrice"])) {
					$buyerMetPrice = "<p>Place Enter Price</p>";
					} else {
						if (!is_numeric($_POST["buyerMetPrice"])) {
						$buyerMetPrice = "<p>Letters not allowed</p>";
						}
					}
					if (empty($_POST["buyerBldPrice"])) {
					$buyerBldPrice = "<p>Place Enter Price</p>";
					} else {
						if (!is_numeric($_POST["buyerBldPrice"])) {
						$buyerBldPrice = "<p>Letters not allowed</p>";
						}
					}
				if ($buyerPolPrice_error == "" && $buyerMetPrice_error == "" && $buyerBldPrice_error== ""  ) {
					$update="UPDATE price SET buyerPolPrice='".$buyerPolPrice."', buyerMetPrice='".$buyerMetPrice."', buyerBldPrice='".$buyerBldPrice."' WHERE priceId='".$priceId."'";
			if(mysqli_query($data->con, $update) ){
			$status = "Record Updated Successfully. </br></br>
			<a href='display_price.php'>View Updated Record</a>";
			echo '<p style="color:#FF0000;">'.$status.'</p>';
			}
			}
			else{
					echo $buyerPolPrice_error;
					echo $buyerMetPrice_error;
					echo $buyerBldPrice_error;
					
			?>
			<a href="display_price.php">Edit</a>
			<?php
			}
			}
			
			}else {
			?>
			<div>
				<form name="form" method="post">
					<input type="hidden" name="new" value="1" />
					<input name="priceId" type="hidden" value="<?php echo $row['priceId'];?>" />
					<p><input type="number" min="1" name="buyerPolPrice" placeholder="Enter buyerPolPrice" value="<?php echo $row['buyerPolPrice'];?>" /></p>
					<p><input type="number" min="1" name="buyerMetPrice" placeholder="Enter buyerMetPrice" value="<?php echo $row['buyerMetPrice'];?>" /></p>
					<p><input type="number" min="1" name="buyerBldPrice" placeholder="Enter buyerBldPrice" value="<?php echo $row['buyerBldPrice'];?>" /></p>
					<p><input buyerPolPrice="submit" type="submit" value="Update" class="btn btn-primary" name="update" /></p>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>