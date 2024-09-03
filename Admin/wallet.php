<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../login.php'</script>";
}
include "../connection.php";

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
</head>

<body>
    <div class="container-fluid px-0">
        <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
            <div style="width: 100%">
                <div class="d-flex">
                    <button class="btn open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                    <h3 class="mt-2 ms-1">Wallet</h3>
                </div>
                <div style="max-height: 90vh; overflow-y: auto;">
                    <div class="mt-4 d-flex justify-content-center">
                        <!-- Cards -->
                        <div class="col-xl-3 col-lg-3 col-sm-5 p-2 card shadow">
                            <div class="p-3">
                                <i class="p-3 mb-3 fa-solid fa-wallet text-bg-primary rounded-pill"></i>
                                <p>My Wallet</p>
                                <em>Add Money to Your Wallet for instant application fee</em>
                                <div class="mt-3 d-flex justify-content-end">
                                    <i class="fa-solid fa-arrow-right text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 ms-4 col-sm-5 p-2 card shadow">
                            <div class="p-3">
                                <i class="p-3 mb-3 fa-solid fa-wallet text-bg-primary rounded-pill"></i>
                                <p>Comission Structure</p>
                                <em>Check the latest comission structure.</em>
                                <div class="mt-3 d-flex justify-content-end">
                                    <i class="fa-solid fa-arrow-right text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 ms-4 col-sm-5 p-2 card shadow">
                            <div class="p-3">
                                <i class="p-3 mb-3 fa-solid fa-wallet text-bg-primary rounded-pill"></i>
                                <p>Manage Counselor</p>
                                <em>Add counselor and manage access of them.</em>
                                <div class="mt-3 d-flex justify-content-end">
                                    <i class="fa-solid fa-arrow-right text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>