<?php require('includes/app.php');
    $login = new App;
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $newLogin = $login->login($email,$password);
        if ($newLogin === "success") {
            $success = true;
        }else{
            $error = true;
        }

    }

?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<!-- Mirrored from demo.themenio.com/tokenwiz/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2017], Thu, 09 May 2019 11:29:08 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fully featured and complete ICO Dashboard template for ICO backend management.">
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Site Title  -->
    <title>TokenWiz - ICO User Dashboard Admin Template</title>
    <!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="assets/css/vendor.bundle49f7.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/css/style49f7.css" id="layoutstyle">
</head>

<body class="page-ath">
    <div class="page-ath-wrap">
        <div class="page-ath-content">
            <div class="page-ath-header">
                <a href="index.html" class="page-ath-logo"><img src="images/logo.png" srcset="images/logo2x.png 2x" alt="logo"></a>
            </div>
            <div class="page-ath-form">
                <h2 class="page-ath-heading">Sign in <small>To your Priceless account</small></h2>
                <form action="#" method="POST">
                    <div class="input-item">
                        <input type="email" required name="email" placeholder="Your Email" class="input-bordered">
                    </div>
                    <div class="input-item">
                        <input type="password" required name="password" placeholder="Password" class="input-bordered">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="input-item text-left">
                            <input class="input-checkbox input-checkbox-md" id="remember-me" type="checkbox">
                            <label for="remember-me">Remember Me</label>
                        </div>
                        <div><a href="forgot.html">Forgot password?</a>
                            <div class="gaps-2x"></div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                </form>
                <!-- <div class="sap-text"><span>Or Sign In With</span></div> -->
                <!-- <ul class="row guttar-20px guttar-vr-20px">
                    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-facebook btn-block"><em
                                class="fab fa-facebook-f"></em><span>Facebook</span></a></li>
                    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-google btn-block"><em
                                class="fab fa-google"></em><span>Google</span></a></li>
                </ul> -->
                <div class="gaps-2x"></div>
                <div class="gaps-2x"></div>
                <div class="form-note">Don’t have an account?
                    <a href="sign-up.php"> <strong>Sign up here</strong></a>
                </div>
            </div>
            <div class="page-ath-footer">
                <ul class="footer-links">
                    <li><a href="regular-page.html">Privacy Policy</a></li>
                    <li><a href="regular-page.html">Terms</a></li>
                    <li>&copy; 2018 TokenWiz.</li>
                </ul>
            </div>
        </div>
        <div class="page-ath-gfx">
            <div class="w-100 d-flex justify-content-center">
                <div class="col-md-8 col-xl-5"><img src="images/ath-gfx.png" alt="image"></div>
            </div>
        </div>
    </div>
    <!-- JavaScript (include all script here) -->
    <script src="assets/js/jquery.bundle49f7.js"></script>
    <script src="assets/js/script49f7.js"></script>
    <script src="assets/js/sweat.examples49f7.js"></script>    <script>
        function success() {
            var a = swal("Registration Successfull", "Go to dashboard!", "success");
            
        }
        function error() {
         swal("Error", "Incorrect email or password,", "error");
            
        }
    </script>
<?php
    if ($success) {
        echo "<script> location.href = 'dashboard.php' </script>";
    }
    if ($error) {
        echo "<script>error()</script>";
    }
?>
</body>
</html>