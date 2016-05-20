<?php
include "db_connection.php";

$sql = "Select * from `news`";

$result = $conn ->query($sql);

if($rowcnt = $result -> num_rows >0){
    while($row = $result -> fetch_assoc()){
        
    }
}

?>