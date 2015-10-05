<?php

$app->get('/', function () use ($app) {
    $reservations = $app['dao.reservation']->findAll();

    //ob_start();             // start buffering HTML output
    //require '../views/view.php';
    //$view = ob_get_clean(); // assign HTML output to $view
    return $app['twig']->render('index.html.twig',array('reservations' =>$reservations));
});