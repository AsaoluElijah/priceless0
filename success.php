<?php
    require('includes/user-data.php');
    
    if (!isset($_REQUEST['event'])) {
        echo "<script>location.href= 'dashboard.php'</script>";
    }
    if ($_REQUEST['event'] == 'regSuccess') {
        $registration = true;
    }else if($_REQUEST['event'] == 'mailVer'){
        $verification = "true";
    }else if ($_REQUEST['event'] == 'purchase') {
        $amount = $_REQUEST['amount'];
        $network = $_REQUEST['network'];
        $purchase = true;
    }
?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <?php require('main-header.php'); ?>
</head>

<body class="page-user">

    <!-- .topbar-wrap -->
    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card content-area">
                        <div class="card-innr">
                            <div class="status status-thank px-md-5">
                                <div class="status-icon"><em class="ti ti-check"></em></div>
                                <?php if (isset($registration)) { ?>
                                <span class="status-text large text-dark">Account registration successfull.</span>
                                <p class="px-md-5">Thank you for registering a Priceless Account. <br>
                                    We just sent a verification mail to <code>asa@gmail.com</code>
                                    <br>
                                    <a href="dashboard.php" class="btn btn-info btn-outline">Goto Dashboard</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="send-coin.php" class="btn btn-info btn-outline">Recieve Blue-Coin</a>
                                </p>
                                <?php } ?>
                                <?php if (isset($verification)) { ?>
                                <span class="status-text large text-dark">Account verification successfull.</span>
                                <p class="px-md-5">Thank you for verifying your account. <br>
                                    We are glad to have you on board
                                    <br>
                                    <a href="dashboard.php" class="btn btn-info btn-outline">Goto Dashboard</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="send-coin.php" class="btn btn-info btn-outline">Send Blue-Coin</a>
                                </p>
                                <?php } ?>
                                <?php if (isset($purchase)) { ?>
                                    <script>
                                        document.querySelector('.status-icon').style.display = "none";
                                    </script>
                                    <img class="w-88px mgb-1x" width="90" height="90" src="images/kyc-progress.png" alt="img">
                                <span class="status-text large text-dark">Complete Order.</span>
                                <p class="px-md-5 te">
                                    <span style="font-size:17px;">Network:</span> <?php echo $network; ?>
                                        <br>
                                    <span style="font-size:17px;">Amount:</span> <?php echo $amount; ?>
                                    <br>
                                    <h3><b>Select Payment Method</b></h3>
                                    <hr>
                                    <a href="#" data-toggle="modal" data-target="#pay-blue" class="btn btn-info btn-outline">Blue-Coin</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="send-coin.php" class="btn btn-info btn-outline">Bank/Card Payment</a>
                                </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- .card -->
                    <div class="gaps-1x"></div>
                    <div class="gaps-3x d-none d-sm-block"></div>
                </div>
            </div>
        </div>
        <!-- .container -->
    </div>
    <!-- Modal Top -->
    <div class="modal fade" id="pay-blue" tabindex="-1">
        <div class="modal-dialog modal-dialog-sm">
            <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em
                        class="ti ti-close"></em></a>
                <div class="popup-body">
                    <h3 class="popup-title" id="modal-title">Payment For <?php echo $network.", #".$amount; ?></h3>
                    <p id="modal-content">
                        Your Balance: <?php echo $user_amount." Blue-Coin"; ?>
                        <br>
                        Amount to pay for:
                            <?php echo "#".$amount; ?>
                            <!-- 1 Blue-Coin = 100, Amount to pay for = amount/100 -->
                            (<?php echo $amount/100; ?> Blue-Coin)
                            <br><br>
                            <div id="code"></div>
                        <button onclick="buyAirtime();" id="pay-now" class="btn btn-success">Pay Now</button>
                    </p>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- Modal End -->
    <!-- .page-content -->
    <div class="footer-bar">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <ul class="footer-links">
                        <li><a href="#">Whitepaper</a></li>
                        <li><a href="faq-page.html">FAQs</a></li>
                        <li><a href="regular-page.html">Privacy Policy</a></li>
                        <li><a href="regular-page.html">Terms of Condition</a></li>
                    </ul>
                </div>
                <!-- .col -->
                <div class="col-md-4 mt-2 mt-sm-0">
                    <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x">
                        <div class="copyright-text">&copy; 2018 TokenWiz.</div>
                        <div class="lang-switch relative"><a href="#" class="lang-switch-btn toggle-tigger">En <em
                                    class="ti ti-angle-up"></em></a>
                            <div class="toggle-class dropdown-content dropdown-content-up">
                                <ul class="lang-list">
                                    <li><a href="#">Fr</a></li>
                                    <li><a href="#">Bn</a></li>
                                    <li><a href="#">Lt</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .col -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>
    <!-- .footer-bar -->
    <!-- JavaScript (include all script here) -->
    <script src="assets/js/jquery.bundle49f7.js"></script>
    <script src="assets/js/script49f7.js"></script>
    <script src="assets/js/toastr.examples49f7.js"></script>
    <script>
        // Change content if ajax response = no Airtime;
        function noAirtime() {
            var title = "An error occured";
            var content = "Opps!, an error occured during airtime purchase. <br> Kindly notify our admin about this error @ <hr> <a href='mailto:support@priceless.com'>support@priceless.com</a> ";
            document.getElementById('modal-title').innerHTML = title;
            document.getElementById('modal-content').innerHTML = content;
            document.getElementById('pay-now').style.display = 'none';
            
        }
        // Change content if ajax response = insufficient Blue-coin;
        function insufficient() {
            var title = "Insufficient Blue-Coin";
            var content = "You do not have enough blue coin to complete your transaction.<hr><a class='btn btn-primary btn-outline'>Buy Blue-Coin</a><br><br><a class='btn btn-outline btn-warning'>Pay with card</a>";
            document.getElementById('modal-title').innerHTML = title;
            document.getElementById('modal-content').innerHTML = content;
            document.getElementById('pay-now').style.display = 'none';
        }
        // aCode = airtime code;
        function success(aCode) {
            var title = "Transaction Successfull";
            var content = {
                img: '<img src="images/kyc-success.png">',
                inp: `<div class="copy-wrap mgb-0-5x"><span class="copy-feedback"></span><em class="fas fa-link"></em><input type="text" class="copy-address"value="${acode}" disabled><button class="copy-trigger copy-clipboard" data-clipboard-text="${acode}"><em class="ti ti-files"></em></button></div>`,
                shr: '<p>Share this airtime with friends<br>Share on: <i class="fa f-facebook"></i></p><br><h3><center>OR</center></h3>',
                ld: '<p>Click the button below to load on this device<br><button>Load Now</button></p>'

            }
        }
        function buyAirtime() {
            
            var amount = <?php echo $amount; ?>;
            var network = "<?php echo $network; ?>";
            network = network.toLowerCase();
            var user_amount = <?php echo $user_amount; ?>;
            $.ajax({
                url: 'blue-payment.php',
                method: 'POST',
                data: {pay: true,amount: amount,network: network},
                success: function (data) {
                    var noA = /(No Airtime)/;
                    var ins = /(insufficient Blue-Coin)/;
                    if (noA.test(data) == true) {
                        noAirtime();
                    }else if (ins.test(data)) {
                        insufficient();
                    }else{
                        alert(data);
                    }
                    // document.getElementById('code').innerHTML = data;
                }
            });
        }
    </script>
</body>
<!-- Mirrored from demo.themenio.com/tokenwiz/thank-you.html by HTTrack Website Copier/3.x [XR&CO'2017], Thu, 09 May 2019 11:29:10 GMT -->

</html>