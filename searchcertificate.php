

<?php
include("connection.php");
$cid = $_REQUEST['NIC'];

$sqli = "select * from student where NIC='" . $cid . "';";
$resulti = mysqli_query($conn, $sqli);
$rown=0;
if (mysqli_num_rows($resulti) > 0) {
    while ($row = mysqli_fetch_assoc($resulti)) {
        $Name = $row['Name'];
        $NIC = $row['NIC'];
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
        
            <style>
                .container{
                    display: flex;
                    flex-direction: row;
                    margin: 20px;
                }
                .details{
                    margin-right: 20px;
                }
            </style>
        
        </head>
        <body>
            <center><h1>All Certificates Recieved</h1></center>
            
            <div class="container">
                <div class="details">
                    <label for="">Student Name :</label><br>
                    <label for="">NIC No :</label>
                </div>
                <div class="data">
                    <label for="">' . $Name . '</label><br>
                    <label for="">' . $NIC . '</label>
                </div>
            </div>
        
            <table border="1" width="100%">
        
                <tr>
                    <th width="5%">SN</th>
                    
                    <th width="40%">Certificate</th>
                    <th width="10%">type</th>
                    <th width="15%">Serial</th>
                    
                    <th width="15%">Date Recieved</th>
                    <th>Status</th>
                    
                    
                
                </tr>';
    }
}




// $sql = "select  st.cid, st.cerNo, st.recDate, st.Status from st_certi st, student s where st.NIC=s.NIC and st.NIC='" . $cid . "';";
$sql="select * from st_certi join certificatr on certificatr.cid=st_certi.cid where st_certi.NIC='".$cid."';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $serno = $row['cerNo'];
        // $NIC = $row['NIC'];
        $CID = $row['cid'];
        $cname=$row['certificateName'];
        $rDate = $row['recDate'];
        $status = $row['Status'];
        $type=$row['type'];
        // $Name = $row['Name'];

        $rown++;




        echo '
        <table border="1" width="100%">
        <tr>
        <td width="5%">'.$rown.'</td>
        <td width="40%">' . $cname. '</td>
        <td width="10%">'.$type.'</td>
        <td width="15%">' . $serno . '</td>
        
        
        <td width="15%">' . $rDate . '</td>
        <td>' . $status . '</td>
        
        </tr>

</table>    


    
</body>';
    }
} else {
    echo '0 Result!';
}

?>