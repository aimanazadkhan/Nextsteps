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
    <link rel="icon" href="images/Next Steps logo.png">
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
                <div class="ms-5 mt-5" style="max-height: 90vh; overflow-y: auto;">
                    <!-- Table Section -->
                    <div class="col-lg-11 px-4">
                        <table id="dataTable"
                            class="table align-middle mb-0 bg-white border border-1 border-secondary-subtle rounded p-4 shadow-lg">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Created On</th>
                                    <th>Created By</th>
                                    <th>University</th>
                                    <th>Course</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $applicationData = mysqli_query($conn, "SELECT * FROM `applications`");

                                while ($row = mysqli_fetch_array($applicationData)) {
                                    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '{$row['userEmail']}'"));
                                    $uni = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `search` WHERE `ID` = '{$row['uniID']}'"));

                                    $datetime = $row['createdOn'];
                                    list($date, $time) = explode(' ', $datetime);
                                    echo "
                                        <tr>
                                            <td>
                                                <p>" . $row['id'] . "</p>
                                            </td>
                                            <td>
                                                <p class='mt-2'>" . $date . "<br>" . $time . "</p> 
                                            </td>
                                            <td class='p-0'>
                                                <div>
                                                    <p class='fw-bold mb-1'>" . $user['firstname'] . " " . $user['lastname'] . "</p>
                                                    <p class='fw-bold text-muted mb-0'>" . $user['email'] . "</p>
                                                </div>
                                            </td>
                                            <td>
                                                <p>" . $uni['University'] . "</p>
                                            </td>
                                            <td>
                                                <p>" . $uni['CourseTitle'] . "</p>
                                            </td>
                                            <td>";

                                    $status = $row['appStatus'];
                                    $class = '';

                                    switch ($status) {
                                        case 'Pending':
                                            $class = 'text-bg-warning';
                                            break;
                                        case 'Declined':
                                            $class = 'text-bg-danger';
                                            break;
                                        case 'Success':
                                            $class = 'text-bg-success';
                                            break;
                                        default:
                                            $class = 'text-bg-warning';
                                            break;
                                    }

                                    echo "<p class='badge $class'>" . $status . "</p>";

                                    echo "
                                            </td>
                                            <td>
                                                <p></p>
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
            $('#dataTable').DataTable({
                "lengthMenu": [[7, 10, 25, 50, -1], [7, 10, 25, 50, "All"]],
                "pageLength": 7
            });
        });
    </script>
</body>

</html>