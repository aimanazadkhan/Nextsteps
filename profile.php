<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='./login.php'</script>";
}

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

if (isset($_FILES['file']) && isset($_POST['documentType'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];

    $documentType = $_POST['documentType'];
    $userFirstName = $user['firstname'];
    $currentDateTime = date('Y-m-d_H-i-s');
    $newFileName = $userFirstName . "_" . $currentDateTime . "_" . $fileName;
    $uploadDir = 'Education Documents/';
    $destinationPath = $uploadDir . $newFileName;

    if (move_uploaded_file($fileTmpName, $destinationPath)) {
        $query = "SELECT eduDoc FROM users WHERE email = '{$_SESSION['user']}'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $oldFilePaths = $row['eduDoc'];

            // Add the document type to the path
            $newFilePathWithDocType = $documentType . ":" . $destinationPath;
            $newFilePaths = $oldFilePaths ? $oldFilePaths . "|" . $newFilePathWithDocType : $newFilePathWithDocType;

            $updateQuery = "UPDATE users SET eduDoc = '$newFilePaths' WHERE id = {$user['id']}";
            if (mysqli_query($conn, $updateQuery)) {
                $_SESSION['alert'] = "File uploaded and database updated successfully.";
            } else {
                $_SESSION['alert'] = "Database update failed: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['alert'] = "Error fetching user data: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['alert'] = "File move failed";
    }

    echo '<script>';
    echo 'setTimeout(function() {';
    echo '  window.location.href = "profile.php";';
    echo '}, 700);';
    echo '</script>';
}


if (isset($_GET['delDocPath'])) {
    $docPathToDelete = $_GET['delDocPath'];

    $query = mysqli_query($conn, "SELECT eduDoc FROM users WHERE email = '{$_SESSION['user']}'");
    $user = mysqli_fetch_assoc($query);
    $currentDocs = explode('|', $user['eduDoc']);

    $indexToDelete = array_search($docPathToDelete, $currentDocs);
    if ($indexToDelete !== false) {
        unset($currentDocs[$indexToDelete]);
        $updatedEduDoc = implode('|', array_filter($currentDocs));

        $sql = "UPDATE users SET eduDoc = '$updatedEduDoc' WHERE  email = '{$_SESSION['user']}'";

        if (mysqli_query($conn, $sql)) {
            list($docType, $docDelete) = explode(':', $docPathToDelete);
            if (file_exists($docDelete)) {
                unlink($docDelete);
                $_SESSION['alert'] = "Document deleted successfully!";
            } else {
                $_SESSION['alert'] = "File not found: " . $docPathToDelete;
            }
        } else {
            $_SESSION['alert'] = "Error updating database!";
        }
    } else {
        $_SESSION['alert'] = "Document path not found!";
    }

    echo '<script>';
    echo 'setTimeout(function() {';
    echo '  window.location.href = "profile.php";';
    echo '}, 1);';
    echo '</script>';
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

function isPersonalInfoComplete($user)
{
    $fields = [
        'firstname',
        'lastname',
        'email',
        'phonenumber',
        'dob',
        'gender',
        'marital',
        'nation',
        'address',
        'postcode',
        'passportnum',
        'issuecountry',
        'issuedate',
        'expirydate'
    ];

    foreach ($fields as $field) {
        if (empty($user[$field])) {
            return false;
        }
    }
    return true;
}
$isComplete = isPersonalInfoComplete($user);

function isAcademicInfoComplete($user)
{
    $fields = [
        'institutionname',
        'studycountry',
        'qualification',
        'cgpa',
        'startdate',
        'enddate',
        'language',
        'eduaddress'
    ];

    foreach ($fields as $field) {
        if (empty($user[$field])) {
            return false;
        }
    }
    return true;
}
$isAcademicComplete = isAcademicInfoComplete($user);

function isWorkExperienceComplete($user)
{
    $fields = [
        'companyname',
        'jobtitle',
        'jobstartdate',
        'jobenddate',
        'jobresponsibilities'
    ];

    foreach ($fields as $field) {
        if (empty($user[$field])) {
            return false;
        }
    }
    return true;
}
$isWorkExperienceComplete = isWorkExperienceComplete($user);

function isDocumentsComplete($documentString)
{
    // Define the required documents
    $requiredDocs = [
        'IELTS',
        'SSC_Certificate',
        'SSC_Transcript',
        'HSC_Certificate',
        'HSC_Transcript'
    ];

    foreach ($requiredDocs as $doc) {
        if (strpos($documentString, $doc) === false) {
            return false;
        }
    }
    return true;
}

$document = mysqli_fetch_array(mysqli_query($conn, "SELECT eduDoc FROM users WHERE email = '{$_SESSION['user']}'"));
$documentString = $document['eduDoc'];
$isDocumentsComplete = isDocumentsComplete($documentString);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="images/Next Steps logo.png">
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

        .doc-container {
            background-color: hsl(0, 0%, 85%);
        }

        .doc-container:hover {
            cursor: pointer;
            background-color: hsl(0, 0%, 65%);
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
                                <p class="<?php echo $isComplete ? 'text-success' : 'text-danger'; ?>">
                                    <?php echo $isComplete ? 'Complete' : 'Incomplete'; ?>
                                </p>
                            </a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#equalif">
                                Academic Qualification<br>
                                <p class="<?php echo $isAcademicComplete ? 'text-success' : 'text-danger'; ?>">
                                    <?php echo $isAcademicComplete ? 'Complete' : 'Incomplete'; ?>
                                </p>
                            </a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#docs">
                                Documents<br>
                                <p class="<?php echo $isDocumentsComplete ? 'text-success' : 'text-danger'; ?>">
                                    <?php echo $isDocumentsComplete ? 'Complete' : 'Incomplete'; ?>
                                </p>
                            </a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#wexp">
                                Work Experience<br>
                                <p class="<?php echo $isWorkExperienceComplete ? 'text-success' : 'text-danger'; ?>">
                                    <?php echo $isWorkExperienceComplete ? 'Complete' : 'Incomplete'; ?>
                                </p>
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
                                        <img src="<?php echo $user['profilePic']; ?>" alt="Avatar"
                                            class="img-fluid mb-4" style="width: 10rem;" />
                                        <h5><?php echo $user['firstname'] . " " . $user['lastname']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6 class="text-secondary fs-5 mt-1">Personal Information</h6>
                                            <?php
                                            $appQuery = mysqli_query($conn, "SELECT `applied` FROM `users` WHERE email = '{$_SESSION['user']}'");
                                            $appNum = mysqli_fetch_assoc($appQuery);

                                            if (empty($appNum['applied']) || $appNum['applied'] == 0) {
                                                echo '
                                                    <button class="btn border mb-1 editBtn">
                                                        <i class="far fa-edit editData"><span class="h6 ms-1">Edit</span></i>
                                                    </button>';
                                            }
                                            ?>
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
                                                <select class="form-control mb-3 hidden" name="nationality" id="nationality">
                                                    <?php
                                                    $countries = [
                                                        'Afghanistan',
                                                        'Albania',
                                                        'Algeria',
                                                        'Andorra',
                                                        'Angola',
                                                        'Argentina',
                                                        'Armenia',
                                                        'Australia',
                                                        'Austria',
                                                        'Azerbaijan',
                                                        'Bahamas',
                                                        'Bahrain',
                                                        'Bangladesh',
                                                        'Barbados',
                                                        'Belarus',
                                                        'Belgium',
                                                        'Belize',
                                                        'Benin',
                                                        'Bhutan',
                                                        'Bolivia',
                                                        'Bosnia and Herzegovina',
                                                        'Botswana',
                                                        'Brazil',
                                                        'Brunei',
                                                        'Bulgaria',
                                                        'Burkina Faso',
                                                        'Burundi',
                                                        'Cabo Verde',
                                                        'Cambodia',
                                                        'Cameroon',
                                                        'Canada',
                                                        'Central African Republic',
                                                        'Chad',
                                                        'Chile',
                                                        'China',
                                                        'Colombia',
                                                        'Comoros',
                                                        'Congo (Congo-Brazzaville)',
                                                        'Costa Rica',
                                                        'Croatia',
                                                        'Cuba',
                                                        'Cyprus',
                                                        'Czechia (Czech Republic)',
                                                        'Denmark',
                                                        'Djibouti',
                                                        'Dominica',
                                                        'Dominican Republic',
                                                        'Ecuador',
                                                        'Egypt',
                                                        'El Salvador',
                                                        'Equatorial Guinea',
                                                        'Eritrea',
                                                        'Estonia',
                                                        'Eswatini (fmr. "Swaziland")',
                                                        'Ethiopia',
                                                        'Fiji',
                                                        'Finland',
                                                        'France',
                                                        'Gabon',
                                                        'Gambia',
                                                        'Georgia',
                                                        'Germany',
                                                        'Ghana',
                                                        'Greece',
                                                        'Grenada',
                                                        'Guatemala',
                                                        'Guinea',
                                                        'Guinea-Bissau',
                                                        'Guyana',
                                                        'Haiti',
                                                        'Honduras',
                                                        'Hungary',
                                                        'Iceland',
                                                        'India',
                                                        'Indonesia',
                                                        'Iran',
                                                        'Iraq',
                                                        'Ireland',
                                                        'Israel',
                                                        'Italy',
                                                        'Jamaica',
                                                        'Japan',
                                                        'Jordan',
                                                        'Kazakhstan',
                                                        'Kenya',
                                                        'Kiribati',
                                                        'Kuwait',
                                                        'Kyrgyzstan',
                                                        'Laos',
                                                        'Latvia',
                                                        'Lebanon',
                                                        'Lesotho',
                                                        'Liberia',
                                                        'Libya',
                                                        'Liechtenstein',
                                                        'Lithuania',
                                                        'Luxembourg',
                                                        'Madagascar',
                                                        'Malawi',
                                                        'Malaysia',
                                                        'Maldives',
                                                        'Mali',
                                                        'Malta',
                                                        'Marshall Islands',
                                                        'Mauritania',
                                                        'Mauritius',
                                                        'Mexico',
                                                        'Micronesia',
                                                        'Moldova',
                                                        'Monaco',
                                                        'Mongolia',
                                                        'Montenegro',
                                                        'Morocco',
                                                        'Mozambique',
                                                        'Myanmar (formerly Burma)',
                                                        'Namibia',
                                                        'Nauru',
                                                        'Nepal',
                                                        'Netherlands',
                                                        'New Zealand',
                                                        'Nicaragua',
                                                        'Niger',
                                                        'Nigeria',
                                                        'North Macedonia',
                                                        'Norway',
                                                        'Oman',
                                                        'Pakistan',
                                                        'Palau',
                                                        'Palestine State',
                                                        'Panama',
                                                        'Papua New Guinea',
                                                        'Paraguay',
                                                        'Peru',
                                                        'Philippines',
                                                        'Poland',
                                                        'Portugal',
                                                        'Qatar',
                                                        'Romania',
                                                        'Russia',
                                                        'Rwanda',
                                                        'Saint Kitts and Nevis',
                                                        'Saint Lucia',
                                                        'Saint Vincent and the Grenadines',
                                                        'Samoa',
                                                        'San Marino',
                                                        'Sao Tome and Principe',
                                                        'Saudi Arabia',
                                                        'Senegal',
                                                        'Serbia',
                                                        'Seychelles',
                                                        'Sierra Leone',
                                                        'Singapore',
                                                        'Slovakia',
                                                        'Slovenia',
                                                        'Solomon Islands',
                                                        'Somalia',
                                                        'South Africa',
                                                        'South Korea',
                                                        'South Sudan',
                                                        'Spain',
                                                        'Sri Lanka',
                                                        'Sudan',
                                                        'Suriname',
                                                        'Sweden',
                                                        'Switzerland',
                                                        'Syria',
                                                        'Tajikistan',
                                                        'Tanzania',
                                                        'Thailand',
                                                        'Timor-Leste',
                                                        'Togo',
                                                        'Tonga',
                                                        'Trinidad and Tobago',
                                                        'Tunisia',
                                                        'Turkey',
                                                        'Turkmenistan',
                                                        'Tuvalu',
                                                        'Uganda',
                                                        'Ukraine',
                                                        'United Arab Emirates',
                                                        'United Kingdom',
                                                        'United States of America',
                                                        'Uruguay',
                                                        'Uzbekistan',
                                                        'Vanuatu',
                                                        'Venezuela',
                                                        'Vietnam',
                                                        'Yemen',
                                                        'Zambia',
                                                        'Zimbabwe'
                                                    ];
                                                    foreach ($countries as $country) {
                                                        $selected = ($user['nation'] === $country) ? 'selected' : '';
                                                        echo "<option value=\"$country\" $selected>$country</option>";
                                                    }
                                                    ?>
                                                </select>
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
                                                <input type="date" class="form-control mb-3 hidden" id="issue_date"
                                                    value="<?php echo $user['issuedate']; ?>" name="issue_date"
                                                    pattern="\d{4}-\d{2}-\d{2}" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Expiry Date</h6>
                                                <p class="text-muted"><?php echo $user['expirydate']; ?></p>
                                                <input type="date" class="form-control hidden" id="expiry_date"
                                                    value="<?php echo $user['expirydate']; ?>" name="expiry_date"
                                                    pattern="\d{4}-\d{2}-\d{2}" />
                                                <p class="text-danger hidden warning mb-0 text-end">*Must be at least 6
                                                    month
                                                </p>
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
                        <form action="" id="eduForm" method="POST" enctype="multipart/form-data">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white d-flex justify-content-center align-items-center"
                                    style="height: auto;">
                                    <div>
                                        <img src="<?php echo $user['profilePic']; ?>" alt="Avatar"
                                            class="img-fluid mb-4" style="width: 10rem;" />
                                        <h5><?php echo $user['firstname'] . " " . $user['lastname']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6 class="text-secondary fs-5">Academic Qualification</h6>
                                            <?php
                                            $appQuery = mysqli_query($conn, "SELECT `applied` FROM `users` WHERE email = '{$_SESSION['user']}'");
                                            $appNum = mysqli_fetch_assoc($appQuery);

                                            if (empty($appNum['applied']) || $appNum['applied'] == 0) {
                                                echo '
                                                    <button class="btn border mb-1 editBtn">
                                                        <i class="far fa-edit editData"><span class="h6 ms-1">Edit</span></i>
                                                    </button>';;
                                            }
                                            ?>
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
                                                <select class="form-control mb-3 hidden" name="study_country" id="study_country">
                                                    <?php
                                                    $countries = [
                                                        'Afghanistan',
                                                        'Albania',
                                                        'Algeria',
                                                        'Andorra',
                                                        'Angola',
                                                        'Argentina',
                                                        'Armenia',
                                                        'Australia',
                                                        'Austria',
                                                        'Azerbaijan',
                                                        'Bahamas',
                                                        'Bahrain',
                                                        'Bangladesh',
                                                        'Barbados',
                                                        'Belarus',
                                                        'Belgium',
                                                        'Belize',
                                                        'Benin',
                                                        'Bhutan',
                                                        'Bolivia',
                                                        'Bosnia and Herzegovina',
                                                        'Botswana',
                                                        'Brazil',
                                                        'Brunei',
                                                        'Bulgaria',
                                                        'Burkina Faso',
                                                        'Burundi',
                                                        'Cabo Verde',
                                                        'Cambodia',
                                                        'Cameroon',
                                                        'Canada',
                                                        'Central African Republic',
                                                        'Chad',
                                                        'Chile',
                                                        'China',
                                                        'Colombia',
                                                        'Comoros',
                                                        'Congo (Congo-Brazzaville)',
                                                        'Costa Rica',
                                                        'Croatia',
                                                        'Cuba',
                                                        'Cyprus',
                                                        'Czechia (Czech Republic)',
                                                        'Denmark',
                                                        'Djibouti',
                                                        'Dominica',
                                                        'Dominican Republic',
                                                        'Ecuador',
                                                        'Egypt',
                                                        'El Salvador',
                                                        'Equatorial Guinea',
                                                        'Eritrea',
                                                        'Estonia',
                                                        'Eswatini (fmr. "Swaziland")',
                                                        'Ethiopia',
                                                        'Fiji',
                                                        'Finland',
                                                        'France',
                                                        'Gabon',
                                                        'Gambia',
                                                        'Georgia',
                                                        'Germany',
                                                        'Ghana',
                                                        'Greece',
                                                        'Grenada',
                                                        'Guatemala',
                                                        'Guinea',
                                                        'Guinea-Bissau',
                                                        'Guyana',
                                                        'Haiti',
                                                        'Honduras',
                                                        'Hungary',
                                                        'Iceland',
                                                        'India',
                                                        'Indonesia',
                                                        'Iran',
                                                        'Iraq',
                                                        'Ireland',
                                                        'Israel',
                                                        'Italy',
                                                        'Jamaica',
                                                        'Japan',
                                                        'Jordan',
                                                        'Kazakhstan',
                                                        'Kenya',
                                                        'Kiribati',
                                                        'Kuwait',
                                                        'Kyrgyzstan',
                                                        'Laos',
                                                        'Latvia',
                                                        'Lebanon',
                                                        'Lesotho',
                                                        'Liberia',
                                                        'Libya',
                                                        'Liechtenstein',
                                                        'Lithuania',
                                                        'Luxembourg',
                                                        'Madagascar',
                                                        'Malawi',
                                                        'Malaysia',
                                                        'Maldives',
                                                        'Mali',
                                                        'Malta',
                                                        'Marshall Islands',
                                                        'Mauritania',
                                                        'Mauritius',
                                                        'Mexico',
                                                        'Micronesia',
                                                        'Moldova',
                                                        'Monaco',
                                                        'Mongolia',
                                                        'Montenegro',
                                                        'Morocco',
                                                        'Mozambique',
                                                        'Myanmar (formerly Burma)',
                                                        'Namibia',
                                                        'Nauru',
                                                        'Nepal',
                                                        'Netherlands',
                                                        'New Zealand',
                                                        'Nicaragua',
                                                        'Niger',
                                                        'Nigeria',
                                                        'North Macedonia',
                                                        'Norway',
                                                        'Oman',
                                                        'Pakistan',
                                                        'Palau',
                                                        'Palestine State',
                                                        'Panama',
                                                        'Papua New Guinea',
                                                        'Paraguay',
                                                        'Peru',
                                                        'Philippines',
                                                        'Poland',
                                                        'Portugal',
                                                        'Qatar',
                                                        'Romania',
                                                        'Russia',
                                                        'Rwanda',
                                                        'Saint Kitts and Nevis',
                                                        'Saint Lucia',
                                                        'Saint Vincent and the Grenadines',
                                                        'Samoa',
                                                        'San Marino',
                                                        'Sao Tome and Principe',
                                                        'Saudi Arabia',
                                                        'Senegal',
                                                        'Serbia',
                                                        'Seychelles',
                                                        'Sierra Leone',
                                                        'Singapore',
                                                        'Slovakia',
                                                        'Slovenia',
                                                        'Solomon Islands',
                                                        'Somalia',
                                                        'South Africa',
                                                        'South Korea',
                                                        'South Sudan',
                                                        'Spain',
                                                        'Sri Lanka',
                                                        'Sudan',
                                                        'Suriname',
                                                        'Sweden',
                                                        'Switzerland',
                                                        'Syria',
                                                        'Tajikistan',
                                                        'Tanzania',
                                                        'Thailand',
                                                        'Timor-Leste',
                                                        'Togo',
                                                        'Tonga',
                                                        'Trinidad and Tobago',
                                                        'Tunisia',
                                                        'Turkey',
                                                        'Turkmenistan',
                                                        'Tuvalu',
                                                        'Uganda',
                                                        'Ukraine',
                                                        'United Arab Emirates',
                                                        'United Kingdom',
                                                        'United States of America',
                                                        'Uruguay',
                                                        'Uzbekistan',
                                                        'Vanuatu',
                                                        'Venezuela',
                                                        'Vietnam',
                                                        'Yemen',
                                                        'Zambia',
                                                        'Zimbabwe'
                                                    ];
                                                    foreach ($countries as $country) {
                                                        $selected = ($user['studycountry'] === $country) ? 'selected' : '';
                                                        echo "<option value=\"$country\" $selected>$country</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Highest Level of Qualification</h6>
                                                <p class="text-muted"><?php echo $user['qualification']; ?></p>
                                                <input type="text" class="form-control mb-3 hidden"
                                                    value="<?php echo $user['qualification']; ?>" name="qualification"
                                                    pattern="[A-Za-z .]+" />
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Result</h6>
                                                <p class="text-muted"><?php echo $user['cgpa']; ?></p>
                                                <div class="input-group mb-3 hidden cgpa">
                                                    <select class="form-select" id="main-select">
                                                        <option selected>Select Result Type</option>
                                                        <option value="CGPA">CGPA (Out of 4)</option>
                                                        <option value="GPA">GPA (Out of 5)</option>
                                                        <option value="Grades">Grade</option>
                                                        <option value="Percentage">Percentage Score</option>
                                                        <option value="Class Rank">Class Rank</option>
                                                    </select>

                                                    <select class="form-select" id="sub-select">
                                                        <option>Select a corresponding result</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Hidden input to store combined result -->
                                            <input type="hidden" id="combined-result" name="cgpa">
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

                    <!-- Documents Card -->
                    <div class="card hidden" id="docs" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white d-flex justify-content-center align-items-center"
                                style="height: auto;">
                                <div>
                                    <img src="<?php echo $user['profilePic']; ?>" alt="Avatar" class="img-fluid mb-4"
                                        style="width: 10rem;" />
                                    <h5><?php echo $user['firstname'] . " " . $user['lastname']; ?></h5>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between mb-1">
                                        <h6 class="text-secondary fs-5">Documents</h6>
                                        <?php
                                        $appQuery = mysqli_query($conn, "SELECT `applied` FROM `users` WHERE email = '{$_SESSION['user']}'");
                                        $appNum = mysqli_fetch_assoc($appQuery);

                                        if (empty($appNum['applied']) || $appNum['applied'] == 0) {
                                            echo '
                                                <button class="btn border mb-1" data-bs-toggle="modal" data-bs-target="#documentModal">
                                                    <i class="fa-solid fa-file-circle-plus cursor-pointer"><span class="h6 ms-1">Upload</span></i>
                                                 </button>';
                                        }
                                        ?>
                                    </div>
                                    <hr class="mt-0 mb-4">

                                    <div class="" style="height: 40rem; overflow: auto;">
                                        <div>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT eduDoc FROM `users` WHERE email = '{$_SESSION['user']}'");
                                            $documents = mysqli_fetch_assoc($query)['eduDoc'];

                                            if (empty($documents)) {
                                                echo '<p class="text-center fw-bold">No document found</p>';
                                            } else {
                                                $documentArray = explode('|', $documents);
                                                foreach ($documentArray as $doc) {
                                                    list($docType, $docPath) = explode(':', $doc);
                                                    list($docFolder, $docName) = explode('/', $docPath);
                                            ?>
                                                    <div class="mb-3 px-3 py-2 rounded doc-container"
                                                        onclick="window.open('<?php echo $docPath; ?>', '_blank')">
                                                        <div class="d-flex justify-content-between">
                                                            <p class="mb-3 fw-semibold"><?php echo $docType; ?></p>
                                                            <a href="#"
                                                                onclick="event.stopPropagation(); window.location.href='?delDocPath=<?php echo urlencode($doc); ?>';">
                                                                <i class="fa-solid fa-trash cursor-pointer z-3"></i>
                                                            </a>
                                                        </div>

                                                        <div class="d-flex gap-3">
                                                            <img src="<?php echo $docPath; ?>" alt="documents"
                                                                class="img-thumbnail" style="width: 4rem;">
                                                            <p class="d-flex flex-column justify-content-center lead">
                                                                <?php echo $docName; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Document Upload Modal -->
                    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="documentModalLabel">Upload Document</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="documentType" class="form-label">Document Type</label>
                                            <select class="form-select" id="documentType" name="documentType" required>
                                                <option selected disabled>Select Document Type</option>
                                                <option value="IELTS">IELTS</option>
                                                <option value="SSC_Certificate">SSC Certificate</option>
                                                <option value="SSC_Transcript">SSC Transcript</option>
                                                <option value="HSC_Certificate">HSC Certificate</option>
                                                <option value="HSC_Transcript">HSC Transcript</option>
                                            </select>
                                        </div>
                                        <div class="">
                                            <label for="fileInput" class="form-label">Upload File</label>
                                            <input class="form-control" type="file" id="fileInput" name="file"
                                                accept="image/*" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Work Experience Card -->
                    <div class="card hidden" id="wexp" style="border-radius: .5rem;">
                        <form action="" method="POST">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white d-flex justify-content-center align-items-center"
                                    style="height: auto;">
                                    <div>
                                        <img src="<?php echo $user['profilePic']; ?>" alt="Avatar"
                                            class="img-fluid mb-4" style="width: 10rem;" />
                                        <h5><?php echo $user['firstname'] . " " . $user['lastname']; ?></h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6 class="text-secondary fs-5">Work Experience</h6>
                                            <?php
                                            $appQuery = mysqli_query($conn, "SELECT `applied` FROM `users` WHERE email = '{$_SESSION['user']}'");
                                            $appNum = mysqli_fetch_assoc($appQuery);

                                            if (empty($appNum['applied']) || $appNum['applied'] == 0) {
                                                echo '
                                                    <button class="btn border mb-1 editBtn">
                                                        <i class="far fa-edit editData"><span class="h6 ms-1">Edit</span></i>
                                                    </button>';;
                                            }
                                            ?>
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
        document.querySelectorAll('.editBtn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
            });
        });

        $(document).ready(function() {
            // NavBar Card Toggle
            $('.nav-link').click(function(e) {
                e.preventDefault();
                var targetCard = $(this).attr('href').substring(1);
                var currentCard = $('.card:visible');

                if (currentCard.attr('id') !== targetCard) {
                    currentCard.addClass('animate__animated animate__fadeOut')
                        .one('animationend', function() {
                            $(this).addClass('hidden').removeClass('animate__animated animate__fadeOut');
                            $('#' + targetCard).removeClass('hidden').addClass('animate__animated animate__fadeIn')
                                .one('animationend', function() {
                                    $(this).removeClass('animate__animated animate__fadeIn');
                                });
                        });
                }
            });

            // Edit/Discard in the form
            $('.editData').click(function() {
                var cardBody = $(this).closest('.card-body');
                cardBody.find('p.text-muted').addClass('hidden');
                cardBody.find('p.warning').removeClass('hidden');
                cardBody.find('input, select, textarea, .input-group').removeClass('hidden');
                cardBody.find('.saveBtn, .discardBtn, .docUpBtn').removeClass('hidden');
            });

            $('.discardBtn').click(function() {
                var cardBody = $(this).closest('.card-body');
                cardBody.find('input, select, textarea, .input-group').addClass('hidden');
                cardBody.find('p.text-muted').removeClass('hidden');
                cardBody.find('.saveBtn, .discardBtn').addClass('hidden');
                cardBody.find('.editData').removeClass('hidden');
            });

            document.getElementById('issue_date').addEventListener('change', function() {
                let issueDate = new Date(this.value);
                if (!isNaN(issueDate.getTime())) {
                    // Add 6 months to the issue date
                    issueDate.setMonth(issueDate.getMonth() + 6);

                    // Set min attribute on the expiry date field
                    let minExpiryDate = issueDate.toISOString().split('T')[0]; // Format as YYYY-MM-DD
                    document.getElementById('expiry_date').setAttribute('min', minExpiryDate);
                }
            });

            // Script for CGPA Calculation
            const mainSelect = document.getElementById("main-select");
            const subSelect = document.getElementById("sub-select");
            const combinedResult = document.getElementById("combined-result");

            const resultOptions = {
                CGPA: [{
                    value: "4.0",
                    label: "4.0"
                }, {
                    value: "3.5",
                    label: "3.5"
                }, {
                    value: "3.0",
                    label: "3.0",
                }, {
                    value: "2.5",
                    label: "2.5",
                }, {
                    value: "2.0",
                    label: "2.0",
                }],
                GPA: [{
                    value: "5.0",
                    label: "5.0"
                }, {
                    value: "4.5",
                    label: "4.5"
                }, {
                    value: "4.0",
                    label: "4.0"
                }, {
                    value: "3.5",
                    label: "3.5"
                }, {
                    value: "3.0",
                    label: "3.0"
                }, {
                    value: "2.5",
                    label: "2.5"
                }, ],
                Grades: [{
                    value: "A+",
                    label: "A+ (Excellent)"
                }, {
                    value: "A",
                    label: "A (Good)"
                }, {
                    value: "A-",
                    label: "A- (Satisfactory)"
                }, {
                    value: "B+",
                    label: "B+ (Pass)"
                }, {
                    value: "B",
                    label: "B (Permissible)"
                }, ],
                Percentage: [{
                    value: "90-100%",
                    label: "90-100%"
                }, {
                    value: "75-89%",
                    label: "75-89%"
                }, {
                    value: "<50%",
                    label: "<50%"
                }, {
                    value: "75-89",
                    label: "75-89%"
                }, ],
                "Class Rank": [{
                    value: "First Class",
                    label: "First Class"
                }, {
                    value: "Second Class",
                    label: "Second Class"
                }, {
                    value: "Third Class",
                    label: "Third Class"
                }, ]
            };

            mainSelect.addEventListener("change", function() {
                const selectedType = mainSelect.value;
                subSelect.innerHTML = `<option>Select a corresponding result</option>`;

                if (resultOptions[selectedType]) {
                    resultOptions[selectedType].forEach(option => {
                        const opt = document.createElement("option");
                        opt.value = option.value;
                        opt.textContent = option.label;
                        subSelect.appendChild(opt);
                    });
                }
                updateCombinedResult();
            });

            subSelect.addEventListener("change", updateCombinedResult);

            function updateCombinedResult() {
                const mainValue = mainSelect.value;
                const subValue = subSelect.value;
                combinedResult.value = mainValue && subValue ? `${mainValue}: ${subValue}` : "";
            }
        });

        // Document Upload
        document.getElementById('uploadButton').addEventListener('click', function() {
            document.getElementById('uploadedFile').click();
        });
        document.getElementById('uploadedFile').addEventListener('change', function() {
            document.getElementById('formDoc').submit();
        });
    </script>
</body>

</html>