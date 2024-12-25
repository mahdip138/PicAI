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

$mobile_pattern = "/^(09)\d{9}$/";
$email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
$password_pattern = "/^[a-zA-Z0-9@$%*?&]{6,20}$/";

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "picai_db";

$same_part = false;
$check_mobile = false;
$check_email = false;

if(!empty($mobile)){
    $sql = "SELECT * FROM users WHERE mobile = ?";
    $mobile_or_email = $mobile;
    $same_part = true;
    $check_mobile = true;
    
}
else if(!empty($email)){
    $sql = "SELECT * FROM users WHERE email = ?";
    $mobile_or_email = $email;
    $same_part = true;
    $check_email = true;
}
else{
    header("Location: ../login.php?err=3");
    $stmt->close();
}

if($same_part)
{
    if((preg_match($mobile_pattern, $mobile) && $check_mobile)|| (preg_match($email_pattern, $email) && $check_email))
        if(preg_match($password_pattern, $password))
        {

            $conn = new mysqli($server_name,$db_username,$db_password,$db_name);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                $stmt->close();
            }{

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s",$mobile_or_email);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0){
                    $user = $result->fetch_assoc();
                    if(password_verify($password, $user["password"]))
                    {
                        
                        $mobile_user = $user["mobile"];
                        $_SESSION['mobile'] = $mobile_user;
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
        }
        else{
            header("Location: ../login.php?err=password");
            exit();
        }
    else{
        header("Location: ../login.php?err=email/mobile");
        exit();
    }

}
?>