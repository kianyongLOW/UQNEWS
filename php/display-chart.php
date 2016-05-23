<?php
include "db_connection.php";

$sql = "SELECT gender, COUNT(userId) AS count FROM user GROUP BY gender;";
$response = array();
$result = $conn -> query($sql);
$response["series"] = array();
$male = 0;
$female = 0;
if($rowcnt = $result -> num_rows >0){
	while($row = $result -> fetch_assoc()){
        if($row["gender"] == "m"){
            $male = $row["count"];
        }else{
            $female = $row["count"];
        }
    }
    array_push($response["series"], $male, $female);
}

echo json_encode($response);

$conn ->close();
?>