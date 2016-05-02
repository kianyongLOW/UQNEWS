<?php
require 'db_connection.php';

$sql = "DROP DATABASE ".DB_DB."";
if ($conn ->query($sql)) {
	echo "Database " . DB_DB . " dropped successfully. <br>";
} else {
	echo "Error dropping database: " . mysqli_error($conn). "<br>";
}

$conn ->close();
?>