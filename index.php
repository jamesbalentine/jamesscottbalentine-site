<?php
	header('X-Frame-Options: GUILDHIAN'); 
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/player.css">
		<script type="text/javascript">
			function scrollToSong(songindex) {
				$("div.scrollable").scrollable().seekTo(songindex);
			}
		</script>
	</head>
	<body style="overflow: hidden;">
		<div style="position: fixed; bottom: 0; left: 0; right: 0; z-index: 1; padding: 10px 0 10px 0; margin: 0; background-color: rgba(0, 0, 0, 0.8); width: 100%; height: 70px;">
			<?php include "inc/audioplayer.php"; ?>
		</div>
		<div id="innerframe-wrapper" style="position: absolute; top: 0; bottom: 90px; left: 0; right: 0;">
		<iframe id="inner" name="inner" src="inc/innerframe.php" style="position: relative; left: 0; right: 0; width: 100%; height: 100%;"></iframe>
		</div>
	</body>
</html>