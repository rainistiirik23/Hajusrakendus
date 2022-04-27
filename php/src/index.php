<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>

    <?php
    if (time() - filemtime('cache.json') > 3600) {
        $response = file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat=58.2&lon=22.5&appid=ea9c3b31c6370cfff8582c44b36c5980&units=metric');
        echo $response . 'Andmed sain API kaudu';
        $cache = fopen("cache.json", "w") or die("Unable to open file!");
        fwrite($cache, $response);
        fclose($cache);
    } else {
        echo file_get_contents('cache.json') . 'Andmed sain cachi kaudu';
    }
    $data = json_decode(file_get_contents('cache.json'));

    ?>
    <h1>Praegune ilm</h1>
    <img src="http://openweathermap.org/img/wn/<?= $data->weather[0]->icon ?>@2x.png" alt="">
    <p><?= $data->weather[0]->description; ?></p>
    <p>Feels like<?= $data->main->feels_like; ?></p>
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>
</body>

</html>
