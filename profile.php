<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/next.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .gradient-custom {
            background: linear-gradient(to right bottom, rgba(30, 58, 138, 1), rgba(38, 76, 153, 1));
        }

        body {
            background-color: #f4f5f7;
        }

        .list-item:hover {
            background-color: #e0e0e0;
            transition: background-color 0.3s;
        }

        .nav-item {
            position: relative;
        }

        .nav-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top left, rgba(180, 200, 230, 1), rgba(200, 220, 250, 1));
            z-index: -1;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.8s;
        }

        .nav-item:hover .nav-link::before {
            transform: scaleX(1);
            transform-origin: bottom right;
        }

        /* Fade animations */
        .fade-out {
            animation: fadeOut 0.5s forwards;
        }

        .fade-in {
            animation: fadeIn 0.5s forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <section>
            <nav class="navbar navbar-expand-lg p-0" style="border-bottom: 1px solid grey;">
                <div class="container-fluid justify-content-center">
                    <ul class="navbar-nav justify-content-evenly w-100">
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#">
                                Personal Information<br>
                                <p class="text-success">Complete</p>
                            </a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#">
                                Academic Qualification<br>
                                <p class="text-success">Complete</p>
                            </a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#">
                                Work Experience<br>
                                <p class="text-success">Complete</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </section>

        <section class="vh-100">
            <div class="container h-100">
                <div class="mt-4 col col-lg-12">
                    <!-- Personal Information Card -->
                    <div class="card" id="pinfo" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="images/blank-profile-picture.jpg" alt="Avatar" class="img-fluid my-5"
                                    style="width: 80px;" />
                                <h5>Name</h5>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Personal Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>First Name</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Last Name</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone Number</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Date of Birth</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Gender</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Martial Status</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Address</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Country</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Gender</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Work Experience Card -->
                    <div class="card hidden" id="wexp" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="images/blank-profile-picture.jpg" alt="Avatar" class="img-fluid my-5"
                                    style="width: 80px;" />
                                <h5>Name</h5>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Work Experience</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>First Name</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Last Name</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone Number</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Date of Birth</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Gender</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Martial Status</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Address</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Country</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Gender</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Educational Qualification Card -->
                    <div class="card hidden" id="equalif" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="images/blank-profile-picture.jpg" alt="Avatar" class="img-fluid my-5"
                                    style="width: 80px;" />
                                <h5>Name</h5>
                                <i class="far fa-edit mb-5"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Educational Qualification</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>First Name</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Last Name</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Phone Number</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Date of Birth</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Gender</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Martial Status</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Address</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Country</h6>
                                            <p class="text-muted">info@example.com</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Gender</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const pinfoCard = document.getElementById('pinfo');
            const wexpCard = document.getElementById('wexp');
            const equalifCard = document.getElementById('equalif');

            const navItems = document.querySelectorAll('.nav-item');

            navItems.forEach(navItem => {
                navItem.addEventListener('click', (e) => {
                    const navLink = e.target.closest('.nav-link');
                    if (navLink.textContent.includes('Work Experience')) {
                        pinfoCard.classList.add('fade-out');
                        setTimeout(() => {
                            pinfoCard.style.display = 'none';
                            equalifCard.style.display = 'none';
                            wexpCard.style.display = 'block';
                            wexpCard.classList.add('fade-in');
                            setTimeout(() => {
                                pinfoCard.classList.remove('fade-out');
                                wexpCard.classList.remove('fade-in');
                                equalifCard.classList.remove('fade-out');
                            }, 200);
                        }, 200);
                    } else if (navLink.textContent.includes('Personal Information')) {
                        wexpCard.classList.add('fade-out');
                        setTimeout(() => {
                            wexpCard.style.display = 'none';
                            equalifCard.style.display = 'none';
                            pinfoCard.style.display = 'block';
                            pinfoCard.classList.add('fade-in');
                            setTimeout(() => {
                                wexpCard.classList.remove('fade-out');
                                pinfoCard.classList.remove('fade-in');
                                equalifCard.classList.remove('fade-out');
                            }, 200);
                        }, 200);
                    } else if (navLink.textContent.includes('Academic Qualification')) {
                        equalifCard.classList.add('fade-out');
                        setTimeout(() => {
                            equalifCard.style.display = 'block';
                            pinfoCard.style.display = 'none';
                            wexpCard.style.display = 'none';
                            wexpCard.classList.add('fade-in');
                            setTimeout(() => {
                                equalifCard.classList.remove('fade-out');
                                pinfoCard.classList.remove('fade-out');
                                wexpCard.classList.remove('fade-in');
                            }, 200);
                        }, 200);
                    }
                });
            });
        });
    </script>


</body>

</html>