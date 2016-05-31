<?php
require "db_connection.php";

$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = crypt(mysqli_real_escape_string($conn, $_POST["password"]), '$6$rounds=1000$salted$');

if(isset($email) && isset($password)) {
    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
   
	$result = $conn-> query($sql);
    
	if ($result -> num_rows > 0) {
		$row =$result ->fetch_assoc();
        
        if ( (strcmp($row["password"], $password) == 0 ) ) {
			$_SESSION["username"] = $row["username"];
			$_SESSION["userId"] = base64_encode($row["userId"]);
            
            echo "success";
        
        }else{
            echo "incorrect";
        }
	} else {
		echo "unsuccessful";
	}
}

$conn->close();
?>