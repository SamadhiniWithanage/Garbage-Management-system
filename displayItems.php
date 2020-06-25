<?php 
session_start();
include_once("soldItemsFunc.php");
$soldnew=new Sold();


echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>"

?>

<!DOCTYPE html>
<head>
  <title>BDisplay Available Items To the Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<body>

<div class="container-fluid">
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-6 col-lg-4 bg-success">
        <h3 align="center"> Available Amount of Plastic (kg) </h3>
        <h2 align="center"><?php $soldnew->calPlastic(); ?></h2>
      </div>
      
      <div class="col-sm-9 col-md-6 col-lg-4 bg-warning">
        <h3 align="center"> Available Amount of Metal (kg) </h3>
        <h2 align="center"><?php $soldnew->calcMetal();?></h2>  
      </div>

      <div class="col-sm-9 col-md-6 col-lg-4 bg-success">
        <h3 align="center"> Available Amount of Building Waste (kg) </h3>
        <h2 align="center"><?php $soldnew->calcBuilding(); ?></h2>  
      </div>

      

    </div>
  </div>
</div>
    
</body>

</body>
</html>