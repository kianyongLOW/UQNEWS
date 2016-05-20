<?php
include "db_connection.php";

$sql = "Select * from `news`";

$result = $conn ->query($sql);
$response = array();
if($rowcnt = $result -> num_rows >0){
    $response["news"] = array();
    while($row = $result -> fetch_assoc()){
        $new = array();
        $new["newsId"] = $row["newsId"];
        $new["userId"] = $row["userId"];
        $new["newsContent"] = $row["newsContent"];
        $new["newsLike"] = $row["newsLike"];
        $new["newsNotLike"] = $row["newsNotLike"];
        
        array_push($response["news"] , $new);
    }
    $response["success"] = 1;
}else{
    $response["success"] = 0;
    $response["message"] = "failed to retrieve";
}
echo json_encode($response);

$conn ->close();
?>