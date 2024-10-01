<?php
require_once("connection.php");

$courseName=$_REQUEST['courseName'];
$snic=$_REQUEST['snic'];
$sname=$_REQUEST['sname'];
$rdate=$_REQUEST['rdate'];
$snum=$_REQUEST['snum'];
// $type=$_REQUEST['ctype'];

$sql="INSERT ignore INTO `student`(`NIC`,`Name`) VALUES ('".$snic."','".$sname."')";
$result=mysqli_query($conn,$sql);
$sql="INSERT ignore INTO `st_certi` VALUES ('".$snic."','".$courseName."','".$snum."','".$rdate."','Received')";
$result=mysqli_query($conn,$sql);



if($result){
    header("location:backend.php");
}


?>