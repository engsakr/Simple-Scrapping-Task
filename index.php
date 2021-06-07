<?php
ini_set('max_execution_time',500);
require_once 'phpQuery/phpQuery.php';

$domain = "https://www.homegate.ch";
$target = "/mieten/immobilien/kanton-zuerich/trefferliste?ep=";

$strat  = 1; //start point
$end = 2;//end point (the number of id(s) you want)

for ($i=$strat; $i<=$end ; $i++) { 

    echo "<br/><b>Page :".$i."</b><hr>";
    $focus = $domain.$target.$i;
    $htmlPage = file_get_contents($focus);
    phpQuery::newDocumentHTML($htmlPage);

    $links = pq('.detail-page-link');
    foreach ($links as $key => $link) {
                $href = $link->getAttribute('href');
                $fulllink = $domain.$href;
                echo "Your Pretty Link ::: ==>  " . $fulllink."<br/>";

    }
    echo "<hr>";
    
}




?>