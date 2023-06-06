<?php
    session_start();

    if($_SESSION['isLoggedIn'] != true){
        $_SESSION['error'] = "Unauthorized access!";
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container m-5 p-5">
        <div class="border rounded p-5 my-3">

        <h1 class="fw-bold">Home</h1>
            <h3>You have logged in!</h3>
            <a href="logout.php" class="btn btn-light">Logout</a>
        </div>
    </div>
</body>
</html>
