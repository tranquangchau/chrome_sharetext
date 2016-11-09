Welcome form
<form method="post" action="<?= SITE_URL;?>">
	<input type="text" name="filename"/ style="width: 100%;">
	<textarea name="textdata" style="width: 100%;"></textarea>
	<input type="submit" value="save"/>
    </form>
	
	<a href="<?=SITE_URL?>show.php">view all post</a>
	<br/>
	<a href="<?=SITE_URL?>?action=logout">Logout</a>
	