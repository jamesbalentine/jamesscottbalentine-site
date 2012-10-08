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
            $sampleplayer = ($audiourls->length > 0) ? "<div class='catalog-composition-left-background'><div id='composition_$playerindex' class='catalog-composition-links-player' onclick='playerStart($playerindex);' >$playerindex</div></div>" : " " ;
            echo "
            <div class='catalog-composition'>
                <div class='catalog-composition-left'>
                    <div class='catalog-composition-title'>$name</div>
                    $sampleplayer
                    ";
                    foreach( $scores as $scoreIndex=>$score ) {
                    $score = filter_var($composition->getElementsByTagName("score")->item($scoreIndex)->getAttribute('value'), FILTER_SANITIZE_STRING);
                    ($scores->length > 0) ? $scoreIndex++ : $scoreIndex = null;
                    echo "<div class='catalog-composition-left-background'><a href='$score'><div class='catalog-composition-links-score'>";
                    echo ($scores->length > 1) ? $scoreIndex : " ";
                    echo "</div></a></div>";
                    }
                    echo "
                </div>
            	<div class='catalog-composition-description'>$description</div>
                <div class='catalog-composition-links'>
                ";
                foreach( $audiourls as $audioIndex=>$audiourl ) {
                    $audiolink = filter_var($audiourl->getAttribute('value'), FILTER_SANITIZE_STRING);
                    ($audiourls->length > 0) ? $audioIndex++ : $audioIndex = null;
                    echo "<div class='audiourl'><a href='../audio/$audiolink'>$name sample $audioIndex</a></div>";
                }
                echo "<div class='price'>For parts or prices, <a href='?page=7'>inquire</a></div>
                </div>
            </div>
            ";
        }
        echo "</div>";
    }
?>
</div>