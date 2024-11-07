<?php
session_start();
include "../connection.php";
// Admin Data
$adminData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `admin`"));
if (!isset($_SESSION['user']) || $_SESSION['user'] !== $adminData['adminName']) {
    echo "<script>alert('You have to Login First!!!')</script>";
    echo "<script>location.href='../login.php'</script>";
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
                                    <th>Remarks</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userData = mysqli_query($conn, "SELECT * FROM `users`");

                                while ($row = mysqli_fetch_array($userData)) {
                                    $datetime = $row['createdOn'];
                                    list($date, $time) = explode(' ', $datetime); ?>

                                    <tr>
                                        <td>
                                            <p><?php echo $row['id']; ?></p>
                                        </td>
                                        <td>
                                            <p class='mt-2'><?php echo $date; ?><br><?php echo $time; ?></p>
                                        </td>
                                        <td class='p-0'>
                                            <div class='d-flex'>
                                                <div class='me-3'>
                                                    <img class='rounded-pill' src='../<?php echo $row['profilePic']; ?>'
                                                        width='50rem'>
                                                </div>
                                                <div>
                                                    <p class='fw-bold mb-1'>
                                                        <?php echo $row['firstname'] . " " . $row['lastname']; ?>
                                                    </p>
                                                    <p class='fw-semibold text-muted mb-0'><?php echo $row['email']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="m-0 p-0"><?php echo $row['phonenumber']; ?></p>
                                        </td>
                                        <td>
                                            <select class='form-select'>
                                                <option value='dummy1' <?php echo ($row['assignedTo'] == 'dummy1') ? 'selected' : ''; ?>>Dummy Name 1</option>
                                                <option value='dummy2' <?php echo ($row['assignedTo'] == 'dummy2') ? 'selected' : ''; ?>>Dummy Name 2</option>
                                                <option value='dummy3' <?php echo ($row['assignedTo'] == 'dummy3') ? 'selected' : ''; ?>>Dummy Name 3</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div>
                                                <?php
                                                $eduDoc = $row['eduDoc']; // Get the documents string

                                                $documents = ['IELTS', 'HSC_Certificate', 'SSC_Certificate']; // Documents to check
                                                $missingDocs = [];

                                                // Loop through each document type and check if it's in the string
                                                foreach ($documents as $doc) {
                                                    if (strpos($eduDoc, $doc) === false) {
                                                        $missingDocs[] = $doc;
                                                    }
                                                }

                                                if (!empty($missingDocs)) {
                                                    // Show "not found" messages for each missing document
                                                    foreach ($missingDocs as $missingDoc) {
                                                        echo '<p class="fs-6 text-danger fw-light m-0 p-0">' . $missingDoc . ' Not Found</p>';
                                                    }
                                                } else {
                                                    // If no documents are missing, show "No missing document"
                                                    echo '<p class="fs-6 text-success fw-light m-0 p-0">No missing document</p>';
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../search.php?email=<?php echo $row['email']; ?>"
                                                class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                                                <p
                                                    class='<?php echo $row['applied'] == 0 ? "text-danger" : "text-success"; ?> fw-light m-0 p-0'>
                                                    <?php echo $row['applied']; ?> Applications Applied
                                                </p>
                                            </a>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTable -->
    <script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // DataTable Initialization
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "lengthMenu": [
                    [7, 10, 25, 50, -1],
                    [7, 10, 25, 50, "All"]
                ],
                "pageLength": 7
            });
        });
    </script>
</body>

</html>