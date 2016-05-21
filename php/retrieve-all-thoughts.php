<?php
include "db_connection.php";

$sql = "Select * from `news` n inner join `user` u where n.userId = u.userId";

$result = $conn ->query($sql);
$response = array();
if($rowcnt = $result -> num_rows >0){
    $response["student"] = array();
    while($row = $result -> fetch_assoc()){
        $new = array();
        $new["name"] = $row["username"];
        $new["MSG"] = $row["newsContent"];
        //$new["newsLike"] = $row["newsLike"];
        //$new["newsNotLike"] = $row["newsNotLike"];
        
        array_push($response["student"] , $new);
    }
  //  $response["success"] = 1;
}else{
    $response["success"] = 0;
    $response["message"] = "failed to retrieve";
}
echo json_encode($response);

$conn ->close();
?>