<?php

include "connect.php";

// Check if the request is a POST request
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = json_decode(file_get_contents('php://input'), true);

    $username = $data['username'];
    $password = $data['password'];

    // Check if the username exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if(password_verify($password, $hashedPassword)){
            $response = array(
                'success' => true,
                'message' => 'Login successful!'
            );

            $_SESSION['user_id'] = $row['id'];

        }else{
            $response = array(
                'success' => false,
                'message' => 'Password is incorrect.'
            );
        }

    }else{
        $response = array(
            'success' => false,
            'message' => 'User not found.'
        );
    }

    echo json_encode($response);

} else {
    echo "Invalid request! Only POST requests are allowed.";
}

?>