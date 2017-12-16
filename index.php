<?php

require_once("vendor/autoload.php");

$app = new \Slim\Slim(
    array(
        'debug' => true,
        'mode' => 'development'
    )
);

$loader = new Twig_Loader_Filesystem("./templates");
$twig = new Twig_Environment($loader);

$app->get("/", function () use ($app, $twig) {
    $data_src = file_get_contents('./source/src.json');
    $data_src = (array) json_decode($data_src);
    echo $twig->display("layout.html", $data_src);
});

$app->run();
