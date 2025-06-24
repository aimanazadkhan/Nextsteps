<?php
session_start();
include "../connection.php";


$adminMsg = base64_encode($_POST['adminMsg']);
$appId = $_POST['appId'];
$adminId = $_POST['adminId'];

$query = "INSERT INTO `messages` (`adminMsg`, `appId`, `adminID`) VALUES ('$adminMsg', '$appId', '$adminId')";
if (mysqli_query($conn, $query)) {
    header("Location: manAppInd.php?appId=$appId");
    exit();
} else {
    die("Error inserting message: " . mysqli_error($conn));
    header("Location: manAppInd.php?appId=$appId");
}
