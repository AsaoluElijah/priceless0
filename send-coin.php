<!DOCTYPE html>
<html>

</body>

</html>
<head>
    <?php
    require('main-header.php');
    require('includes/app.php');

    $send = new App;
    if (isset($_POST['submit'])) {
        $reciever = $_POST['reciever'];
        $amount = $_POST['submit'];
        $message = $_POST['messsage'];
        $newSend = $send->send($from,$to,$amount,$usrId,$message);
        // if () {
        //     # code...
        // }
    }

    ?>
</head>

<body class="page-user">
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="main-content col-lg-8">
                    <div class="content-area card">
                        <div class="card-innr card-innr-fix">
                            <div class="card-head">
                                <h6 class="card-title">Share Blue-Coin with family and friends</h6>
                            </div>
                            <div class="gaps-1x"></div>
                            <!-- .gaps -->
                            <form action="#">
                                <div class="input-item input-with-label">
                                    <label class="input-item-label text-exlight">
                                        Reciever's Wallet Address <sup style="color:red;font-weigth:bolder;">*</sup>
                                    </label>
                                    <!-- Input with inline icon -->
                                    <div class="relative">
                                        <span class="input-icon input-icon-right">
                                            <em class="ti ti-image"></em>
                                        </span>
                                        <input name="reciever" class="input-bordered" type="text" placeholder="Enter the reciever's wallet address">
                                    </div>
                                </div>
                                <div class="input-item input-with-label">
                                    <label class="input-item-label text-exlight">
                                        Amount <sup style="color:red;font-weigth:bolder;">*</sup>
                                    </label>
                                    <div class="relative">
                                        <span class="input-icon input-icon-right">
                                            <em class="ti ti-face-smile"></em>
                                        </span>
                                        <input name="amount" class="input-bordered" type="text" placeholder="Enter the amount you'll like to send">
                                    </div>
                                </div>
                                <div class="input-item input-with-label">
                                    <label class="input-item-label text-exlight">
                                        Message <sup style="color:red;font-weigth:bolder;">*</sup>
                                    </label>
                                    <div class="relative">
                                        <textarea name="message" placeholder="Enter the message you'll like to show this user" name="" class="input-bordered" rows="5" style="resize:none;"></textarea>
                                    </div>
                                </div>
                                <div class="gaps-1x"></div>
                                <button type="submit" name="submit" class="btn btn-primary">Send
                                    <span class="icon fas fa-paper-plane"></span>
                                </button>
                            </form>
                        </div>
                        <!-- .card-innr -->
                    </div>
                    <!-- .card -->
                    <div class="content-area card">
                        <div class="card-innr">
                            <div class="card-head">
                                <h5 class="card-title card-title-md">Invite your friends and family and receive free tokens
                                </h5>
                            </div>
                            <div class="card-text">
                                <p>Each member have a unique TWZ referral link to share with friends and family and receive a <strong>bonus - 15% of the value of their contribution</strong>. If any one sign-up with this link, will be added to your referral
                                    program. The referral link may be used during a token sales running.</p>
                            </div>
                            <div class="referral-form">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0 font-bold">Referral URL</h5><a href="#" class="link link-primary link-ucap">See Your referral</a>
                                </div>
                                <div class="copy-wrap mgb-1-5x mgt-1-5x"><span class="copy-feedback"></span><em class="fas fa-link"></em><input type="text" class="copy-address" value="https://demo.themenio.com/tokenwiz?ref=7d264f90653733592" disabled><button class="copy-trigger copy-clipboard"
                                        data-clipboard-text="https://demo.themenio.com/tokenwiz?ref=7d264f90653733592"><em
                                            class="ti ti-files"></em></button></div>
                                <!-- .copy-wrap -->
                            </div>
                            <ul class="share-links">
                                <li>Share with : </li>
                                <li><a href="#"><em class="fab fa-google-plus-g"></em></a></li>
                                <li><a href="#"><em class="fab fa-twitter"></em></a></li>
                                <li><a href="#"><em class="fab fa-facebook-f"></em></a></li>
                                <li><a href="#"><em class="fab fa-linkedin-in"></em></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .col -->
                <div class="aside sidebar-right col-lg-4">
                    <div class="account-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Receiving Wallet</h6>
                            <p class="text-primary">
                                Copy and share this wallet with friends to recieve Blue-Coin from them
                            </p>
                            <div class="copy-wrap mgb-0-5x"><span class="copy-feedback"></span><em class="fas fa-link"></em><input type="text" class="copy-address" value="78ui21yhw281" disabled><button class="copy-trigger copy-clipboard" data-clipboard-text="78ui21yhw281"><em
                                                class="ti ti-files"></em></button>
                            </div>
                            <div class="gaps-2-5x"></div>

                            <h6 class="card-title card-title-sm">Your Account Status</h6>
                            <ul class="btn-grp">
                                <li><a href="#" class="btn btn-auto btn-xs btn-danger">Email not verified</a></li>
                                <li><a href="#" class="btn btn-auto btn-xs btn-warning">Verify Now</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="token-sales card">
                        <div class="token-calculator card card-full-height">
                            <div class="card-innr">
                                <div class="card-head">
                                    <h4 class="card-title">Buy Blue-Coin</h4>
                                    <p class="card-title-text">Enter amount to calculate token.</p>
                                </div>
                                <script>
                                    const calculate = (value) => {
                                        let amount = value * 100;
                                        document.querySelector('.token-amount').innerHTML = amount;
                                    }
                                </script>
                                <div class="token-calc">
                                    <div class="token-pay-amount"><input oninput="calculate(this.value);" id="token-base-amount" class="input-bordered input-with-hint" type="text" value="1">
                                        <div class="token-pay-currency"><span class="link ucap link-light">Blu</span>
                                        </div>
                                    </div>
                                    <div class="token-received">
                                        <div class="token-eq-sign">=</div>
                                        <div class="token-received-amount">
                                            <h5 class="token-amount">100.00</h5>
                                            <div class="token-symbol">NR</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="token-calc-note note note-plane"><em class="fas fa-info-circle text-light"></em><span class="note-text text-light">Amount
                                        calculated based current tokens price</span></div>
                                <div class="token-buy"><a href="#" class="btn btn-primary">Buy Tokens</a></div>
                            </div>
                        </div>
                        <div class="sap"></div>
                        <div class="card-innr">
                            <div class="card-head">
                                <h5 class="card-title card-title-sm">Priceless Blog</h5>
                            </div>
                            <p>
                                Get latest browsing cheat, entertainment & football news from priceless blog
                                <br>
                                <button class="btn btn-primary btn-outline">Visit Now</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- .col -->
            </div>
            <!-- .container -->
        </div>
        <!-- .container -->
    </div>
    <!-- .page-content -->
    
    <script src="assets/js/jquery.bundle49f7.js"></script>
    <script src="assets/js/script49f7.js"></script>

</body>

</html>