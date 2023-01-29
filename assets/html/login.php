<?php
require '../php/config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
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
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="rgb">
            <div class="in_container" >
                    <div class="from_login">
                        <h2>W e l c o m e</h2>
                        <form action="" method="POST">   
                            <div class="input_box">
                                <label for="usernameemail"><span>Username</span></label>
                                <input type="text" name="usernameemail" id = "usernameemail" required="required">
                                <i></i>
                            </div>
                            <div class="input_box">
                                <span>Password</span>
                                <input type="password" name="password" id = "password" required="required">
                            </div>
                            <div class="login_mid">
                                <input type="submit" name="submit" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
             </div>           
        </div>
    </div>
    <div class="login_account">
        <p>No registered yet?<a href="register.php">   Create an Account</a>
    </div></a></p>
   
</body>
</html>
