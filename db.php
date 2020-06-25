<?php

function connect($dbHost, $dbName, $dbUsername, $dbPassword) {
    $db = new mysqli(
            $dbHost, $dbUsername, $dbPassword, $dbName
    );

    if ($db->connect_error) {
        die("Cannot Connect to database: \n"
                . $db->connect_error . "\n"
                . $db->connect_errno
        );
    }
    return $db;
}

function deleteRecord(mysqli $db, $id) {
    $sql = "DELETE FROM confirmeditems WHERE id = $id";
    $result = $db->query($sql);

    if (mysqli_query($db, $sql)) {
        echo "Record Deleted successfully";
    } else {
        echo "failed to Delete Record";
    }
}

/*
function insertRecord(mysqli $db, $id) {

    $sql1 = "SELECT name, email, address, phone, polytheneQty, metalQty, buildingWasteQty FROM userinput WHERE id = $id";
    echo $sql1;    
$result1 = $db->query($sql1);
     
    
    $result1 = "INSERT INTO confirmeditems (name, email, address, phone, polytheneQty, metalQty, buildingWasteQty) VALUES ('$name', '$email', '$address', '$phone', '$polytheneQty', '$metalQty', '$buildingWasteQty') WHERE id = $id";
    $result2 = $db->query($result1);

    if (mysqli_query($db, $result2)) {
        echo "Record Inserted successfully";
    } else {
        echo "failed to Insert Record";
    }
     
}
*/

/*
function fetchAll(mysqli $db){
    $data = [];
    
    $sql3 = "SELECT * FROM userinput";
    
    $results3 = $db->query($sql3);
    
    if($results3->num_rows >0){
        while ($row = $results3->fetch_assoc()){
            $data[] = $row;
        }
    }
    return $data;
}
 * 
 */
