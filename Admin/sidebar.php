<style>
    #side_nav p,
    #side_nav a,
    #side_nav span {
        color: #fff;
        font-size: 0.9rem;
    }

    #side_nav {
        transition: all 0.3s;
    }

    #side_nav.active {
        margin-left: -16rem;
        min-height: 100vh;
        z-index: 2;
    }

    #side_nav {
        margin-left: 0;
    }
</style>

<div class="ps-3 py-3 border-end sidebar" id="side_nav" style="width: 16rem; height: 100vh; background-color: #222e3c;">
    <div class="pb-3 mb-3 text-decoration-none border-bottom">
        <div class="d-flex flex-wrap">
            <i class="fa-solid fa-user-gear fs-4"></i>
            <p class="ms-3 fs-5 fw-semibold">Admin Panel</p>
        </div>
    </div>
    <!-- <div>
        <ul class="list-unstyled ps-0">
            <li class="mb-3">
                <a href="index.php">
                    <div class="p-2">
                        <i class="fa-solid fa-house"></i>
                        <button class="btn btn-toggle rounded border-0 collapsed">
                            <span>Home</span>
                        </button>
                    </div>
                </a>
            </li>

            <li class="border-top mb-3"></li>

            <li class="mb-3">
                <button class="btn btn-toggle align-items-center rounded border-0 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#blood-collapse">
                    <span><i class="fa-solid fa-droplet me-3"></i>Blood Bank</span>
                </button>
                <div class="p-1 mt-2 collapse <?php if (isset($bloodbank))
                    echo "show"; ?>" id="blood-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal px-3 small">
                        <li class="mb-2"><a href="blood-donorList.php" class="p-2 text-decoration-none rounded">
                                <span><i class="fa-regular me-2 fa-circle-dot"></i>Donor List</span></a></li>
                        <li><a href="blood-addBlood.php" class="p-2 text-decoration-none rounded">
                            <span><i class="fa-regular me-2 fa-circle-dot"></i>Add Donor</span></a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-3">
                <button class="btn btn-toggle align-items-center rounded border-0 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#orders-collapse">
                    <span><i class="fa-solid fa-user-doctor me-3"></i>Doctor Appointment</span>
                </button>
                <div class="p-1 mt-2 collapse <?php if (isset($doctorappointment))
                    echo "show"; ?>" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal px-3 small">
                        <li class="mb-2"><a href="doc-docList.php" class="p-1 text-decoration-none rounded">
                            <span><i class="fa-regular me-2 fa-circle-dot"></i>Doctor List</span></a></li>
                        <li class="mb-2"><a href="doc-appList.php" class="p-1 text-decoration-none rounded">
                            <span><i class="fa-regular me-2 fa-circle-dot"></i>Appointments List</span></a></li>
                        <li><a href="doc-docAdd.php" class="p-1 text-decoration-none rounded">
                            <span><i class="fa-regular me-2 fa-circle-dot"></i>Add Doctors</span></a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-3">
                <button class="btn btn-toggle align-items-center rounded border-0 collapsed" data-bs-toggle="collapse"
                    data-bs-target="#med-collapse">
                    <span><i class="fa-solid fa-pills me-3"></i>Med Corner</span>
                </button>
                <div class="p-1 mt-2 collapse <?php if (isset($medcorners))
                    echo "show"; ?>" id="med-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal px-3 small">
                        <li class="mb-2"><a href="med-addMed.php" class=" p-1 text-decoration-none rounded">
                                <span><i class="fa-regular me-2 fa-circle-dot"></i>Add Medicine</span></a></li>
                        <li><a href="med-medList.php" class=" p-1 text-decoration-none rounded">
                                <span><i class="fa-regular me-2 fa-circle-dot"></i>Medicine List</span></a></li>
                    </ul>
                </div>
            </li>

            <li class="border-top my-3"></li>

            <li class="mb-1">
                <a href="../Homepage/" class="text-decoration-none">
                    <button class="btn rounded border-0">
                        <span><i class="fa-solid fa-users-rays me-3"></i>NexusHealth</span>
                    </button>
                </a>
            </li>

            <li class="" style="position: absolute; bottom: 0px; width: 13rem;">
                <a href="../Authentication/logout.php" class="text-decoration-none">
                    <button class="btn rounded border-0">
                        <p><i class="me-3 fa-solid fa-door-open"></i>Log Out</p>
                    </button>
                </a>
            </li>
            <hr>
        </ul>
    </div> -->
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script>
    // Sidebar toggle
    $(document).ready(function () {
        $('.open-btn').on('click', function () {
            $('.sidebar').toggleClass('active');
        });
    });
</script>