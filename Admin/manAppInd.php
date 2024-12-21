<?php
session_start();
include "../connection.php";
// Admin Data
$adminData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `admin`"));
if (!isset($_SESSION['user']) || $_SESSION['user'] !== $adminData['adminName']) {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="icon" href="images/Next Steps logo.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container-fluid px-0">
        <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
            <div style="width: 100%">
                <div class="d-flex">
                    <button class="btn open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                    <h3 class="mt-2 ms-1">Application</h3>
                </div>
                <div style="height: 95vh; overflow-y: auto; background-color:rgb(231, 232, 241);">
                    <div class="card border-0 shadow-sm p-3 m-5">
                        <div class="row align-items-center text-center">
                            <!-- Left Side -->
                            <div class="col-lg-6 col-md-12">
                                <h6 class="text-muted">Application ID AID70844</h6>
                                <h5 class="fw-bold mb-1">MD SHAHIN AHMED HALIM</h5>
                                <p class="mb-2 text-secondary">Student ID SID40221</p>
                                <p class="text-muted">Sylhet Division, Bangladesh</p>
                                <button class="btn btn-success btn-sm px-3">View Profile</button>
                                <span class="text-secondary ms-3">77% completed</span>
                            </div>

                            <!-- Right Side -->
                            <div class="col-lg-6 col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Application Info -->
                                    <div>
                                        <h6 class="text-muted mb-0">Application - 2nd Preference</h6>
                                        <h5 class="fw-bold mb-0">International Foundation Programme - ECA</h5>
                                        <p class="mb-2">ECA - London Metropolitan University</p>
                                        <div>
                                            <span class="badge bg-primary">Campus</span>
                                            <span class="ms-2 text-muted">Delivery method</span>
                                        </div>
                                    </div>

                                    <!-- Withdraw Button -->
                                    <div>
                                        <button class="btn btn-outline-danger btn-sm">Withdraw</button>
                                    </div>
                                </div>

                                <!-- Additional Details -->
                                <div class="mt-3 row text-center">
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Intake(s)</h6>
                                        <p class="mb-0">Q1 (Jan - Mar) 2025</p>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Levels</h6>
                                        <p class="mb-0">Undergraduate</p>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Tuition</h6>
                                        <p class="mb-0">-</p>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Application Fee</h6>
                                        <p class="mb-0">-</p>
                                    </div>
                                </div>

                                <!-- Contact -->
                                <div class="mt-3">
                                    <p class="text-muted mb-0">
                                        Speak to us about this application right now
                                    </p>
                                    <h5 class="fw-bold text-primary mb-0">+91 9311 9627 38</h5>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>


</body>

</html>