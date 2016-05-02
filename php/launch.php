<?php

require 'db_connection.php';
require 'db_delete.php';
require 'db_connection.php';
$database = 'uqnews';
$sql = "CREATE DATABASE " .$database;
if ($conn ->query($sql)) {
	echo "Database created successfully. <br>";
} else {
    echo "Database failed to created <br>" . mysqli_error($conn);
}

session_destroy();

require 'db_connection.php';

$sqltbl = "CREATE TABLE user(
            userId int NOT NULL AUTO_INCREMENT,
            username varchar(255) NOT NULL,
            gender varchar(50) NOT NULL,
            password varchar(255) NOT NULL,
            email varchar(255) NOT NULL,
            PRIMARY KEY (userId)
            )";

if($conn->query($sqltbl)){
    echo "tbl user created <br/>";
}else{
    echo "tbl user failed<br/>" . mysqli_error($conn);
}


$sqltbl2 = "CREATE TABLE news(
                newsId int NOT NULL AUTO_INCREMENT,
                userId int NOT NULL,
                newsContent varchar(255) NOT NULL,
                newsLike int NOT NULL,
                newsNotLike int NOT NULL,
                PRIMARY KEY (newsId),
                FOREIGN KEY (userId) REFERENCES user(userId)
            )";

if($conn -> query($sqltbl2)){
    echo "tbl news created <br/>";
}else{
    echo "tbl news failed <br/>";
}
$conn->close();
?>