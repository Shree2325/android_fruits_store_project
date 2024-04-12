<?php
    include("../connection.php");


    $sql = "SELECT O.*, U.name AS user, U.email, U.mobileno, P.name, P.price, P.pic ";
    $sql .=" FROM orders AS O, users AS U, products AS P WHERE U.id = O.userid AND P.id = O.productid ";

    if(isset($_POST['userid']))
    {
        $sql .="AND O.userid = ". $_POST['userid'];
    }

    
    $result = mysqli_query($conn, $sql);
    $dataarray = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $tarray = $row;
		$tarray["status"] = 'success';
		array_push($dataarray, $tarray);
    }
    header('Content-Type: application/json');
	echo json_encode(array("data"=>$dataarray));
    
?>