<?php

require_once 'config.php';
require_once 'db.php';

$conn = mysqli_connect("localhost", "root", "", "webtwo");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM userinput";

$result = $conn->query($query);




