<?php

   class Session {
       

    public static function start() {
    session_start();
   $uid = $_POST['uid']; 
   $pw = $_POST['pw'];
   if($uid == 'arun' and $pw == 'arun123')
   {      
      $_SESSION['sid'] = '$uid'; # need to set user id instead of session_id()
      if (isset($_SESSION['sid'])) {
        header('Location: securepage.php');
      }
      else
      {
        echo "Error";
      }
   }
    }
    
    public static function securepage() {
        session_start();
   if(isset($_SESSION['sid']))
   {
    echo "welcome to you<br>";
      echo "<a href='logout.php'>Logout</a>";
   }
   else
   {
    header('Location: login.php');
   }
    }
    
    public static function clear() {
         session_start();
    if(!session_destroy())
    {
        echo "Failed to log out";
    }
    else
    {
        echo "Logged out successfully";
    }
    }

 
   }
