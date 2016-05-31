<?php
require "db_connection.php";

$newsId = mysqli_real_escape_string($conn, base64_decode($_POST['q']));

$sqlNews = "SELECT * from `news` where newsId = $newsId";
$resultNews = $conn -> query($sqlNews);
$uid = base64_decode($_SESSION["userId"]);
if($rowcntNews = $resultNews -> num_rows > 0){
    $row = $resultNews -> fetch_assoc();
    $like = $row['newsLike'];
    $dislike = $row['newsNotLike']+1;
    $sqlLike = "INSERT INTO `usernews`(newsId, userId, newsLike, newsNotLike)VALUES($newsId, $uid, $like, $dislike)";
    $sqlUpdate = "UPDATE `news` SET newsId = $newsId, newsLike = $like, newsNotLike = $dislike Where newsId = $newsId";
    if($resultLike = $conn -> query($sqlLike)){
        if($resultUpdate = $conn -> query($sqlUpdate)){
            echo $dislike;
        }else{
            echo "failed";
        }
    }else{
        echo "failed";
    }
    
}else{
    echo "failed";
}

$conn ->close();
?>