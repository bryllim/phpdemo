<?php

include "connect.php";

$sql = "SELECT * FROM todos ORDER BY id DESC";

$results = $conn->query($sql);

if($results->num_rows > 0){

    $todos = array();

    while($row = $results->fetch_assoc()){
        $todo = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'status' => $row['status'],
        );
        $todos[] = $todo;
    }

    $json = json_encode($todos);
    header('Content-Type: application/json');
    echo $json;

}else{
    echo "No todos found.";
}

?>