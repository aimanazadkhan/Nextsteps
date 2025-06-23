<?php

session_start();

include 'connection.php';

if (isset($_GET['token'])) {

    $token = $_GET['token'];
    $verify_query = mysqli_query($conn, "SELECT * FROM auth WHERE verifyToken = '$token'");
    if (mysqli_num_rows($verify_query) > 0) {
        $row = mysqli_fetch_assoc($verify_query);
        // echo $row['verifytoken'];
        if ($row['verifystatus'] == 0) {
            $update_query = mysqli_query($conn, "UPDATE auth SET verifyStatus = '1' WHERE verifyToken = '{$row['verifytoken']}'");
            if ($update_query) {
                echo "<script>alert('Account Has Been Verified Successfully. Please Login.!')</script>";
                echo "<script>location.href='login.php'</script>";
            } else {
                echo "<script>alert('Verification Failed. Please Try Again!')</script>";
                echo "<script>location.href='login.php'</script>";
            }
        } else {
            echo "<script>alert('Email Already Verified. Please Login!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    } else {
        echo "<script>alert('This token does not exist. Please Try Again!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
} else {
    echo "<script>alert('Not Allowed. Please Try Again!')</script>";
    echo "<script>location.href='login.php'</script>";
}
