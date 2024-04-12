<?php
    include("../connection.php");   


    if(isset($_POST['mobileno']))
    {
    $name = $_POST["name"];
    $mobileno = $_POST["mobileno"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    
        $sql = "INSERT INTO users(name,  mobileno, email, password)";
        $sql .=" VALUES ('$name' , '$mobileno','$email', '$password')";
        
        
        $result  = mysqli_query($conn, $sql); 
        $tarray = array();
        if(!$result)
        {
            $tarray["status"] = 'failed';
            array_push($tarray);
        }
        else
        {
            $tarray["status"] = 'success';
            array_push($tarray);
        }
   
    }
    else{
        $tarray["status"] = 'failed';
            array_push($tarray);
    }
    
    
    header('Content-Type: application/json');
	echo json_encode($tarray);
    
?>