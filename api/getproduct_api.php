<?php
    include("../connection.php");
    
    $id = $_POST['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $tarray = $row;
		 $tarray["status"] = 'success';
		array_push($tarray);
    }
    header('Content-Type: application/json');
	echo json_encode($tarray);
    
?>