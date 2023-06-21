<?php

include "connect.php";

session_unset();
session_destroy();

$response = array(
    'success' => true,
    'message' => "You have logged out."
);

echo json_encode($response);

?>