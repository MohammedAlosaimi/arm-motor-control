<?php
//this php file to chech give josn file whiter the arm is on or off
//database access data
$servername = "localhost";
$username = "user";
$password = "XHMO4Ki@p!(lLoX/";
$dbname = "arm_control";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT on_off FROM run WHERE id = 1";

$result = mysqli_query($conn,$sql);

$count = mysqli_num_rows($result);

$v = 0;


while($row = mysqli_fetch_assoc($result)){
    $v = $row['on_off'];
}

echo json_encode($v);

mysqli_close($conn);