<?php

include "connect.php";

$valid = false;

if (isset($_SESSION['user_id'])){
    $valid = true;
}

$response = array(
    'success' => true,
    'valid' => $valid,
    'user_id' => $_SESSION['user_id']
);

echo json_encode($response);

?>