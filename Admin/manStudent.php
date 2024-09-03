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
                    <h3 class="mt-2 ms-1">Manage Student</h3>
                </div>
                <div class="ms-5 mt-5" style="max-height: 90vh; overflow-y: auto;">
                    <!-- Table Section -->
                    <div class="col-lg-10 px-4">
                        <table id="dataTable"
                            class="table align-middle mb-0 bg-white border border-1 border-secondary-subtle rounded p-4 shadow-lg">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Registered On</th>
                                    <th>Name</th>
                                    <th>Mobile Phone</th>
                                    <th>Assigned To</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userData = mysqli_query($conn, "SELECT * FROM `users`");

                                while ($row = mysqli_fetch_array($userData)) {
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
                                                <div class='d-flex'>
                                                    <div class='me-3'>
                                                        <img class='rounded-pill' src='../" . $row['profilePic'] . "' width='50rem'>
                                                    </div>
                                                    <div>
                                                        <p class='fw-bold mb-1'>" . $row['firstname'] . " " . $row['lastname'] . "</p>
                                                        <p class='fw-bold text-muted mb-0'>" . $row['email'] . "</p>
                                                    </div>
                                                    
                                                </div>
                                            </td>
                                            <td>
                                                <p>" . $row['phonenumber'] . "</p>
                                            </td>
                                            <td>
                                                <select class='form-select'>
                                                    <option value='dummy1' " . ($row['assignedTo'] == 'dummy1' ? 'selected' : '') . ">Dummy Name 1</option>
                                                    <option value='dummy2' " . ($row['assignedTo'] == 'dummy2' ? 'selected' : '') . ">Dummy Name 2</option>
                                                    <option value='dummy3' " . ($row['assignedTo'] == 'dummy3' ? 'selected' : '') . ">Dummy Name 3</option>
                                                </select>
                                            </td>
                                            <td>
                                                <p class='text-success'>" . $row['applied'] . " Applications Applied</p>
                                            </td>
                                        </tr>
                                    ";
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