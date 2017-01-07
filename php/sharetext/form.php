

Welcome form
<br><button onclick="plus_text(1)">test</button>
<form id="myForm" method="post" action="<?= SITE_URL;?>">
	<input type="text" id="te1" name="filename"/ style="width: 100%;">
	<textarea id="textdata" name="textdata" style="width: 100%;"></textarea>
	<input type="submit" value="save"/> 
	
    </form>
    <button onclick="add(1)">add1</button>	
    <button onclick="add(2)">add cpan</button><br/>
    <input type="hidden" id="a1" value="0">
    <input type="hidden" id="a2" value="0">
	<a href="<?=SITE_URL?>show.php">view all post</a>
	<br/>
	<a href="<?=SITE_URL?>?action=logout">Logout</a>

<script>
function add(id){
	var a = document.getElementById("a"+id).value;
	if(a==0){
		document.getElementById("a"+id).value="1";
		
		
		if(id==1){
			document.getElementById("te1").value='favorist';
		}else{
			document.getElementById("te1").value='favorist cty';
		}
		document.getElementById("textdata").value='<?= $_GET['title']." ".$_GET['link'] ?>';
	}else{
		//alert("subit");		
		document.getElementById("myForm").submit();
	}

}
function plus_text(id){
	if(id==1){
		document.getElementById("textdata").value='<i classs="testok">Testok<i>'+document.getElementById("textdata").value;
	}
}
</script>
