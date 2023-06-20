<?php

include "connect.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "UPDATE todos SET status='complete' WHERE id = '$id'";

    $result = $conn->query($sql);
    
    echo "Todo item updated successfully!";
    
}else{
    echo "No student ID provided.";
}

?>