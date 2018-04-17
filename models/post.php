<?php

class Post {

    // we define 3 attributes
    public $id;
    public $title;
    public $content;
    public $image;
    public $createdate;

    public function __construct($id, $title, $content, $image,$createdate) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->createdate= $createdate;
    }

//    Static belongs to the general class not to instance
    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("select * from blogpost");
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['title'], $post['content'], $post['image'], $post['createdate']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare("select * from blogpost where id = :id");
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        if ($post) {
            return new Post($post['id'], $post['title'], $post['content'], $post['image'],$post['createdate']);
        } else {
            //replace with a more meaningful exception
            //post with that id not found
            throw new Exception('A real exception should go here');
        }
    }

//update by id
    public static function update($id) {
        $db = Db::getInstance();
        $req = $db->prepare("Update blogpost set title=:title, content=:content, image=:image  where id=:id");
        $req->bindParam(':id', $id);
        $req->bindParam(':title', $title);
        $req->bindParam(':content', $content);
        $req->bindParam(':image', $image);
//potentially add update_date
// set name and price parameters and execute
        if (isset($_POST['title']) && $_POST['title'] != "") {
            $filteredTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['content']) && $_POST['content'] != "") {
            $filteredContent = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['image']) && $_POST['image'] != "") {
            $filteredImage = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $title = $filteredTitle;
        $content = $filteredContent;
        $image = $filteredImage;
        $req->execute();

//upload Post image if it exists
        if (!empty($_FILES[self::InputKey]['title'])) {
           Post::uploadFile($title);
        }
    }

    public static function add() {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into blogpost(title, content, image) values (:title, :content, :image)");
        $req->bindParam(':title', $title);
        $req->bindParam(':content', $content);
        $req->bindParam(':image', $image);
        //potentially add create_date
// set parameters and execute
        if (isset($_POST['title']) && $_POST['title'] != "") {
            $filteredTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['content']) && $_POST['content'] != "") {
        $filteredContent  = $_POST['content']; }
//        filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        
        


        $title = $filteredTitle;
        $content = $filteredContent;
        $image = Post::uploadFile($title);;
        $req->execute();

//upload post image
    }

    const AllowedTypes = ['image/jpeg', 'image/jpg'];
    const InputKey = 'image';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
    public static function uploadFile(string $name) {

	if (empty($_FILES[self::InputKey])) {
		//die("File Missing!");
                trigger_error("File Missing!");
	}

	if ($_FILES[self::InputKey]['error'] > 0) {
		trigger_error("Handle the error! " . $_FILES[InputKey]['error']);
	}


	if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
		trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
	}

	$tempFile = $_FILES[self::InputKey]['tmp_name'];
        $path = "C:/xampp/htdocs/belknit/views/uploads/";
	$destinationFile = $path . $name . '.jpeg';

	if (!move_uploaded_file($tempFile, $destinationFile)) {
		trigger_error("Handle Error");
	}
		
	//Clean up the temp file
	if (file_exists($tempFile)) {
		unlink($tempFile); 
	}
}

    public static function remove($id) {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('delete from blogpost where ID = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }

}

?>