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