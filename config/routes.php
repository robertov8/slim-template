<?php
$app->get('/photo', 'App\Controller\PhotoController:index');
$app->get('/photo/{id}', 'App\Controller\PhotoController:show');
$app->post('/photo', 'App\Controller\PhotoController:new');
$app->delete('/photo/{id}', 'App\Controller\PhotoController:delete');
$app->put('/photo/{id}', 'App\Controller\PhotoController:update');

// Tratando multiplos verbos
$app->any('/api/[{id}]', 'App\Controller\ApiController');

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

$app->get(
    '/[{name}]',
    'App\Controller\HomeController:home'
)->add(App\Middleware\HomeMiddleware::class);
