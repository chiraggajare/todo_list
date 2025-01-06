<?php

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "TODO-LIST";

try{
    $conn = new PDO("mysql:host=$sName; dbname=$db_name",
                    $uName,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected!";
}catch(PDOException $e){
    echo "Connection failed : ". $e->getMessage();
}
?>
