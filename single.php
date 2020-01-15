<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <?php require_once 'head.php';?>
    
    <?php if (!isset($_GET['entry_id'])) {
		header('location:index.php');
	}

	require_once 'entry.php';

	$entry = new Entry();

	$entry->SqlSelectEntryById($_GET['entry_id']);
	

    ?>

    <br>  

    <div class="row">
        <div id="lft" class="leftcolumn" style='margin-top:4%;width: 100%;'>
            
        <div class='card'>
            <h2><?php echo $entry->getTitle(); ?></h2>
            <h4>Post By: <?php echo $entry->getAuthor(); ?></h4>
            <h5>Posted On: <?php echo $entry->getDate(); ?></h5>
            <p><?php echo $entry->getContent(); ?></p>
        </div>

        </div>
    
    </div>
    <hr>
    <?php require 'footer.php' ?>
</body>


</html>