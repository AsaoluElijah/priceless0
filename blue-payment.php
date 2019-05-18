<?php
    require('includes/user-data.php');
    /*  ********
     * Made with <3 by Asaolu Elijah
     *  *********/
    function updDB($network,$id){
		require('p_connection.php');
		$sql = "UPDATE $network SET status = 'used' WHERE id = $id";
		$result = mysqli_query($connection,$sql);
		if ($result) {
			$updateSuccess = true;
			return 'updSuccess';
		}else{
			return 'updFailed';
		}
	}
	// Set airtime, price and network to cookie .
	// function setSession($network,$code,$price){
	// 	$_SESSION['network'] = $network;
	// 	$_SESSION['code'] = $code;
	// 	$_SESSION['price'] = $price;
	// 	echo "<script>location.href = 'data.php'</script>";
	// }

	/* Select data from database
	*/
	function getAirtime($network,$price){
		require('p_connection.php');
		$sql = "SELECT * FROM $network WHERE status = 'not_used' AND price = $price LIMIT 1";
		$result = mysqli_query($connection,$sql);
		$row = mysqli_fetch_array($result);
		if ($row < 1) {
			$noAirtime = true;
			return 'noAirtime';
		}else{

			$id = $row['id'];
			$airtimeCode = $row['code'];
			$airtimePrice = $row['price'];

			/* Update the database and set the status of airtime to used
				********************************************************
				MADE WITH <3 BY ASAOLU ELIJAH
				********************************************************
			.*/
			updDB($network,$id);
			// setSession($network,$airtimeCode,$airtimePrice);
			return $airtimeCode;
		}
    }
    // This function will deduct the amount of the airtime purchased from the user amount
    function deductAmount($amount,$userId){
		require('p_connection.php');
		require('includes/user-data.php');
        // $user_amount is from includes/user-data.php;
        $userAmount = $user_amount;
        $newUsrAmount = $userAmount - $amount;
        // UPdate reciever amount += amount;
        $sql = "UPDATE user SET amount = $newUsrAmount WHERE id = $userId ";
        $result = mysqli_query($connection,$sql);
        if ($result) {
            return true;
        }else{
            return 'error';
        }
    }

    // This function will add the transaction to airtime_purchase db
    function insertTransaction($userId,$price,$network){
		require('p_connection.php');
        require('includes/user-data.php');
        $sql = "INSERT INTO airtime_purchase (userId,price,network)
        VALUES('{$userId}',$price, '{$network}')";
        $result = mysqli_query($connection,$sql);
        // if ($result) {
        //     return "Success";   
        // }else{
        //     return "Error";
        // }
        // return $result;
    } 

    /******************/
echo insertTransaction(1,100,'mtn');
if (isset($_REQUEST['pay'])) {

    $network = $_POST['network'];
    $amount = $_POST['amount'];
    // amount / 100, 1blue-coin = 100...
    // Look for a way to improve this in the future
    if ($user_amount <= $amount / 100) {
        echo "insufficient Blue-Coin";
    }else{
        $newAirtime = getAirtime($network,$amount);
        if ($newAirtime == 'noAirtime') {
            echo "No Airtime";
        }else{
            deductAmount($amount / 100,$userId);
            insertTransaction($userId,$amount,$network);
            echo $newAirtime;
        }
    }
}
?>