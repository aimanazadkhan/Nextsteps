<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='./login.php'</script>";
}
include "connection.php";

$result = null;

// Search Query
if (isset($_POST['search_btn'])) {
    $university_id = $_POST['university_id'] ?? '';
    echo $university_id;

    if (!empty($university_id)) {
        $query = "
            SELECT course_list.*, university.university_name 
            FROM course_list 
            JOIN university ON course_list.university_id = university.id 
            WHERE course_list.university_id = " . intval($university_id);
    } else {
        // If university_id is empty, fetch all courses
        $query = "
            SELECT course_list.*, university.university_name 
            FROM course_list 
            JOIN university ON course_list.university_id = university.id";
    }

    $result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));
    $allRows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Application creation
if (isset($_GET['createApp'])) {
    $course_id = $_GET['createApp'];
    $email = $_GET['email'] ?? $_SESSION['user'];
    $university_id = $_GET['universityId'];

    $query = "INSERT INTO `applications`(`uniID`, `userEmail`, `courseID`) VALUES ('$university_id', '$email','$course_id')";
    if (!mysqli_query($conn, $query)) {
        die("Not Inserted!!");
    } else {
        $id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id` FROM auth WHERE email = '{$_SESSION["user"]}'"));
        $updateQuery = "UPDATE `user_personal` SET `applied` = `applied` + 1 WHERE `auth_id` = '{$id["id"]}'";
        if (!mysqli_query($conn, $updateQuery)) {
            die("Failed to update applied count!");
        } else {
            echo "<script>alert('Application Created Successfully. Wait for an admin to contact you.')</script>";
            echo "<script>location.href='courses.php'</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/Next Steps logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/next.css">
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
            <form method="POST">
                <div class="row g-3 mb-3">
                    <!-- University Dropdown -->
                    <div class="col-md-4">
                        <select class="form-control" name="university_id">
                            <option value="">Select University</option>
                            <?php
                            $university_res = mysqli_query($conn, "SELECT id, university_name FROM university ORDER BY university_name ASC");
                            while ($row = mysqli_fetch_assoc($university_res)) {
                                $selected = ($row['id'] == ($_POST['university_id'] ?? '')) ? 'selected' : '';
                                echo "<option value='{$row['id']}' $selected>{$row['university_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Country Dropdown -->
                    <div class="col-md-4">
                        <select class="form-control" name="country_id">
                            <option value="">Select Country</option>
                            <?php
                            $country_res = mysqli_query($conn, "SELECT id, country_name FROM country ORDER BY country_name ASC");
                            while ($row = mysqli_fetch_assoc($country_res)) {
                                $selected = ($row['id'] == ($_POST['country_id'] ?? '')) ? 'selected' : '';
                                echo "<option value='{$row['id']}' $selected>{$row['country_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Intake Dropdown -->
                    <div class="col-md-2">
                        <select class="form-select text-dark" name="intake">
                            <option value="">Select Intake</option>
                            <?php
                            $intakes = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                            foreach ($intakes as $month) {
                                $selected = ($month == ($_POST['intake'] ?? '')) ? 'selected' : '';
                                echo "<option value=\"$month\" $selected>$month</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Year Dropdown -->
                    <div class="col-md-2">
                        <select class="form-select text-dark" name="year">
                            <option value="">Select Year</option>
                            <?php
                            $years = ["2024", "2025"];
                            foreach ($years as $yr) {
                                $selected = ($yr == ($_POST['year'] ?? '')) ? 'selected' : '';
                                echo "<option value=\"$yr\" $selected>$yr</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <h6>Course Level</h6>
                        <?php $level = $_POST['course_level'][0] ?? ''; ?>
                        <select name="course_level[]" class="form-select text-dark">
                            <option value="">Select Level</option>
                            <option class="text-dark" value="PG" <?= $level === "PG" ? 'selected' : '' ?>>PG</option>
                            <option class="text-dark" value="UG" <?= $level === "UG" ? 'selected' : '' ?>>UG</option>
                        </select>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary" name="search_btn">Search</button>
                </div>
            </form>
        </div>
    </div>

    <?php if (isset($_POST['search_btn'])): ?>
        <div class="container mt-4" style="height: 100vh; max-height: 100vh; overflow-y: auto;">
            <div class="card p-4 shadow-lg rounded-4" style="background: #f8f9fa;">
                <?php if (!empty($allRows)): ?>
                    <?php foreach ($allRows as $row): ?>
                        <div class="card mb-4 shadow border-0 rounded-4" style="border-left: 6px solid #0d6efd;">
                            <div class="card-body p-4">
                                <h4 class="mb-1"><strong>University:</strong> <?= htmlspecialchars($row['university_name']) ?></h4>
                                <h4 class="card-title fw-bold text-primary mb-3"><?= htmlspecialchars($row['course_title']) ?></h4>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <p class="mb-1"><strong>Level:</strong> <?= htmlspecialchars($row['course_level']) ?></p>
                                        <p class="mb-1"><strong>Next Starting:</strong> <?= htmlspecialchars($row['next_starting']) ?></p>
                                        <p class="mb-1"><strong>Location:</strong> <?= htmlspecialchars($row['location']) ?></p>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <p class="mb-1"><strong>IELTS:</strong> <?= htmlspecialchars($row['ielts']) ?></p>
                                        <p class="mb-1"><strong>Tuition Fees:</strong> <?= htmlspecialchars($row['tuition_fees']) ?></p>
                                        <div class="d-flex align-items-center mt-3">
                                            <a href="<?= htmlspecialchars($row['url']) ?>" target="_blank" class="btn btn-outline-primary">View Course</a>
                                            <a href="courses.php?createApp=<?= $row['id'] ?>&email=<?= htmlspecialchars($_GET['email'] ?? '') ?>&universityId=<?= $row['university_id'] ?>" class="ms-3 btn btn-primary">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-warning text-center fs-5">No courses found matching your filters.</div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelector('select[name="country_id"]').addEventListener('change', function() {
            const countryId = this.value;
            const universityDropdown = document.querySelector('select[name="university_id"]');
            fetch('get_universities.php?country_id=' + countryId)
                .then(response => response.json())
                .then(data => {
                    universityDropdown.innerHTML = '<option value="">Select University</option>';
                    data.forEach(university => {
                        const option = document.createElement('option');
                        option.value = university.id;
                        option.textContent = university.university_name;
                        universityDropdown.appendChild(option);
                    });
                });
        });
    </script>
</body>

</html>