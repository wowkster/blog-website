<?php 
	require_once 'entry.php';

	if (isset($_POST['publishing'])) {

		$entry = new Entry();
		$entry->createNewFromPOST($_POST);

        $entry->SqlInsertEntry();
        
        $id = $entry->getId();
        $title = $entry->getTitle();
        $author = $entry->getAuthor();
        $content = $entry->getContent();
        
        $to = "admin@adrianwowk.com";
        $subject = "New Post Added To Database!";

        $message = "
        <html>
        <body>
        <h2>A new post was added to <strong>allPosts</strong>!</h2>
        <br>
        <br>
        <h2>The Post ID is: ".$id.".</h2>
        <br>
        <br>
        <p>Here is a link to it: 
        <a href='https://adrianwowk.com/Blog/single.php?entry_id=".$id."'>https://adrianwowk.com/Blog/single.php?entry_id=".$id."</a></p>
        <br>
        <p>Here is a link to delete it: 
        <a href='https://adrianwowk.com/Blog/delete.php?entry_id=".$id."'>https://adrianwowk.com/Blog/delete.php?entry_id=".$id."</a></p>
        <br>
        <br>
        <p>
        <strong>Title: </strong>".$title."<br><br>
        <strong>Author: </strong>".$author."<br><br>
        <strong>Content: </strong>".$content."<br><br>
        </p>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($to,$subject,$message,$headers);
        
        
        header( "Location: single.php?entry_id=".$id );
                exit ;
	}
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create A New Post</title>
   <?php require 'head.php' ?>
    <br>

    <div class="header">
        <h2>Adrian's Blog</h2>
    </div>
    <div class="card">
        <h2>Create a new post</h2>
        <div id="create_form">
            <form action="create.php" method="POST">

                <label for="">Title</label><br>
                <input type="text" name="entry_title" id="title" /><br><br>

                <label for="">Author</label><br>
                <input type="text" name="entry_author" id="author" /><br><br>

                <label for="">Content</label><br>
                <textarea name="entry_content" id="title" cols="30" rows="10"></textarea><br><br>

                <input type="hidden" name="publishing" />

                <input type="submit" name="submit" id="submit" value="Publish" />
            </form>
        </div>
    </div>
    <hr>
    <div class="footer">
        <h2>©2019 Adrian Wowk. All rights reserved.</h2>
    </div>
</body>

</html>