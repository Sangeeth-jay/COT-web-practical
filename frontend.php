<?php
require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend</title>
    <style>
        .container{
            display: flex;
            justify-content: center;
            margin-top: 2em;
        }
        td{
            text-align: center;
        }

        body{
            background-color: #DDFAF5;
        }
        #Search{
            width: 100px;
            height: 30px;
            background-color: #FFB848;
            border: #FFB848;
            border-radius: 8px;
            
            color: #fff;
        }
        #NIC{
            font-size: 15px;
            border-radius: 5px;
            border: 1px solid #E3E3E3;
            height: 20px;
            background-color: #fff;
        }
        label{
            font-size: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="main-box">
            <label for="">Enter Your NIC:</label>
            <input type="text" name="nic" id="NIC">
            <input type="submit" value="Search" id="Search" onclick="mysFunction()"><br>
        </div>
    </div>
    <div class="result" id="result"></div>

    <script>
        function mysFunction(){
            var id =document.getElementById('NIC').value;
            const xhttp=new XMLHttpRequest();
            xhttp.onload=function(){
                document.getElementById("result").innerHTML=this.responseText;
            }
            xhttp.open("GET","searchcertificate.php?NIC="+id);
            xhttp.send();
        }
    </script>

</body>

</html>