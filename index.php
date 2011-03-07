<?php
	session_start();

	include('include/configurations.php');
	include('include/fonctions/fonctions_include.php');

	include('include/html/header.html');

?>
<script type="text/javascript">
function gradient(id, level)
	{
	var box = document.getElementById(id);
	box.style.opacity = level;
	box.style.MozOpacity = level;
	box.style.KhtmlOpacity = level;
	box.style.filter = "alpha(opacity=" + level * 100 + ")";
	box.style.display="block";
	return;
	}


	function fadein(id) 
	{
	var level = 0;
	while(level <= 1)
	{
		setTimeout( "gradient('" + id + "'," + level + ")", (level* 1000) + 10);
		level += 0.01;
	}
	}


	// Open the lightbox


	function openbox(formtitle, fadin)
	{
	var box = document.getElementById('box'); 
	document.getElementById('filter').style.display='block';

	var btitle = document.getElementById('boxtitle');
	btitle.innerHTML = formtitle;

	if(fadin)
	{
	 gradient("box", 0);
	 fadein("box");
	}
	else
	{ 	
	box.style.display='block';
	}  	
	}


	// Close the lightbox

	function closebox()
	{
	document.getElementById('box').style.display='none';
	document.getElementById('filter').style.display='none';
	}

</script>
<?php
	include('include/html/left.html');
	include('include/html/slide.html');

	if(isset($_GET['page'])) { 
		if(file_exists('include/page/'.htmlspecialchars($_GET['page']).'.php')) {
			include('include/page/'.htmlspecialchars($_GET['page']).'.php');
		}
		else {
			?>
			<script type="text/javascript">
				alert('404 ERREUR : Page inexistante !');
				document.location.href="?page=Accueil";
			</script>
			<?php		
		}
	}
	else {
		include('include/page/Accueil.php');
	}

	include('include/html/footer.html');
?>



