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
				        include 'homepage.html';
				    break;
				    case '2';
				        include 'news.html'; 
				    break;
				    case '3';
				        include 'biography.html'; 
				    break;
				    default;
				    break;
				}
			?>
		</div>
		<?php inc 'inc/footer.php'; ?>
	</body>
</html>