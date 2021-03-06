<link rel="stylesheet" type="text/css" href="http://jquerytools.org/media/css/scrollable-horizontal.css">
<link rel="stylesheet" type="text/css" href="http://jquerytools.org/media/css/scrollable-buttons.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script src="./js/jquery.jplayer.min.js"></script>
<style type="text/css">
	div .media {width: auto;}
	.media-image-wrapper {width: 70px !important;}
	.media li {float: left; margin-left: 5px;}
	.media ul {clear: right;}
	.media img {margin: 8px !important;}
	.media-details {width: 425px !important; padding-left: 6px; margin-right: 40px;}
	.media-title {padding-top: 6px;}
	.media-title-suffix {padding: 6px 0 0 6px; clear: right;}
	.media-instruments {padding-top: 3px; border-bottom: 1px solid gray; font-size: 14px; line-height: 15px; clear: left;}
	.media-instruments-prefix {text-decoration: underline;}
	.media-performances {padding-top: 3px; font-size: 14px; line-height: 15px; clear: left;}
	.media-performances-prefix {text-decoration: underline;}
	.pauseButton {border-radius: 10px; margin: 15px; background: url('http://guildhian.com/staging/Images/Pausebutton.jpg') no-repeat scroll center center; background-size: 40px 40px; width: 40px; height: 40px; display: block;}
	.playButton {border-radius: 10px; margin: 15px; background: url('http://guildhian.com/staging/Images/Playbutton2.jpg') no-repeat scroll center center; background-size: 40px 40px; width: 40px; height: 40px; display: block;}
	.playerButton {width: 40px !important;}
	a.browse {margin-top: 18px;}
	a.prev.browse.left {margin-left: 20%;}
	#scrollable {height: 70px;}
</style>
<script type="text/javascript">
    function playerPause(buttonid) {
    	console.log("playerpause "+buttonid);
    	$("#jquery_"+buttonid).jPlayer('pauseOthers');
    	$("#jquery_"+buttonid).jPlayer('play');
    	$(".playerButton").removeClass("pauseButton");
    	$(".playerButton").addClass("playButton");
    	$(".playerButton").each(function(){this.onclick=function(){playerPause(this.id);}});
    	$("#"+buttonid).addClass("pauseButton");
    	$("#"+buttonid).removeClass("playButton");
    	document.getElementById(buttonid).onclick=function(){playerPlay(buttonid);};
    }
    function playerPlay(buttonid) {
    	console.log("playerplay "+buttonid);
    	$("#jquery_"+buttonid).jPlayer('pauseOthers');
    	$("#jquery_"+buttonid).jPlayer('pause');
    	$(".playerButton").removeClass("pauseButton");
    	$(".playerButton").addClass("playButton");
    	document.getElementById(buttonid).onclick=function(){playerPause(buttonid);};
    }
</script>
<div id="scrollable-wrapper">
	<a class="prev browse left"></a>
	<div class="scrollable" id="scrollable" >
		<div class="items">
			<?php
			    $doc = new DOMDocument();
			    $doc->load( 'inc/catalog.xml' );
			    $index = -1;

			    $sections = $doc->getElementsByTagName( "section" );

				foreach( $sections as $key=>$section ) {
				        $sectionTitle = filter_var($section->getAttribute('category'), FILTER_SANITIZE_STRING);
				        $compositions = $section->getElementsByTagName( "composition" );
			        foreach( $compositions as $composition ) {
			        	$name = filter_var($composition->getElementsByTagName("name")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
			            $description = filter_var($composition->getElementsByTagName("description")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
			            $audiourls = $composition->getElementsByTagName( "audiourl" );

			            $index = ($audiourls->length > 0) ? $index+1 : $index;

			        	if($audiourls->length > 0) {
			        		echo "<div class='media'>
								<div class='media-image-wrapper media'>
									<div id='jquery_jplayer_$index' class='jp-jplayer'></div>
									<div id='jplayer_$index' class='playerButton playButton' onclick=playerPause(id); ></div>
								</div>
								<div class='media-details'>
									<div class='media-title media'>$name</div>
									<div class='media-title-suffix media'> - $sectionTitle</div>
									<div class='media-instruments media'>
										<div class='media-description media'>$description</div>
									</div>
								</div>
							</div>";
						}
			        }
			    }

			    echo "<script type='text/javascript'>
			    	$(document).ready(function(){";
			    $compositions2 = $doc->getElementsByTagName( "composition" );
			    $keyindex = -1;
		    	foreach( $compositions2 as $composition2 ) {
		    		$audiourls = $composition2->getElementsByTagName( "audiourl" );
		    		foreach( $audiourls as $audioIndex=>$audiourl ) {
	                    $audiourl = filter_var($composition2->getElementsByTagName("audiourl")->item(0)->getAttribute('value'), FILTER_SANITIZE_STRING);
	                }

	                $keyindex = ($audiourls->length > 0) ? $keyindex+1 : $keyindex;

		    		$playeritem = ($audiourls->length > 0) ? "
			        	$('#jquery_jplayer_$keyindex').jPlayer({
				        ready: function () {
				          $(this).jPlayer('setMedia', {
				            mp3: 'audio/$audiourl'
				          });
				        },
				        swfPath: './js',
				        supplied: 'mp3',
						preload: 'none'		
				      });" : " ";
		    		
		    		echo $playeritem; 
				}
				echo "});</script>";
			?>
		</div>
	</div>
	<a class="next browse right"></a>
</div>
<script>
$(function() {
  // initialize scrollable
  $(".scrollable").scrollable();
});
</script>