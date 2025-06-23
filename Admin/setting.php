<?php
session_start();
include "../connection.php";
// Admin Data
$adminData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `admin`"));
if (!isset($_SESSION['user']) || $_SESSION['user'] !== $adminData['adminName']) {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../login.php'</script>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adminName'])) {
        $newAdminName = mysqli_real_escape_string($conn, $_POST['adminName']);
        $updateNameQuery = "UPDATE `admin` SET `adminName` = '$newAdminName' WHERE `id` = 1";

        if (mysqli_query($conn, $updateNameQuery)) {
            echo "<script>alert('Admin name updated successfully.')</script>";
        } else {
            echo "<script>alert('Failed to update admin name.')</script>";
        }
        echo "<script>location.href='setting.php'</script>";
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
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="container-fluid px-0">
        <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
            <div style="width: 100%">
                <div class="d-flex">
                    <button class="btn open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                    <h3 class="mt-2 ms-1">Settings</h3>
                </div>
                <div class="ms-5 mt-5">
                    <h4 class="mb-5">Change Username</h4>
                    <div class="rounded shadow-lg p-4 col-11 col-md-6" style="background-color: #f7f9fb;">
                        <form action="" METHOD="POST">
                            <div class="d-flex gap-5 mb-3">
                                <p class="mt-3 fs-5">Current Admin Name</p>
                                <input class="ms-5 form-control" type="text" value="<?php echo $adminData['adminName']; ?>" disabled>
                            </div>
                            <div class="d-flex gap-5">
                                <p class="mt-3 fs-5">Change Admin Name</p>
                                <input class="ms-5 form-control" type="text" name="adminName">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-success mt-4" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>