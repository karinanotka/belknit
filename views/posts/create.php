
<html> <head> 

        <title>Create A Blog Post</title> </head>
    <body>

        <form id="get-data-form" method="POST"  class="w3-container" enctype="multipart/form-data">
            <div class="form-group">  
                <label>Title</label>
                <input type="text"  name="title" class="form-control" id="texteditor" placeholder="Post Title Here">
            </div>
         
        <label>Content</label>

        <textarea name= "content" class="tinymce" id="texteditor"></textarea>


        <input type="hidden" 
               name="MAX_FILE_SIZE" 
               value="10000000"
               />
        <input type="file" name="image" class="w3-btn w3-pink" id="texteditor" required /> <br>
        <div class="dropdown">

            <input type="submit" value="Create Post">
            </form>



            <script src="views/Javascript/js/jquery.min.js" type="text/javascript"></script>
            <script src="views/Javascript/plugin/tinymce/tinymce.min.js" type="text/javascript"></script>
            <script src="views/Javascript/plugin/tinymce/init-tinymce.js" type="text/javascript"></script>

            
            </body>
            </html>