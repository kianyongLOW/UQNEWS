<?php
session_start();
include "db_connection.php";
$data = json_decode(file_get_contents("php://input"));
$message = $data->MSG;
//$message = mysqli_real_escape_string($conn, $_POST['MSG']);
$uid = $_SESSION["userId"];
$sql = "INSERT INTO `news`(`userId`,`newsContent`, `newsLike` , `newsNotLike`)VALUES($uid, '$message', 0,0)";
$response = array();
if($result = $conn ->query($sql)){
    $response["success"] = 1;
}else{
    $response["success"] = 0;
}

echo json_encode($response);

$conn -> close();
?>