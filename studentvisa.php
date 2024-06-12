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
                        <h3 class="text-capitalize mb-4">Welcome To Student Visa<br>Advisory Services</h3>
                        <p class="mb-4">
                            Education serves as the key that unlocks the door to freedom—a belief I hold dear as I
                            address you today. It brings me great joy to introduce Yes Associate's revamped website. I
                            am confident that you will find this platform both dynamic and engaging, offering solutions
                            to all your inquiries regarding studying abroad. Pursuing higher education marks a
                            significant milestone in any student's journey. When venturing into international study,
                            seeking guidance from seasoned consultants can make all the difference in ensuring the right
                            choices are made. Our organization stands as a beacon of positivity, deeply committed to the
                            professional growth of our team and forging strong connections within the community.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ps-lg-5 text-center">
                        <img loading="lazy" decoding="async" src="images/banner/study abroad.png" alt="banner image"
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
                                    <h3 class="mb-4">Study in Uk</h3>
                                    <div class="content">
                                        <p>The United Kingdom (UK) is one of the most popular destinations for foreign
                                            students looking to broaden their horizons and invest in their future and
                                            over 200,000 International students decide to study in England every year &
                                            making it a unique culture for both studying and a Post Graduate Career.
                                            Some of the world’s most prestigious institutions of higher education lie on
                                            these shores. The United Kingdom has a wide variety of courses to offer,
                                            from the humanities to specialized fields of medicine, science and
                                            engineering. It has a rich tapestry of educational establishments to choose
                                            from, so there is literally a course for everyone with their own field of
                                            interests.</p>
                                        <h4>General Information:</h4>
                                        <ul>
                                            <li>Apply for Foundation / International Year One / Pre-sessional English /
                                                Pre Masters / Bachelors / Masters / PhD</li>
                                            <li>Intake: January / May / September</li>
                                            <li>English Requirements:
                                                <ul>
                                                    <li>IELTS:
                                                        <ul>
                                                            <li>Bachelor - 5.5</li>
                                                            <li>Masters - 6.0</li>
                                                        </ul>
                                                    </li>
                                                    <li>Duolingo:
                                                        <ul>
                                                            <li>Bachelor - 110</li>
                                                            <li>Masters - 120</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>Academic Requirements:
                                                <ul>
                                                    <li>Bachelor - Minimum GPA 3.0 in SSC & HSC</li>
                                                    <li>Masters - Minimum CGPA 2.75, SSC & HSC 3.0</li>
                                                </ul>
                                            </li>
                                            <li>Tuition Fees: 10000 £ - 16000 £</li>
                                            <li>Bank Sponsor: 25 Lac</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="usa" role="tabpanel" aria-labelledby="usa-tab">
                                <div class="content-block">
                                    <h3 class="mb-4">Study in USA</h3>
                                    <div class="content">
                                        <p>The United States is one of the most popular destinations for international
                                            students due to its diverse and flexible education system. With a wide array
                                            of programs and specializations, the USA offers opportunities for academic
                                            growth and career advancement. The country is home to many of the world’s
                                            top universities, providing students with access to state-of-the-art
                                            facilities and resources.</p>
                                        <h4>General Information:</h4>
                                        <ul>
                                            <li>Apply for Undergraduate / Graduate / PhD programs</li>
                                            <li>Intake: January / August</li>
                                            <li>English Requirements:
                                                <ul>
                                                    <li>IELTS:
                                                        <ul>
                                                            <li>Undergraduate - 6.0</li>
                                                            <li>Graduate - 6.5</li>
                                                        </ul>
                                                    </li>
                                                    <li>TOEFL:
                                                        <ul>
                                                            <li>Undergraduate - 80</li>
                                                            <li>Graduate - 90</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>Academic Requirements:
                                                <ul>
                                                    <li>Undergraduate: Minimum GPA 3.0 in high school</li>
                                                    <li>Graduate: Minimum GPA 3.0 in undergraduate studies</li>
                                                </ul>
                                            </li>
                                            <li>Tuition Fees: 20000 - 40000 USD per year</li>
                                            <li>Bank Sponsor: 40-50 Lac</li>
                                            <li>Higher Visa Success Rate</li>
                                            <li>Embassy / VFS: Dhaka / Sylhet</li>
                                            <li>Scholarship Available</li>
                                        </ul>
                                        <h4>Approximate Cost Calculation:</h4>
                                        <ul>
                                            <li>Application Fee: USD 50 - 100</li>
                                            <li>Embassy Fees: 160 USD</li>
                                            <li>Medical - 7000 BDT</li>
                                            <li>Tuition Fees - 20000 - 40000 USD per year</li>
                                            <li>Air Ticket - Depends on Student</li>
                                            <li>Service Charge - Terms & Conditions Apply</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="canada" role="tabpanel" aria-labelledby="canada-tab">
                                <div class="content-block">
                                    <h3 class="mb-4">Study in CANADA</h3>
                                    <div class="content">
                                        <p>The CANADA is one of the most popular destinations for foreign students
                                            looking to broaden their horizons and invest in their future and over
                                            200,000 International students decide to study in England every year &
                                            making it a unique culture for both studying and a Post Graduate Career.
                                            Some of the world’s most prestigious institutions of higher education lie on
                                            these shores. The United Kingdom has a wide variety of courses to offer,
                                            from the humanities to specialized fields of medicine, science and
                                            engineering. It has a rich tapestry of educational establishments to choose
                                            from, so there is literally a course for everyone with their own field of
                                            interests.</p>
                                        <h4>General Information:</h4>
                                        <ul>
                                            <li>Apply for Foundation / International Year One / Pre-sessional English /
                                                Pre Masters / Bachelors / Masters / PhD</li>
                                            <li>Intake: January / May / September</li>
                                            <li>English Requirements:
                                                <ul>
                                                    <li>IELTS:
                                                        <ul>
                                                            <li>Bachelor - 5.5</li>
                                                            <li>Masters - 6.0</li>
                                                        </ul>
                                                    </li>
                                                    <li>Duolingo:
                                                        <ul>
                                                            <li>Bachelor - 110</li>
                                                            <li>Masters - 120</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>Academic Requirements:
                                                <ul>
                                                    <li>Bachelor - Minimum GPA 3.0 in SSC & HSC</li>
                                                    <li>Masters - Minimum CGPA 2.75, SSC & HSC 3.0</li>
                                                </ul>
                                            </li>
                                            <li>Tuition Fees: 10000 £ - 16000 £</li>
                                            <li>Bank Sponsor: 25 Lac</li>
                                            <li>Higher Visa Success Rate</li>
                                            <li>Embassy / VFS: Dhaka / Sylhet</li>
                                            <li>Scholarship Available</li>
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
                        <h1>Determine to Apply</h1>
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
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label>Which country you want to go for study? </label>

                                                    <select name="class_id" id="class_id" class="form-control"
                                                        required="">
                                                        <option value="">Select Country</option>
                                                        <option value="UK">Uk</option>
                                                        <option value="Usa">USA</option>
                                                        <option value="Canada">CANADA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label>Which city/state/province you prefer? </label>

                                                    <input type="text" class="form-control shadow-none"
                                                        id="contact_name">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label>What's your Budget? </label>

                                                    <input type="text" placeholder="Tution fees"
                                                        class="form-control shadow-none" id="contact_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label>IELTS/OIETC/PTE/TOEFLE</label>
                                                    <input type="text" placeholder="IELTS:6.0"
                                                        class="form-control shadow-none" id="contact_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label>SSC/HSC RESULT? </label>

                                                    <input type="text" placeholder="SSC:GPA-5/HSC:GPA-4.75"
                                                        class="form-control shadow-none" id="contact_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 pb-2">
                                            <label for="exampleFormControlTextarea1" class="form-label">Queris</label>
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
        </div>
    </section>


    <?php include "footer.php"; ?>


</body>


<script src="plugins/bootstrap/bootstrap.min.js"></script>