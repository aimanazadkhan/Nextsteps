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
</head>

<body>
    <div class="container-fluid px-0">
        <div class="d-flex flex-nowrap">
            <?php include "sidebar.php"; ?>
            <div style="width: 100%">
                <div class="d-flex">
                    <button class="btn open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                    <h3 class="mt-2 ms-1">Dashboard</h3>
                </div>
                <div class="row gap-5 ms-5 mt-5">
                    <!-- Cards -->
                    <div class="col-xl-3 col-lg-3 col-sm-5 p-0 card shadow">
                        <div class="p-3">
                            <h5 class="">All Applications</h5>
                            <p class="mt-5">10</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-5 p-0 card shadow">
                        <div class="p-3">
                            <h5 class="">Offers</h5>
                            <p class="mt-5">10</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-5 p-0 card shadow">
                        <div class="p-3">
                            <h5 class="">Payment</h5>
                            <p class="mt-5">10</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-5 p-0 card shadow">
                        <div class="p-3">
                            <h5 class="">Visas Recieved</h5>
                            <p class="mt-5">10</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-5 p-0 card shadow">
                        <div class="p-3">
                            <h5 class="">Visas Rejected</h5>
                            <p class="mt-5">10</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-sm-5 p-0 card shadow">
                        <div class="p-3">
                            <h5 class="">Deferrals</h5>
                            <p class="mt-5">10</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>

</html>