<?php 

    if (!isset($_GET['entry_id'])) {
		header('location:index.php');
	} else {

		$id = $_GET['entry_id'];

        $servername = "localhost";
        $username = "adrirlnu_user1";
        $password = "database";
        $dbname = "adrirlnu_posts";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM allPosts WHERE post_id=".$id.";";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
		
        header( "Location: index.php" );
                exit ;
	}
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete A Post</title>
   <?php require 'head.php' ?>
    <br>

    <div class="header">
        <h2>Deleting Post...</h2>
    </div>
    <div class="footer">
        <h2>©2019 Adrian Wowk. All rights reserved.</h2>
    </div>
</body>

</html>