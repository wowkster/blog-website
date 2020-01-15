<?php 

if (isset($_POST['publishing'])) {

    $ser = 'localhost';
$user = 'adrirlnu_user1';
$password = 'database'; //To be completed if you have set a password to root
$database = 'adrirlnu_users'; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port
$mysqli = new mysqli($ser, $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
    $username=$_POST['username'];
    $password=$_POST['password'];

$sql = "SELECT * FROM userstbl WHERE username = '$username';";
$result = $mysqli->query($sql);

if (!empty($result)) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row['username'] == $username && $row['password'] == $password) {
                header( "Location: create.php" );
                exit ;
        }  
        else {
            header( "Location: login.php" );
                exit ;
        }
    }
} else {
    echo "  0 results";
}

$mysqli->close();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link rel="stylesheet" media="screen and (min-device-width: 800px)" href="style.css">
    <link rel="stylesheet" media="screen and (max-device-width: 799px)" href="style2.css">
    <link rel='shortcut icon' href='https://adrianwowk.com/favicon2.ico' type='image/x-icon' />
</head>

<body>
    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="follow.html">Social</a></li>
        <!-- <li style="float:right"><a class="" href="login.html">Log In</a></li> -->

    </ul>
    <br>

    <div class="header">
        <h2>Adrian's Blog</h2>
    </div>

    <div class="row">
        <div class="leftcolumn" style="width: 100%">
            <div class="card">
                <div class="container">
                    <div class="main">
                        <h2>To Create a Post, Please Log In:</h2>
                        <form action="login.php" id="loginform" method="post" name="myloginform">

                            <label>Username :</label>
                            <input type="text" name="username" id="username" />
                            <br>
                            <label>Password :</label>
                            <input type="password" name="password" id="password" />
                            <br>
                            <input type="hidden" name="publishing" />
                            <input type="submit" value="Login" />
                        </form>
                        <br>
                        <?php 
                        // echo '<span><b class="note">Note : </b>Use the following login credentials to demo:<br /><p><strong>Username : </strong>user<br><strong>Password : </strong>password</p></span>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php require 'footer.php' ?>
</body>

</html>