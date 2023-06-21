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
        <h1 class="fw-bold">Home</h1>
        <p>Welcome, <span id="username"></span></p>
        <button id="logout" class="btn btn-dark btn-sm">⃪ Logout</button>
    </section>
    <script>

        checkSession();
        let user;

        function checkSession() {
            fetch("http://localhost:8888/kodego/backend/checksession.php")
            .then(response => response.json())
            .then(data => {
                if(!data.valid){
                    window.location.replace("login.php");
                }else{
                    fetch(`http://localhost:8888/kodego/backend/getuser.php?id=${data.user_id}`)
                    .then(response => response.json())
                    .then(data => {
                        user = data.user;
                        document.querySelector("#username").innerHTML = user.username;
                    })
                }
            });
        }

        const logoutButton = document.querySelector("#logout");
        logoutButton.addEventListener("click", logout);

        function logout(){
            fetch("http://localhost:8888/kodego/backend/logout.php")
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                window.location.replace("login.php");
            });
        }

    </script>
</body>
</html>