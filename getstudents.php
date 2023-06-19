<?php

include "connect.php";

$sql = "SELECT * FROM students";

$results = $conn->query($sql);

if($results->num_rows > 0){

    $students = array();

    while($row = $results->fetch_assoc()){
        $student = array(
            'id' => $row['id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'grade' => $row['grade']
        );
        $students[] = $student;
    }

    $json = json_encode($students);
    header('Content-Type: application/json');
    echo $json;

}else{
    echo "No students found.";
}

?>