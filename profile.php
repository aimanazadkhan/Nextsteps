<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/next.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .animate__animated {
            --animate-duration: 0.4s;
        }

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
            background: linear-gradient(to top left, rgba(30, 60, 100, 1), rgba(50, 80, 130, 1));
            z-index: -1;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.8s;
        }

        .nav-item:hover .nav-link::before {
            transform: scaleX(1);
            transform-origin: bottom right;
        }

        .nav-item:hover .nav-link {
            color: white !important;
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
                            <a class="nav-link text-center d-block pt-3" href="#pinfo">
                                Personal Information<br>
                                <p class="text-success">Complete</p>
                            </a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#equalif">
                                Academic Qualification<br>
                                <p class="text-success">Complete</p>
                            </a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item" style="flex: 1;">
                            <a class="nav-link text-center d-block pt-3" href="#wexp">
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
                        <form action="" method="POST">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white d-flex justify-content-center align-items-center"
                                    style="height: auto;">
                                    <div>
                                        <img src="images/blank-profile-picture.jpg" alt="Avatar" class="img-fluid mb-4"
                                            style="width: 10rem;" />
                                        <h5>Full Name</h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6>Personal Information</h6>
                                            <i class="far fa-edit editData"></i>
                                        </div>
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
                                                <h6>Nationality</h6>
                                                <p class="text-muted">info@example.com</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Address</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Postcode</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Passport Number</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Issue Country</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Issue Date</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Expiry Date</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                        </div>
                                        <div class="float-end mb-3">
                                            <button type="submit" class="btn btn-primary saveBtn hidden">Save</button>
                                            <button type="button"
                                                class="btn btn-danger discardBtn hidden">Discard</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Work Experience Card -->
                    <div class="card hidden" id="wexp" style="border-radius: .5rem;">
                        <form action="" method="POST">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white d-flex justify-content-center align-items-center"
                                    style="height: auto;">
                                    <div>
                                        <img src="images/blank-profile-picture.jpg" alt="Avatar" class="img-fluid mb-4"
                                            style="width: 10rem;" />
                                        <h5>Full Name</h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6>Work Experience</h6>
                                            <i class="far fa-edit editData"></i>
                                        </div>
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
                                        <div class="float-end mb-3">
                                            <button type="submit" class="btn btn-primary saveBtn hidden">Save</button>
                                            <button type="button"
                                                class="btn btn-danger discardBtn hidden">Discard</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Educational Qualification Card -->
                    <div class="card hidden" id="equalif" style="border-radius: .5rem;">
                        <form action="" method="POST">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white d-flex justify-content-center align-items-center"
                                    style="height: auto;">
                                    <div>
                                        <img src="images/blank-profile-picture.jpg" alt="Avatar" class="img-fluid mb-4"
                                            style="width: 10rem;" />
                                        <h5>Full Name</h5>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6>Academic Qualification</h6>
                                            <i class="far fa-edit editData"></i>
                                        </div>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Name of the Institution</h6>
                                                <p class="text-muted">info@example.com</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Country of Study</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Qualification Achieved</h6>
                                                <p class="text-muted">info@example.com</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>CGPA</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Start Date</h6>
                                                <p class="text-muted">info@example.com</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>End Date</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                        </div>
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Primary Language</h6>
                                                <p class="text-muted">info@example.com</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Address</h6>
                                                <p class="text-muted">123 456 789</p>
                                            </div>
                                        </div>
                                        <div class="float-end mb-3">
                                            <button type="submit" class="btn btn-primary saveBtn hidden">Save</button>
                                            <button type="button"
                                                class="btn btn-danger discardBtn hidden">Discard</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function () {
            // NavBar Card Toggle
            $('.nav-link').click(function (e) {
                e.preventDefault();
                var targetCard = $(this).attr('href').substring(1);
                var currentCard = $('.card:visible');

                if (currentCard.attr('id') !== targetCard) {
                    currentCard.addClass('animate__animated animate__fadeOut')
                        .one('animationend', function () {
                            $(this).addClass('hidden').removeClass('animate__animated animate__fadeOut');
                            $('#' + targetCard).removeClass('hidden').addClass('animate__animated animate__fadeIn')
                                .one('animationend', function () {
                                    $(this).removeClass('animate__animated animate__fadeIn');
                                });
                        });
                }
            });

            // Edit/Discard in the form
            $('.editData').click(function () {
                var cardBody = $(this).closest('.card-body');
                cardBody.find('p.text-muted').each(function () {
                    var value = $(this).text();
                    var input = $('<input>').attr({
                        type: 'text',
                        class: 'form-control mb-3',
                        value: value
                    });
                    $(this).replaceWith(input);
                });
                cardBody.find('.saveBtn, .discardBtn').removeClass('d-none').addClass('d-inline-block');
                $(this).removeClass('d-inline-block').addClass('d-none');
            });

            $('.discardBtn').click(function () {
                var card = $(this).closest('.card');
                card.find('input[type="text"]').each(function () {
                    var text = $(this).val();
                    $(this).replaceWith('<p class="text-muted">' + text + '</p>');
                });
                card.find('.saveBtn, .discardBtn').removeClass('d-inline-block').addClass('d-none');
                card.find('.editData').removeClass('d-none').addClass('d-inline-block');
            });
        });
    </script>
</body>

</html>