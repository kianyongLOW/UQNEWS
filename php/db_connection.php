<?php
session_start();
require_once 'db_config.php';
         $conn = new mysqli(DB_HOST,DB_USER,DB_PW);
        
        if($conn->connect_error){
            echo "Failed to connect to server";
        }

            $conn -> select_db(DB_DB);
?>