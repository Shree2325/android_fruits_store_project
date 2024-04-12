<?php
    include("../connection.php");
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE (email = '$email' OR mobileno = '$email') AND password = '$password'";
    $result = mysqli_query($conn, $sql);

   // $dataarray = array();

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $tarray = array();
		$tarray["status"] = 'success';
		$tarray["id"] = $row['id'];
		$tarray["name"] = $row['name'];
        $tarray["email"] = $row['email'];
        $tarray["mobileno"] = $row['mobileno'];
		array_push($tarray);
    }
    
    else{
        $tarray = array();
        $tarray["status"] = 'failed';
        array_push($tarray);
    }
    header('Content-Type: application/json');
	echo json_encode($tarray);
    
?>