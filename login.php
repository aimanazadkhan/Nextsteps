<?php

if (isset($_POST['btn_signIn'])) {
    include 'connection.php';

    $log_user_email = $_POST['l_email'];
    $log_password = $_POST['l_pass'];

    $result = mysqli_query($conn, "SELECT * FROM `users` 
        WHERE email = '$log_user_email' AND BINARY `password` = '$log_password' AND verifystatus = '1'");

    $adminResult = mysqli_query($conn, "SELECT * FROM `admin` WHERE `adminName` = '$log_user_email'");
    $adminData = mysqli_fetch_assoc($adminResult);

    if ($adminData && password_verify($log_password, $adminData['password'])) {
        session_start();
        $_SESSION['user'] = $log_user_email;
        echo "<script>location.href='admin/';</script>";
    } else if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['user'] = $log_user_email;
        echo "<script>location.href='profile.php'</script>";
    } else {
        $result1 = mysqli_query($conn, "SELECT * FROM `users` 
            WHERE email = '$log_user_email' AND BINARY `password` = '$log_password' AND verifystatus = '0'");
        if (mysqli_num_rows($result1) > 0) {
            echo "<script>alert('Your Account has not been verified yet. A verification link has been sent to your registered email address!')</script>";
            echo "<script>location.href='login.php'</script>";
        } else {
            echo "<script>alert('Invalid Username or Password.Please Try Again!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="css/next.css">
</head>

<body>
    <br><br><br>
    <section>
        <div class="container-fluid mt-5 pt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="mt-0 col-md-9 col-lg-6 col-xl-5">
                    <a href="../Homepage/index.php"><img src="images/Next Steps logo.png" class="img-fluid"
                            alt="Sample image" style="width:400px"></a>
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 pt-2">
                    <div class="border border-1 border-primary rounded p-5 shadow-lg">
                        <form action="" method="POST">
                            <div class="py-5 text-center">
                                <span class="font" style="font-size: 1.2rem;">Sign-In</span>
                            </div>

                            <div class="form-outline">
                                <label class="form-label">Email</label>
                                <input type="text" id="form12" class="form-control" name="l_email" />
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="l_pass" class="form-control" required>
                            </div>

                            <div class="">
                                <a href="forgotpass.php" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-lg" name="btn_signIn"
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                            href="register.php" class="link-danger">Register</a></p>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>

    </section>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>