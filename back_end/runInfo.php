<?php

//this php file to chech give josn file whiter the arm is on or off

include_once "config.php";

$sql = "SELECT on_off FROM run WHERE id = 1";

$result = mysqli_query($conn,$sql);

$count = mysqli_num_rows($result);

$v = 0;


while($row = mysqli_fetch_assoc($result)){
    $v = $row['on_off'];
}

echo json_encode($v);

mysqli_close($conn);