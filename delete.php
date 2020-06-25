<?php

require_once 'config.php';
require_once 'db.php';

$db = mysqli_connect("localhost", "root", "", "webtwo");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$id = $_GET['id'];
deleteRecord($db, $id);

