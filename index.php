<?php
session_start();
include "./connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Next Steps</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta name="Next Steps" content="A student councelling website">
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

  <style type="text/css">
    .slide-container {
      max-width: 1400px;
      margin: 0 auto;

      h3 {
        font-size: 30px;
        font-weight: 500;
        text-align: center;
        position: relative;
        margin-bottom: 60px;
        margin-top: 60px;
      }

      h3:after {

        content: '';
        position: absolute;
        width: 100%;
        height: 4px;
        background: #ff8159;
        bottom: -20px;
        left: 0;
        right: 0;
        margin: 0 auto;
      }

      @media (max-width: 576px) {
        .icon-box-item {
          width: 50% !important;
          margin: 0 auto;
          /* Center the element */
        }
      }
    }
  </style>
</head>

<body>

  <!-- navigation -->
  <?php include "header.php"; ?>
  <!-- /navigation -->

  <div class="modal applyLoanModal fade" id="applyLoan" tabindex="-1" aria-labelledby="applyLoanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <h4 class="modal-title" id="exampleModalLabel">Contact Us</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#!" method="post">
            <div class="row">
              <div class="col-lg-6 mb-4 pb-2">
                <div class="form-group">
                  <label for="loan_amount" class="form-label">Full Name</label>
                  <input type="text" class="form-control shadow-none">
                </div>
              </div>
              <div class="col-lg-6 mb-4 pb-2">
                <div class="form-group">
                  <label for="loan_amount" class="form-label">Mobile</label>
                  <input type="number" class="form-control shadow-none" required>
                </div>
              </div>
              <div class="col-lg-12 mb-4 pb-2">
                <div class="form-group">
                  <label for="loan_how_long_for" class="form-label">Email address</label>
                  <input type="email" class="form-control shadow-none" required>
                </div>
              </div>
              <div class="col-lg-12 mb-4 pb-2">
                <div class="form-group">
                  <label for="loan_repayment" class="form-label">Address</label>
                  <input type="text" class="form-control shadow-none">
                </div>
              </div>
              <div class="col-lg-6 mb-4 pb-2">
                <div class="form-group">
                  <label>Preferred Destination</label>
                  <select name="destination_country_id" id="destination_country_id" class="form-control" required="">

                    <option value="">Select Country</option>
                    <option value="14">Australia</option>
                    <option value="157">New Zealand</option>
                    <option value="235">United Kingdom</option>
                    <option value="236">United States</option>
                    <option value="40">Canada</option>
                    <option value="76">France</option>
                    <option value="199">Singapore</option>
                    <option value="83">Germany</option>
                    <option value="234">United Arab Emirates</option>
                    <option value="133">Malaysia</option>
                    <option value="176">Poland</option>
                    <option value="140">Mauritius</option>
                    <option value="202">Slovenia</option>
                    <option value="61">Denmark</option>
                    <option value="233">Ukraine</option>
                    <option value="75">Finland</option>
                    <option value="86">Greece</option>
                    <option value="106">Ireland</option>
                    <option value="109">Italy</option>
                    <option value="136">Malta</option>
                    <option value="155">Netherlands</option>
                    <option value="209">Spain</option>
                    <option value="215">Sweden</option>
                    <option value="216">Switzerland</option>
                    <option value="221">Thailand</option>
                    <option value="243">Vietnam</option>
                    <option value="35">Bulgaria</option>
                    <option value="102">India</option>
                    <option value="1">Afghanistan</option>
                    <option value="2">Aland Islands</option>
                    <option value="3">Albania</option>
                    <option value="4">Algeria</option>
                    <option value="5">American Samoa</option>
                    <option value="6">Andorra</option>
                    <option value="7">Angola</option>
                    <option value="8">Anguilla</option>
                    <option value="9">Antarctica</option>
                    <option value="10">Antigua and Barbuda</option>
                    <option value="11">Argentina</option>
                    <option value="12">Armenia</option>
                    <option value="13">Aruba</option>
                    <option value="15">Austria</option>
                    <option value="16">Azerbaijan</option>
                    <option value="17">Bahamas</option>
                    <option value="18">Bahrain</option>
                    <option value="19">Bangladesh</option>
                    <option value="20">Barbados</option>
                    <option value="21">Belarus</option>
                    <option value="22">Belgium</option>
                    <option value="23">Belize</option>
                    <option value="24">Benin</option>
                    <option value="25">Bermuda</option>
                    <option value="26">Bhutan</option>
                    <option value="27">Bolivia</option>
                    <option value="28">Bonaire, Sint Eustatius and Saba</option>
                    <option value="29">Bosnia and Herzegovina</option>
                    <option value="30">Botswana</option>
                    <option value="31">Bouvet Island</option>
                    <option value="32">Brazil</option>
                    <option value="33">British Indian Ocean Territory</option>
                    <option value="34">Brunei</option>
                    <option value="36">Burkina Faso</option>
                    <option value="37">Burundi</option>
                    <option value="38">Cambodia</option>
                    <option value="39">Cameroon</option>
                    <option value="41">Cape Verde</option>
                    <option value="42">Cayman Islands</option>
                    <option value="43">Central African Republic</option>
                    <option value="44">Chad</option>
                    <option value="45">Chile</option>
                    <option value="46">China</option>
                    <option value="47">Christmas Island</option>
                    <option value="48">Cocos (Keeling) Islands</option>
                    <option value="49">Colombia</option>
                    <option value="50">Comoros</option>
                    <option value="51">Congo</option>
                    <option value="52">Cook Islands</option>
                    <option value="53">Costa Rica</option>
                    <option value="54">Cote d'ivoire (Ivory Coast)</option>
                    <option value="55">Croatia</option>
                    <option value="56">Cuba</option>
                    <option value="57">Curacao</option>
                    <option value="58">Cyprus</option>
                    <option value="59">Czech Republic</option>
                    <option value="60">Democratic Republic of the Congo</option>
                    <option value="62">Djibouti</option>
                    <option value="63">Dominica</option>
                    <option value="64">Dominican Republic</option>
                    <option value="65">Ecuador</option>
                    <option value="66">Egypt</option>
                    <option value="67">El Salvador</option>
                    <option value="68">Equatorial Guinea</option>
                    <option value="69">Eritrea</option>
                    <option value="70">Estonia</option>
                    <option value="71">Ethiopia</option>
                    <option value="72">Falkland Islands (Malvinas)</option>
                    <option value="73">Faroe Islands</option>
                    <option value="74">Fiji</option>
                    <option value="77">French Guiana</option>
                    <option value="78">French Polynesia</option>
                    <option value="79">French Southern Territories</option>
                    <option value="80">Gabon</option>
                    <option value="81">Gambia</option>
                    <option value="82">Georgia</option>
                    <option value="84">Ghana</option>
                    <option value="85">Gibraltar</option>
                    <option value="87">Greenland</option>
                    <option value="88">Grenada</option>
                    <option value="89">Guadaloupe</option>
                    <option value="90">Guam</option>
                    <option value="91">Guatemala</option>
                    <option value="92">Guernsey</option>
                    <option value="93">Guinea</option>
                    <option value="94">Guinea-Bissau</option>
                    <option value="95">Guyana</option>
                    <option value="96">Haiti</option>
                    <option value="97">Heard Island and McDonald Islands</option>
                    <option value="98">Honduras</option>
                    <option value="99">Hong Kong</option>
                    <option value="100">Hungary</option>
                    <option value="101">Iceland</option>
                    <option value="103">Indonesia</option>
                    <option value="104">Iran</option>
                    <option value="105">Iraq</option>
                    <option value="107">Isle of Man</option>
                    <option value="108">Israel</option>
                    <option value="110">Jamaica</option>
                    <option value="111">Japan</option>
                    <option value="112">Jersey</option>
                    <option value="113">Jordan</option>
                    <option value="114">Kazakhstan</option>
                    <option value="115">Kenya</option>
                    <option value="116">Kiribati</option>
                    <option value="117">Kosovo</option>
                    <option value="118">Kuwait</option>
                    <option value="119">Kyrgyzstan</option>
                    <option value="120">Laos</option>
                    <option value="121">Latvia</option>
                    <option value="122">Lebanon</option>
                    <option value="123">Lesotho</option>
                    <option value="124">Liberia</option>
                    <option value="125">Libya</option>
                    <option value="126">Liechtenstein</option>
                    <option value="127">Lithuania</option>
                    <option value="128">Luxembourg</option>
                    <option value="129">Macao</option>
                    <option value="130">Macedonia</option>
                    <option value="131">Madagascar</option>
                    <option value="132">Malawi</option>
                    <option value="134">Maldives</option>
                    <option value="135">Mali</option>
                    <option value="137">Marshall Islands</option>
                    <option value="138">Martinique</option>
                    <option value="139">Mauritania</option>
                    <option value="141">Mayotte</option>
                    <option value="142">Mexico</option>
                    <option value="143">Micronesia</option>
                    <option value="144">Moldava</option>
                    <option value="145">Monaco</option>
                    <option value="146">Mongolia</option>
                    <option value="147">Montenegro</option>
                    <option value="148">Montserrat</option>
                    <option value="149">Morocco</option>
                    <option value="150">Mozambique</option>
                    <option value="151">Myanmar (Burma)</option>
                    <option value="152">Namibia</option>
                    <option value="153">Nauru</option>
                    <option value="154">Nepal</option>
                    <option value="156">New Caledonia</option>
                    <option value="158">Nicaragua</option>
                    <option value="159">Niger</option>
                    <option value="160">Nigeria</option>
                    <option value="161">Niue</option>
                    <option value="162">Norfolk Island</option>
                    <option value="163">North Korea</option>
                    <option value="164">Northern Mariana Islands</option>
                    <option value="165">Norway</option>
                    <option value="166">Oman</option>
                    <option value="167">Pakistan</option>
                    <option value="168">Palau</option>
                    <option value="169">Palestine</option>
                    <option value="170">Panama</option>
                    <option value="171">Papua New Guinea</option>
                    <option value="172">Paraguay</option>
                    <option value="173">Peru</option>
                    <option value="174">Phillipines</option>
                    <option value="175">Pitcairn</option>
                    <option value="177">Portugal</option>
                    <option value="178">Puerto Rico</option>
                    <option value="179">Qatar</option>
                    <option value="180">Reunion</option>
                    <option value="181">Romania</option>
                    <option value="182">Russia</option>
                    <option value="183">Rwanda</option>
                    <option value="184">Saint Barthelemy</option>
                    <option value="185">Saint Helena</option>
                    <option value="186">Saint Kitts and Nevis</option>
                    <option value="187">Saint Lucia</option>
                    <option value="188">Saint Martin</option>
                    <option value="189">Saint Pierre and Miquelon</option>
                    <option value="190">Saint Vincent and the Grenadines</option>
                    <option value="191">Samoa</option>
                    <option value="192">San Marino</option>
                    <option value="193">Sao Tome and Principe</option>
                    <option value="194">Saudi Arabia</option>
                    <option value="195">Senegal</option>
                    <option value="196">Serbia</option>
                    <option value="197">Seychelles</option>
                    <option value="198">Sierra Leone</option>
                    <option value="200">Sint Maarten</option>
                    <option value="201">Slovakia</option>
                    <option value="203">Solomon Islands</option>
                    <option value="204">Somalia</option>
                    <option value="205">South Africa</option>
                    <option value="206">South Georgia and the South Sandwich Islands</option>
                    <option value="207">South Korea</option>
                    <option value="208">South Sudan</option>
                    <option value="210">Sri Lanka</option>
                    <option value="211">Sudan</option>
                    <option value="212">Suriname</option>
                    <option value="213">Svalbard and Jan Mayen</option>
                    <option value="214">Swaziland</option>
                    <option value="217">Syria</option>
                    <option value="218">Taiwan</option>
                    <option value="219">Tajikistan</option>
                    <option value="220">Tanzania</option>
                    <option value="222">Timor-Leste (East Timor)</option>
                    <option value="223">Togo</option>
                    <option value="224">Tokelau</option>
                    <option value="225">Tonga</option>
                    <option value="226">Trinidad and Tobago</option>
                    <option value="227">Tunisia</option>
                    <option value="228">Turkey</option>
                    <option value="229">Turkmenistan</option>
                    <option value="230">Turks and Caicos Islands</option>
                    <option value="231">Tuvalu</option>
                    <option value="232">Uganda</option>
                    <option value="237">United States Minor Outlying Islands</option>
                    <option value="238">Uruguay</option>
                    <option value="239">Uzbekistan</option>
                    <option value="240">Vanuatu</option>
                    <option value="241">Vatican City</option>
                    <option value="242">Venezuela</option>
                    <option value="244">Virgin Islands, British</option>
                    <option value="245">Virgin Islands, US</option>
                    <option value="246">Wallis and Futuna</option>
                    <option value="247">Western Sahara</option>
                    <option value="248">Yemen</option>
                    <option value="249">Zambia</option>
                    <option value="250">Zimbabwe</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6 mb-4 pb-2">
                <div class="form-group">
                  <label>My Queries</label>
                  <select class="form-control" name="query_type" required="">
                    <option value="">Please Select</option>

                    <option value="1">Counselling</option>

                    <option value="2">Tests</option>

                    <option value="3">English Test Vouchers</option>

                  </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-col mb-3">
                <div class="form-group">
                  <label>Query</label>
                  <textarea class="form-control remove_input_space" rows="3" id="textquery" name="textquery"
                    placeholder="Query" required=""> </textarea>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>


  <section class="banner bg-tertiary position-relative overflow-hidden">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="block text-center text-lg-start pe-0 pe-xl-5">
            <h1 class="text-capitalize mb-4">Global Dream<br>Local Guidance</h1>
            <p class="mb-4">We have collected the best offers of credit institutions and banks
              <br>of Colombia. It remains to choose what suits you as fast as you.
            </p> <a type="button" class="btn btn-primary" href="#" data-bs-toggle="modal"
              data-bs-target="#applyLoan">Contact Us<span style="font-size: 14px;"
                class="ms-2 fas fa-arrow-right"></span></a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="ps-lg-5 text-center">
            <img loading="lazy" decoding="async" src="images/banner/banner2.png" alt="banner image" class="w-100">
          </div>
        </div>
      </div>
    </div>

  </section>



  <section class="mt-5 mb-5">
    <div class="text-center mt-4 mb-4">
      <h4>Popular Country</h4>
    </div>
    <div class="slide-container">
      <div class="logo-slider">
        <div class="item"><a href="#"></a><img src="images/about/ukj__1_-removebg-preview.png" class="img-fluid"
            style="object-fit: cover; max-height: 100%;"></a></div>
        <div class="item"><a href="#"></a><img src="images/about/usa.png" class="img-fluid"
            style="object-fit: cover; max-height: 100%;"></a></div>
        <div class="item"><a href="#"></a><img src="images/about/canada.png" class="img-fluid"
            style="object-fit: cover; max-height: 100%;"></a></div>
        <div class="item"><a href="#"></a><img src="images/about/finland__1_-removebg-preview.png" class="img-fluid"
            style="object-fit: cover; max-height: 100%;"></a></div>
        <div class="item"><a href="#"></a><img src="images/about/australia (1).png" class="img-fluid"
            style="object-fit: cover; max-height: 100%;"></a></div>
        <div class="item"><a href="#"></a><img src="images/about/denmark.png" class="img-fluid"
            style="object-fit: cover; max-height: 100%;"></a></div>
      </div>
    </div>


  </section>


  <section class="section bg-tertiary">

    <div class="text-center mt-4 mb-4">
      <h4>Our Services</h4>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="icon-box-item text-center col-lg-4 col-md-6 mb-4">
          <div class="rounded shadow py-5 px-4">
            <div class="icon"> <i class="fas fa-user"></i>
            </div>
            <h3 class="mb-3">Student Visa</h3>
            <p class="mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod</p> <a
              class="btn btn-sm btn-outline-primary" href="studentvisa.php">View Details <i
                class="las la-arrow-right ms-1"></i></a>
          </div>
        </div>
        <div class="icon-box-item text-center col-lg-4 col-md-6 mb-4">
          <div class="rounded shadow py-5 px-4">
            <div class="icon"> <i class="fa-solid fa-passport"></i>
            </div>
            <h3 class="mb-3">Visit Visa</h3>
            <p class="mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod</p> <a
              class="btn btn-sm btn-outline-primary" href="visitvisa.php">View Details <i
                class="las la-arrow-right ms-1"></i></a>
          </div>
        </div>
        <div class="icon-box-item text-center col-lg-4 col-md-6 mb-4">
          <div class="rounded shadow py-5 px-4">
            <div class="icon"> <i class="fa-solid fa-plane-departure"></i>
            </div>
            <h3 class="mb-3">Air ticketing</h3>
            <p class="mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod</p> <a
              class="btn btn-sm btn-outline-primary" href="air ticket.php">View Details <i
                class="las la-arrow-right ms-1"></i></a>
          </div>
        </div>


      </div>
    </div>
  </section>


  <section class="about-section section position-relative overflow-hidden">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <img loading="lazy" decoding="async" src="images/banner/girl 1.avif" alt="About Ourselves" class="img-fluid">
        </div>
        <div class="col-lg-7 text-center text-lg-start">
          <div class="section-title">
            <div class="icon me-4 mb-4 mb-sm-0"> <i class="fa-solid fa-user mt-3" style="
              height: 85px;
              flex: 0 0 auto;
              width: 85px;
              line-height: 85px;
              text-align: center;
              border-radius: 8px;
              color: #7a9aeb;
              background-color: rgba(235, 122, 175, 0.1);
              font-size: 36px;"></i>
            </div>
            <h1>From Career Counselling</h1>
            <h5>to application Processing</h5>
            <p class="lead mb-0 mt-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consv allis quam aliquet integer eget magna
              ullam corper intesager vulutate aenean nunc quis a urna morbi id vitae. Vulpuate nisl</p>
            <p>sed morbi sit ut placerat eges aeftas et. Pellen tesque tristisque magnis augue gravida pulvinar
              placerat. Tellus massa pretra scelerisque leo. In volutpat arcu nunc nisl et, viverra faucisfbus</p>
            </p> <a class="btn btn-primary mt-4" href="about.html">Know About Us</a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="about-section section position-relative overflow-hidden">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <div class="section-title">
            <div class="icon me-4 mb-4 mb-sm-0"> <i class="fa-solid fa-passport mb-2" style="
              height: 85px;
              flex: 0 0 auto;
              width: 85px;
              line-height: 85px;
              text-align: center;
              border-radius: 8px;
              color: #917AEB;
              background-color: rgba(145, 122, 235, 0.1);
              font-size: 36px;"></i>
            </div>
            <h1>From Visa Processing</h1>
            <h5>to accomodation</h5>
            <p class="lead mb-0 mt-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consv allis quam aliquet integer eget magna
              ullam corper intesager vulutate aenean nunc quis a urna morbi id vitae. Vulpuate nisl</p>
            <p>sed morbi sit ut placerat eges aeftas et. Pellen tesque tristisque magnis augue gravida pulvinar
              placerat. Tellus massa pretra scelerisque leo. In volutpat arcu nunc nisl et, viverra faucisfbus</p>
            </p> <a class="btn btn-primary mt-4" href="about.html">Know About Us</a>
          </div>
        </div>
        <div class="col-lg-7 text-center text-lg-end">
          <img loading="lazy" decoding="async" src="images/visa.png" alt="About Ourselves" class="img-fluid">
        </div>
      </div>
    </div>

  </section>


  <section class="homepage_tab position-relative">
    <div class="section container">
      <div class="row justify-content-center">
        <div class="col-lg-8 mb-4">
          <div class="section-title text-center">
            <p class="text-primary text-uppercase fw-bold mb-3">Difference Of Us</p>
            <h4>At Next Steps, we understand the complexities of the admission process, and that's why we're here to
              guide you every step of the way.</h4>
          </div>
        </div>
        <div class="col-lg-10">
          <ul class="payment_info_tab nav nav-pills justify-content-center mb-4" id="pills-tab" role="tablist">
            <li class="nav-item m-2" role="presentation"> <a
                class="nav-link btn btn-outline-primary effect-none text-dark active" id="pills-how-much-can-i-recive-tab"
                data-bs-toggle="pill" href="#pills-how-much-can-i-recive" role="tab"
                aria-controls="pills-how-much-can-i-recive" aria-selected="true">Choose your dream
                University?</a>
            </li>
            <li class="nav-item m-2" role="presentation"> <a
                class="nav-link btn btn-outline-primary effect-none text-dark " id="pills-how-much-does-it-costs-tab"
                data-bs-toggle="pill" href="#pills-how-much-does-it-costs" role="tab"
                aria-controls="pills-how-much-does-it-costs" aria-selected="true">How Much Does It Costs?</a>
            </li>
            <li class="nav-item m-2" role="presentation"> <a
                class="nav-link btn btn-outline-primary effect-none text-dark " id="pills-how-do-i-repay-tab"
                data-bs-toggle="pill" href="#pills-how-do-i-repay" role="tab" aria-controls="pills-how-do-i-repay"
                aria-selected="true">What services will I receive?</a>
            </li>
          </ul>
          <div class="rounded shadow bg-white p-5 tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-how-much-can-i-recive" role="tabpanel"
              aria-labelledby="pills-how-much-can-i-recive-tab">
              <div class="row align-items-center">
                <div class="col-md-6 order-1 order-md-0">
                  <div class="content-block">
                    <h3 class="mb-4">Choose your dream University?</h3>
                    <div class="content">
                      <p>Our comprehensive services ensure a seamless experience, from choosing the right university and
                        program to meticulous file processing. We'll be your dedicated partners, making the intricate
                        process smooth and hassle-free.</p>
                      <p>turpis vivamus donec. Id congue vesti bualum odio dignissim at quisque viverra. Non semper in
                        sed
                        quisque dui. Platea posuere ullamcorper id fames ut sed urna cursus eget. Neque, vel</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 order-0 order-md-1 mb-5 mt-md-0">
                  <div class="image-block text-center">
                    <img loading="lazy" decoding="async" src="images/payment-info.png" alt="How Much Can I Recive?"
                      class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade " id="pills-how-much-does-it-costs" role="tabpanel"
              aria-labelledby="pills-how-much-does-it-costs-tab">
              <div class="row align-items-center">
                <div class="col-md-6 order-1 order-md-0">
                  <div class="content-block">
                    <h3 class="mb-4">How Much Does It Costs?</h3>
                    <div class="content">
                      <p>With our personalized approach, we ensure that your aspirations, academic strengths, and
                        financial considerations are carefully evaluated to find the perfect program and university for
                        you.</p>
                      <p>turpis vivamus donec. Id congue vesti bualum odio dignissim at quisque viverra. Non semper in
                        sed
                        quisque dui. Platea posuere ullamcorper id fames ut sed urna cursus eget. Neque, vel</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 order-0 order-md-1 mb-5 mt-md-0">
                  <div class="image-block text-center">
                    <img loading="lazy" decoding="async" src="images/illustration-2.png" alt="How Much Does It Costs?"
                      class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade " id="pills-how-do-i-repay" role="tabpanel"
              aria-labelledby="pills-how-do-i-repay-tab">
              <div class="row align-items-center">
                <div class="col-md-6 order-1 order-md-0">
                  <div class="content-block">
                    <h3 class="mb-4">What services will I receive?</h3>
                    <div class="content">
                      <p> Our extensive network of partner institutions across the globe provides you with a wide range
                        of options to choose from. We'll also assist you with all the file processing, documentation,
                        and guidance to ensure your application is strong.</p>
                      <p>turpis vivamus donec. Id congue vesti bualum odio dignissim at quisque viverra. Non semper in
                        sed
                        quisque dui. Platea posuere ullamcorper id fames ut sed urna cursus eget. Neque, vel</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 order-0 order-md-1 mb-5 mt-md-0">
                  <div class="image-block text-center">
                    <img loading="lazy" decoding="async" src="images/illustration-1.png" alt="How Do I Repay?"
                      class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="card col-md-3 mb-3 p-3 me-lg-5 mx-2" style="width: 200px;">
        <div class="counter-box colored text-center">
          <i class="fa-solid fa-building-columns" style="color: #3507c1;"></i>
          <span style="color: #3507c1;" class="counter">200</span><span style="color: #3507c1;">+</span>
          <p>universities</p>
        </div>
      </div>
      <div class="card col-md-3 mb-3 p-3  me-lg-5 mx-2" style="width: 200px;">
        <div class="counter-box text-center">
          <i class="fa-brands fa-leanpub" style="color: #3507c1;"></i>
          <span style="color: #3507c1;" class="counter">300</span><span style="color: #3507c1;">+</span>
          <p>Coursess</p>
        </div>
      </div>

      <div class="card col-md-3 mb-3 p-3  me-lg-5 mx-2" style="width: 200px;">
        <div class="counter-box text-center">
          <i class="fa-solid fa-user" style="color: #3507c1;"></i>
          <span style="color: #3507c1;" class="counter">3</span><span style="color: #3507c1;">k+</span>
          <p>Students</p>
        </div>
      </div>
      <div class="card col-md-3 mb-3 p-3 mx-2" style="width: 200px;">
        <div class="counter-box text-center blue-text">
          <i class="fa-brands fa-cc-visa" style="color: #3507c1;"></i>
          <span style="color: #3507c1;" class="counter">5</span><span style="color: #3507c1;">k+</span>
          <p>Visa</p>
        </div>
      </div>
    </div>
  </div>


  <?php include "footer.php"; ?>


  <!-- # JS Plugins -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/slick/slick.min.js"></script>
  <script src="plugins/scrollmenu/scrollmenu.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.logo-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        responsive: [{
            breakpoint: 992, // Medium devices (tablets, 768px to 991px)
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 768, // Small devices (mobile phones, less than 768px)
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          }
        ]
      });
    });


    $(document).ready(function() {
      // Function to start counting animation
      function startCountingAnimation() {
        $('.counter:not(.counted)').each(function() {
          $(this).addClass('counted').prop('Counter', 0).animate({
            Counter: $(this).text()
          }, {
            duration: 4000,
            easing: 'swing',
            step: function(now) {
              $(this).text(Math.ceil(now));
            }
          });
        });
      }

      // Define the options for the Intersection Observer
      const options = {
        root: null, // Use the viewport as the root
        rootMargin: '0px', // No margin
        threshold: 0.5 // Trigger when at least 50% of the element is visible
      };

      // Function to handle the intersection changes
      const intersectionCallback = (entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            // When the target element is intersecting with the viewport
            startCountingAnimation();
            // Unobserve the target element after it's been triggered once
            observer.unobserve(entry.target);
          }
        });
      };

      // Create the Intersection Observer
      const observer = new IntersectionObserver(intersectionCallback, options);

      // Observe each target element
      const targetElements = document.querySelectorAll('.counter-box');
      if (targetElements) {
        targetElements.forEach(element => {
          observer.observe(element);
        });
      }
    });
  </script>

  <!-- Main Script -->
  <script src="js/script.js"></script>

</body>

</html>