
<?php
//add the functions in header file to this page
include("includes/header.php");
include("includes/classes/user.php");
?>
    <div class="user_details column">
            <a href=""><img src="<?php echo $user['profile_pic'];?>"></a>
        <div class="user_details_left_right">
            <a href=""><?php echo $user['firstname']. " ".$user['lastname'];?></a>
            <br>
            <?php echo "posts:". $user['num_post']."<br>";
            echo "likes:". $user['num_likes'];?>
        </div>
    </div>
    <div class="main_column column">
        <form class="post_form" method="POST" action="index.php">
        <textarea name="post_text" id="post_text" placeholder="Got something to say"></textarea>
        <input type="submit" name="post" id="post_button" value="post"><hr>
        </form>
        <?php
        $User_obj= new User($conn,$userLogedin);
        echo $User_obj->getFirstAndLastname();
        ?>
    </div>  
</div>
</body>
</html>