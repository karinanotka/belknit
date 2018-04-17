<p>This is the requested User:</p>

<div  id="get-data-form">

    <p>User Name: <?php echo $user->username; ?></p>
    <p>User Email: <?php echo $user->email; ?></p>
</div>

<?php
$file = $post->image;
if (file_exists($file)) {
    $img = "<img src='$file' width='150' />";
    echo $img;
} else {
    echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
}
?>

	
