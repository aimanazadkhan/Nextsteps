<?php

include 'connection.php';

if (isset($_POST['signup'])) {
    $reg_firstName = ucwords($_POST['fname']);
    $reg_lastName = ucfirst($_POST['lname']);
    $reg_email = $_POST['email'];
    $reg_phoneNumber = $_POST['mobile'];
    $reg_pass = $_POST['pass'];
    $reg_conPass = $_POST['con_pass'];
    $verifytoken = md5(rand());
    
    $insert_query = "INSERT INTO `register`(`firstName`,`lastName`,`email`,`password`,`phonenumber`,`verifytoken`) 
        VALUES ('$reg_firstName','$reg_lastName','$reg_email','$reg_pass','$reg_phoneNumber','$verifytoken')";

    $dupe_email = mysqli_query($conn, "SELECT * FROM `register` WHERE email = '$reg_email'");

    if ($reg_pass !== $reg_conPass) { //confirm password check
        echo "<script>alert('Password & Confirm Password do not match..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else if (mysqli_num_rows($dupe_email) > 0) { //duplicate email check from db
        echo "<script>alert('This email is already taken..!!')</script>";
        echo "<script>location.href='register.php'</script>";
    } else {
        if (!mysqli_query($conn, $insert_query)) {
            die("Not Inserted!!");
        } else {
            include 'sendmail.php';
            echo "<script>alert('Account Created Successfully! Please Check Your Email for Confirmation.')</script>";
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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-body-tertiary">
    <div class="container-fluid">
        <div class="py-5 text-center">
            <a href="../Homepage/index.php"><img src="images/Next Steps logo.png" class="mb-4 img-fluid" alt="Logo"
                    style="width: 200px;"></a><br>

            <span class="font" style="font: size 1.2rem;">Sign-Up</span>
        </div>

        <div class="row justify-content-center g-5">
            <div class="col-md-6 col-lg-5">
                <div class="border border-2 border-primary-subtle rounded p-4 shadow-lg">
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
                                    pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&*()]).{6,20}"
                                    title="Password must be 6-20 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character"
                                    required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="con_pass" required>
                            </div>
                        </div>

                        <hr class="my-4">


                        <div class="d-flex justify-content-center">
                            <button class="w-50 btn btn-outline-primary" type="submit" name="signup">Sign-Up
                            </button>
                        </div>
                    </form>
                </div>

                <h5 class="text-center mt-4 mb-3">Already Have an Account?</h5>

                <div class="d-flex justify-content-center">
                    <a href="login.php"><button class="w-100 btn btn-outline-danger" type="submit"
                            name="signin">Sign-In</button></a>
                </div>

            </div>
        </div>

        <?php //include "footer.php"; ?>

    </div>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>