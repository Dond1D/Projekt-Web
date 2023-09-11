<?php  

session_start();
require 'include/db_connect.php';

if(!empty($_SESSION["id"])){
    header("Location: /");
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $user_type = $_POST['user_type'];
    $message = '';

    
     if($confirmpassword == $password){
        $query = $conn->prepare("INSERT INTO user VALUES('',?,?,?,?)");
        $query->bind_param('ssss', $name, $email, $password, $user_type);
        
        if($query->execute() === false){
            die("Error i queryt: " . $query->error);
        }
        if($user_type == 'admin'){
            header("Location: dashboard.php");
        } else {
            header("Location: AboutUs.php");
        }
        exit();
    }
    else{
        $message = 'Confirm password and password do not match';
    }
}



?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body style="background-image: url(mo.jpg);">
    <div class="box">

        <img src="Logo.png">
        <div class="page">
            <div class="header">
                <a id="signup" class="active">Signup</a>
                <a href="login.php" >Login</a>
            </div><?php if(!empty($message)): ?>
            <div id="errorMsg"><?php echo $message ?></div> <?php endif; ?>
                </form>
                <form class="signup" action="signup.php" name="signupForm" onsubmit="return validateSignupForm()" method="post">
                     <input type="text" name="name" style="width:350px" id="signName" placeholder="Name">
                     <input type="email" name="email" style="width:350px" id="signEmail" placeholder="Email">
                    <input type="password" name="password" style="width:350px" id="signPassword" placeholder="Password">
                    <input type="password" name="confirmpassword" style="width:350px" id="confirmPassword" placeholder="Confirm Password">
                    
<!-- <select name="user_type" id="user_type" style="padding:10px;" required >
  <option value="user">User</option>
  <option value="admin">Admin</option>
  
</select><br> -->

        
                    <input type="submit" name="submit" style="width:350px" value="SignUp">
                </form>
            </div>
        </div>
    </div>
    <script src="skripta.js"></script>
</body>
</html>