<?php

$db = mysqli_connect("localhost", "root", "", "webtwo");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$name = mysqli_real_escape_string($db, $_POST['name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$address = mysqli_real_escape_string($db, $_POST['address']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$plasticQty = mysqli_real_escape_string($db, $_POST['plasticQty']);
$metalQty = mysqli_real_escape_string($db, $_POST['metalQty']);
$buildingQty = mysqli_real_escape_string($db, $_POST['buildingQty']);


$query = "INSERT INTO confirmeditems (name, email, address, phone, plasticQty, metalQty, buildingQty) VALUES ('$name', '$email', '$address', '$phone', '$plasticQty', '$metalQty', '$buildingQty')";

if (mysqli_query($db, $query)) {
    echo "Record Inserted Successfully";
} else {
    echo "Failed to Insert Record";
}

mysqli_close($db);
?>
