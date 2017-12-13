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
    $layout = $twig->load("layout.html");
    echo $layout->render();
});

$app->get("/one", function () use ($app, $twig) {
    $layout = $twig->load("one.html");
    echo $layout->render();
});

$app->get("/generate_json", function () use ($app) {
    $src = array(
        "header_menu" => array(
            "hosting",
            "domain",
            "server",
            "website",
            "affiliasi",
            "promo",
            "pembayaran",
            "review",
            "kontak",
            "blog"
        ),
        "footer_menu" => array(
            "layanan" => array(
                "Domain",
                "Shared Hosting",
                "Cloud VPS Hosting",
                "Managed VPS Hosting",
                "Web Builder",
                "Keamanan SSL / HTTPS",
                "Jasa Pembuatan Website",
                "Program Affiliasi"
            ),
            "Service Hosting" => array(
                "Hosting Murah",
                "Hosting Indonesia",
                "Hosting Singapura SG",
                "Hosting PHP",
                "Hosting Wordpress",
                "Hosting Laravel"
            ),
        ),
        "phone_number" => "0274-5305505",
        "company_address" => "Jl. Selokan Mataram Monjali Karangjati MT I/304 Sinduadi, Mlati, Sleman Yogyakarta 55284"
    );

    $res = $app->response;

    $res->headers->set("Content-Type", "application/json");
    $res->write(json_encode($src));

});

$app->get("/home", function () use ($app, $twig) {
    echo $twig->display("my_layout.html");
});


$app->run();
