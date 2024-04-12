<?php

    include("../connection.php");

    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    if($id == 0){
        $sql = "INSERT INTO products(name, price, description) ";
        $sql .= "VALUES('$name', '$price', '$description')";
        $conn->query($sql);   
        $id =   mysqli_insert_id($conn);    
    }
    else{
        $sql = "UPDATE products SET name = '$name', ";
        $sql .= "price = '$price', ";
        $sql .= "description = '$description', ";
        $sql .= "WHERE id = " . $id;
        $conn->query($sql);
    }

    if($_FILES["pic"]["tmp_name"] !== "")
		{			
            
			$imagename = "image_".$id;
			$target_dir = '../productpics/' . $imagename  .'.png';

			move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir);
			$query = "UPDATE products SET pic = '" . $imagename . "' WHERE id = " . $id;

           
			$conn->query($query);
		}
    header('Location: products.php');
?>