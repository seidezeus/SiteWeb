<?php
	session_start();

	include('include/configurations.php');
	include('include/fonctions/fonctions_include.php');

	include('include/html/header.html');
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



