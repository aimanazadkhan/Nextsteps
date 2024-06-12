<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <br><br><br>
    <section>
        <div class="container-fluid mt-5 pt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="mt-0 col-md-9 col-lg-6 col-xl-5">
                    <a href="../Homepage/index.php"><img src="images/Next Steps logo.png" class="img-fluid" alt="Sample image"
                            style="width:450px"></a>
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 pt-2">
                    <div class="border border-2 border-primary-subtle rounded p-5 shadow-lg">
                        <form action="loginAction.php" method="POST">
                            <div class="py-5 text-center">
                                <span class="font" style="font-size: 1.2rem;">Sign-In</span>
                            </div>

                            <div class="form-outline">
                                <label class="form-label">Username or Email</label>
                                <input type="text" id="form12" class="form-control" name="l_username" />
                            </div>

                            <div class="form-outline mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="l_pass" class="form-control" required>
                            </div>

                            <div class="">
                                <a href="forgotpass.php" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-outline-primary btn-lg" name="btn_signIn"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                                        class="link-danger">Register</a></p>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>