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
				        include 'homepage.php';
				    break;
				    case '2';
				        include 'news.php'; 
				    break;
				    case '3';
				        include 'inc/biography.php'; 
				    break;
				    default;
				    break;
				}
			?>
		</div>
		<?php include 'inc/footer.php'; ?>
	</body>
</html>