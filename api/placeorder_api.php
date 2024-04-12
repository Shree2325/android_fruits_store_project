<?php
    include("../connection.php");   


    if(isset($_POST['userid']))
    {
    $userid = $_POST["userid"];
    $productid = $_POST["productid"];
    $price = $_POST["price"];
    }
    date_default_timezone_set('Asia/Kolkata');

    $now = date("Y-m-d h:i:sa");
    
        $sql = "INSERT INTO orders(userid, productid, total, orderedon)";
        $sql .= " VALUES ($userid, $productid, '$price', '$now')";        
        
        mysqli_query($conn,$sql);       
        
        $tarray = array();
        $tarray["status"] = 'success';
        array_push($tarray);
        
    header('Content-Type: application/json');
	echo json_encode($tarray);
    
?>