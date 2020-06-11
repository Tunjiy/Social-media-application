<?php
if(isset($_POST['log_button']))
{
$email=filter_var($_POST['log_email'],FILTER_SANITIZE_EMAIL);//sanitize email
$_SESSION['log_email']=$email; //store email in session variable
$password=md5($_POST['log_password']);//get password

$check_db_query=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password ='$password'");
$check_login_query=mysqli_num_rows($check_db_query);

if($check_login_query ==1)
{
    $row=mysqli_fetch_array($check_db_query);//get all values return by the query
    $username=$row['username'];
    
    $user_closed_query= mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND user_closed='yes'");
    if(mysqli_num_rows($user_closed_query) == 1)
    {
        $reopen_account =mysqli_query($conn, "UPDATE users SET user_closed='no' WHERE email='$email'");
    }

    $_SESSION['username']= $username;
    header("Location: index.php");
    exit();
}else{
    array_push($error_array,"email or password incorrect<br>");
}
}
?>