<link rel="stylesheet" type="text/css" href="http://guildhian.com/staging/css/catalog.css">
<div id="main-content" class="container">
<?php
    $doc = new DOMDocument();
    $doc->load( "news.xml" );

    $events = $doc->getElementsByTagName( "event" );
    foreach( $events as $key=>$event ) {
        $date = filter_var($event->getAttribute("date"), FILTER_SANITIZE_STRING);
        $title = filter_var($event->getElementsByTagName("title")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
        $name = filter_var($event->getElementsByTagName("name")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
        $description = filter_var($event->getElementsByTagName("description")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
        $links = $event->getElementsByTagName( "link" );
        $images = $event->getElementsByTagName( "image" );
        
        echo "
        <div class='news-event'>
            <div class='news-event-left'>
                <div class='news-event-title'>$title</div>
            	<div class='news-event-links'>";
            	if($links->length > 0) {
	                foreach( $links as $linkindex=>$link ) {
		                $linkurl = filter_var($event->getElementsByTagName("link")->item($linkindex)->getAttribute('url'), FILTER_SANITIZE_STRING);
	            		$linktitle = filter_var($link->nodeValue, FILTER_SANITIZE_STRING);
	            		echo "<a href='$linkurl'>$linktitle</a>";
	            	}
	            }
                echo "</div>
            </div>
        	<div class='news-event-description'>$description</div>
            <div class='news-event-images'>";
            if($images->length > 0) {
	            foreach( $images as $imageIndex=>$imageurl ) {
	                $imagelink = filter_var($imageurl->getAttribute('url'), FILTER_SANITIZE_STRING);
	                echo "<a href='$imagelink'>$name link $imageIndex</a>";
	            }
        	}
            echo "
            </div>
        </div>";
    }
?>
</div>