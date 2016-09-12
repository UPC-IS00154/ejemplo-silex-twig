<?php

// uso del autoload generado por composer
require_once __DIR__.'/vendor/autoload.php';

// crea un objeto Application
$app = new Silex\Application();

// configura twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
));

$app->get( '/', function() use ( $app ) {
    return $app['twig']->render('index.html.twig');
});

$app->get('/hello/{name}', function ($name) use ($app) {
    return $app['twig']->render('hello.html.twig', array(
        'name' => $name,
    ));
});

$app->run();