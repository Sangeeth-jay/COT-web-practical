<?php
  include("connection.php");

  $uname=$_REQUEST['uname2'];
  $pass=$_REQUEST['password2'];

  $sql="SELECT * FROM user where user='".$uname."' and password='".$pass."';";
  $result=mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)){
    while($row=mysqli_fetch_assoc($result)){
      $uid=$row['id'];
      $username=$row['user'];
      $password=$row['password'];

    }
  }

  if($uname!=" " && $pass!="" && $pass==$password){
    header("location:backend.php");

};
?>