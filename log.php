<?php

if($_SERVER["REQUEST_METHOD"]=== "POST")
{
  $mysqli=require_DIR_ ."database.php";
  $sql=sprintf("SELECT * FROM registration1 where email='%s'",$mysqli->real_escape_string($_POST["email"]));
  $result=$mysqli->query($sql);
  $user =$result->fetch_assoc();
  if($user)
  {
    die("Login sucessfully");
  }
  exit;
}

 ?>
