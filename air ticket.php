<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Ticketing</title>
    <meta name="NextSteps" content="A student counselling website">
  
    <link rel="icon" href="images/Next Steps logo.png" >
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

<body>
    <?php include "header.php"; ?>

    <section class="section">


        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="block text-center text-lg-start pe-0 pe-xl-5">
                        <h3 class="text-capitalize mb-4 typewriter">Book your Air ticket</h3>
                        <p>To assist us in finding the
                            best ticket for you, please provide the following details:</p>

                        <ul>
                            <li><strong>Destination:</strong> Where would you like to go?</li>
                            <li><strong>Arrival Date:</strong> When do you wish to arrive at your destination?</li>
                            <li><strong>Number of Passengers:</strong> How many passengers will be traveling?</li>
                            <li><strong>Baggage Weight:</strong> What is the total weight of your baggage?</li>
                            <li><strong>Preferred Departure Date and Time:</strong> When would you like to depart?</li>
                            <li><strong>Travel Class:</strong> Do you prefer Economy or Business class?</li>
                        </ul>

                        <p>Once we receive this information, we will search for the most suitable flight options for
                            you.</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ps-lg-5 text-center">
                        <img loading="lazy" decoding="async" src="images/banner/flight.png" alt="banner image"
                            class="w-100">
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
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="from_input" class="form-label">From</label>
                                                    <input type="text" placeholder="Airport Name/code"  class="form-control shadow-none" id="from_input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="to_input" class="form-label">To</label>
                                                    <input type="text" placeholder="Airport Name/code" class="form-control shadow-none" id="to_input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="departure_input" class="form-label">Departure</label>
                                                    <input type="Date" placeholder="Airport Name/code" class="form-control shadow-none"
                                                        id="departure_input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="arrival_input" class="form-label">Arrival</label>
                                                    <input type="Date" class="form-control shadow-none"
                                                        id="arrival_input">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label>Ticket class</label>
                                                    <select name="class_id" id="class_id" class="form-control"
                                                        required="">
                                                        <option value="">Select Preferred Class</option>
                                                        <option value="">Economy</option>
                                                        <option value="14">Business</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4 pb-2">
                                                <div class="form-group">
                                                    <label for="loan_amount" class="form-label">Baggage</label>
                                                    <input type="text"  placeholder="weight(kg)" class="form-control shadow-none">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4 pb-2">
                                            <label for="exampleFormControlTextarea1" class="form-label">Write
                                                Message</label>
                                            <textarea  class="form-control shadow-none" id="exampleFormControlTextarea1"
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

</html>