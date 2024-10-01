<?php 
require_once("connection.php");

    $nic=$_REQUEST['NIC'];
    $CID=$_REQUEST['cir'];

    $sql="DELETE FROM st_certi WHERE NIC = '".$nic."' AND cid = '".$CID."' ;";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location:backend.php");
    }


?>