<?php

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

$motor = array($_POST["m1"], $_POST["m2"], $_POST["m3"], $_POST["m4"], $_POST["m5"], $_POST["m6"]);

//check if the database have data befor 
$sql = "SELECT * FROM motor_angle WHERE id = 1";
//performe the query
$result = mysqli_query($conn,$sql);
//check the number of rows in the table, if zero, this this the first data insert
$count = mysqli_num_rows($result);


//if database have data before then update. otherwise insert     
if($count == 1) {
    $sql = "UPDATE motor_angle SET motor1='$motor[0]', motor2='$motor[1]', motor3='$motor[2]', motor4='$motor[3]', motor5='$motor[4]', motor6='$motor[5]' WHERE id=1";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Record updated successfully");
        window.location.href="/PHPinVisualStudioCode/arm-motor-control/arm-motor-control/front_end/armMotorControl.html";
        </script>';
    } else {
        echo '<script>alert("Error updating record: '. mysqli_error($conn) . '");
        window.location.href="/PHPinVisualStudioCode/arm-motor-control/arm-motor-control/front_end/armMotorControl.html";
        </script>';
    }
} else{
    $sql = "INSERT INTO motor_angle(motor1, motor2, motor3, motor4, motor5, motor6)VALUES ('$motor[0]','$motor[1]','$motor[2]','$motor[3]','$motor[4]','$motor[5]')";

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Data has been successfully insert into the record");
        window.location.href="/PHPinVisualStudioCode/arm-motor-control/arm-motor-control/front_end/armMotorControl.html";
        </script>';
    } else {
        echo '<script>alert("Invalid login info");
        window.location.href="/PHPinVisualStudioCode/arm-motor-control/arm-motor-control/front_end/armMotorControl.html";
        </script>';
    }
}


mysqli_close($conn);