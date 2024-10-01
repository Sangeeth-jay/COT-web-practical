<table border="1" width="100%">
<tr>

<th>Student Name</th>
<th width="15%">NIC</th>
<th>courseName</th>
<th>Serial No</th>
<th width="18%">Recieved Date</th>
<th>Status</th>
</tr>
<?php
require_once("connection.php");



$sql = "select * from st_certi join certificate on certificate.cid=st_certi.cid ORDER BY recDate DESC LIMIT 1;";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    while($row=mysqli_fetch_assoc($result)){
        $NIC=$row['NIC'];
        $cid=$row['cid'];
        $sqli="select student.Name from student join st_certi on student.NIC=st_certi.NIC where st_certi.NIC='".$NIC."';";

        $cName=$row['certificateName'];
        $sno=$row['cerNo'];
        $rdate=$row['recDate'];
        $sts=$row['Status'];
        

        $resulti=mysqli_query($conn,$sqli);
        if(mysqli_num_rows($resulti)>0){
            while($row=mysqli_fetch_assoc($resulti)){
                $name=$row['Name'];

                echo'<td>'.$name.'</td>';
            }
        }

   echo'
        <td width="15%">'.$NIC.'</td>


        

        <td>'.$cName.'</td>
        <td>'.$sno.'</td>
        <td width="18%">'.$rdate.'</td>
        <td id="btn">';
        
        if($sts=="Received"){
            echo'<a href="delete.php?NIC='.$NIC.'&cir='.$cid.'" id="btnu">Delete</>';
        }
        else{echo'Issued';}

        
        echo'</td></tr>';


    }} else {
    echo "0 Result";
}
?>
</table>
