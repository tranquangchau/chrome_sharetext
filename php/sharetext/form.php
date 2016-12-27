

Welcome form
<form id="myForm" method="post" action="<?= SITE_URL;?>">
	<input type="text" id="te1" name="filename"/ style="width: 100%;">
	<textarea id="textdata" name="textdata" style="width: 100%;"></textarea>
	<input type="submit" value="save"/>
    </form>
    <br/>
	<button onclick="add()">add favorit</button><br/>
	<a href="<?=SITE_URL?>show.php">view all post</a>
	<br/>
	<a href="<?=SITE_URL?>?action=logout">Logout</a>

<script>
function add(){
document.getElementById("te1").value='favorist';
document.getElementById("textdata").value='<?= $_GET['title']." ".$_GET['link'] ?>';
document.getElementById("myForm").submit();

}
</script>
