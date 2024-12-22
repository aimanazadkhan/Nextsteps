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
// Application Data
$applicationData = mysqli_query($conn, "SELECT * FROM `applications` WHERE `id` = '{$appId}'");
$app = mysqli_fetch_assoc($applicationData);

// Application User Data
$applicationUserData = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '{$app['userEmail']}'");
$user = mysqli_fetch_assoc($applicationUserData);

// University Data
$applicationUniData = mysqli_query($conn, "SELECT * FROM `search` WHERE `ID` = '{$app['uniID']}'");
$uni = mysqli_fetch_assoc($applicationUniData);


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
                    <div class="card border-0 shadow-lg p-3 mx-5 my-5">
                        <div class="row align-items-center text-center">
                            <!-- Left Side -->
                            <div class="col-lg-5 col-md-12">
                                <h6 class="text-muted">Application ID: <?php echo $app['id']; ?></h6>
                                <h5 class="fw-bold mb-1"><?php echo $user['firstname'] . " " . $user['lastname'] ?></h5>
                                <p class="mb-2 text-secondary">Student ID: <?php echo $user['id']; ?></p>
                                <p class="text-muted"><?php echo $user['address']; ?></p>
                                <button class="btn btn-success btn-sm px-3">View Profile</button>
                                <!-- <span class="text-secondary ms-3">77% completed</span> -->
                            </div>

                            <div class="vr p-0 m-0"></div>

                            <!-- Right Side -->
                            <div class="col-lg-6 col-md-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Application Info -->
                                    <div>
                                        <h4 class="fw-bold mb-0"><?php echo $uni['University']; ?></h4>
                                        <h5 class="mb-2"><?php echo $uni['Country']; ?></h5>
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
                                    <p class="text-muted mb-0 text-end">
                                        Speak to us about this application right now
                                    </p>
                                    <h5 class="fw-bold text-primary mb-0 text-end">+91 9311 9627 38</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-lg p-3 mx-5">
                        <!-- Header -->
                        <div class="d-flex align-items-center gap-4">
                            <p class="fw-bold border-bottom border-primary border-2 m-0 pb-1">Documents</p>
                            <div class="d-flex">
                                <p class="fw-bold border-bottom border-primary border-2 m-0 pb-1">Comments</p>
                                <span class="ms-1 pt-2 badge bg-danger rounded-circle text-center">2</span>
                            </div>
                        </div>
                        <div class="px-5 mt-4" style="max-height: 40vh; overflow-y: auto;">
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
                                                    <p class="card-text text-dark mb-2"><?php echo $message['adminMsg']; ?></p>
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
                                                    <p class="card-text text-dark mb-2"><?php echo $message['userMsg']; ?></p>
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

    <script>
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