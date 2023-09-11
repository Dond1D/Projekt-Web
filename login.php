<?php 

// session_start();

require 'include/db_connect.php';
if(!empty($_SESSION["user_id"])){
  header("Location:/");
}
if(isset($_POST["submit"])){
  // $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE  email = '$email'");
  $row = mysqli_fetch_assoc($result);
  $message = '';
  if(mysqli_num_rows($result) > 0){
   
   $_SESSION['user_id'] = $row['id'];
   
   //check per checkboxin
    if(!empty($_POST['remember'])){
      $remember = $_POST['remember'];

      //krijo cookies per checkbox remeber me
      setcookie('email',$email,time()+24*3600);
      setcookie('password',$password,time()+24*3600);
     
    }
    else{
      setcookie('email',$email,30);
      setcookie('password',$password,30);
    }

  
  if($password == $row['password']){
    $user_type = $row['user_type']; 
     if($user_type == 'admin'){
        header("Location: dashboard.php");
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        
     }  
     else {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("Location: AboutUs.php");
     }
     
    }
    else{
      
     $message = 'Sorry,credentials do not match' ;
    }
  }
  else{
    echo
    $message = 'User Not Registered' ;
  }
}


?>





<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>LogIn</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body style="background-image: url(back.jpg);">


    <div class="box">

        
    <img src="logo.png">
        <div class="page">
            <div class="header">
                <a id="login" class="active" >login</a>
                <a href="signup.php">SignUp</a>
                
            </div>
            <div id="errorMsg"></div>
            <div class="content">
                <form class="login"  action=""  onsubmit="return validateLoginForm()" method="post">
                    <input type="email" name="email" style="width:350px"  id="logName" placeholder="Email"  value="<?php 
                    if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}; ?>">
                    <!-- -->
                    <input type="password" style="width:350px" name="password" id="logPassword" placeholder="Password"  value="<?php 
                    if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}; ?>">
                    <div id="check">
                        <input type="checkbox" name="remember" id="remember" >
                        <label for="remember">Remember me</label>
                    </div>
                    <br><br>        
                    <input type="submit" name="submit" value="Login" style="width:350px">
                  
                    <?php if(!empty($message)): ?>
              <p style="color:white;"><?php echo $message ?></p>
    <?php endif; ?>
                </form>
                
            </div>
        </div>
    </div>
    <script src="skripta.js"></script>
</body>