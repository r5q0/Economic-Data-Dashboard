<?php




getData();

function getData() {
$urls = array('https://www.investing.com/economic-calendar/cpi-733', 'https://www.investing.com/economic-calendar/core-cpi-736', 'https://www.investing.com/economic-calendar/interest-rate-decision-168'  );

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
    
    echo '<div style="border: 1px solid black; padding: 10px; margin-bottom: 10px; width: 300px;;">';
    echo "<h2>$title</h2>";
    echo "<strong>Latest Release: $latestRelease</strong> </br>";
    echo "<strong>Actual: $actual</strong> </br>";
    echo "<strong>Forecast: $forecast</strong> </br>";
    echo "<strong>Previous: $previous</strong> </br>";
    echo '</div>';
}
}
}
?>

\

