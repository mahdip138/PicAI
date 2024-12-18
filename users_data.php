<?php  
session_start();
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true && $data!=1){
    header("Location: index.php");
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
    $sql = "SELECT * FROM users";
    $all_result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PicAI | Users data</title>
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
  <main class="main">
    
    <!-- Hero Section -->
    <section id="home" class="hero section dark-background">
      <img src="assets/img/hero-bg-2.jpg" alt="" class="hero-bg">

      <div class="container">
        <div class="table-responsive">
        <h1 class="mb-3 fw-normal" style="font-size:25px"><b>Users data</b></h1>
        <table class="table table-striped">
            <thead>
                <th>
                    row
                </th>
                <th>
                    first name
                </th>
                <th>
                    last name
                </th>
                <th>
                    phone number
                </th>
                <th>
                    email
                </th>
                <th>
                    address
                </th>
                <th>
                    is admin
                </th>
            </thead>
            <tbody>
                <?php
                                
                    if ($all_result->num_rows > 0) {
                        $counter = 1;
                        // output data of each row
                        while($row = $all_result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <?=$counter++;?>
                            </td>
                            <td>
                                <?=$row["fname"]?>
                            </td>
                            <td>
                                <?=$row["lname"]?>
                            </td>
                            <td>
                                <?=$row["mobile"]?>
                            </td>
                            <td>
                                <?=$row["email"]?>
                            </td>
                            <td>
                                <?=$row["address"]?>
                            </td>
                            <td>
                                <?=$row["is_admin"]?>
                            </td>
                        </tr>
                        <?php
                        }
                    } 
                ?>
            </tbody>
        </table>
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

    </section><!-- /Hero Section -->
  </main>

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