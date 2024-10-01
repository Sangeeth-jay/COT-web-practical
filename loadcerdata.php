<table border="1" width="100%">
<tr>
<th width="15%">NIC</th>
<th>Student Name</th>
<th>Serial No</th>
<th width="18%">Recieved Date</th>
<th>Action</th>
</tr>
<?php
require_once("connection.php");
$cid=$_REQUEST['cir'];

$sql = "select * from st_certi join certificate on certificate.cid=st_certi.cid where certificate.cid=" . $cid . " ;";
$sqli="select student.Name from student join st_certi on student.NIC=st_certi.NIC where st_certi.cid=".$cid.";";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    while($row=mysqli_fetch_assoc($result)){
        $NIC=$row['NIC'];
        // $name=$row['Name'];
        $sno=$row['cerNo'];
        $rdate=$row['recDate'];
        $sts=$row['Status'];

                // $resulti=mysqli_query($conn,$sqli);
        // if(mysqli_num_rows($resulti)>0){
        //     while($row=mysqli_fetch_assoc($resulti)){
        //         $name=$row['Name'];

        //         echo'<td>'.$name.'</td>';
        //     }
        // }

   echo'
        <td width="15%">'.$NIC.'</td>
        '; 
        
                    $resulti=mysqli_query($conn,$sqli);
        if(mysqli_num_rows($resulti)>0){
            while($row=mysqli_fetch_assoc($resulti)){
                $name=$row['Name'];

                echo'<td>'.$name.'</td>';
            }
        }   
        
        
        
        echo'


        

        
        <td>'.$sno.'</td>
        <td width="18%">'.$rdate.'</td>
        <td>';
        
        if($sts=="Not Issued"){
            echo'<a href="update.php?NIC='.$NIC.'&cir='.$cid.'">Not Issued</>';
        }
        else{echo'Issued';}

        
        echo'</td></tr>';


    }} else {
    echo "0 Result";
}
?>
</table>
