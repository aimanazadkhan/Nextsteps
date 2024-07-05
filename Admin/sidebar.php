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
    <div>
        <ul class="list-unstyled ps-0">
            <li class="mb-3">
                <a href="index.php">
                    <div class="p-2">
                        <i class="fa-solid fa-gauge"></i>
                        <button class="btn btn-toggle rounded border-0">
                            <span>Dashboard</span>
                        </button>
                    </div>
                </a>
            </li>

            <li class="border-top mb-4"></li>

            <li class="mb-3">
                <button class="btn btn-toggle align-items-center rounded border-0">
                    <a class="text-decoration-none" href="manApp.php"><span><i
                                class="fa-solid fa-folder-open me-3"></i>Manage Application</span></a>
                </button>
            </li>

            <li class="mb-3">
                <button class="btn btn-toggle align-items-center rounded border-0">
                    <a class="text-decoration-none" href="manStudent.php"><span><i
                                class="fa-brands fa-google-scholar me-3"></i>Manage
                            Student</span></a>
                </button>
            </li>

            <li class="mb-3">
                <button class="btn btn-toggle align-items-center rounded border-0" data-bs-toggle="collapse"
                    data-bs-target="#med-collapse">
                    <span><i class="fa-solid fa-bars-progress me-3"></i>Programs</span>
                </button>
            </li>

            <li class="border-top my-4"></li>

            <li class="">
                <a href="wallet.php" class="text-decoration-none">
                    <button class="btn rounded border-0">
                        <p><i class="me-3 fa-solid fa-wallet"></i>Wallet</p>
                    </button>
                </a>
            </li>

            <!-- <li class="mb-1">
                <a href="../Homepage/" class="text-decoration-none">
                    <button class="btn rounded border-0">
                        <span><i class="fa-solid fa-users-rays me-3"></i>NexusHealth</span>
                    </button>
                </a>
            </li> -->

            <li class="" style="position: absolute; bottom: 0px; width: 13rem;">
                <a href="../logout.php" class="text-decoration-none">
                    <button class="btn rounded border-0">
                        <p><i class="me-3 fa-solid fa-door-open"></i>Log Out</p>
                    </button>
                </a>
            </li>
            <hr>
        </ul>
    </div>
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