<html>
	<head>
		<?php include 'inc/scripts.php'; ?>
		<script type='text/javascript'>
			function resize(frame) {
				frame.style.height = frame.contentWindow.document.body.scrollHeight + "px";
			}
		</script>
	</head>
	<body>
		<div class='container'>
			<iframe onload="resize(document.getElementById('iframe-content'))" onresize="resize(document.getElementById('iframe-content'))" onunload="resize(document.getElementById('iframe-content'))" src='inc/homepage.php' id='iframe-content' name='iframe-content' scrolling='no' frameborder='0' border='0' style='width: 1040px; height: 556px;'></iframe>
		</div>
		<?php include 'inc/footer.php'; ?>
	</body>
</html>