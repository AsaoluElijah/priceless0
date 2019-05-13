<?php
    require('includes/app.php');
    $registration = new App;
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $newReg = $registration->registerUser($name,$email,$password);
        if ($newReg === "exist") {
            $emailExist = true;
        }else if ($newReg === true) {
            $success = true;
        }else{
            $error = true;
        }
        

    }
?>
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fully featured and complete ICO Dashboard template for ICO backend management.">
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Site Title  -->
    <title>Priceless | Buy affordble airtime and data to browse the web</title>
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
                <h2 class="page-ath-heading">Sign up <small>Create New Priceless Account</small></h2>
                <form action="#" method="POST">
                    <div class="input-item">
                        <input type="text" required name="name" placeholder="Your Name" class="input-bordered">
                    </div>
                    <div class="input-item">
                        <input type="text" required name="email" placeholder="Your Email" class="input-bordered">
                    </div>
                    <div class="input-item">
                        <input type="password" required name="password" placeholder="Password" class="input-bordered">
                    </div>

                    <div class="input-item text-left">
                        <input required class="input-checkbox input-checkbox-md" id="term-condition" type="checkbox"><label for="term-condition">I agree to Priceless <a
                                href="regular-page.html">Privacy Policy</a> &amp; <a href="regular-page.html">
                                Terms.</a></label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
                </form>
                <div class="sap-text"><span>Or Sign Up With</span></div>
                <ul class="row guttar-20px guttar-vr-20px">
                    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-facebook btn-block"><em
                                class="fab fa-facebook-f"></em><span>Facebook</span></a></li>
                    <li class="col"><a href="#" class="btn btn-outline btn-dark btn-google btn-block"><em
                                class="fab fa-google"></em><span>Google</span></a></li>
                </ul>
                <div class="gaps-2x"></div>
                <div class="gaps-2x"></div>
                <div class="form-note">Already have an account ?
                    <a href="sign-in.php"> <strong>Sign in
                            instead</strong></a>
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
    <script src="assets/js/sweat.examples49f7.js"></script>
    <script>
        function success() {
            var a = swal("Registration Successfull", "Go to dashboard!", "success");
            
        }
        function warning() {
         swal("Warning", "This email is used by another user!", "warning");
            
        }
        function error() {
         swal("Error", "An unknown error occured, try refreshing your browser", "error");
            
        }
        // show();
    </script>
<?php
    if ($success) {
?>
    <script>
        success();
        location.href = 'dashboard.php';
    </script>
<?php }
    if ($error) {
?>
    <script>
        error();
    </script>
<?php }
    if ($emailExist) {
?>
    <script>
        warning();
    </script>
<?php } ?>
</body>
<!-- Mirrored from demo.themenio.com/tokenwiz/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2017], Thu, 09 May 2019 11:29:10 GMT -->

</html>