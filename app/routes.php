<?php

//home page
$app->get('/', function () use ($app) {
    $reservations = $app['dao.reservation']->findAll();
    
    //ob_start();             // start buffering HTML output
    //require '../views/view.php';
    //$view = ob_get_clean(); // assign HTML output to $view
    return $app['twig']->render('index.html.twig',array('reservations' =>$reservations));
})->bind('home');


// Article details with comments
$app->get('/reservation/{id}', function ($id) use ($app) {
    $reservation = $app['dao.reservation']->find($id);
    $ligues = $app['dao.ligue']->findAllByreservation($id);
    return $app['twig']->render('reservation.html.twig', array('reservation' => $reservation, 'ligue' => $ligues));
})->bind('reservation');