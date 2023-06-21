<?php

include "connect.php";

// Check if the request is a POST request
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = json_decode(file_get_contents('php://input'), true);

    $title = $data['title'];
    $status = 'pending';

    $sql = "INSERT INTO todos (title, status)
            VALUES ('$title', '$status')";

    if($conn->query($sql)) {
        echo "Todo added!";
    }
} else {
    echo "Invalid request! Only POST requests are allowed.";
}

?>