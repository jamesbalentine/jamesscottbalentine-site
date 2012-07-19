<?php
	header('X-Frame-Options: GUILDHIAN'); 
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/player.css">
	</head>
	<body>
		<div style="position: fixed; bottom: 0; left: 200px; z-index: 1;">
			<?php include "inc/audioplayer.html"; ?>
		</div>
		<iframe id="inner" name="inner" src="inc/innerframe.php" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
	</body>
</html>