<?php

include 'connection.php';

if (isset($_POST['signup'])) {

    // Sanitizing inputs
    $reg_firstName = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
    $reg_lastName = ucfirst(mysqli_real_escape_string($conn, $_POST['lname']));
    $reg_email = mysqli_real_escape_string($conn, $_POST['email']);
    $reg_phoneNumber = mysqli_real_escape_string($conn, $_POST['mobile']);
    $reg_pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $reg_conPass = mysqli_real_escape_string($conn, $_POST['con_pass']);

    $hashed_pass = md5($reg_pass);
    $verifyToken = md5(rand());

    if ($reg_pass !== $reg_conPass) {
        echo "<script>alert('Password & Confirm Password do not match..!!')</script>";
        echo "<script>location.href='register.php'</script>";
        exit;
    }

    // Check duplicate email
    $check_email = mysqli_query($conn, "SELECT * FROM auth WHERE email = '$reg_email'");
    if (mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('This email is already taken..!!')</script>";
        echo "<script>location.href='register.php'</script>";
        exit;
    }

    // Check duplicate Phone Numver
    $check_phone = mysqli_query($conn, "SELECT * FROM auth WHERE phoneNumber = '$reg_phoneNumber'");
    if (mysqli_num_rows($check_phone) > 0) {
        echo "<script>alert('This Phone Number is already taken..!!')</script>";
        echo "<script>location.href='register.php'</script>";
        exit;
    }

    $auth_query = "INSERT INTO auth (email, password, phoneNumber, verifyStatus, verifyToken)
                       VALUES ('$reg_email', '$hashed_pass', '$reg_phoneNumber', '0', '$verifyToken')";

    if (!mysqli_query($conn, $auth_query)) {
        echo "<script>alert('Account Creation Failed! Please Try Again.')</script>";
    } else {
        $auth_id = mysqli_insert_id($conn);

        $user_query = "INSERT INTO user_personal (
            auth_id, firstname, lastname) VALUES (
            '$auth_id', '$reg_firstName', '$reg_lastName')";

        if (!mysqli_query($conn, $user_query)) {
            mysqli_query($conn, "DELETE FROM auth WHERE id = '$auth_id'");
            echo "<script>alert('Registration Failed. Try again.')</script>";
        } else {
            $user_personal_id = mysqli_insert_id($conn);

            $edu_query = "INSERT INTO user_education (user_id)
                  VALUES ('$user_personal_id')";

            if (!mysqli_query($conn, $edu_query)) {
                // Rollback both previous inserts
                mysqli_query($conn, "DELETE FROM user_personal WHERE id = '$user_personal_id'");
                mysqli_query($conn, "DELETE FROM auth WHERE id = '$auth_id'");
                echo "<script>alert('Registration Failed. Try again.')</script>";
            } else {
                include 'sendmail.php';
                echo "<script>alert('Account Created Successfully! Please Check Your Email for Confirmation.')</script>";
                echo "<script>location.href='login.php'</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="css/next.css">
</head>

<body class="bg-body-tertiary">
    <div class="container-fluid">
        <div class="py-5 text-center">
            <a href="./index.php"><img src="images/Next Steps logo.png" class="mb-4 img-fluid" alt="Logo"
                    style="width: 200px;"></a><br>

            <span class="lead" style="font: size 1.2rem;">Sign-Up</span>
        </div>

        <div class="row justify-content-center g-5">
            <div class="col-md-6 col-lg-5">
                <div class="border border-1 border-primary rounded p-4 shadow-lg">
                    <form action="register.php" method="POST" autocomplete="on">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" name="fname" pattern="[A-Za-z .]{2,}"
                                    title="Please enter a valid first name (at least 2 characters, only alphabets and spaces)"
                                    required>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" name="lname" pattern="[A-Za-z]{2,}"
                                    title="Please enter a valid last name (at least 2 characters, only alphabets)"
                                    required>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com"
                                    pattern="[a-z0-9._%+-]+@(gmail\.com|yahoo\.com|hotmail\.com|outlook\.com|icloud\.com|zoho\.com|lus\.ac\.bd)"
                                    title="Please enter a valid email address" required>
                            </div>

                            <div class="col-md-12">
                                <label for="cc-name" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" name="mobile" pattern="(\+88)?-?01[3-9]\d{8}"
                                    placeholder="01622101215" title="Please enter a valid Bangladeshi mobile number"
                                    required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="pass"
                                    pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&*()]).{6,20}" title="Password must be 6-20 characters long, contain at least one uppercase letter, 
                                    one lowercase letter, one digit, and one special character" required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="con_pass" required>
                            </div>
                        </div>

                        <hr class="my-4">


                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-primary" type="submit" name="signup">Sign-Up
                            </button>
                        </div>
                    </form>
                </div>

                <h5 class="text-center mt-4 mb-3">Already Have an Account?</h5>

                <div class="d-flex justify-content-center">
                    <a href="login.php"><button class="w-100 btn btn-success" type="submit"
                            name="signin">Sign-In</button></a>
                </div>

            </div>
        </div>

        <?php include "footer.php"; ?>

    </div>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>