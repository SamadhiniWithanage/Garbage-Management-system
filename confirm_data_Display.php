<?php

session_start();
include_once 'main.php';
$user =new User();
//$uid=$_SESSION['userId'];

if(!$user->get_session()){
    header("location:home.php");
}

if (isset($_GET['q'])){
    $user->user_logout();
    header("location:home.php");
}


 include 'database.php';  
 $data = new Databases; 
 

 $success_message = '';  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Confirm Data Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>







<div class="container text-center">
  <h2>Display Confirm Data Details</h2>
</div>
 <div class="container ">        
  <table class="table table-striped">
    <thead>
      <tr>
        <th >Name</th>
        <th >email</th>
        <th >address</th>
        <th >phone</th>
        <th >plasticQty</th>
        <th >metalQty</th>
        <th>buildingQty</th>
        
        
      </tr>
    </thead>
    <tbody>
        <tr> 
        <?php  
            $post_data = $data->display_confirm('confirmeditems');  
            foreach($post_data as $post)  
            {  
        ?>  
             
                <td><?php echo $post["name"]; ?></td>  
                <td><?php echo $post["email"]; ?></td>  
                <td><?php echo $post["address"]; ?></td>
                <td><?php echo $post["phone"]; ?></td>
                <td><?php echo $post["plasticQty"]; ?></td>
                <td><?php echo $post["metalQty"]; ?></td>
                <td><?php echo $post["buildingQty"]; ?></td>
                <tr><?php echo "<br>"; ?></tr> 
             
             
        <?php  
            }  
        ?> 
       </tr> 
    </tbody>
  </table>
</div>

</body>
</html>


