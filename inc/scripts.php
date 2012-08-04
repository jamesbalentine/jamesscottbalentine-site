<link rel="stylesheet" type="text/css" href="http://guildhian.com/staging/css/jsbstyles.css">
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
