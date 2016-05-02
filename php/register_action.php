<?php
require 'db_connection.php';


$response = array();
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = crypt(mysqli_real_escape_string($conn, $_POST["password"]), '$6$rounds=1000$salted$');
$passwordRepeat = crypt(mysqli_real_escape_string($conn, $_POST["passwordRepeat"]), '$6$rounds=1000$salted$');
$location = mysqli_real_escape_string($conn, $_POST["gender"]);

$getEmailExistSql = "SELECT * FROM `user` WHERE `username`='$username'";
$result = $conn-> query($getEmailExistSql);


if ($result -> num_rows == 0) {
	if(isset($email) && (strcmp($password, $passwordRepeat) == 0)) {
        $sql = "INSERT INTO `user`(`username`,`gender`, `password`,`email`) VALUES ('$username','$gender', '$password', '$email')";
       
        if($conn ->query($sql)){
            $response["success"]= 1;
            $response["message"] = "registered";
            echo json_encode($response);
        }else{
            $response["success"]= 0;
            $response["message"] = "failed_register";
            echo json_encode($response);
        }
		
	} else {
		$response["success"]= 1;
        $response["message"] = "password_not_match";
        echo json_encode($response);
	}
} else {
    $response["success"]= 1;
    $response["message"] = "email_used";
    echo json_encode($response);
}

$conn->close();
?>