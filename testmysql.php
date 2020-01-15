<?php
$ser = 'localhost';
$user = 'adrirlnu_user1';
$password = 'database'; //To be completed if you have set a password to root
$database = 'adrirlnu_posts'; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port
$mysqli = new mysqli($ser, $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}


$sql = "SELECT * FROM allPosts ORDER BY post_id DESC";
$result = $mysqli->query($sql);

$count = 0;

if ($result->num_rows > 0) {
    $count = $result->num_rows;
    while($row = $result->fetch_assoc()) {
       
        echo "<div class='card'>
        <h2><a style='text-decoration:none; color:black;' href='single.php?entry_id=" .$row["post_id"]. "'>" . $row["title"] . "</a></h2>
        <h5>Posted On: " . $row["pub_time"] . "</h5>
        <p>" . $row["text"] . "</p>
        </div>";
        $count = $count - 1;
    }
} else {
    echo "0 results";
}

$mysqli->close();
?>
