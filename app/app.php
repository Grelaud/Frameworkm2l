<?php
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Register services.
$app['dao.reservation'] = $app->share(function ($app) {
    return new FrameworkM2L\DAO\ReservationDAO($app['db']);
});
$app['dao.ligue'] = $app->share(function ($app) {
    $ligueDAO = new FrameworkM2L\DAO\LigueDAO($app['db']);
    $ligueDAO->setReservationDAO($app['dao.reservation']);
    return $ligueDAO;
});
