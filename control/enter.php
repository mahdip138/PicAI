<?php
session_start();
if(!isset($_POST))
{
    header("Location: ../login.php");
    $stmt->close();
}
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$password = $_POST["password"];

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "picai_db";

$conn = new mysqli($server_name,$db_username,$db_password,$db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $stmt->close();
}{

    if(!empty($mobile)){
        $sql = "SELECT * FROM users WHERE mobile = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$mobile);}
    else if(!empty($mobile)){
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$email);
    }
    else{
        header("Location: ../login.php?err=3");
        $stmt->close();
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if($password==$user["password"])
        {
            $_SESSION['mobile'] = $mobile;
            $_SESSION['loggedin'] = true;
            header("Location: ../login.php?err=0");
            $stmt->close();
        }
        else{
            header("Location: ../login.php?err=2");
            $stmt->close();
        }
    }
    else{
        header("Location: ../login.php?err=3");
        $stmt->close();
    }
}
?>