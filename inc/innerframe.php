<html>
	<head>
		<?php include 'scripts.php'; ?>
	</head>
	<body>
		<div class='container'>
		<?php 
			$page = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT);	

			switch($page)	
			{	
			    case '1';	
			    	include 'header.php';
					include 'catalog.php';	
					break;	
			    case '2';	
			    	include 'header.php';
					include 'news.php'; 	
					break;	
			    case '3';	
			    	include 'header.php';
					include 'biography.php'; 	
					break;
				case '4';	
					include 'header.php';
					include 'scorespdf.php'; 	
					break;
				case '5';	
					include 'header.php';
					include 'listen.php'; 	
					break;
				case '6';	
					include 'header.php';
					include 'links.php'; 	
					break;
				case '7';	
					include 'header.php';
					include 'contact.php'; 	
					break;	
			    default;
			    	include 'homepage.php';
			    	break;	
			}
		?>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>
