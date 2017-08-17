<?php
// DIC configuration
$container = $app->getContainer();

// Capsule ORM Eloquent
$db = $settings['settings']['db'];
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($db);

$capsule->setAsGlobal();
$capsule->bootEloquent();


// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};


// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new \Monolog\Logger($settings['name']);
    $file_handler = new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']);
    $logger->pushHandler($file_handler);
    return $logger;
};

/*
// Manipule Errors
$container['errorHandler'] = function ($c) {
    return function ($request, $response, $expection) use ($c) {
        return $c['response']
            ->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something went wrong!');
    };
};


// Manipule 404 Not Found
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        return $c['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Page not found!');
    };
};


// Manipule 405 Not Allowed
$container['notAllowedHandler'] = function ($c) {
    return function ($request, $response, $methods) use ($c) {
        return $c['response']
            ->withStatus(405)
            ->withHeader('Allow', implode(', ', $methods))
            ->withHeader('Content-Type', 'text/html')
            ->write('Method must be one: ' . implode(', ', $methods));
    };
};


// Manipule PHP Error Handler (PHP 7+ only)
$container['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $error) use ($c) {
        return $c['response']
            ->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something wend wrong PHP!');
    };
};
*/
