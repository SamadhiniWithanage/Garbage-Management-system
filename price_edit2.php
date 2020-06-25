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
		<title>Update Record</title>
	</head>
	<body>
		<div class="card-body">
			<div class="form">
				<h1>Update Record</h1>
				<?php
				$status = "";
				$sellerPolPrice_error = '';
				$sellerMetPrice_error= '';
				$sellerBldPrice_error= '';
				if(isset($_POST['new']) && $_POST['new']==1)
				{
				$priceId=$_REQUEST['priceId'];
				$sellerPolPrice =$_REQUEST['sellerPolPrice'];
				$sellerMetPrice =$_REQUEST['sellerMetPrice'];
				$sellerBldPrice =$_REQUEST['sellerBldPrice'];
				//$submittedby = $_SESSION["usersellerPolPrice"];


				
				if (isset($_POST["update"])) {
					if (empty($_POST["sellerPolPrice"])) {
					$sellerPolPrice_error = "<p>Place Enter Seller Polethyn Price</p>";
					} else {
						if (!is_numeric($_POST["sellerPolPrice"])) {
						$sellerPolPrice_error = "<p>Letters not allowed</p>";
						}
					}
					if (empty($_POST["sellerMetPrice"])) {
					$sellerMetPrice = "<p>Place Enter Price</p>";
					} else {
						if (!is_numeric($_POST["sellerMetPrice"])) {
						$sellerMetPrice = "<p>Letters not allowed</p>";
						}
					}
					if (empty($_POST["sellerBldPrice"])) {
					$sellerBldPrice = "<p>Place Enter Price</p>";
					} else {
						if (!is_numeric($_POST["sellerBldPrice"])) {
						$sellerBldPrice = "<p>Letters not allowed</p>";
						}
					}
				if ($sellerPolPrice_error == "" && $sellerMetPrice_error == "" && $sellerBldPrice_error== ""  ) {
					$update="UPDATE price SET sellerPolPrice='".$sellerPolPrice."', sellerMetPrice='".$sellerMetPrice."', sellerBldPrice='".$sellerBldPrice."' WHERE priceId='".$priceId."'";
							if(	mysqli_query($data->con, $update)){
						$status = "Record Updated Successfully. </br></br>
						<a href='display_price.php'>View Updated Record</a>";
						echo '<p style="color:#FF0000;">'.$status.'</p>';
					}
				}
else{
echo $sellerPolPrice_error;
echo $sellerMetPrice_error;
echo $sellerBldPrice_error;

?>
<a href="display_price.php">Edit</a>
<?php
}
}
				
				
				// or die(mysqli_error());
				}else {
				?>
				<div>
					<form name="form" method="post">
						<input type="hidden" name="new" value="1" />
						<input name="priceId" type="hidden" value="<?php echo $row['priceId'];?>" />
						<p><input type="text"  name="sellerPolPrice" placeholder="Enter sellerPolPrice" value="<?php echo $row['sellerPolPrice'];?>" />
						<span class="text-danger"><?php echo $sellerPolPrice_error; ?></span>
					</p>
					<p><input type="number" min="1" name="sellerMetPrice" placeholder="Enter sellerMetPrice" value="<?php echo $row['sellerMetPrice'];?>" />
					<span class="text-danger"><?php echo $sellerMetPrice_error; ?></span>
				</p>
				<p><input type="number" min="1" name="sellerBldPrice" placeholder="Enter sellerBldPrice" value="<?php echo $row['sellerBldPrice'];?>" />
				<span class="text-danger"><?php echo $sellerBldPrice_error; ?></span>
			</p>
			<p><input sellerPolPrice="submit" type="submit" value="Update" class="btn btn-primary" name="update"/></p>
		</form>
		<?php } ?>
	</div>
</div>
</div>
</body>
</html>