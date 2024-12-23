<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='./login.php'</script>";
}

include "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/Next Steps logo.png">
    <link rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/next.css">
    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

</head>

<body style="background-color: #e8f4fc;">
    <?php include "header.php"; ?>
    <div class="container py-5">
        <div class="text-center mb-4">
            <p class="header-text fw-bold fs-3" style="color: #0056b3;">Explore over 1,00,000+ courses</p>
            <p class="fs-5" style="color: #6c757d;">Use our Course Finder to search</p>
        </div>
        <div class="card mx-auto bg-white rounded p-4 shadow-lg border-none">
            <form class="">
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Search for Course | University | College">
                    </div>
                    <div class="col-md-2">
                        <select class="form-select text-dark">
                            <option selected>Intake</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select text-dark">
                            <option selected>Year</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Province / State">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <h6>Program Level</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="highSchool">
                            <label class="form-check-label" for="highSchool">High School (11th - 12th)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ugDiploma">
                            <label class="form-check-label" for="ugDiploma">UG Diploma/Certificate</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ug">
                            <label class="form-check-label" for="ug">UG</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <h6>Country</h6>
                        <select class="form-select text-dark">
                            <option selected>Hungary</option>
                            <option>Canada</option>
                            <option>USA</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <h6>Duration</h6>
                        <select class="form-select text-dark">
                            <option selected>Select</option>
                            <option>1 Year</option>
                            <option>2 Years</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <h6>Requirements</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pte">
                            <label class="form-check-label" for="pte">PTE</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="toefl">
                            <label class="form-check-label" for="toefl">TOEFL iBT</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ielts">
                            <label class="form-check-label" for="ielts">IELTS</label>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>