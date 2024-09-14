<?php

$serverName = "localhost";
$userName = "mynepmos_nextAdmin";
$password = "nextAdmin123";
$dbName = "mynepmos_nextsteps";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}
// else {
//     echo "<script>alert('DB connected!!!')</script>";
// }

?>