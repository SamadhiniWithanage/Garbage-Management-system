<?php
require('dbconn.php');
$data = new Databases;
//include("auth.php");
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
	<body>
	<div class="card-body">
		<div class="form-group">
			<h1 ><font color="#272571">View Records</font></h1>
			<br>
			<h4><u>Price for Buyers</u></h4><br>
			<table  border="1" style="double">
				<thead>
					<tr>
						<th width="10%"><strong>PriceId</strong></th>
						<th width="28%"><strong>Polythene or Plastic Price</strong></th>
						<th width="28%"><strong>Metal Price</strong></th>
						<th width="28%"><strong>Building Waste</strong></th>
						<th width="10%"><strong>Edit</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$count=1;
					$sel_query="SELECT * FROM price;";
					$result = mysqli_query($data->con,$sel_query);
					while($row = mysqli_fetch_assoc($result)) { ?>
					<tr><td align="center"><?php echo $count; ?></td>
					<td align="center"><?php echo $row["buyerPolPrice"]; ?></td>
					<td align="center"><?php echo $row["buyerMetPrice"]; ?></td>
					<td align="center"><?php echo $row["buyerBldPrice"]; ?></td>
					<td align="center">
						<a href="price_edit.php?priceId=<?php echo $row["priceId"]; ?>">Edit</a></td>
					</tr>
					<?php $count++; } ?>
				</tbody>
			</table>
			<br>
			<h4><u>Price for Sellers</u></h4><br>
			<table  border="1" style="double">
				<thead>
					<tr>
						<th width="10%"><strong>PriceId</strong></th>
						<th width="28%"><strong>Polythene or Plastic Price</strong></th>
						<th width="28%"><strong>Metal Price</strong></th>
						<th width="28%"><strong>Building Waste</strong></th>
						<th width="10%"><strong>Edit</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$count=1;
					$sel_query="SELECT * FROM price;";
					$result = mysqli_query($data->con,$sel_query);
					while($row = mysqli_fetch_assoc($result)) { ?>
					<tr><td align="center"><?php echo $count; ?></td>
					<td align="center"><?php echo $row["sellerPolPrice"]; ?></td>
					<td align="center"><?php echo $row["sellerMetPrice"]; ?></td>
					<td align="center"><?php echo $row["sellerBldPrice"]; ?></td>
					<td align="center">
						<a href="price_edit2.php?priceId=<?php echo $row["priceId"]; ?>">Edit</a></td>
					</tr>
					<?php $count++; } ?>
				</tbody>
			</table>
		</div>
		</div>
	</body>
</html>