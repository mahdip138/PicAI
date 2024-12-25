<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PicAI | Sign in</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/register.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
  <?php
    require_once "header.php";
  ?>   
    <section class="hero section dark-background">
      <img src="assets/img/hero-bg-2.jpg" alt="" class="hero-bg">

      <div class="container">
        <div class=" form-signin w-100 m-auto ">
            <form action="control/save.php" method="post">
                <h1 class="mb-3 fw-normal" style="font-size:25px"><b>Sign in</b></h1>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control form-control-lg" name="fname" id="fname" placeholder="first name" required oninvalid="setCustomValidity('The first name should be between 2-50 and can include alphabets')" oninput="setCustomValidity('')">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control form-control-lg" name="lname" id="lname" placeholder="last name" required oninvalid="setCustomValidity('The last name should be between 2-50 and can include alphabets')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <input type="tel" class="form-control form-control-lg" name="mobile" id="mobile" placeholder="phone number" maxlength="11" required oninvalid="setCustomValidity('The mobile phone should be like 09*********')" oninput="setCustomValidity('')">
                    </div>
                    <div class="col">
                        <input type="emil" class="form-control form-control-lg" name="email" id="email" placeholder="email " required oninvalid="setCustomValidity('The email address is invalid')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <textarea class="form-control" name="address" id="address" rows="3" placeholder="address" required oninvalid="setCustomValidity('The address should be between 10-120 and can include characters and comma')" oninput="setCustomValidity('')"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="password" required oninvalid="setCustomValidity('The password should be between 6-20 and can include a-z A-Z 0-9 @ $ % * ? &')" oninput="setCustomValidity('')">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control form-control-lg" name="rpassword" id="rpassword" placeholder=" repeat password " required oninvalid="setCustomValidity('The password should be between 6-20 and can include a-z A-Z 0-9 @ $ % * ? &')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mt-5 text-center">
                    <div class="col-lg my-2 my-lg-0">
                        <input class="btn btn-success w-25" type="submit" class="form-control form-control-lg">
                    </div>
                    <div class="col-lg my-2 my-lg-0">
                        <input class="btn btn-success w-25" type="reset" class="form-control form-control-lg">
                    </div>
                </div>  
            </form>
                <?php
                if(isset($_GET["err"]))
                    if($_GET["err"]==0)
                    {
                        ?>
                        <div class="alert alert-success mt-5" role="alert">
                        You signed in successfully
                        </div>
                    <?php
                    }
                    else
                    {
                    ?>
                        <div class="alert alert-danger mt-5" role="alert">
                    <?php
                        if($_GET["err"]==1)
                        {
                            print("There is an error in your registration");
                        }
                        else if($_GET["err"]==2)
                        {
                            print("The repeated password is'nt correct");
                        }
                        else if($_GET["err"]==3)
                        {
                            print("A user has already registered with this email or phone number");
                        }
                        else if($_GET["err"]=="password")
                        {
                            print("The password should be between 6-20 and can include a-z A-Z 0-9 @ $ % * ? &");
                        }
                        else if($_GET["err"]=="address")
                        {
                            print("The address should be between 10-120 and can include characters and comma");
                        }
                        else if($_GET["err"]=="email")
                        {
                            print("The email address is invalid");
                        }
                        else if($_GET["err"]=="mobile")
                        {
                            print("The mobile phone should be like 09*********");
                        }
                        else if($_GET["err"]=="fname")
                        {
                            print("The first name should be between 2-50 and can include alphabets");
                        }
                        else if($_GET["err"]=="lname")
                        {
                            print("The last name should be between 2-50 and can include alphabets");
                        }
                        ?>
                        </div>
                        <?php
                    }    
                ?>
                    
        </div>
      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>

    </section>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>