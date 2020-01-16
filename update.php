<?php 
	require_once 'status.php';

	if (isset($_POST['publishing'])) {

		$status = new Status();
// 		$entry->SqlSelectStatus();

        $status->SqlUpdateStatus($_POST['content']);
        
        $content = $status->getContent();
        
        $to = "admin@adrianwowk.com";
        $subject = "Status Updated!";

        $message = "
        <html>
        <body>
        <h2>Your Status Was Updated!</h2>
        <br>
        <br>
        <p>Here is a link to change it: 
        <a href='https://adrianwowk.com/Blog/update.php'>https://adrianwowk.com/Blog/update.php</a></p>
        <br>
        <br>
        <p>
        <strong>Content: </strong>".$content."<br><br>
        </p>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($to,$subject,$message,$headers);
        
        
        header( "Location: index.php" );
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
        <h2>Update Status</h2>
        <div id="create_form">
            <form action="update.php" method="POST">

                <label for="">Content</label><br>
                <textarea name="content" id="title" cols="30" rows="10"></textarea><br><br>

                <input type="hidden" name="publishing" />

                <input type="submit" name="submit" id="submit" value="Update" />
            </form>
        </div>
    </div>
    <hr>
    <div class="footer">
        <h2>©2019 Adrian Wowk. All rights reserved.</h2>
    </div>
</body>

</html>