<?php

include "connect.php";

$sql = "SELECT * FROM posts JOIN users ON users.id = posts.user_id ORDER BY posts.id DESC";

$results = $conn->query($sql);

if($results->num_rows > 0){

    $posts = array();

    while($row = $results->fetch_assoc()){
        $todo = array(
            'id' => $row['id'],
            'content' => $row['content'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
        );
        $posts[] = $todo;
    }

    $json = json_encode($posts);
    header('Content-Type: application/json');
    echo $json;

}else{
    echo "No posts found.";
}

?>