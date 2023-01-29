<?php
require '../php/config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
  }
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $number = $_POST["number"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password){
      $query = "INSERT INTO tbl_user VALUES('', '$username', '$number','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="../css/stylecss.css">
    <!-- Font 'Press Start 2P' -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <!-- Font End 'Press Start 2P' -->
    <!-- VT323 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">
    <!-- VT323 -->
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="rgb">
            <div class="in_container" >
                    <div class="from_register">
                        <h2>R e g i s t e r</h2>
                        <form action="" method="POST">
                            <div class="input_box_register_username">
                                <span>Username</span>
                                <input type="text" name="username" id = "username" required="required">
                            </div>
                            <div class="input_box_register_hp">
                                <span>Hp Number</span>
                                <input type="number" name="number" id = "number" required="required">
                            </div>
                            <div class="input_box_register">        
                                <span>Email</span>
                                <input type="email" name="email" id = "email" required="required">
                            </div>
                            <div class="input_box_register_password">
                                <span>Password</span>
                                <input type="password" name="password" id = "password" required="required">
                            </div>
                            <div class="register_mid_register">
                                <input type="submit" name="submit" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="create_account">
    <p>Already have an account?<a href="login.php"> Sign in</a>
    </div>
</body>
</html>