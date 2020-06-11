<?php
require 'config/config.php';
//insert values into the db
$query= mysqli_query($conn, "INSERT INTO test VALUE('','Tunjiy')");
//if user is logedin,move to index page else go back to register page
if(isset($_SESSION['username']))
{
    $userLogedin=$_SESSION['username'];
    //code to get all info of the username to help return the firstname in the navbar
    $user_details_query=mysqli_query($conn,"SELECT * FROM users WHERE username='$userLogedin'");
    $user=mysqli_fetch_array($user_details_query);
}
else{
    header("Location:register.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>my social media</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
    <script src="assets/js/jquery/jquery-3.5.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top_bar">
    <div class="logo">
        <a href="index.php">Tee's sm</a>
    </div>
    <nav>
        <a href="#"><?php echo $user['firstname'];//return user firstname in the navbar?></a>
        <a href="#">Home</a>
        <a href="#"><span class="glyphicon glyphicon-envelope"></span></a>
        <a href="#">Notification</a>
        <a href="#">Users</a>
        <a href="#">Settings</span></a>
    </nav>
</div>
<div class="wrapper">
