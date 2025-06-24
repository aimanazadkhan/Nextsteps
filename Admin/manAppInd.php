<?php
session_start();
include "../connection.php";
// Admin Data
$adminData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `admin`"));
if (!isset($_SESSION['user']) || $_SESSION['user'] !== $adminData['adminName']) {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../login.php'</script>";
}
$appId = $_GET['appId'];

$mergedQuery = "
SELECT 
    a.*, 
    u.*, 
    c.country_name, 
    cl.course_title, 
    cl.course_level, 
    cl.available_intakes,
    cl.tuition_fees
FROM applications a
JOIN university u ON u.id = a.uniID
JOIN country c ON c.id = u.country_id
JOIN course_list cl ON cl.id = a.courseID
WHERE a.id = '{$appId}'
";

$result = mysqli_query($conn, $mergedQuery);
$app = mysqli_fetch_assoc($result);

// Application User Data
$applicationUserData = mysqli_query($conn, "SELECT a.*, up.* FROM auth a
                                        JOIN user_personal up ON up.auth_id = a.id 
                                        WHERE `email` = '{$app['userEmail']}'");
$user = mysqli_fetch_assoc($applicationUserData);

if (isset($_POST['appStatus'], $_POST['appId']) && is_numeric($_POST['appId'])) {
    $status = mysqli_real_escape_string($conn, $_POST['appStatus']);

    $update = mysqli_query($conn, "UPDATE applications SET appStatus = '$status' WHERE id = '$appId'");

    if ($update) {
        header("Location: manAppInd.php?app=$appId");
        exit;
    } else {
        echo "<script>alert('Failed to update status');</script>";
    }
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
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <!-- Aniamte.CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .clickable {
            cursor: pointer;
        }

        .fade-in {
            animation: fadeIn 0.3s;
        }

        .fade-out {
            animation: fadeOut 0.3s;
        }

        .d-none {
            opacity: 0;
            pointer-events: none;
        }

        .section {
            transition: opacity 0.5s ease-in-out;
        }

        .active-section {
            opacity: 1;
            pointer-events: auto;
        }
    </style>
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
                    <div class="card border-0 shadow-lg p-3 mx-5 mt-4 mb-3">
                        <div class="row align-items-center text-center">
                            <!-- Left Side -->
                            <div class="col-lg-5 col-md-12">
                                <h6 class="text-muted">Application ID: <?php echo $app['id']; ?></h6>
                                <h5 class="fw-bold mb-1"><?php echo $user['firstname'] . " " . $user['lastname'] ?></h5>
                                <p class="mb-2 text-secondary">Student ID: <?php echo $user['id']; ?></p>
                                <p class="text-muted"><?php echo $user['address']; ?></p>
                                <!-- <button class="btn btn-success btn-sm px-3">View Profile</button> -->
                                <!-- <span class="text-secondary ms-3">77% completed</span> -->
                            </div>

                            <div class="vr p-0 m-0"></div>

                            <!-- Right Side -->
                            <div class="col-lg-6 col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Application Info -->
                                    <div class="">
                                        <h4 class="fw-bold mb-0"><?php echo $app['university_name']; ?></h4>
                                        <h5 class="mb-2"><?php echo $app['country_name']; ?></h5>
                                    </div>
                                    <!-- Application Status Dropdown -->
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="appId" value="<?= $app['id'] ?>">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?= htmlspecialchars($app['appStatus']) ?>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                                                <?php
                                                $statusOptions = [
                                                    "Application Initiated",
                                                    "Application Drafted",
                                                    "Application Submitted for Review",
                                                    "Application on Hold for Modification",
                                                    "Application Lodged",
                                                    "Application Submitted to Institution",
                                                    "Application Rejected",
                                                    "Conditional Offer",
                                                    "Unconditional Offer",
                                                    "Tuition Fee Paid",
                                                    "CAS/i20/COE Issued",
                                                    "Visa Application Submitted",
                                                    "Visa Rejected",
                                                    "Visa Issued",
                                                    "Student Enrolled"
                                                ];

                                                foreach ($statusOptions as $status):
                                                ?>
                                                    <li>
                                                        <button type="submit" name="appStatus" value="<?= $status ?>" class="dropdown-item">
                                                            <?= $status ?>
                                                        </button>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </form>
                                </div>

                                <!-- Additional Details -->
                                <div class="mt-3 row text-center">
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Intake(s)</h6>
                                        <p class="mb-0"><?php echo $app['available_intakes']; ?></p>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Levels</h6>
                                        <p class="mb-0"><?php echo $app['course_level']; ?></p>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Tuition</h6>
                                        <p class="mb-0"><?php echo $app['tuition_fees']; ?></p>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 text-muted">Application Fee</h6>
                                        <p class="mb-0">-</p>
                                    </div>
                                </div>

                                <!-- Contact -->
                                <div class="mt-3">
                                    <p class="text-muted mb-0 text-end">
                                        Speak to us about this application right now
                                    </p>
                                    <h5 class="fw-bold text-primary mb-0 text-end">NextSteps Contact Number</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-lg p-3 mx-5">
                        <!-- Header -->
                        <div class="d-flex align-items-center gap-4">
                            <p class="fw-bold m-0 pb-1 clickable" id="documents-tab" onclick="showSection('documents')">Documents</p>
                            <div class="d-flex">
                                <p class="fw-bold border-bottom border-primary border-2 m-0 pb-1 clickable" id="messages-tab" onclick="showSection('messages')">Comments</p>
                            </div>
                        </div>

                        <!-- Document Section -->
                        <div id="documents" class="d-none">
                            <div class="container my-4">
                                <div class="d-flex justify-content-between">
                                    <!-- Submitted -->
                                    <div class="text-center p-3 rounded" style="flex: 1; background: linear-gradient(to bottom, #e0f0ff, #cce5ff); margin: 0 5px; border: 1px solid #b3d7ff;">
                                        <h5 class="mb-1">2</h5>
                                        <small>Submitted</small>
                                    </div>
                                    <!-- Pending -->
                                    <div class="text-center p-3 rounded" style="flex: 1; background: linear-gradient(to bottom, #fff5e6, #ffe6b3); margin: 0 5px; border: 1px solid #ffd699;">
                                        <h5 class="mb-1">2</h5>
                                        <small>Pending</small>
                                    </div>
                                    <!-- Not Approved -->
                                    <div class="text-center p-3 rounded" style="flex: 1; background: linear-gradient(to bottom, #ffe5e5, #ffcccc); margin: 0 5px; border: 1px solid #ff9999;">
                                        <h5 class="mb-1">0</h5>
                                        <small>Not Approved</small>
                                    </div>
                                    <!-- Accepted -->
                                    <div class="text-center p-3 rounded" style="flex: 1; background: linear-gradient(to bottom, #e6fffa, #b3fff0); margin: 0 5px; border: 1px solid #99ffe0;">
                                        <h5 class="mb-1">6</h5>
                                        <small>Accepted</small>
                                    </div>
                                </div>
                            </div>

                            <div style="max-height: 48vh; overflow-y: auto;">
                                <!-- Application Submission Screenshot -->
                                <div class="card shadow-lg border-0 border-start border-success border-5 flex-grow-1 mb-3 mt-3">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="card-title mb-1">Application Submission Screenshot. <span class="badge bg-success me-3">Accepted</span></h6>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <button class="btn btn-outline-primary btn-sm me-2">
                                                <i class="bi bi-upload"></i> Upload
                                            </button>
                                            <button class="btn btn-link text-decoration-none text-danger">
                                                Show updates <span class="badge bg-danger ms-1">1</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Letter of Recommendation -->
                                <div class="card shadow-lg border-0 border-start border-success border-5 flex-grow-1 mb-3 mt-3">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="card-title mb-1">Letter of Recommendation <span class="badge bg-success me-3">Accepted</span></h6>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <button class="btn btn-outline-primary btn-sm me-2">
                                                <i class="bi bi-upload"></i> Upload
                                            </button>
                                            <button class="btn btn-link text-decoration-none text-danger">
                                                Show updates <span class="badge bg-danger ms-1">1</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- University Application Form -->
                                <div class="card shadow-lg border-0 border-start border-success border-5 flex-grow-1 mb-3 mt-3">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="card-title mb-1">University Application Form. <span class="badge bg-success me-3">Accepted</span></h6>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <button class="btn btn-outline-primary btn-sm me-2">
                                                <i class="bi bi-upload"></i> Upload
                                            </button>
                                            <button class="btn btn-link text-decoration-none text-danger">
                                                Show updates <span class="badge bg-danger ms-1">1</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Statement of Purpose -->
                                <div class="card shadow-lg border-0 border-start border-success border-5 flex-grow-1 mb-3 mt-3">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="card-title mb-1">Statement of Purpose <span class="badge bg-success me-3">Accepted</span></h6>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <button class="btn btn-outline-primary btn-sm me-2">
                                                <i class="bi bi-upload"></i> Upload
                                            </button>
                                            <button class="btn btn-link text-decoration-none text-danger">
                                                Show updates <span class="badge bg-danger ms-1">1</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- SSC Certificate & Transcript -->
                                <div class="card shadow-lg border-0 border-start border-success border-5 flex-grow-1 mb-3 mt-3">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="card-title mb-1">SSC Certificate & Transcript <span class="badge bg-success me-3">Accepted</span></h6>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <button class="btn btn-outline-primary btn-sm me-2">
                                                <i class="bi bi-upload"></i> Upload
                                            </button>
                                            <button class="btn btn-link text-decoration-none text-danger">
                                                Show updates <span class="badge bg-danger ms-1">1</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- HSC Certificate & Transcript -->
                                <div class="card shadow-lg border-0 border-start border-success border-5 flex-grow-1 mb-3 mt-3">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="card-title mb-1">HSC Certificate & Transcript <span class="badge bg-success me-3">Accepted</span></h6>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <button class="btn btn-outline-primary btn-sm me-2">
                                                <i class="bi bi-upload"></i> Upload
                                            </button>
                                            <button class="btn btn-link text-decoration-none text-danger">
                                                Show updates <span class="badge bg-danger ms-1">1</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Messages Section -->
                        <div id="messages" class="active-section">
                            <div class="px-5 mt-4" style="max-height: 45vh; overflow-y: auto;">
                                <?php
                                $messageData = mysqli_query($conn, "SELECT * FROM `messages` WHERE `appId` = '{$appId}'");
                                if (mysqli_num_rows($messageData) > 0) {
                                    while ($message = mysqli_fetch_array($messageData)) {
                                        if (!empty($message['adminMsg']) && empty($message['userMsg'])) { ?>
                                            <!-- Admin message -->
                                            <div class="d-flex justify-content-end text-end">
                                                <div class="card shadow-lg border-0 my-2" style="max-width: 600px;">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-1 fw-bold text-dark"><?php echo $adminData['adminName']; ?></h5>
                                                        <p class="card-text text-dark mb-2"><?php echo base64_decode($message['adminMsg']); ?></p>

                                                        <p class="card-text text-muted small"><?php echo $message['msgOn']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } elseif (!empty($message['userMsg']) && empty($message['adminMsg'])) { ?>
                                            <!-- User message -->
                                            <div class="d-flex justify-content-start">
                                                <div class="card shadow-lg border-0 my-2" style="max-width: 600px;">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-1 fw-bold text-dark"><?php echo $user['lastname']; ?></h5>
                                                        <p class="card-text text-dark mb-2"><?php echo base64_decode($message['userMsg']); ?></p>
                                                        <p class="card-text text-muted small"><?php echo $message['msgOn']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <div class="d-flex justify-content-center align-items-center" style="height: 40vh;">
                                        <div class="card shadow-lg border-0 text-center p-4" style="max-width: 400px;">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold text-dark">Start a Conversation</h5>
                                                <p class="card-text text-muted">Please send a message to start the conversation.</p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div>
                                <form action="manAppInd-action.php" method="POST">
                                    <div id="editor"></div>
                                    <textarea name="adminMsg" id="adminMsg" hidden></textarea>
                                    <input type="hidden" name="appId" value="<?php echo $appId; ?>">
                                    <button type="submit" class="btn btn-primary mt-2">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        // Documents/Message Header functionalities
        function showSection(section) {
            const documentsTab = document.getElementById('documents-tab');
            const messagesTab = document.getElementById('messages-tab');
            const documentsSection = document.getElementById('documents');
            const messagesSection = document.getElementById('messages');

            if (section === 'documents') {
                documentsTab.classList.add('border-bottom', 'border-primary', 'border-2');
                messagesTab.classList.remove('border-bottom', 'border-primary', 'border-2');
                messagesSection.classList.add('fade-out');
                setTimeout(() => {
                    messagesSection.classList.add('d-none');
                    messagesSection.classList.remove('active-section', 'fade-out');
                    documentsSection.classList.remove('d-none');
                    documentsSection.classList.add('active-section', 'fade-in');
                }, 300); // Delay to match the CSS animation duration
            } else if (section === 'messages') {
                messagesTab.classList.add('border-bottom', 'border-primary', 'border-2');
                documentsTab.classList.remove('border-bottom', 'border-primary', 'border-2');
                documentsSection.classList.add('fade-out');
                setTimeout(() => {
                    documentsSection.classList.add('d-none');
                    documentsSection.classList.remove('active-section', 'fade-out');
                    messagesSection.classList.remove('d-none');
                    messagesSection.classList.add('active-section', 'fade-in');
                }, 300); // Delay to match the CSS animation duration
            }
        }

        // CKEditor
        ClassicEditor.create(document.querySelector('#editor'), {
            toolbar: [
                'bold', 'italic', 'underline', '|',
                'heading', 'fontSize', '|',
                'blockQuote', 'insertTable', 'emoji'
            ]
        }).then(editor => {
            const form = document.querySelector('form');
            const hiddenTextarea = document.querySelector('#adminMsg');

            form.addEventListener('submit', () => {
                hiddenTextarea.value = editor.getData(); // Copy editor content to the hidden textarea
            });
        }).catch(error => {
            console.error(error);
        });
    </script>
</body>

</html>