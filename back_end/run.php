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

$runvalue = $_POST["run-value"];

//check if the database have data befor 
$sql = "SELECT * FROM run WHERE id = 1";
//performe the query
$result = mysqli_query($conn,$sql);
//check the number of rows in the table, if zero, this this the first data insert
$count = mysqli_num_rows($result);


//if database have data before then update. otherwise insert     
if($count == 1) {
    $sql = "UPDATE run SET on_off='$runvalue' WHERE id=1";

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
    $sql = "INSERT INTO run(on_off) VALUES ('$runvalue')";

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