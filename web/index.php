<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/autoload.php';



$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\SessionServiceProvider());

// hello world
$app->get('/hello/{name}', function ($name) use ($app) {
  return 'Hello '.$app->escape($name);
});

$app->before(function(Request $request) use ($app){
  $app['session']->set('count', $app['session']->get('count') + 1);
  var_dump($_SESSION);
  // var_dump($request);
});

/*

// convert
$app->get('/user/{id}', function ($id) {
  var_dump($id);
})->convert('id', function ($id) { return (int) $id; });

 */


$app->run();

