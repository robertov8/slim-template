<?php

// DIC configuration
$container = $app->getContainer();

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

// container PDO
$container['db'] = function ($c) {
    $db = $c->get('settings')['db'];
    $pdo = new PDO(
        'mysql:host=' . $db['host'] .
        ';dbname=' . $db['dbname'],
        $db['user'],
        $db['pass']
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $pdo;
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
