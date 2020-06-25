<?php

session_start();
include_once 'main.php';
$user =new User();
$uid=$_SESSION['adminId'];

if(!$user->get_session()){
    header("location:admin.php");
}

if (isset($_GET['q'])){
    $user->user_logout();
    header("location:admin.php");
}

?>

<!DOCTYPE html>
<head></head>

<body>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
Home

<div id="container">
<div id="header"><a href="adminHome.php?q=logout">LOGOUT</a></div>
<div id="main-body">
<h1>Hello <?php $user->get_email($uid); ?></h1>
</div>
<div id="footer"></div>
</div>

</body>
</html>