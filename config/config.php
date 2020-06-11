<?php
ob_start();//turns on output buffering
session_start();
$timezone= date_default_timezone_set("Africa/Lagos");
$conn= mysqli_connect("localhost", "root", "","social");
//check if error exist during connection
if(mysqli_connect_errno())
{
    echo "failed to connect".mysqli_connect_errno();
}
?>