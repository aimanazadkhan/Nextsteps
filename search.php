<?php
session_start();
include "connection.php";

// Initialize variables for filters
$countries = $universities = $levels = $titles = [];
$selectedCountries = $selectedUniversities = $selectedLevels = $selectedTitles = [];

// Fetch distinct filter values
$country_sql = "SELECT DISTINCT Country FROM search";
$country_result = $conn->query($country_sql);
if ($country_result->num_rows > 0) {
    while ($row = $country_result->fetch_assoc()) {
        $countries[] = $row['Country'];
    }
}

$university_sql = "SELECT DISTINCT University FROM search";
$university_result = $conn->query($university_sql);
if ($university_result->num_rows > 0) {
    while ($row = $university_result->fetch_assoc()) {
        $universities[] = $row['University'];
    }
}

$level_sql = "SELECT DISTINCT CourseLevel FROM search";
$level_result = $conn->query($level_sql);
if ($level_result->num_rows > 0) {
    while ($row = $level_result->fetch_assoc()) {
        $levels[] = $row['CourseLevel'];
    }
}

$title_sql = "SELECT DISTINCT CourseTitle FROM search";
$title_result = $conn->query($title_sql);
if ($title_result->num_rows > 0) {
    while ($row = $title_result->fetch_assoc()) {
        $titles[] = $row['CourseTitle'];
    }
}

// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax'])) {
    $filters = [];
    // Apply country filters
    if (!empty($_POST['selectedCountries'])) {
        $selectedCountries = $_POST['selectedCountries'];
        $filters[] = "Country IN ('" . implode("','", $selectedCountries) . "')";
    }

    // Apply university filters
    if (!empty($_POST['selectedUniversities'])) {
        $selectedUniversities = $_POST['selectedUniversities'];
        $filters[] = "University IN ('" . implode("','", $selectedUniversities) . "')";
    }

    // Apply course level filters
    if (!empty($_POST['selectedLevels'])) {
        $selectedLevels = $_POST['selectedLevels'];
        $filters[] = "CourseLevel IN ('" . implode("','", $selectedLevels) . "')";
    }

    // Apply course title filters
    if (!empty($_POST['selectedTitles'])) {
        $selectedTitles = $_POST['selectedTitles'];
        $filters[] = "CourseTitle IN ('" . implode("','", $selectedTitles) . "')";
    }

    // Construct query with filters
    $query = "SELECT ID, Country, University, CourseLevel, CourseTitle, NextStarting, TuitionFees, URL FROM search";
    if (!empty($filters)) {
        $query .= " WHERE " . implode(" AND ", $filters);
    }

    // Fetch filtered results
    $result = $conn->query($query);

    // Output JSON response
    $output = [];
    if ($result !== false && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
    } else {
        // If no results found, return empty array
        $output = [];
    }

    echo json_encode($output);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Courses</title>
    <meta name="NextSteps" content="A student counseling website">
    <link rel="icon" href="images/Next Steps logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/font-awesome/fontawesome.min.css">
    <link rel="stylesheet" href="plugins/font-awesome/brands.css">
    <link rel="stylesheet" href="plugins/font-awesome/solid.css">
    <link rel="stylesheet" href="css/next.css">
</head>

<style>
    h2 {
        margin-top: 0;
    }

    ul {
        list-style-type: none;
        padding-left: 0;
    }

    ul.subcategories {
        display: none;
        padding-left: 20px;
    }

    label {
        cursor: pointer;
    }

    .toggle-btn {
        position: absolute;
        top: 0;
        right: 0;
        transition: transform 0.3s ease;
        cursor: pointer;
        background: none;
        border: none;
        font-size: 1em;
    }

    .category-box {
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        position: relative;
        border-color: rgba(0, 0, 0, 0.1);
        box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.05);
        background: rgba(255, 255, 255, 1);
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    
    .custom-card {
        position: relative;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: 0.25rem;
    }
</style>

<body>

    <?php include "header.php"; ?>

    <section class="page-header bg-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center">
                    <h2 class="mb-3 text-capitalize">Search Courses</h2>
                    <hr>
                </div>
            </div>
        </div>

        <!-- filter search -->
        <div class="container">
            <div class="row">
                <!-- Sidebar Column -->
                <div class="col-lg-3 custom-sidebar">
                    <ul>
                        <!-- Country Filter -->
                        <li class="category-box">
                            <label class="label" for="cat1">Country</label>
                            <button type="button" class="toggle-btn" id="toggle-subcategories-1">+</button>
                            <ul class="subcategories" id="subcategories-1">
                                <?php foreach ($countries as $index => $country): ?>
                                    <li>
                                        <input type="checkbox" id="country-<?php echo $index; ?>" name="selectedCountries[]" value="<?php echo $country; ?>"
                                            <?php if (in_array($country, $selectedCountries)) echo 'checked'; ?>>
                                        <label for="country-<?php echo $index; ?>"><?php echo $country; ?></label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <!-- University Filter -->
                        <li class="category-box">
                            <label class="label" for="cat2">University</label>
                            <button type="button" class="toggle-btn" id="toggle-subcategories-2">+</button>
                            <ul class="subcategories" id="subcategories-2">
                                <?php foreach ($universities as $index => $university): ?>
                                    <li>
                                        <input type="checkbox" id="university-<?php echo $index; ?>" name="selectedUniversities[]" value="<?php echo $university; ?>"
                                            <?php if (in_array($university, $selectedUniversities)) echo 'checked'; ?>>
                                        <label for="university-<?php echo $index; ?>"><?php echo $university; ?></label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <!-- Course Level Filter -->
                        <li class="category-box">
                            <label class="label" for="cat3">Course Level</label>
                            <button type="button" class="toggle-btn" id="toggle-subcategories-3">+</button>
                            <ul class="subcategories" id="subcategories-3">
                                <?php foreach ($levels as $index => $level): ?>
                                    <li>
                                        <input type="checkbox" id="level-<?php echo $index; ?>" name="selectedLevels[]" value="<?php echo $level; ?>"
                                            <?php if (in_array($level, $selectedLevels)) echo 'checked'; ?>>
                                        <label for="level-<?php echo $index; ?>"><?php echo $level; ?></label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <!-- Course Title Filter -->
                        <li class="category-box">
                            <label class="label" for="cat4">Course Title</label>
                            <button type="button" class="toggle-btn" id="toggle-subcategories-4">+</button>
                            <ul class="subcategories" id="subcategories-4">
                                <?php foreach ($titles as $index => $title): ?>
                                    <li>
                                        <input type="checkbox" id="title-<?php echo $index; ?>" name="selectedTitles[]" value="<?php echo $title; ?>"
                                            <?php if (in_array($title, $selectedTitles)) echo 'checked'; ?>>
                                        <label for="title-<?php echo $index; ?>"><?php echo $title; ?></label>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        

                        <!-- Filter Button -->
                        <!-- <li>
                            <button type="button" id="apply-filters-btn">Filter</button>
                        </li> -->
                    </ul>
                </div>

                <!-- Content Column -->
                <div class="col-lg-9">
                    <div class="row" id="course-results">
                        <?php if (isset($result) && $result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <div class='col-12 mb-4'>
                                    <div class='custom-card'>
                                        <div class='card-body'>
                                            <h3 class='card-text fw-bold'><?php echo $row['University']; ?></h3>
                                            <h5 class='card-text'><?php echo $row['CourseLevel']; ?></h5>
                                            <p class='card-title text-primary'><?php echo $row['CourseTitle']; ?></p>
                                            <label>Next Starting</label>
                                            <p class='card-title text-success'><?php echo $row['NextStarting']; ?></p>
                                            <label>Tuition Fees</label>
                                            <p class='card-title text-success'><?php echo $row['TuitionFees']; ?></p>
                                            <button class='btn btn-primary' onclick='window.open("<?php echo $row['URL']; ?>", "_blank")'>Visit Website</button>
                                            <a href="search.php?id=<?php echo $row['ID']; ?>">
                                                <button class='ms-3 btn btn-primary'>Apply Now</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php elseif (isset($result) && $result && $result->num_rows === 0): ?>
                            <p>No results found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {
            const toggleButtons = document.querySelectorAll('.toggle-btn');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.id.split('-')[2];
                    const subcategories = document.getElementById(`subcategories-${id}`);
                    if (subcategories.style.display === 'none' || subcategories.style.display === '') {
                        subcategories.style.display = 'block';
                        this.textContent = '-';
                    } else {
                        subcategories.style.display = 'none';
                        this.textContent = '+';
                    }
                });
            });
        });
        $(document).ready(function () {
    // Function to handle checkbox change events
    $('input[type="checkbox"]').change(function () {
        applyFilters();
    });

    // Function to apply filters and fetch data
    function applyFilters() {
        var selectedCountries = $('input[name="selectedCountries[]"]:checked').map(function () {
            return this.value;
        }).get();

        var selectedUniversities = $('input[name="selectedUniversities[]"]:checked').map(function () {
            return this.value;
        }).get();

        var selectedLevels = $('input[name="selectedLevels[]"]:checked').map(function () {
            return this.value;
        }).get();

        var selectedTitles = $('input[name="selectedTitles[]"]:checked').map(function () {
            return this.value;
        }).get();

        // Send AJAX request only if at least one filter is selected
        if (selectedCountries.length > 0 || selectedUniversities.length > 0 || selectedLevels.length > 0 || selectedTitles.length > 0) {
            $.ajax({
                type: 'POST',
                url: 'search.php',
                data: {
                    ajax: true,
                    selectedCountries: selectedCountries,
                    selectedUniversities: selectedUniversities,
                    selectedLevels: selectedLevels,
                    selectedTitles: selectedTitles
                },
                success: function (response) {
                    // Update content section with new data
                    var courses = JSON.parse(response);
                    var courseResults = $('#course-results');
                    courseResults.empty();
                    if (courses.length > 0) {
                        courses.forEach(function (course) {
                            var html = `
                                <div class='col-12 mb-4'>
                                    <div class='custom-card'>
                                        <div class='card-body'>
                                            <h3 class='card-text fw-bold'>${course.University}</h3>
                                            <h5 class='card-text'>${course.CourseLevel}</h5>
                                            <p class='card-title text-primary'>${course.CourseTitle}</p>
                                            <label>Next Starting</label>
                                            <p class='card-title text-success'>${course.NextStarting}</p>
                                            <label>Tuition Fees</label>
                                            <p class='card-title text-success'>${course.TuitionFees}</p>
                                            <button class='btn btn-primary' onclick='window.open("${course.URL}", "_blank")'>Visit Website</button>
                                        </div>
                                    </div>
                                </div>`;
                            courseResults.append(html);
                        });
                    } else {
                        courseResults.append("<p>No results found.</p>");
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        } else {
            // If no filters selected, display a message or handle accordingly
            $('#course-results').html("<p>Please select at least one filter option.</p>");
        }
    }
});
</script>

</html>

