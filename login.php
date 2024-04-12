<?php
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($email == "admin@gmail.com" && $password == "123"){
        setcookie("usertype", "admin", time() + (86400 * 30), "/"); // 86400 = 1 day 
        setcookie("name", "Admin", time() + (86400 * 30), "/"); // 86400 = 1 day         
        header('Location: admin/dashboard.php');
    }
    else{
        header('Location: index.php?status=failed');
    }
?>