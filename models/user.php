<?php

class User {

    // we define 3 attributes
    public $id;
    public $username;
    public $password;

    public function __construct($id, $username, $password) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
       
    }

//    Static belongs to the general class not to instance
    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("select * from users");
        // we create a list of user objects from the database results
        foreach ($req->fetchAll() as $user) {
            $list[] = new user($user['id'], $user['username'], $user['password']);
        }
        return $list;
    }

    public static function find() {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $req = $db->prepare("select * from users where username = :username");
        //the query was prepared, now replace :id with the actual $id value
         $req->bindParam(':username', $username);
      
        // set parameters and execute
      if (isset($_POST['username']) && $_POST['username'] != "") {
            $filteredUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $req->execute();
        $user = $req->fetch();
        if ($user) {
            return new user( $user['username']);
        } else {
            //replace with a more meaningful exception
            //user with that id not found
            throw new Exception('A real exception should go here');
        }
    }
    
    public function create_hash($value)
    {
        return $hash = crypt($value, '$2a$12.substr(str_replace('+', '.', base64_encode(sha1(microtime(true), true))), 0, 22)');
    }

    private function verify_hash($password,$hash)
    {
        return $hash == crypt($password, $hash);
    }
// look for password_hash password function for php 
    
    public function get_user($username, $password){
    try {
        $db = Db::getInstance();
        $req = $db->prepare('select id, username, password from users where username = :username and password = :password');
        $req->bindParam(':username', $username);
        $req->bindParam(':password', $password);
        $req->execute();
        $user = $req->fetch();
        if($user) {
         
            return true;
            } else {
                 
                return false;
            }
          
        return $req->fetch();

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
}

    
    public function login($username,$password){ 
    //$db = Db::getInstance();   
    //$hashed = $db->get_user($username);
    
  // if($db->verify_hash($password,$hashed) == 1){
                session_start();
                $_SESSION['sid'] = session_id();
                $_SESSION['loggedin'] = true;
		//$_SESSION['id'] = $user['id'];
		//$_SESSION['username'] = $user['username'];
                $_SESSION['username'] = $username;
        return true;
 //   }       
}
/*
        public function is_logged_in(){
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            return true;
        }        
    }
*/
//update by id
    public static function update($id) {
        $db = Db::getInstance();
        $req = $db->prepare("Update users set username=:username, password=:password where id=:id");
        $req->bindParam(':id', $id);
        $req->bindParam(':username', $username);
        $req->bindParam(':password', $password);


// set name and price parameters and execute
        if (isset($_POST['username']) && $_POST['username'] != "") {
            $filteredusername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['password']) && $_POST['password'] != "") {
            $filteredpassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        }
   
        $username = $filteredusername;
        $password = $filteredpassword;
        $req->execute();

    }

    public static function add() {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into users(username, password,email) values (:username, :password, :email)");
        $req->bindParam(':username', $username);
        $req->bindParam(':password', $password);
        $req->bindParam(':email', $email);
// set parameters and execute
      if (isset($_POST['username']) && $_POST['username'] != "") {
            $filteredUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['password']) && $_POST['password'] != "") {
        $filteredPassword  = $_POST['password']; }
//        filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        if (isset($_POST['email']) && $_POST['email'] != "") {
        $filteredEmail = $_POST['email']; }
        
        $username = $filteredUsername;
        $password = $filteredPassword;
        $email = $filteredEmail;
        $req->execute();

    }

    public static function remove($id) {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('delete from users where id = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }

}

?>