<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <section class="container m-5 p-5 border rounded">
        <h1 class="fw-bold">Create an account</h1>
        <form id="registrationForm">
            <label for="username" class="mt-3">Username</label>
            <input id="username" class="form-control" type="text" required>
            <label for="password" class="mt-2">Password</label>
            <input id="password" class="form-control" type="password" required>
            <label for="confirm_password" class="mt-2">Confirm password</label>
            <input id="confirm_password" class="form-control" type="password" required>
            <button class="btn btn-dark mt-2">Submit</button>
            <a href="login.php" class="ms-3 align-middle">I already have an account</a>
        </form>
    </section>
    <script>

        checkSession();

        function checkSession() {
            fetch("http://localhost:8888/kodego/backend/checksession.php")
            .then(response => response.json())
            .then(data => {
                if(data.valid){
                    window.location.replace("home.php");
                }
            });
        }

        const registrationForm = document.querySelector("#registrationForm");
        registrationForm.addEventListener("submit", register);

        function register(event){
            event.preventDefault();

            // get form data
            const username = document.querySelector("#username").value;
            const password = document.querySelector("#password").value;
            const confirm_password = document.querySelector("#confirm_password").value;

            if(password === confirm_password){
                fetch("http://localhost:8888/kodego/backend/register.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        username: username,
                        password: password
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        alert("Registration successful!");
                        window.location.replace("login.php");
                    }else{
                        alert("Username already exists!");
                    }
                });
            }else{
                alert("Passwords do not match!");
            }
        }

    </script>
</body>
</html>