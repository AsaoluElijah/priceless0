<?php
    $conn = mysqli_connect('localhost','root','','priceless');
    $query = "SELECT * FROM user";
    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result)){
        
    }
?>