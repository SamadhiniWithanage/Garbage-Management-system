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
  <title>Display Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>







<div class="container text-center">
  <h2>Display Contact Us Details</h2>
</div>
 <div class="container ">        
  <table class="table table-striped">
    <thead>
      <tr>
        <th >Name</th>
        <th>Email</th>
        <th>Message</th>
        
      </tr>
    </thead>
    <tbody>
        <tr> 
        <?php  
            $post_data = $data->display('contact_us');  
            foreach($post_data as $post)  
            {  
        ?>  
             
                <td><?php echo $post["cus_name"]; ?></td>  
                <td><?php echo $post["email"]; ?></td>  
                <td><?php echo $post["message"]; ?></td>
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


