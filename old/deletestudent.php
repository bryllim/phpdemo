<?php

include "connect.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id = '$id'";

    if($conn->query($sql)){
        echo "Student deleted successfully!";
    }else{
        echo "Error deleting student.";
    }
   
}else{
    echo "No student ID provided.";
}



?>