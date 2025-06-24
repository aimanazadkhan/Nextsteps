<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='./login.php'</script>";
}
include "connection.php";

$applications = mysqli_query(
    $conn,
    "SELECT 
    a.*, 
    u.university_name,
    c.course_title
    FROM applications a
    LEFT JOIN university u ON a.uniID = u.id
    LEFT JOIN course_list c ON a.courseID = c.id
    WHERE a.userEmail = '{$_SESSION['user']}'"
);

$userQuery = mysqli_query($conn, "
    SELECT 
        a.*, 
        up.id AS personal_id, up.*, 
        ue.id AS education_id, ue.* 
    FROM auth a
    LEFT JOIN user_personal up ON up.auth_id = a.id
    LEFT JOIN user_education ue ON ue.user_id = up.id
    WHERE a.email = '{$_SESSION['user']}'
");

$user = mysqli_fetch_assoc($userQuery);

if (isset($_POST['sendMsg'])) {
    $userMsg = base64_encode($_POST['userMsg']);
    $appId = $_POST['appId'];
    $userId = $user['id'];

    $query = "INSERT INTO `messages` (`userMsg`, `appId`, `userId`) VALUES ('$userMsg','$appId','$userId')";
    if (mysqli_query($conn, $query)) {
        header("Location: applications.php?app=$appId");
        exit();
    } else {
        die("Error inserting message: " . mysqli_error($conn));
        header("Location: applications.php?app=$appId");
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

    <div class="container-fluid">
        <div class="row" style="height: 70vh">

            <!-- Left Sidebar -->
            <div class="col-md-4 col-lg-3 d-flex flex-column p-4 shadow-sm"
                style="background-color: #f9fbfd; border-right: 1px solid #dee2e6; border-radius: 10px 0 0 10px;height: 70vh; overflow-y: auto;">
                <h5 class="fw-semibold" style="color: #1c2b36;">Applications</h5>
                <hr class="border opacity-75">
                <div class="d-flex flex-column gap-3">
                    <?php
                    if (mysqli_num_rows($applications) > 0):
                        while ($application = mysqli_fetch_assoc($applications)):
                            $isActive = (isset($_GET['app']) && $_GET['app'] == $application['id']);
                            $cardClass = "p-3 bg-white rounded shadow-sm text-dark";
                            if ($isActive) {
                                $cardClass .= " border-5 border-start border-primary";
                            }
                    ?>
                            <a href="applications.php?app=<?= $application['id']; ?>">
                                <div class="<?= $cardClass ?>">
                                    <div class="d-flex justify-content-between">
                                        <p class="p-0 m-0">Application: #<?= $application['id'] ?></p>
                                        <p class="px-1 py-1 m-0 bg-success h6 rounded-pill "><?= $application['appStatus'] ?></p>
                                    </div>
                                    <p class="text-muted p-0 m-0"><?= $application['university_name'] ?></p>
                                    <p class="text-muted p-0 m-0"><?= $application['course_title'] ?></p>
                                </div>
                            </a>
                        <?php
                        endwhile;
                    else:
                        ?>
                        <div class="p-3 bg-white rounded shadow-sm text-muted">
                            Please select a course and apply.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Content Area -->
            <div class="col-md-8 col-lg-9 d-flex flex-column p-4"
                style="background-color: #ffffff; border-radius: 0 10px 10px 0; height: 70vh; overflow: hidden;">

                <!-- Scrollable Messages -->
                <div class="flex-grow-1 overflow-auto pe-3" style="scroll-behavior: smooth;">
                    <?php
                    if (isset($_GET['app']) && is_numeric($_GET['app'])) {
                        $appId = $_GET['app'];
                        $messageData = mysqli_query($conn, "SELECT * FROM `messages` WHERE `appId` = '$appId' ORDER BY msgOn ASC");

                        if (mysqli_num_rows($messageData) > 0) {
                            while ($message = mysqli_fetch_assoc($messageData)) {

                                $adminName = "Admin";
                                if (!empty($message['adminID'])) {
                                    $adminResult = mysqli_query($conn, "SELECT adminName FROM admin WHERE id = '{$message['adminID']}' LIMIT 1");
                                    $adminRow = mysqli_fetch_assoc($adminResult);
                                    if ($adminRow) {
                                        $adminName = $adminRow['adminName'];
                                    }
                                }
                                // Admin Message
                                if (!empty($message['adminMsg']) && empty($message['userMsg'])) {
                    ?>
                                    <div class="d-flex justify-content-start text-end">
                                        <div class="card shadow-sm border-0 my-2" style="max-width: 600px;">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1 fw-bold text-dark"><?= htmlspecialchars($adminName) ?></h5>
                                                <p class="card-text text-dark mb-2"><?= base64_decode($message['adminMsg']) ?></p>
                                                <p class="card-text text-muted small"><?= $message['msgOn'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } elseif (!empty($message['userMsg']) && empty($message['adminMsg'])) {
                                ?>
                                    <!-- User Message -->
                                    <div class="d-flex justify-content-end">
                                        <div class="card shadow-sm border-0 my-2" style="max-width: 600px;">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1 fw-bold text-dark"><?= htmlspecialchars($user['firstname']) ?></h5>
                                                <p class="card-text text-dark mb-2"><?= base64_decode($message['userMsg']) ?></p>
                                                <p class="card-text text-muted small"><?= $message['msgOn'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <div class="d-flex justify-content-center align-items-center" style="height: 40vh;">
                                <div class="card shadow-sm border-0 text-center p-4" style="max-width: 400px;">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold text-dark">Start a Conversation</h5>
                                        <p class="card-text text-muted">Please send a message to start the conversation.</p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="d-flex justify-content-center align-items-center" style="height: 40vh;">
                            <div class="card shadow-sm border-0 text-center p-4" style="max-width: 400px;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold text-dark">No Application Selected</h5>
                                    <p class="card-text text-muted">Please select an application from the sidebar to view messages.</p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <!-- Message Input Area -->
                <?php if (isset($_GET['app']) && is_numeric($_GET['app'])): ?>
                    <div class="mt-3">
                        <form action="" method="POST">
                            <div class="form-floating">
                                <textarea class="form-control" name="userMsg" id="userMsg" style="height: 100px" placeholder="Write a message..."></textarea>
                                <label for="userMsg">Write a message...</label>
                            </div>
                            <input type="hidden" name="appId" value="<?= $_GET['app']; ?>">
                            <button name="sendMsg" type="submit" class="btn btn-primary mt-2 float-end">Send</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <?php include "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>