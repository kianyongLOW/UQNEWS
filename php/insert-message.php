<?php
include "db_connection.php";
$message = mysqli_real_escape_string($conn, $_POST['MSG']);

$sql = "INSERT INTO `news`(`newsId`, `userId`,`newsContent`, `newsLike` , `newsNotLike`)VALUES('', $_SESSION['uid'], '$message', 0,0)";
$response = array();
if($result = $conn ->query($sql)){
    $response["success"] = 1;
}else{
    $response["success"] = 0;
}

echo json_encode($response);

$conn -> close();
?>