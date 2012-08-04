<link rel="stylesheet" type="text/css" href="http://guildhian.com/staging/css/catalog.css">
<div id="catalog">
<?php
    $doc = new DOMDocument();
    $doc->load( 'catalog.xml' );

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
            $audiourl = filter_var($composition->getElementsByTagName("audiourl")->item(0)->getAttribute('value'), FILTER_SANITIZE_STRING);
            $score = filter_var($composition->getElementsByTagName("score")->item(0)->getAttribute('value'), FILTER_SANITIZE_STRING);
            $price = filter_var($composition->getElementsByTagName("price")->item(0)->nodeValue, FILTER_SANITIZE_STRING);
            
            echo "
            <div class='catalog-composition'>
            	<div class='catalog-composition-title'>$name</div>
            	<div class='catalog-composition-description'>$description</div>
                <div class='catalog-composition-links'>
        			<div class='audiourl'><a href='$audiourl'>$name sample</a></div>
                    <div class='score'><a href='$score'>$name score</a></div>
                    <div class='price'>$price</div>
                </div>
            </div>
            ";
        }
        echo "</div>";
    }
?>
</div>