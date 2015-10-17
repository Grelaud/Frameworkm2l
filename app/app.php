<?php
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

ErrorHandler::register();
ExceptionHandler::register();


$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '^/',
            'anonymous' => true,
            'logout' => true,
            'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
            'users' => $app->share(function () use ($app) {
                return new FrameworkM2L\DAO\UserDAO($app['db']);
            }),
        ),
    ),
));
$app['dao.reservation'] = $app->share(function ($app) {
    return new FrameworkM2L\DAO\ReservationDAO($app['db']);
});

$app['dao.ligue'] = $app->share(function ($app) {
    $ligueDAO = new FrameworkM2L\DAO\LigueDAO($app['db']);
    $ligueDAO->setReservationDAO($app['dao.reservation']);
    $ligueDAO->setUserDAO($app['dao.user']);
    return $ligueDAO;
});
