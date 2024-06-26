<?php
session_start();

include "../connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
</head>

<body>
    <div class="container-fluid px-0">
        <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
            <div style="width: 100%">
                <div class="d-flex">
                    <button class="btn open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                    <h3 class="mt-2 ms-1">Manage Application</h3>
                </div>
                <div class="ms-5 mt-5">
                    <!-- Table Section -->
                    <div class="col-lg-10 px-5">
                        <table id="dataTable"
                            class="table align-middle mb-0 bg-white border border-1 border-secondary-subtle rounded p-4 shadow-lg">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>University</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $applicationData = mysqli_query($conn, "SELECT * FROM `applications`");

                                while ($row = mysqli_fetch_array($applicationData)) {
                                    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '{$row['userEmail']}'"));
                                    $uni = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `search` WHERE `ID` = '{$row['uniID']}'"));
                                    echo "
                                <tr>
                                    <td>
                                        <p>" . $row['id'] . "</p>
                                    </td>
                                    <td>
                                        <div>
                                            <p class='fw-bold mb-1'>" . $user['firstname'] . " " . $user['lastname'] . " </p>
                                            <p class='fw-bold text-muted mb-0'>" . $user['email'] . " </p>
                                        </div>
                                    </td>
                                    <td>
                                        <p>" . $uni['University'] . "</p>
                                    </td>
                                    <td>
                                        <p>" . $uni['CourseTitle'] . "</p>
                                    </td>
                                    <td>
                                        <p>" . "</p>
                                    </td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTable -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // DataTable Initialization
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>