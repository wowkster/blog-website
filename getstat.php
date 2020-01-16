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


$sql = "SELECT * FROM status";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       
        echo "<div class='card'>
        <h2>Status</h2>
        <h5>Last Updated: " . $row["date"] . "</h5>
        <p>".$row['stat']."</p>
        </div>";
    }
} else {
    echo "0 results";
}

$mysqli->close();
?>
