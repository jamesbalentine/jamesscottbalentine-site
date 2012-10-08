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
		console.log("playerstart: " + $("#composition_"+songindex).html());
		parent.scrollToSong(songindex);
		$(".catalog-composition-links-player").each(function(){this.onclick=function(){playerStart($(this).html());}});
		document.getElementById("composition_"+songindex).onclick=function(){playerStop(songindex);}; 
	}
	function playerStop(songindex){
		console.log("playerstop: "+ $("#composition_"+songindex).html());
		parent.pauseSong(songindex);
		document.getElementById("composition_"+songindex).onclick=function(){playerStart(songindex);}; 
	}
</script>
