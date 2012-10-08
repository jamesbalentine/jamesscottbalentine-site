<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
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
	function playerStart(songindex){
		console.log("playerstart "+songindex);
		parent.scrollToSong(songindex);
		$(".catalog-composition-links-player").each(function(){this.onclick=function(){playerStart(this.id);}});
		$("#"+songindex).onclick=function(){playerStop(songindex);}; 
	}
	function playerStop(songindex){
		console.log("playerstop "+songindex);
		parent.pauseSong(songindex);
		$("#"+songindex).onclick=function(){playerStart(songindex);}; 
	}
</script>
