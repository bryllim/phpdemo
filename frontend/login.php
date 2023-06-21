<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <section class="container m-5 p-5 border rounded">
        <h1 class="fw-bold">Login</h1>
        <form id="loginForm">
            <label for="username" class="mt-3">Username</label>
            <input id="username" class="form-control" type="text" required>
            <label for="password" class="mt-2">Password</label>
            <input id="password" class="form-control" type="password" required>
            <button class="btn btn-dark mt-2">Login</button>
            <a href="register.php" class="ms-3 align-middle">Create an account</a>
        </form>
    </section>
    <script>

    const loginForm = document.querySelector("#loginForm");
    loginForm.addEventListener("submit", login);

    function login(event) {
        event.preventDefault();

        // get form data
        const username = document.querySelector("#username").value;
        const password = document.querySelector("#password").value;

        fetch("http://localhost:8888/kodego/backend/login.php", {
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
                    if (data.success) {
                        alert("Login successful!");
                        window.location.replace("home.php");
                    } else {
                        alert(data.message);
                    }
                });
    }
    </script>
</body>

</html>