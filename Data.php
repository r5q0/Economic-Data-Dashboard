<?php






function getData() {
$urls = array('https://www.investing.com/economic-calendar/cpi-733', 'https://www.investing.com/economic-calendar/core-cpi-736', 'https://www.investing.com/economic-calendar/interest-rate-decision-168','https://uk.investing.com/economic-calendar/cpi-68','https://uk.investing.com/economic-calendar/core-cpi-317', 'https://www.investing.com/economic-calendar/interest-rate-decision-164' );

foreach ($urls as $url) {


$options = array(
    'http' => array(
        'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36\r\n"
    )
);
$context = stream_context_create($options);

$response = file_get_contents($url, false, $context);


$pattern = '/<h1 class="ecTitle float_lang_base_1 relativeAttr">([^<]*)<\/h1>.*<div id="releaseInfo" class="releaseInfo bold">\s*<span>Latest Release<div class="noBold">([^<]*)<\/div><\/span><span>Actual<div class="[^"]*">([^<]*)<\/div><\/span><span>Forecast<div class="[^"]*">([^<]*)<\/div><\/span><span>Previous<div class="[^"]*">([^<]*)<\/div><\/span><\/div>/s';

if (preg_match($pattern, $response, $matches)) {
    $title = $matches[1];
    $latestRelease = $matches[2];
    $actual = $matches[3];
    $forecast = $matches[4];
    $previous = $matches[5];
    
    echo '<div  class="infobox">';
    echo "<h2>$title</h2>";
    echo "Latest Release: $latestRelease </br>";
    echo "Actual: $actual </br>";
    echo "Forecast: $forecast </br>";
    echo "Previous: $previous </br>";
    echo '</div>';
}
}
}
?>

\

