<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <?php require_once 'head.php'
    
    ?>

    <br>

    <div class="header">
        <h2>Adrian's Blog</h2>
    </div>    

    <div class="row">
        <div id="lft" class="leftcolumn">

            <?php include 'testmysql.php';?>

        </div>
        <div class="rightcolumn">
            <div class="card">
                <h2><a style='text-decoration:none; color:black;' href='about.html'>About Me</a></h2>
                <span class="img">
                <img src="assets/me.jpg" alt="">
                </span>
                <p>My name is Adrian Wowk, and I am an aspiring web developer programmer.</p>
            </div>
            <div class="card">
                <h3>Follow Me</h3>
                <p>Insta: @wowkster_official </p>
            </div>
        </div>
    </div>
    <hr>
    <?php require 'footer.php' ?>
</body>


</html>