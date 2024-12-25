<?php
$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "picai_db";
$conn = new mysqli($server_name,$db_username,$db_password,$db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}{
    $sql = "SELECT * FROM users WHERE mobile = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$_SESSION["mobile"]);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!--<img src="assets/img/logo.png" alt=""-->
        <h1 class="sitename">Pic AI</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="index.php#home">Home</a></li>
            <li><a href="index.php#about">About</a></li>
            <li><a href="index.php#features">Features</a></li>
            <li><a href="index.php#contact">Contact</a></li>
            <?php
            if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
                ?>
     
                    <li><button type="button" class="btn btn-outline-light"><a href="login.php">Login</a></button></li>
                    <li><button type="button" class="btn btn-outline-light"><a href="register.php">Sign in</a></button></li>
          
                <?php
            }
            else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
            {
                ?>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <!--<img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </a>
                    <ul class="dropdown-menu text-small">
                    <?php
                        $data = $result->fetch_assoc();
                        if($data["is_admin"]==1)
                        {
                            ?>
                            <li><a class="dropdown-item" href="users_data.php">users data</a></li>
                            <?php
                        }
                        ?>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                    </ul>
                </div>
                <?php
            }
            ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
