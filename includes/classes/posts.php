<?php
class Posts{
    private $user_obj;
    private $conn;
    public function __construct($conn, $user)
    {
        $this->conn=$conn;
        $this->user_obj= new User($conn, $user);
    }
    public function submitPost($body, $user_to)
    {
        $body=strip tags($body);//remove html tags
        $body=mysqli_real_escape_strings($this->conn, $body);
        $check_empty=preg_replace('/\s+/',"",$body);//delete all space

        if($check_empty != "")
        {
            //current date and time
            $date_added=date("y-m-d H:i:s");
            //get username
            $added_by= $this->user_obj->getUsername();
        }
        //if user is on profile user_to="none"
        if($user_to == $added_by)
        {
            $user_to="none";
        }
    }
}
?>