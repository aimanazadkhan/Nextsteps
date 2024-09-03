<header class="navigation bg-tertiary">
  <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img loading="prelaod" decoding="async" class="img-fluid" width="90" src="images/Next Steps logo.png"
          alt="NextSteps">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span
          class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"> <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item "> <a class="nav-link" href="about.html">About</a>
          </li>

          <li class="nav-item "> <a class="nav-link" href="search.php">Search Courses</a>
          <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">Services</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item " href="studentvisa.php">Student Visa</a>
              </li>
              <li><a class="dropdown-item " href="visitvisa.php">Visit Visa</a>
              </li>
              <li><a class="dropdown-item " href="air ticket.php">Air ticketing</a>
              </li>

            </ul>
          </li>
        </ul>

        <?php if (isset($_SESSION['user']) && $_SESSION['user'] !== 'admin') {
          $proPicQuery = mysqli_query($conn, "SELECT `profilePic` FROM `users` WHERE email = '{$_SESSION['user']}'");
          $row = mysqli_fetch_assoc($proPicQuery);
          echo
            "
              <div class='dropdown text-end'>
                <a href='#' class='d-block link-body-emphasis text-decoration-none dropdown-toggle'
                  data-bs-toggle='dropdown' aria-expanded='false'>
                  <img src='" . $row['profilePic'] . "' alt='' width='32' height='32' class='rounded-circle'>
                </a>
                <ul class='dropdown-menu text-small'>
                  <li><a class='dropdown-item' href='profile.php'>Profile</a></li>
                  <li><hr class='dropdown-divider'></li>";

          if (isset($_SESSION['userName']) && $_SESSION['userName'] == 'admin') {
            echo "<li><a class='dropdown-item' href='../AdminPanel'>Admin Panel</a></li>";
          }

          echo
            "
                  <li><a class='dropdown-item' href='logout.php'>Sign out</a></li>
                </ul>
              </div>
            ";
        } else {
          echo "<div>
                  <a href='login.php' class='btn btn-outline-primary'>Log In</a>
                  <a href='register.php' class='btn btn-primary ms-2 ms-lg-3'>Sign Up</a>
                </div>";
        }
        ?>
      </div>
    </div>
  </nav>
</header>