<?php

//credentials
$host = "localhost";
$user = "root";
$password = "";
$db = "person";
    
//connection    
$conn = new mysqli($host, $user, $password, $db);

//if connectio failed
if($conn->error){
    die("could not connect to the database");
} else{
    echo "you are conected";
}

?>
