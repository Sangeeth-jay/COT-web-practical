<?php

$servername="localhost";
$username="root";
$password="";
$dbname="cerificate";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->error){
    die("Connection Faild:".$conn->connect_error);

}



?>