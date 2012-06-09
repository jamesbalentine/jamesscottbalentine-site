<html>
	<head>
		<?php include 'inc/scripts.php'; ?>
	</head>
	<body>
		<?php include 'inc/header.php'; ?>
		<div class='content'; ?>
			<?php 
				$page = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT);

				switch($page)
				{
				    case '1';
				        include 'inc/catalog.php';
				    break;
				    case '2';
				        include 'inc/news.php'; 
				    break;
				    case '3';
				        include 'inc/biography.php'; 
				    break;
				    default;
				    	include 'inc/homepage.php';
				    break;
				}
			?>
		</div>
		<?php include 'inc/footer.php'; ?>
	</body>
</html>