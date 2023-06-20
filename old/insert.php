<?php

include "connect.php";

// Check if the request is a POST request
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = json_decode(file_get_contents('php://input'), true);

    $firstname = $data['firstname'];
    $lastname = $data['lastname'];
    $grade = $data['grade'];

    $sql = "INSERT INTO students (firstname, lastname, grade)
            VALUES ('$firstname', '$lastname', '$grade')";

    if($conn->query($sql)) {
        echo "Student added!";
    }
} else {
    echo "Invalid request! Only POST requests are allowed.";
}

?>