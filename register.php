<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/register_style.css" />
    <script src="assets/js/jquery/jquery-3.5.0.min.js"></script>
    <script src="assets/js/register.js"></script>
</head> 
<body>
<?php
//allow error msgs to be displayed instantly on the right page
if(isset($_POST['reg_button']))
{
    echo'<script>
    $(document).ready(function()
    {
    $("#first").hide();
    $("#second").show();
   });
    </script>';
}
?>

<div class="wrapper">
    <div class="login_box">
    <div class="login_header">
    <h2>Tee's SM</h2>
    login or sign up below!
    </div>
        <div id="first">
        <!--login form-->
        <form action="register.php" method="POST">
            <input type="email" name="log_email" placeholder="email address"
            value="<?php
            if(isset($_SESSION['log_email']))
            {
            echo$_SESSION['log_email'];
            }
            ?>" required>
            <br>
            <input type="password" name="log_password" placeholder="password"><br>
            <input type="submit" name="log_button" value="login"><br>
            <?php if(in_array("email or password incorrect<br>",$error_array)) echo"email or password incorrect<br>";?>
            <br>
            <a href="#" id="signup" class="signup">Need an account? Register here</a>
            </form>
        </div>
        <div id="second">
            <!--registration form-->
            <form action="register.php" method="POST">
            <input type="text" name="reg_fname" placeholder="firstname" value="<?php
            if(isset($_SESSION['reg_fname']))
            {
            echo$_SESSION['reg_fname'];
            }
            ?>" required>
            <br/>
            <?php if (in_array("Your first name must be between 2 and 5 characters <br/>",$error_array)) echo"Your first name must be between 2 and 5 characters <br/>";?>
            <input type="text" name="reg_lname" placeholder="lastname" value="<?php 
            if(isset($_SESSION['reg_lname']))
            {
            echo$_SESSION['reg_lname'];
            }
            ?>" required>
            <br/>
            <?php if(in_array("Your last name must be between 2 and 5 characters <br/>",$error_array)) echo"Your last name must be between 2 and 5 characters <br/>";?>

            <input type="email" name="reg_email" placeholder="email" value="<?php 
            if(isset($_SESSION['reg_email']))
            {
            echo$_SESSION['reg_email'];
            }
            ?>" required>
            <br/>
            <input type="email" name="reg_email2" placeholder="confirm email" value="<?php 
            if(isset($_SESSION['reg_email2']))
            {
            echo$_SESSION['reg_email2'];
            }
            ?>" required>
            <br/>
            <?php if(in_array("email already exist<br/>",$error_array)) echo "email already exist <br/>";
            elseif(in_array("invalid format <br/>",$error_array)) echo "invalid format <br/>";
            elseif(in_array("emails don't match <br/>",$error_array)) echo "emails don't match <br/>";?>

            <input type="password" name="reg_password" placeholder="password" required>
            <br/>
            <input type="password" name="reg_password2" placeholder="confirm password" required>
            <br/>
            <?php if(in_array("Your password do not match <br/>",$error_array)) echo "Your password do not match <br/>";
            elseif(in_array("Your password can only contain english characters and numbers <br/>",$error_array)) echo "Your password can only contain english characters and numbers <br/>";
            elseif(in_array("Your password must be between 5 and 30 characters <br/>",$error_array)) echo "Your password must be between 5 and 30 characters <br/>";?>

            <input type="submit" name="reg_button" value="register">
            <br/>
            <?php if(in_array("<span style='color: green;'>You are all set, you can now login</span><br>",$error_array)) echo "<span style='color: green;'>You are all set, you can now login</span><br>";?>
            <a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>
            </form>
        </div>
            
    </div>      
</div>     
</body>
</html> 