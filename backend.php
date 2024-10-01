<?php
require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend</title>

    <style>
        #btnu{ 
            text-decoration: none;
            color: #fff;
        }
        #btn{
            background-color: #ED1C24;
            text-align: center;
            border: 2px solid #FF7200;
            
        }
        td{
            text-align: center;
        }
        body{
            background-color: #DDFAF5;
        }
        #add{
            width: 100px;
            height: 30px;
            background-color: #FFB848;
            border: #FFB848;
            border-radius: 8px;
            
            color: #fff;
        }
        #Search{
            width: 100px;
            height: 30px;
            background-color: #FFB848;
            border: #FFB848;
            border-radius: 8px;
            
            color: #fff;
        }

    </style>
</head>


<body>
    <center>
        <h1>Student Details</h1>
    </center>
    <div class="container">
        <div class="insert" id="insert">
            <table  width="100%">
                <tr>
                    <th width="20%"></th>
                    <th>
                        <?php
                        $sql = "SELECT * FROM certificatr;";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                        ?>
                        <center><h3><u>Add Student Certificate</u></h3></center>
                            <form action="insert.php" method="get" name="ins">
                                <label for=""> Course Name:</label>
                                <select name="courseName" id="cir" width="10" onchange="myFunction()">
                                    <?php while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row["cid"] . '">' . $row["certificateName"] . '</option>';
                                    }
                                    ?>
                                </select>
                                <!-- <br><br>
                                <label for="">Certificate Type</label>
                                <input type="text" name="ctype" id="ctype"> -->
                                <br><br>
                                <label for="">Student NIC :</label>
                                <input type="text" name="snic" id="snic">
                                <br><br>
                                <label for="">Student Name :</label>
                                <input type="text" name="sname" id="sname">
                                <br><br>
                                <label for="">Recieved Date :</label>
                                <input type="text" name="rdate" id="rdate">
                                <br><br>
                                <label for="">Serial Number :</label>
                                <input type="text" name="snum" id="snum">
                                <br><br>
                                <input type="submit" value="Add" id="add" name="add" >
                                <br><br>

                            </form>

                            <input type="submit" value="Last Added" id="add" onclick="myDfunction()">
                        <?php
                        } else {
                            echo "0 Result";
                        }
                        ?>
                    </th>
                    <th width="20%"></th>
                <tr>
                    <!-- <form action="issue.php" method="get"> -->
                    <td></td>
                    <td><center><h4><u> Search Student by NIC</u></h4></center>
                    <center><input type="text" name="NIC" id="NIC"> 
                    <input type="submit" value="Search" id="Search"></center><br><br>
                    </td>
                    <td></td>
                    <!-- </form> -->
                </tr>

                

            </table>
        </div>
        <div class="result" id="result">

        </div>
    </div>

    <script>
        function myFunction() {

            var id = document.getElementById('cir').value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("result").innerHTML = this.responseText;
            }
            xhttp.open("GET", "loadcerdata.php?cir=" + id);
            xhttp.send();
        }
        function mysFunction(){
            var id =document.getElementById('NIC').value;
            const xhttp=new XMLHttpRequest();
            xhttp.onload=function(){
                document.getElementById("result").innerHTML=this.responseText;
            }
            xhttp.open("GET","issue.php?NIC="+id);
            xhttp.send();
        }

        function myDfunction(){
            var id =document.getElementById('NIC').value;
            const xhttp=new XMLHttpRequest();
            xhttp.onload=function(){
                document.getElementById("result").innerHTML=this.responseText;
            }
            xhttp.open("GET","lastadd.php?NIC="+id);
            xhttp.send();
        }
    </script>


</body>

</html>