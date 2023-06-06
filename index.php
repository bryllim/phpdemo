<?php

session_start();

if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true){
    header("Location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container m-5 p-5">
        <div class="border rounded p-5 my-3">

        <h1 class="fw-bold">Login Form</h1>

            <?php
                if( isset($_SESSION['error']) ){
                    echo '<div class="alert bg-danger text-white">'.$_SESSION['error'].'</div>';
                }
            ?>
            
            <form method="POST" action="action.php">
                <input type="text" name="username" class="form-control mt-2" placeholder="Username" required>
                <input type="password" name="password" class="form-control mt-2" placeholder="Password" required>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
