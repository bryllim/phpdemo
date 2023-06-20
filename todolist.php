<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <main class="container p-5 m-5 border rounded shadow">
        <h1 class="fw-bold">📋 Todo List</h1>
        <form id="todoForm" class="my-3">
            <input id="todoInput" class="form-control" type="text" placeholder="Add a todo item here...">
            <button type="submit" class="btn btn-primary mt-2">Add</button>
        </form>
        <main class="container p-1" id="todoList">
        </main>
    </main>

    <script>

        const URL = 'http://localhost:8888/kodego/';

        // Fetch and diplay existing todos
        fetchTodoItems();

        // Add event listener to the form
        const todoForm = document.querySelector('#todoForm');
        todoForm.addEventListener('submit', handleSubmit);


        // Function to handle form submission
        function handleSubmit(event) {
            event.preventDefault(); // prevent default event

            const todoInput = document.getElementById("todoInput");
            const todoText = todoInput.value;

            if(todoText !== ""){
                // Send a POST request to the endpoint
                fetch(URL+'newtodo.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({title: todoText})
                })
                .then(response => {
                    todoInput.value = "";
                    fetchTodoItems();
                });
            }else{
                alert("Field cannot be empty!");
            }
        }

        // Function to fetch and display all todo items
        function fetchTodoItems() {
            // Fetch the todo items from the endpoint
            fetch(URL+'fetchtodos.php')
            .then(response => response.json())
            .then(data => {
                
                const todoList = document.getElementById('todoList');
                todoList.innerHTML = ''; // Clear the todo list

                data.forEach(todoItem => {

                    if (todoItem.status === 'pending'){
                        todoList.innerHTML += `<div class="alert alert-light">
                                    <button type="button" class="btn btn-sm btn-success" onclick="markComplete(${todoItem.id})">✔</button>
                                    ${todoItem.title}
                                </div>`;
                    }else{
                        todoList.innerHTML += `<div class="alert alert-success">
                                    ${todoItem.title}
                                </div>`;
                    }
                    
                });

            });
        }

        // Function to mark a todo item as complete
        function markComplete(todoId){
            // Send a GET request to mark the todo item as complete
            fetch(URL+`completetodo.php?id=${todoId}`)
            .then(response => {
                fetchTodoItems();
            });
        }
    </script>
</body>
</html>
