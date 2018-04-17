<html>

    <head>
        <script src=”http://js.nicedit.com/nicEdit-latest.js”></script>
        <script src="../css/nicEdit.js" type="text/javascript"></script>
 
    </head>

    <body><p>Fill in the following form to create a new product:</p>
        <form action="" method="POST" class="w3-container" enctype="multipart/form-data">

            <h2>Add New Item</h2>
  
        <p>
            <input class="w3-input" type="text" name="name" required autofocus>
            <label>Name</label>
        </p>
         <p>
            <textarea id=”NicEdit” cols=”80″ rows=”5″>find out how it knows where to enter data</textarea>
            <label>Description</label>
        </p>
         <p>
            <input class="w3-input" type="text" name="price" required>
             
            <label>Price</label>
        </p>

        <input type="hidden" 
               name="MAX_FILE_SIZE" 
               value="10000000"
               />
             
            <label>Product Type</label>
            <select name="id">
                
                <?php
                require_once 'types\readAll.php';
                echo $type->name;
                
                    echo "<option role='presentation' role='menuitem'  value ='" . $type->id . "'tabindex='-1'>" . $type->name . "</option>";
                
                ?>
            </select>


        <input type="file" name="myUploader" class="w3-btn w3-pink" required />
        <p>
            <input class="w3-btn w3-pink" type="submit" value="Add Product">
        </p>
    </form>
</body>
</html>