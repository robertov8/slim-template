<?php

$app->get(
    '/[{name}]',
    'App\Controller\HomeController:home'
)->add(App\Middleware\HomeMiddleware::class);

$app->any(
    '/api/[{id}]',
    'App\Controller\ApiController'
);

$app->group('/utils', function () use ($app) {
    $app->get('/date', function ($request, $response) {
        return $response->getBody()->write(date('Y-m-d H:i:s'));
    });

    $app->get('/time', function ($request, $response) {
        return $response->getBody()->write(time());
    });
})->add(function ($request, $response, $next) {
    $response->getBody()->write('It is now ');
    $response = $next($request, $response);
    $response->getBody()->write('. Enjoy!');

    return $response;
});
