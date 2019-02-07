<?php

$count = 0;
$masiv = [];
//$input = $_GET['name'];

//$inpResult = $input;

$url = 'https://geo.koltyrin.ru/goroda.php?country=Австрия';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$array = curl_exec($ch);

$start = strpos($array, 'table style');
$info = mb_substr($array, 20200, 34000);
var_dump($info);
curl_close($ch);
//for ($i = 0; $i < count($inpResult); $i++){
//    curl_close($ch);
//
//
//    $info = mb_substr($array, $start, 200652);
//
//    preg_match_all("/url\(([\s])?([\"|\\'])?(.*?)([\"|\\'])?([\s])?\)/i", $info, $matches);
//
//    $imgArray = $matches[0];
//    for ($j = 0; $j < 5; $j++){
//
//        $img = rand(0, count($imgArray));
//        if(!$imgArray[$img]){
//            $img = rand(0, count($imgArray)-1);
//            $img1 = $imgArray[$img];
//            var_dump($img1);
//            die;
//        }else {
//            $img1 = $imgArray[$img];
//        }
//        $outImg = substr($img1, 4, -1);
//        $myImg = '<img src="'.$outImg.'" height="200" width="200">';
//        $masiv[$count] = $outImg;
//        $count++;
//
//    }
//}
//print_r(json_encode($masiv));
