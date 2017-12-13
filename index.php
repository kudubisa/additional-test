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
    echo "Good Luck My Friend!";
});


$app->run();
