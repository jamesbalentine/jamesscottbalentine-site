<html>
	<head>
		<?php include 'inc/scripts.php'; ?>
	</head>
	<body>
		<div class='container'>
			<?php 
				$page = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT);

				switch($page)
				{
				    case '1';
				    	include 'inc/header.php';
				        include 'inc/catalog.php';
				    break;
				    case '2';
				    	include 'inc/header.php';
				        include 'inc/news.php'; 
				    break;
				    case '3';
				    	include 'inc/header.php';
				        include 'inc/biography.php'; 
				    break;
				    case '4';
				    	include 'inc/header.php';
				        include 'inc/scorespdf.php'; 
				    break;
				    case '5';
				    	include 'inc/header.php';
				    	include 'inc/listen.php';
				    break;
				    case '6';
				    	include 'inc/header.php';
				    	include 'inc/links.php';
				    break;
				    case '7';
				    	include 'inc/header.php';
				    	include 'inc/contact.php';
				    break;
				    default;
				    	include 'inc/homepage.php';
				    	include 'inc/audioplayer.html';
				    break;
				}
			?>
		</div>
		<?php include 'inc/footer.php'; ?>
	</body>
</html>