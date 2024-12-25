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

$name_pattern = "/^[\p{L}]{2,50}$/u";
$mobile_pattern = "/^(09)\d{9}$/";
$email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
$address_pattern = "/^[\p{L}\s\d,]{10,120}$/u";
$password_pattern = "/^[a-zA-Z0-9@$%*?&]{6,20}$/";

if(preg_match($name_pattern,$fname))
    if(preg_match($name_pattern,$lname))
        if(preg_match($mobile_pattern,$mobile))
            if(preg_match($email_pattern,$email))
                if(preg_match($address_pattern,$address))
                    if(preg_match($password_pattern,$password))
                    {                    
                        $server_name = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "picai_db";

                        $conn = new mysqli($server_name,$db_username,$db_password,$db_name);
                        
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                            exit();
                        }{
                            $sql = "SELECT id FROM users WHERE mobile ='$mobile'OR email ='$email'";
                            $result = $conn->query($sql);
                            if($result->num_rows <= 0)
                            {
                                $password = password_hash($password, PASSWORD_DEFAULT);
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
                            else{
                                header("Location: ../register.php?err=3");
                                exit();
                            }

                        }
                    }
                    else{
                        header("Location: ../register.php?err=password");
                        exit();
                    }
                else{
                    header("Location: ../register.php?err=address");
                    exit();
                }
            else{
                header("Location: ../register.php?err=email");
                exit();
            }
        else{
            header("Location: ../register.php?err=mobile");
            exit();
        }
    else{
        header("Location: ../register.php?err=1=fname");
        exit();
    }
else{
    header("Location: ../register.php?err=lname");
    exit();
}    
?>