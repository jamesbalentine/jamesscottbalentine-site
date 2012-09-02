<link rel="stylesheet" type="text/css" href="http://guildhian.com/staging/css/catalog.css">
<div id="catalog">
<?php
    $doc = new DOMDocument();
    $doc->load( 'catalog.xml' );
    $playerindex = 0;

    $sections = $doc->getElementsByTagName( "section" );
    echo "<div class='catalog-section-title-menulist'>";
        foreach( $sections as $key=>$section ) {
            $sectionTitle = filter_var($section->getAttribute('category'), FILTER_SANITIZE_STRING);
            echo "<div class='catalog-section-title-menu'><a href='#$key'>$sectionTitle</a></div>";
        }
    echo "</div>";
    foreach( $sections as $key=>$section ) {
        $sectionTitle = filter_var($section->getAttribute('category'), FILTER_SANITIZE_STRING);
        echo "
        <span class='catalog-section-title'><a id='$key'>$sectionTitle</a></span>
        <div class='catalog-section'>
        ";
        $compositions = $section->getElementsByTagName( "composition" );
        foreach( $compositions as $composition ) {
            $playerindex++;

            $name = filter_var($composition->getElementsByTagName("name")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
            $description = filter_var($composition->getElementsByTagName("description")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
            $audiourls = $composition->getElementsByTagName( "audiourl" );
            $scores = $composition->getElementsByTagName( "score" );
            
            $price = filter_var($composition->getElementsByTagName("price")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
            
            echo "
            <div class='catalog-composition'>
            	<div class='catalog-composition-title' onclick='parent.scrollToSong($playerindex);'>$name</div>
            	<div class='catalog-composition-description'>$description</div>
                <div class='catalog-composition-links'>";
                foreach( $audiourls as $audioIndex=>$audiourl ) {
                    $audiolink = filter_var($audiourl->getAttribute('value'), FILTER_SANITIZE_STRING);
                    ($audiourls->length > 1) ? $audioIndex++ : $audioIndex = null;
                    echo "<div class='audiourl'><a href='$audiolink'>$name sample $audioIndex</a></div>";
                }
                foreach( $scores as $scoreIndex=>$score ) {
                    $score = filter_var($composition->getElementsByTagName("score")->item(0)->getAttribute('value'), FILTER_SANITIZE_STRING);
                    ($scores->length > 1) ? $scoreIndex++ : $scoreIndex = null;
                    echo "<div class='score'><a href='$score'>$name score $scoreIndex</a></div>";
                }
                echo "
                    <div class='price'>$price</div>
                </div>
            </div>
            ";
        }
        echo "</div>";
    }
?>
</div>