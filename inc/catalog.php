<link rel="stylesheet" type="text/css" href="http://guildhian.com/staging/css/catalog.css">
<div id="catalog">
<?php
    $doc = new DOMDocument();
    $doc->load( 'catalog.xml' );
    $playerindex = -1;

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
            $name = filter_var($composition->getElementsByTagName("name")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
            $description = filter_var($composition->getElementsByTagName("description")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
            $audiourls = $composition->getElementsByTagName( "audiourl" );
            $scores = $composition->getElementsByTagName( "score" );
            $price = filter_var($composition->getElementsByTagName("price")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
            
            $playerindex = ($audiourls->length > 0) ? $playerindex+1 : $playerindex;
            $onclick = ($audiourls->length > 0) ? "<div class='catalog-composition-links-player' onclick='parent.scrollToSong($playerindex);'></div>" : " " ;
            echo "
            <div class='catalog-composition'>
            	<div class='catalog-composition-title'>$name $onclick</div>
            	<div class='catalog-composition-description'>$description</div>
                <div class='catalog-composition-links'>
                ";
                foreach( $audiourls as $audioIndex=>$audiourl ) {
                    $audiolink = filter_var($audiourl->getAttribute('value'), FILTER_SANITIZE_STRING);
                    ($audiourls->length > 0) ? $audioIndex++ : $audioIndex = null;
                    echo "<div class='audiourl'><a href='../audio/$audiolink'>$name sample $audioIndex</a></div>";
                }
                foreach( $scores as $scoreIndex=>$score ) {
                    $score = filter_var($composition->getElementsByTagName("score")->item(0)->getAttribute('value'), FILTER_SANITIZE_STRING);
                    ($scores->length > 0) ? $scoreIndex++ : $scoreIndex = null;
                    echo "<div class='score'><a href='$score'>$name score $scoreIndex</a></div>";
                }
                echo "
                    <div class='price'>For parts or prices, <a href='#page=7'>inquire</a></div>
                </div>
                
            </div>
            ";
        }
        echo "</div>";
    }
?>
</div>