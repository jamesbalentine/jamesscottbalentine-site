<link rel="stylesheet" type="text/css" href="http://guildhian.com/staging/css/jsbstyles.css">
<link rel="stylesheet" type="text/css" href="http://jquerytools.org/media/css/scrollable-horizontal.css">
<link rel="stylesheet" type="text/css" href="http://jquerytools.org/media/css/scrollable-buttons.css">
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script type="text/javascript">
	function loadBody(page){
		$.ajax({
			url: 'inc/'+page,
			success: function(data) {
			$('#ajax-container').html(data);
			}
		});
	}
</script>
