<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Visa</title>
    <meta name="NextSteps" content="A student councelling website">
    <link rel="icon" href="images/Next Steps logo.png">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="plugins/slick/slick.css">
    <link rel="stylesheet" href="plugins/font-awesome/fontawesome.min.css">
    <link rel="stylesheet" href="plugins/font-awesome/brands.css">
    <link rel="stylesheet" href="plugins/font-awesome/solid.css">

    <!-- # Main Style Sheet -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/next.css">
</head>


<style>
    .studentvisa {
        z-index: 5;
    }

    @media (max-width: 767px) {
        .studentvisa {
            overflow: hidden;
        }
    }

    .studentvisa .country .active {
        color: #fff !important;
    }

    .studentvisa .content-block {
        opacity: 0;
        transition: 0.3s;
        position: relative;
    }

    .studentvisa .content-block {
        left: -25px;
    }

    .studentvisa .show .content-block {
        opacity: 1;
    }

    .studentvisa .show .content-block {
        left: 0;
    }

    .studentvisa>.container::after {
        position: absolute;
        content: "";
        height: 65%;
        width: 100%;
        top: 0;
        left: 0;

    }

    .category-box {
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        position: relative;
        border-color: rgba(0, 0, 0, 0.1);
        box-shadow: 1px 1px 2px 1px rgba(0, 0, 0, 0.05);
        background: rgba(255, 255, 255, 1);
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
</style>


<body>
    <?php include "header.php"; ?>




    <section class="banner bg-tertiary position-relative overflow-hidden">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="block text-center text-lg-start pe-0 pe-xl-5">
                        <h3 class="text-capitalize mb-4">Welcome To Visit Visa<br>Advisory Services</h3>
                        <p class="mb-4">
                            In an increasingly interconnected world, the desire to explore new lands, experience diverse
                            cultures, and reunite with loved ones transcends geographical boundaries. Enter the visit
                            visa, a key that unlocks doors to cherished encounters, enriching experiences, and memorable
                            journeys.

                            A visit visa, often regarded as a gateway to exploration, is a document issued by a
                            country's government that allows individuals to enter and stay for a limited period,
                            typically for tourism, visiting family or friends, or attending events. While the specifics
                            vary from country to country, the underlying purpose remains the same: to facilitate
                            temporary visits for personal, familial, or recreational reasons.
                        </p>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ps-lg-5 text-center">
                        <img loading="lazy" decoding="async" src="images/about/visit visa final.png" alt="banner image"
                            class="w-100">
                    </div>
                </div>
            </div>
        </div>

    </section>





    <section class="section studentvisa">

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="country nav nav-pills flex-column mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item m-2  category-box" role="presentation">
                                <a class="nav-link btn btn-outline-primary effect-none text-dark active" id="uk-tab"
                                    data-bs-toggle="pill" href="#uk" role="tab" aria-controls="uk"
                                    aria-selected="true">UK</a>
                            </li>
                            <li class="nav-item m-2  category-box" role="presentation">
                                <a class="nav-link btn btn-outline-primary effect-none text-dark " id="usa-tab"
                                    data-bs-toggle="pill" href="#usa" role="tab" aria-controls="usa"
                                    aria-selected="true">USA</a>
                            </li>
                            <li class="nav-item m-2  category-box" role="presentation">
                                <a class="nav-link btn btn-outline-primary effect-none text-dark " id="canada-tab"
                                    data-bs-toggle="pill" href="#canada" role="tab" aria-controls="canada"
                                    aria-selected="true">CANADA</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="uk" role="tabpanel" aria-labelledby="uk-tab">
                                <div class="content-block">
                                    <h3 class="mb-4">Visit in Uk</h3>
                                    <div class="content">
                                        <p>To apply for a visit visa to the United Kingdom, applicants must demonstrate
                                            the purpose of their visit, provide evidence of sufficient funds to cover
                                            expenses, and show ties to their home country. Additional requirements may
                                            include proof of accommodation, travel itinerary, and biometric information.
                                        </p>
                                        <ul>
                                            <li>A valid passport or travel document</li>
                                            <li> Bank statements confirming that you can support yourself and your
                                                return journey</li>
                                            <li>Evidence of your purpose for the visit</li>
                                            <li> Evidence that you will leave the UK at the end of your proposed visit
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="usa" role="tabpanel" aria-labelledby="usa-tab">
                                <div class="content-block">
                                    <h3 class="mb-4">Visit in USA</h3>
                                    <div class="content">
                                        <p>To obtain a visit visa for the United States, applicants need to complete the
                                            online visa application, attend a visa interview, and provide supporting
                                            documents such as proof of funds, travel itinerary, and ties to their home
                                            country.</p>
                                            <ul>
                                            <li>A valid passport or travel document</li>
                                            <li> Bank statements confirming that you can support yourself and your
                                                return journey</li>
                                            <li>Evidence of your purpose for the visit</li>
                                            <li> Evidence that you will leave the UK at the end of your proposed visit
                                            </li>
                                            </ul>

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade " id="canada" role="tabpanel" aria-labelledby="canada-tab">
                                <div class="content-block">
                                    <h3 class="mb-4">Visit in CANADA</h3>
                                    <div class="content">
                                        <p>To apply for a visit visa to Canada, applicants must complete the online visa
                                            application, pay the application fee, and provide supporting documents
                                            demonstrating the purpose of their visit, financial ability, and ties to
                                            their home country.</p>
                                            <ul>
                                            <li>A valid passport or travel document</li>
                                            <li> Bank statements confirming that you can support yourself and your
                                                return journey</li>
                                            <li>Evidence of your purpose for the visit</li>
                                            <li> Evidence that you will leave the UK at the end of your proposed visit
                                            </li>
                                            </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <p class="text-primary text-uppercase fw-bold mb-3">Contact With us</p>
                        <h1>let’s get connected</h1>
                        <p>Lorem ipsum dolor sit, consectetur adipiscing . egestas cursus pellentesque dignissim dui,
                            congue etiam</p>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="shadow rounded p-5 bg-white">
                        <div class="row justify-content-center">
                            <div class="col-12 mb-4 d-flex justify-content-center">
                                <h4>Leave Us A Message</h4>
                            </div>
                            <div class="col-lg-10">
                                <div class="contact-form">
                                    <form action="#!">
                                        <div class="form-group mb-4 pb-2">
                                            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                            <input type="text" class="form-control shadow-none" id="contact_name">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 form-group mb-4 pb-2">
                                                <label for="exampleFormControlInput1" class="form-label">Email
                                                    address</label>
                                                <input type="email" class="form-control shadow-none" id="contact_email">
                                            </div>
                                            <div class="col-lg-6 form-group mb-4 pb-2">
                                                <label for="exampleFormControlInput1" class="form-label">contact
                                                    Number</label>
                                                <input type="number" class="form-control shadow-none"
                                                    id="contact_email">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label>Which country you want to visit </label>

                                                    <select name="class_id" id="class_id" class="form-control"
                                                        required="">
                                                        <option value="">Select Country</option>
                                                        <option value="UK">Uk</option>
                                                        <option value="Usa">USA</option>
                                                        <option value="Canada">CANADA</option>
                                                    </select>
                                                </div>
                                            </div>
                                           
                                        </div>


                                        <div class="form-group mb-4 pb-2">
                                            <label for="exampleFormControlTextarea1" class="form-label">What Document You have?</label>
                                            <textarea class="form-control shadow-none" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                        </div>
                                        <button class="btn btn-primary w-100" type="submit">Send Message</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include "footer.php"; ?>


</body>


<script src="plugins/bootstrap/bootstrap.min.js"></script>