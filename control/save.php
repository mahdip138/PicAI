<?php
session_start();
if(!isset($_POST))
{
    header("Location: ../register.php");
    exit();
}
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$address = $_POST["address"];
$password = $_POST["password"];
$rpassword = $_POST["rpassword"];

if($password != $rpassword)
{header("Location: ../register.php?err=2");
    exit();
}
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "picai_db";

$conn = new mysqli($server_name,$db_username,$db_password,$db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}{
    $sql = "INSERT INTO users (fname,lname,mobile,email,address,password) VALUES ('$fname', '$lname', '$mobile','$email','$address','$password')";
    if($conn->query($sql))
    {
        $_SESSION['mobile'] = $mobile;
        $_SESSION['loggedin'] = true;
        header("Location: ../register.php?err=0");
        exit();
    }
    else{
        header("Location: ../register.php?err=1");
        exit();
    }
}
?>