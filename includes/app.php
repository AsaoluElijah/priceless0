<?php
    require('connection.php');

    // < /> with love (<3) by Asaolu Elijah
    class App extends Connect{

        function emailExist($email){

            // $connection = $this->connect();
            $query = "SELECT email FROM user WHERE email = '{$email}'";
            $result = $this->connect()->query($query);
            $row = mysqli_num_rows($result);
            if($row > 0){
                return "yes";
            }else{
                return "no";
            }


        }

        function registerUser($name,$email,$password){
            $checkEmail = $this->emailExist($email);

            if($checkEmail == "yes"){
                return "exist";
            }else{
                $pwd = $password;
                $password = sha1($password);
                $wallet = sha1($email);
                // $connection = connect();
                $query = "INSERT INTO user(name,email,password,wallet,pwd)
                VALUES('$name','$email','$password','$wallet','$pwd')";
                $result = $this->connect()->query($query);
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
        }

        function setCookie($value,$days){
            // 86400 = 1 days
            $cookie = setcookie('Priceless',$value, time() + (86400 * $days), "/");
            return $cookie;
        }

        function login($email,$password){
            // $connection = $this->connect();
            $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password' ";
            // $result = mysqli_query($connection,$query);
            $result =  $this->connect()->query($query);
            $row =  $result->fetch_array();
            if ($row > 0) {
                $wallet = $row['wallet'];
                $this->setCookie($wallet,1);
                return 'success';
            } else {
                return 'failed';
            }
            
        }

        function checkCookie($cookieName){
            if (isset($_COOKIE[$cookieName])) {
                return true;
            }else{
                return false;
            }
        }

        function showAmount($userId){
            $query = "SELECT amount FROM user WHERE id = {$userId}";
            $result = $this->connect()->query($query);
            $row = $result->fetch_array();
            return $row['amount'];

        }

        function insertTransaction($from,$to,$amount,$message){
            $q = "INSERT INTO transactions(sender, reciever,amount,msg)
            VALUES('{$from}','{$to}',{$amount},'{$message}') ";
            $r = $this->connect()->query($q);
            if ($r) {
                return "success";
            }else{
                return "failed";
            }
        }
        
        // function userInfo($userId){
        //     $query = "SELECT * FROM user WHERE id = {$userId}";
        //     $result = $this->connect()->query($query);
        //     $row = $result->fetch_array();
        //     $fname = $row['fname'];
        //     $lname = $row['lname'];
        //     $fullname = $fname." ".$lname;
        //     $email = $row['email'];
            
        // }
        
        // senderId is used in the function to get the sender current amount
        function send($from,$to,$amount,$senderId,$message){
            $usrAmount = $this->showAmount($senderId);
            if ($usrAmount <= $amount) {
                return "insufficient";
            }else{

                $query = "SELECT amount,wallet FROM user WHERE wallet = '{$to}'";
                $result = $this->connect()->query($query);
                $row = mysqli_fetch_array($result);

                // Check if wallet exist and update amount
                if ($row > 0) {
                    // amount before is for reciever, new amount = reciever amnt, newUsrAmount = sender amnt
                    $amountBefore = $row['amount'];
                    $newAmount = $amountBefore + $amount;
                    $newUsrAmount = $usrAmount - $amount;
                    // UPdate reciever amount += amount;
                    $sql = "UPDATE user SET amount = $newAmount WHERE wallet = '{$to}' ";
                    $newResult = $this->connect()->query($sql);
                    // Update sender amount -= amount;
                    $sql2 = "UPDATE user SET amount = $newUsrAmount WHERE id = '{$senderId}' ";
                    $newResult2 = $this->connect()->query($sql2);

                    if ($newResult AND $newResult2) {
                        // Sent successfully
                        // return "sent";
                        $sender = $from;
                        $reciever = $to;
                        $sentAmount = $amount;
                        // Insert the transaction into transactions table in db;
                        $updTransction = $this->insertTransaction($sender,$reciever,$sentAmount,$message);
                        if ($updTransction == "success") {
                            // all successfull
                            return "updSuccess";
                        }else{
                            // sent successfully, but insert transaction error;
                            return "upderror";
                        }
                    }else{
                        return "updError";
                    }

                }else{
                    // Wallet does not exist
                    return "wdne";
                }
            }
        }
        // Json Rest Api
        function listUsers($limit,$order){
            $user = array();
            $query = "SELECT * FROM user ORDER BY id {$order} LIMIT {$limit}";
            $result = $this->connect()->query($query);
            while($row = $result->fetch_array()){
                // $user[$row['id']] = array(
                $user[$row['id']] = array([
                    'id' => $row['id'],
                    'name' => $row['fname']." ".$row['lname'],
                    'email' => $row['email'],
                    'wallet' => $row['wallet'],
                    'amount' => $row['amount']]
                );
            }
            return json_encode($user);
        }

    } 
    $app = new App;
    // header('Content-Type: application/json');
    // $users = $app->listUsers(10,'asc');
    // $myfile = fopen('users.json','w');
    // fwrite($myfile,$users);
    // $a = $app->registerUser('Asaro E.', 'aa@j.o','asa');
    // if ($a === 'exist') {
    //     echo "esixt";
    // }else if ($a === true) {
    //     echo "Dioe";
    // }else{
    //     echo "Nog";
    // }
    // echo $app->insertTransaction('86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','df211ccdd94a63e0bcb9e6ae427a249484a49d60',10,'You re welcome');