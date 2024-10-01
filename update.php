<?php 
require_once("connection.php");

    $nic=$_REQUEST['NIC'];
    $CID=$_REQUEST['cir'];
    $sql="update st_certi set Status='Issued' where NIC='".$nic."' and cid='".$CID."';";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location:backend.php");
    }


?>