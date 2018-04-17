<?php

class UserController {
    
    public function readAll() {
      // we store all the users in a variable
      $users = User::all();
      require_once('views/users/readAll.php');
    }
    
    public function read() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      try{
      // we use the given id to get the correct post
      $user = User::find($_GET['id']);
      require_once('views/users/read.php');
      }
 catch (Exception $ex){
     return call('pages','error');
 }
    }
    
    
     public function login() {
        
      if($_SERVER['REQUEST_METHOD'] =='GET'){
         require_once('views/users/login.php');
        }
      else
          { 
            $username = $_POST['username'];
            $password = $_POST['password'];
            $logintest = User::get_user($username,$password); 
            if($logintest){
                User::login($username,$password); 
                
                $message = '<p class="error">Hello ' . $_SESSION['username'] . ', you are logged in</p>';
                 header('views/pages/securepage.php');
            }
            else {
                $message = "Wrong username or password";
            }
            echo $message;
             
            //require_once('views/users/readAll.php');
      }
      
    }
    
  
    
 public function logout(){
     echo "Logged out successfully";

    session_start();
    session_destroy();
    setcookie(session_id(),time()-1);
    
  }

   
    /*
    public function login() {
    
         if(isset($_POST['submit'])){
         
         require_once('views/users/login.php');
         }
          else 
          {
           $username = $_POST['username'];
           $password = $_POST['password'];
           User::get_user();
          
            if($user->login($username,$password)){ 

                //logged in return to index page
                header('Location: index.php');
                exit;


            } else {
                $message = '<p class="error">Wrong username or password</p>';
            }

        }//end if submit

        if(isset($message)){ echo $message; }

    }

*/
    

    public function create() {
      // we expect a url of form ?controller=users&action=create
      // if it's a GET request display a blank form for creating a new user
      // else it's a user so add to the database and redirect to readAllusers action
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          require_once('views/users/create.php');
      }
      else { 
            User::add();  
            $users = User::all(); //$users is used within the view
            require_once('views/users/readAll.php');
      }
      
    }
    public function update() {
        
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          if (!isset($_GET['id']))
        return call('pages', 'error');

        // we use the given id to get the correct user
        $user = User::find($_GET['id']);
      
        require_once('views/users/update.php');
        }
      else
          { 
            $id = $_GET['id'];
            User::update($id);
                        
            $users = User::all();
            require_once('views/users/readAll.php');
      }
      
    }
    public function delete() {
            User::remove($_GET['id']);
            
            $users = User::all();
            require_once('views/users/readAll.php');
      }
      
    }
  
?>