<?php

$count = 0;
$masiv = [];
$input = $_GET['mysearch'];

$inpResult = explode(" ", $input);

for ($i = 0; $i < count($inpResult); $i++){

    $url = 'https://www.flickr.com/search/?text='.$inpResult[$i].'';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    $array = curl_exec($ch);

    curl_close($ch);
    $start = strpos($array, 'Everyone');

    $info = mb_substr($array, $start, 200652);

    preg_match_all("/url\(([\s])?([\"|\\'])?(.*?)([\"|\\'])?([\s])?\)/i", $info, $matches);

    $imgArray = $matches[0];

    for ($j = 0; $j < 5; $j++){

        $img = rand(0, count($imgArray));
        if(!$imgArray[$img]){
            $img = rand(0, count($imgArray)-1);
            $img1 = $imgArray[$img];
            var_dump($img1);
            die;
        }else {
            $img1 = $imgArray[$img];
        }
        $outImg = substr($img1, 4, -1);
        $myImg = '<img src="'.$outImg.'" height="200" width="200">';
        $masiv[$count] = $outImg;
        $count++;

    }

}

print_r(json_encode($masiv));
