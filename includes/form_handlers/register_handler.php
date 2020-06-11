<?php
//var declaration
$fname="";
$lname="";
$em="";
$em2="";
$password="";
$password2="";
$date=""; //sign up date
$error_array=array();//holds error message

if(isset($_POST['reg_button']))
{
    //registration form value

    //firstname
    $fname=strip_tags($_POST['reg_fname']);//strip tags remove the html tags if any
    $fname=str_replace(" ","",$fname);//remove blank space
    $fname=ucfirst(strtolower($fname));//convert first case to upper
    $_SESSION['reg_fname']= $fname; //store firstname into session var 

    //lastname
    $lname=strip_tags($_POST['reg_lname']);//strip tags remove the html tags if any
    $lname=str_replace(" ","",$lname);//remove blank space
    $lname=ucfirst(strtolower($lname));//convert first case to 
    $_SESSION['reg_lname']= $lname; //store lastname into session var 
    
    //email
    $em=strip_tags($_POST['reg_email']);//strip tags remove the html tags if any
    $em=str_replace(" ","",$em);//remove blank space
    $em=ucfirst(strtolower($em));//convert first case to upper
    $_SESSION['reg_email']= $em;//store email into session var 
    
    //email2
    $em2=strip_tags($_POST['reg_email2']);//strip tags remove the html tags if any
    $em2=str_replace(" ","",$em2);//remove blank space
    $em2=ucfirst(strtolower($em2));//convert first case to upper
    $_SESSION['reg_email2']= $em2; //store email2 into session var 
    
    //password
    $password=strip_tags($_POST['reg_password']);//strip tags remove the html tags if any
    
    //confirm password
    $password2=strip_tags($_POST['reg_password2']);//strip tags remove the html tags if any

    $date= date("y-m-d"); //gives current date
    //validation section
    if($em==$em2)
    {   //check if mail is in valid format
        if(filter_var($em,FILTER_VALIDATE_EMAIL))
        {
            $em=filter_var($em,FILTER_VALIDATE_EMAIL);
            //check if email exist
            $e_check=mysqli_query($conn,"SELECT email FROM users WHERE email='$em'");
            //count num of rows
            $num_rows=mysqli_num_rows($e_check); 
            if($num_rows > 0)
            {
                array_push($error_array, "email already exist <br/>");
            }
        }
        else{
            
            array_push($error_array,"invalid format <br/>");
        }
    }
    else{
        
        array_push($error_array,"emails don't match <br/>");
    }
    if(strlen($fname) > 25|| strlen($fname) < 2)
    {
        
        array_push($error_array,"Your first name must be between 2 and 5 characters <br/>");
    }
    if(strlen($lname) > 25|| strlen($lname) < 2)
    {
       
        array_push($error_array,"Your first name must be between 2 and 5 characters <br/>");
    }
    if($password !=$password2)
    {
        
        array_push($error_array,"Your password do not match <br/>");
    }
    // ensure that the password allow only alphanumeric keys
    else if(preg_match('/[^A-Za-z0-9]/', $password))
    {
        
        array_push($error_array,"Your password can only contain english characters and numbers <br/>");
    }
   
    if(strlen(strlen($password) > 30 || strlen($password) < 5))
    {
        
        array_push($error_array,"Your password must be between 5 and 30 characters <br/>");
    }
    //start storing data in db if dere isnt any error
    if(empty($error_array))
    {
        $password= md5($password); // encrypt password before storing to db
    
    //create username using first and lastname and check if the username already exist
    $username= strtolower($fname."_".$lname); 
    $check_username_query= mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'");
    $i=0;
    //check if username already exist and add numbers to it to differentiate
    while (mysqli_num_rows($check_username_query)!= 0)
     {  $i++;// add 1 to i
        $username= $username."_".$i;
        $check_username_query= mysqli_query($conn, "SELECT username FROM users WHERE username ='$username'");

     }
     //create a profile pics
     $rand= rand(1,2);
     if ($rand==1)
     $profile_pics="assets/images/profile_pics/default/head_alizarin.png";
     else if($rand==2)
     $profile_pics="assets/images/profile_pics/default/head_amethyst.png";
    
     $query= mysqli_query($conn,"INSERT INTO users VALUES('','$fname','$lname','$username','$em','$password','$date','$profile_pics','0','0','no',',')");
     //final touch
     array_push($error_array, "<span style='color: green;'>You are all set, you can now login</span><br>");
    
     //clear session
    $_SESSION['reg_fname']='';
    $_SESSION['reg_lname']='';
    $_SESSION['reg_email']='';
    $_SESSION['reg_email2']='';

    }
}
?>