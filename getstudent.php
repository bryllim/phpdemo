<?php

include "connect.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id = '$id'";

    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $student = array(
            'id' => $row['id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'grade' => $row['grade']
        );
    
        $json = json_encode($student);
        header('Content-Type: application/json');
        echo $json;
    
    }else{
        echo "Student not found.";
    }
}else{
    echo "No student ID provided.";
}



?>