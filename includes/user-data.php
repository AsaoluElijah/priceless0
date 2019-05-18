<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "priceless";
    $connection = new mysqli($host,$username,$password,$dbName);

    if (isset($_COOKIE['Priceless'])) {
        
        $wallet = $_COOKIE['Priceless'];
        $query = "SELECT * FROM user WHERE wallet = '{$wallet}'";
        $result = $connection->query($query);
        $row = $result->fetch_array();

        $userId = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $wallet = $row['wallet'];
        $user_amount = $row['amount'];
        // echo $userId;

    }else{
        echo "<script>location.href = 'sign-in.php' </script>";
    }
?>