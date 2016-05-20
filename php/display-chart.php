<?php
include "db_connection.php";

$sql = "Select * from `user`";
$response = array();
$result = $conn -> query($sql);
$response["series"] = array();
if($rowcnt = $result -> num_rows >0){
	$rowcnt = $result->num_rows;
	array_push($response["series"], $rowcnt, $rowcnt);
}

echo json_encode($response);

$conn ->close();
?>