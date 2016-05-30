<?php
require "db_connection.php";

$newsId = mysqli_real_escape_string($conn, base64_decode($_GET['q']));

$sqlNews = "SELECT * from `news` where newsId = $newsId";
$resultNews = $conn -> query($sqlNews);
$uid = $_SESSION["userId"];
if($rowcntNews = $resultNews -> num_rows > 0){
    $row = $resultNews -> fetch_assoc();
    $like = $row['newsLike'] +1;
    $dislike = $row['newsNotLike'];
    $sqlLike = "INSERT INTO `usernews`(newsId, userId, newsLike, newsNotLike)VALUES($newsId, $uid, $like, $dislike)";
    $sqlUpdate = "UPDATE `news` SET newsId = $newsId, newsLike = $like, newsNotLike = $dislike Where newsId = $newsId";
    if($resultLike = $conn -> query($sqlLike)){
        if($resultUpdate = $conn -> query($sqlUpdate)){
            echo $like;
        }else{
            echo "notsure1";
        }
    }else{
        echo "failed";
    }
    
}else{
    echo "notsure";
}

$conn ->close();

?>