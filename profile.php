<?php
session_start();
include "connection.php";

if (isset($_SESSION['user'])) {
    $loggedInUser = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '{$_SESSION['user']}'");
    $user = mysqli_fetch_assoc($loggedInUser);
}

if (isset($_POST['pInfoSave'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $phonenumber = $_POST['phone_number'];
    $dob = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $marital = $_POST['marital'];
    $nationality = $_POST['nationality'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $passportnum = $_POST['passport_number'];
    $issuecountry = $_POST['issue_country'];
    $issuedate = $_POST['issue_date'];
    $expirydate = $_POST['expiry_date'];

    $update_query = "UPDATE `users` SET 
        `firstname`='$firstname',`lastname`='$lastname',
        `phonenumber`='$phonenumber', `dob`='$dob',
        `gender`='$gender', `marital`='$marital', 
        `nation`='$nationality', `address`='$address',
        `postcode`='$postcode', `passportnum`='$passportnum', 
        `issuecountry`='$issuecountry', `issuedate`='$issuedate',
        `expirydate`='$expirydate' WHERE email = '{$_SESSION['user']}'";

    if (mysqli_query($conn, $update_query)) {
        $_SESSION['alert'] = "Information Updated Successfully!";
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "profile.php";';
        echo '}, 1000);';
        echo '</script>';
    } else {
        $_SESSION['alert'] = "Failed to Update Information!";
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "profile.php";';
        echo '}, 1000);';
        echo '</script>';
    }
}

if (isset($_POST['aQualSave'])) {
    $institution_name = $_POST['institution_name'];
    $study_country = $_POST['study_country'];
    $qualification = $_POST['qualification'];
    $cgpa = $_POST['cgpa'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $language = $_POST['language'];
    $address = $_POST['address'];

    $update_query = "UPDATE `users` SET 
        `institutionname`='$institution_name', `studycountry`='$study_country', 
        `qualification`='$qualification', `cgpa`='$cgpa', 
        `startdate`='$start_date', `enddate`='$end_date', 
        `language`='$language', `eduaddress`='$address' WHERE email = '{$_SESSION['user']}'";

    if (mysqli_query($conn, $update_query)) {
        $_SESSION['alert'] = "Information Updated Successfully!";
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "profile.php";';
        echo '}, 1000);';
        echo '</script>';
    } else {
        $_SESSION['alert'] = "Failed to Update Information!";
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "profile.php";';
        echo '}, 1000);';
        echo '</script>';
    }
}

if (isset($_POST['workSave'])) {
    $company_name = $_POST['company_name'];
    $job_title = $_POST['job_title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $responsibilities = $_POST['responsibilities'];

    $update_query = "UPDATE `users` SET 
        `companyname`='$company_name', `jobtitle`='$job_title', 
        `jobstartdate`='$start_date', `jobenddate`='$end_date', 
        `jobresponsibilities`='$responsibilities' WHERE email = '{$_SESSION['user']}'";

    if (mysqli_query($conn, $update_query)) {
        $_SESSION['alert'] = "Information Updated Successfully!";
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "profile.php";';
        echo '}, 1000);';
        echo '</script>';
    } else {
        $_SESSION['alert'] = "Failed to Update Information!";
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '  window.location.href = "profile.php";';
        echo '}, 1000);';
        echo '</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/next.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .animate__animated {
            --animate-duration: 0.4s;
        }

        .gradient-custom {
            background: linear-gradient(to right bottom, rgba(30, 58, 138, 1), rgba(38, 76, 153, 1));
        }

        body {
            background-color: #f4f5f7;
        }

        .list-item:hover {
            background-color: #e0e0e0;
            transition: background-color 0.3s;
        }

        .nav-item {
            position: relative;
        }

        .nav-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top left, rgba(30, 60, 100, 1), rgba(50, 80, 130, 1));
            z-index: -1;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.8s;
        }

        .nav-item:hover .nav-link::before {
            transform: scaleX(1);
            transform-origin: bottom right;
        }

        .nav-item:hover .nav-link {
            color: white !important;
        }

        /* Fade animations */
        .fade-out {
            animation: fadeOut 0.5s forwards;
        }

        .fade-in {
            animation: fadeIn 0.5s forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <section>
            <nav class="navbar navbar-expand-lg p-0" style="border-bottom: 1px solid grey;">
                <div class="container-fluid justify-content-center">
                    <ul class="navbar-nav justify-content-evenly w-100">
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#pinfo">
                                Personal Information<br>
                                <p class="text-success">Complete</p>
                            </a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#equalif">
                                Academic Qualification<br>
                                <p class="text-success">Complete</p>
                            </a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#wexp">
                                Work Experience<br>
                                <p class="text-success">Complete</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </section>

        <!-- Example of displaying alert -->
        <?php if (!empty($_SESSION['alert'])): ?>
            <div class="animate__animated animate__bounceInDown"
                style="position: absolute; top: 2rem; left: 40%; z-index: 99;">
                <div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert">
                    <?php echo $_SESSION['alert']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>

            <?php
            unset($_SESSION['alert']);
        endif;
        ?>

        <section class="vh-100">
            <div class="container h-100">
                <div class="mt-4 col col-lg-12">
                    <!-- Personal Information Card -->
                    <div class="card" id="pinfo" style="border-radius: .5rem;">
                        <form action="" method="POST">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white d-flex justify-content-center align-items-center"
                                    style="height: auto;">
                                    <div>
                                        <img src="User Photos/blank-profile-picture.jpg" alt="Avatar"
                                            class="img-fluid mb-4" style="width: 10rem;" />
                                        <h5><?php echo $user['firstname'] . " " . $user['lastname']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6>Personal Information</h6>
                                            <i class="far fa-edit editData"></i>
                                        </div>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>First Name</h6>
                                                <p class="text-muted"><?php echo $user['firstname']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['firstname']; ?>" name="first_name"
                                                    pattern="[A-Za-z ]+" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Last Name</h6>
                                                <p class="text-muted"><?php echo $user['lastname']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['lastname']; ?>" name="last_name"
                                                    pattern="[A-Za-z]+" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Email</h6>
                                                <p class="text-muted"><?php echo $user['email']; ?></p>
                                                <input type="email" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['email']; ?>" name="email" disabled />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Phone Number</h6>
                                                <p class="text-muted"><?php echo $user['phonenumber']; ?></p>
                                                <input type="tel" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['phonenumber']; ?>" name="phone_number"
                                                    pattern="^\d{9,}$" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Date of Birth</h6>
                                                <p class="text-muted"><?php echo $user['dob']; ?></p>
                                                <input type="date" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['dob']; ?>" name="date_of_birth"
                                                    pattern="\d{4}-\d{2}-\d{2}" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Gender</h6>
                                                <p class="text-muted"><?php echo $user['gender']; ?></p>
                                                <select class="form-control mb-3 hidden" name="gender">
                                                    <option value="Male" selected>Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Martial Status</h6>
                                                <p class="text-muted"><?php echo $user['marital']; ?></p>
                                                <select class="form-control mb-3 hidden" name="marital">
                                                    <option value="Single" selected>Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Nationality</h6>
                                                <p class="text-muted"><?php echo $user['nation']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['nation']; ?>" name="nationality"
                                                    pattern="[A-Za-z]+" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Address</h6>
                                                <p class="text-muted"><?php echo $user['address']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['address']; ?>" name="address" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Postcode</h6>
                                                <p class="text-muted"><?php echo $user['postcode']; ?></p>
                                                <input type="number" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['postcode']; ?>" name="postcode"
                                                    pattern="^\d+$" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Passport Number</h6>
                                                <p class="text-muted"><?php echo $user['passportnum']; ?></p>
                                                <input type="number" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['passportnum']; ?>" name="passport_number"
                                                    pattern="^[A-Z0-9]+$" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Issue Country</h6>
                                                <p class="text-muted"><?php echo $user['issuecountry']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['issuecountry']; ?>" name="issue_country"
                                                    pattern="[A-Za-z]+" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Issue Date</h6>
                                                <p class="text-muted"><?php echo $user['issuedate']; ?></p>
                                                <input type="date" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['issuedate']; ?>" name="issue_date"
                                                    pattern="\d{4}-\d{2}-\d{2}" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Expiry Date</h6>
                                                <p class="text-muted"><?php echo $user['expirydate']; ?></p>
                                                <input type="date" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['expirydate']; ?>" name="expiry_date"
                                                    pattern="\d{4}-\d{2}-\d{2}" />
                                            </div>
                                        </div>
                                        <div class="float-end mb-3">
                                            <button type="submit" class="btn btn-primary saveBtn hidden"
                                                name="pInfoSave">Save</button>
                                            <button type="button"
                                                class="btn btn-danger discardBtn hidden">Discard</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Academic Qualification Card -->
                    <div class="card hidden" id="equalif" style="border-radius: .5rem;">
                        <form action="" method="POST">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white d-flex justify-content-center align-items-center"
                                    style="height: auto;">
                                    <div>
                                        <img src="User Photos/blank-profile-picture.jpg" alt="Avatar"
                                            class="img-fluid mb-4" style="width: 10rem;" />
                                        <h5><?php echo $user['firstname'] . " " . $user['lastname']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6>Academic Qualification</h6>
                                            <i class="far fa-edit editData"></i>
                                        </div>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Name of the Institution</h6>
                                                <p class="text-muted"><?php echo $user['institutionname']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['institutionname']; ?>"
                                                    name="institution_name" pattern="[A-Za-z ]+" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Country of Study</h6>
                                                <p class="text-muted"><?php echo $user['studycountry']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['studycountry']; ?>" name="study_country"
                                                    pattern="[A-Za-z]+" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Qualification Achieved</h6>
                                                <p class="text-muted"><?php echo $user['qualification']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['qualification']; ?>" name="qualification"
                                                    pattern="[A-Za-z .]+" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>CGPA</h6>
                                                <p class="text-muted"><?php echo $user['cgpa']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['cgpa']; ?>" name="cgpa"
                                                    pattern="[0-9.]{1,4}" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Start Date</h6>
                                                <p class="text-muted"><?php echo $user['startdate']; ?></p>
                                                <input type="date" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['startdate']; ?>" name="start_date"
                                                    pattern="\d{4}-\d{2}-\d{2}" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>End Date</h6>
                                                <p class="text-muted"><?php echo $user['enddate']; ?></p>
                                                <input type="date" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['enddate']; ?>" name="end_date"
                                                    pattern="\d{4}-\d{2}-\d{2}" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Primary Language</h6>
                                                <p class="text-muted"><?php echo $user['language']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['language']; ?>" name="language"
                                                    pattern="[A-Za-z]+" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Address</h6>
                                                <p class="text-muted"><?php echo $user['eduaddress']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['eduaddress']; ?>" name="address" />
                                            </div>
                                        </div>
                                        <div class="float-end mb-3">
                                            <button type="submit" class="btn btn-primary saveBtn hidden"
                                                name="aQualSave">Save</button>
                                            <button type="button"
                                                class="btn btn-danger discardBtn hidden">Discard</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Work Experience Card -->
                    <div class="card hidden" id="wexp" style="border-radius: .5rem;">
                        <form action="" method="POST">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white d-flex justify-content-center align-items-center"
                                    style="height: auto;">
                                    <div>
                                        <img src="User Photos/blank-profile-picture.jpg" alt="Avatar"
                                            class="img-fluid mb-4" style="width: 10rem;" />
                                        <h5><?php echo $user['firstname'] . " " . $user['lastname']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6>Work Experience</h6>
                                            <i class="far fa-edit editData"></i>
                                        </div>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Company Name</h6>
                                                <p class="text-muted"><?php echo $user['companyname']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['companyname']; ?>" name="company_name"
                                                    pattern="[A-Za-z\s]+" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Job Title</h6>
                                                <p class="text-muted"><?php echo $user['jobtitle']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['jobtitle']; ?>" name="job_title"
                                                    pattern="[A-Za-z\s]+" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Start Date</h6>
                                                <p class="text-muted"><?php echo $user['jobstartdate']; ?></p>
                                                <input type="date" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['jobstartdate']; ?>" name="start_date"
                                                    pattern="\d{4}-\d{2}-\d{2}" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>End Date</h6>
                                                <p class="text-muted"><?php echo $user['jobenddate']; ?></p>
                                                <input type="date" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['jobenddate']; ?>" name="end_date"
                                                    pattern="\d{4}-\d{2}-\d{2}" />
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Responsibilities</h6>
                                                <p class="text-muted"><?php echo $user['jobresponsibilities']; ?></p>
                                                <textarea class="form-control mb-3 hidden" name="responsibilities"
                                                    pattern="[\s\S]+"><?php echo $user['jobresponsibilities']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="float-end mb-3">
                                            <button type="submit" class="btn btn-primary saveBtn hidden"
                                                name="workSave">Save</button>
                                            <button type="button"
                                                class="btn btn-danger discardBtn hidden">Discard</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include "footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // NavBar Card Toggle
            $('.nav-link').click(function (e) {
                e.preventDefault();
                var targetCard = $(this).attr('href').substring(1);
                var currentCard = $('.card:visible');

                if (currentCard.attr('id') !== targetCard) {
                    currentCard.addClass('animate__animated animate__fadeOut')
                        .one('animationend', function () {
                            $(this).addClass('hidden').removeClass('animate__animated animate__fadeOut');
                            $('#' + targetCard).removeClass('hidden').addClass('animate__animated animate__fadeIn')
                                .one('animationend', function () {
                                    $(this).removeClass('animate__animated animate__fadeIn');
                                });
                        });
                }
            });

            // Edit/Discard in the form
            $('.editData').click(function () {
                var cardBody = $(this).closest('.card-body');
                cardBody.find('p.text-muted').addClass('hidden');
                cardBody.find('input, select, textarea').removeClass('hidden');
                cardBody.find('.saveBtn, .discardBtn').removeClass('hidden');
                $(this).addClass('hidden');
            });

            $('.discardBtn').click(function () {
                var cardBody = $(this).closest('.card-body');
                cardBody.find('input, select, textarea').addClass('hidden');
                cardBody.find('p.text-muted').removeClass('hidden');
                cardBody.find('.saveBtn, .discardBtn').addClass('hidden');
                cardBody.find('.editData').removeClass('hidden');
            });
        });
    </script>
</body>

</html>