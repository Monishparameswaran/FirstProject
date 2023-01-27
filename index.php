<?php
error_reporting(0);
$email = $_POST['email'];
$uname  = $_POST['uname'];
$upass = $_POST['upass'];




if (!empty($email) || !empty($uname) || !empty($upass))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "monishhost";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From register1 Where email = ? Limit 1";
  $INSERT = "INSERT Into register1(email , name ,password)values(?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss",$email,$uname,$upass);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
