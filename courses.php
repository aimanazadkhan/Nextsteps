<?php
// session_start();
// if (!isset($_SESSION['user']) || $_SESSION['user'] == 'admin') {
//     echo "<script>alert('You have to Login First!!!')</script>";
//     echo "<script>location.href='./login.php'</script>";
// }
include "connection2.php";

$result = null;

if (isset($_POST['search_btn'])) {
    $university_id = $_POST['university_id'] ?? '';
    $country_id = $_POST['country_id'] ?? '';
    $course_levels = $_POST['course_level'] ?? [];

    $university_ids = [];

    if (!empty($university_id)) {
        // If uni is selected, just use that, no country filter needed
        $university_ids[] = $university_id;
    } elseif (!empty($country_id)) {
        // If uni not selected, but country selected, get all unis in that country
        $uniQuery = "SELECT id FROM university WHERE country_id = '$country_id'";
        $uniRes = mysqli_query($conn, $uniQuery);
        while ($uni = mysqli_fetch_assoc($uniRes)) {
            $university_ids[] = $uni['id'];
        }
        if (empty($university_ids)) {
            echo "<div class='alert alert-danger mt-4 text-center'>No universities found for that country, dawg.</div>";
            return;
        }
    }

    $conditions = [];

    if (!empty($university_ids)) {
        $uni_in = implode(",", array_map('intval', $university_ids));
        $conditions[] = "university_id IN ($uni_in)";
    }

    if (!empty($course_levels)) {
        $escaped_levels = array_map(function ($lvl) use ($conn) {
            return "'" . mysqli_real_escape_string($conn, $lvl) . "'";
        }, $course_levels);
        $levels_in = implode(",", $escaped_levels);
        $conditions[] = "course_level IN ($levels_in)";
    }

    $where = count($conditions) ? "WHERE " . implode(" AND ", $conditions) : '';
    $query = "SELECT * FROM course_list $where";
    $result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));
    $allRows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


// Apply Course Application
if (isset($_GET['createApp'])) {
    $id = $_GET['createApp'];

    if (isset($_GET['email']) && !empty($_GET['email'])) {
        $email = $_GET['email'];
    } else {
        $email = $_SESSION['user'];
    }

    $query = "INSERT INTO `applications`(`uniID`, `userEmail`) VALUES ('$id', '$email')";
    if (!mysqli_query($conn, $query)) {
        die("Not Inserted!!");
    } else {
        // Increment the applied column
        $updateQuery = "UPDATE `users` SET `applied` = `applied` + 1 WHERE `email` = '$email'";
        if (!mysqli_query($conn, $updateQuery)) {
            die("Failed to update applied count!");
        } else {
            echo "<script>alert('Application Created Successfully. Wait for an admin to contact you.')</script>";
            echo "<script>location.href='search.php'</script>";
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
            <form class="" METHOD="POST">
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
                    <div class="col-md-2">
                        <select class="form-select text-dark" name="intake">
                            <option selected>Intake</option>
                            <option value="Jan">January</option>
                            <option value="Feb">February</option>
                            <option value="Mar">March</option>
                            <option value="Apr">April</option>
                            <option value="May">May</option>
                            <option value="Jun">June</option>
                            <option value="Jul">July</option>
                            <option value="Aug">August</option>
                            <option value="Sep">September</option>
                            <option value="Oct">October</option>
                            <option value="Nov">November</option>
                            <option value="Dec">December</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select text-dark" name="year">
                            <option selected>Year</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
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
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <h6>Course Level</h6>
                        <?php $levels = $_POST['course_level'] ?? []; ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pg" name="course_level[]" value="PG" <?= in_array("PG", $levels) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="pg">PG</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ug" name="course_level[]" value="UG" <?= in_array("UG", $levels) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="ug">UG</label>
                        </div>
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
                                            <a href="search.php?createApp=<?= $row['id'] ?>&email=<?= htmlspecialchars($_GET['email'] ?? '') ?>" class="ms-3 btn btn-primary">Apply Now</a>
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
</body>

</html>