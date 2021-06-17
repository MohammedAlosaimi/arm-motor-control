<?php

//This is a php file for info about the arm.
include_once "config.php";

$arm_info = "";

$query = "SELECT * FROM motor_angle";

if(!($result = mysqli_query($conn, $query))){
        die("could not execut query");
    }

while($row = mysqli_fetch_assoc($result)){
    $arm_info .= "Motor 1: " . $row['motor1'] . "<br>";
    $arm_info .= "Motor 2: " . $row['motor2'] . "<br>";
    $arm_info .= "Motor 3: " . $row['motor3'] . "<br>";
    $arm_info .= "Motor 4: " . $row['motor4'] . "<br>";
    $arm_info .= "Motor 5: " . $row['motor5'] . "<br>";
    $arm_info .= "Motor 6: " . $row['motor6'] . "<br>";
}

$sql = "SELECT on_off FROM run WHERE id = 1";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
mysqli_close($conn);
$v = 0;

while($row = mysqli_fetch_assoc($result)){
    $arm_info .= "Run: " . $row['on_off'];
}

echo $arm_info;