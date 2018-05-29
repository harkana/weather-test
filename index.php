<?php
    require_once "vendor/autoload.php";
    require_once "app/autoload.php";


    $loader = new Twig_Loader_Filesystem("web/views");
    $twig = new Twig_Environment($loader);
    $service = new App\Services\WeatherImpl();
    $data = [];

    $twig->addFilter(new Twig_Filter('loadIcon', function($str) use ($service) {
        return ($service->LoadIcon($str));
    }));

    if (isset($_POST) && isset($_POST["city"])){
        $data = $service->DoWeatherByCityName($_POST["city"])->toArray();
    }

    echo $twig->render('index.twig.php', [ "weather" => $data ]);
?>