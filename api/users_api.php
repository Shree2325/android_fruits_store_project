<?php
    include("../connection.php");
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $dataarray = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $tarray = array();
		$tarray["status"] = 'success';
		$tarray["id"] = $row['id'];
        $tarray["name"] = $row['name'];
        $tarray["email"] = $row['email'];		
        $tarray["mobileno"] = $row['mobileno'];		
		array_push($dataarray, $tarray);
    }
    header('Content-Type: application/json');
	echo json_encode(array("data"=>$dataarray));
    
?>