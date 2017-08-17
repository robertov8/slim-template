<?php
$app->get('/photo', function ($request, $response) {
    $photos = App\Model\Photo::all();
    return $response->getBody()->write($photos->toJson());
});

$app->get('/photo/{id}', function ($request, $response, $args) {
    $id = $args['id'];
    $photos = App\Model\Photo::find($id);
    return $response->getBody()->write($photos->toJson());
});

$app->post('/photo', function ($request, $response, $args) {
    $data = $request->getParsedBody();
    $photo = new App\Model\Photo;
    $photo->nome = $data['nome'];
    $photo->descricao = $data['descricao'];
    $photo->save();

    return $response
        ->withStatus(201)
        ->getBody()
        ->write($photo->toJson());
});

$app->delete('/photo/{id}', function ($request, $response, $args) {
    $id = $args['id'];
    $photo = App\Model\Photo::find($id);
    $photo->delete();

    return $response->withStatus(200);
});

$app->put('/photo/{id}', function ($request, $response, $args) {
    $id = $args['id'];
    $data = $request->getParsedBody();
    $photo = App\Model\Photo::find($id);
    $photo->nome = $data['nome'] ?: $photo->nome;
    $photo->descricao = $data['descricao'] ?: $photo->descricao;
    $photo->save();

    return $response->getBody()->write($photo->toJson());
});

$app->get('/[{name}]', function ($request, $response, $args) {
    $renderer = $this->get('renderer');
    return $renderer->render($response, 'index.phtml', $args);
})->add(function ($request, $response, $next) {
    $response->getBody()->write('O middware sendo aplicado antes da requisição.');
    $response = $next($request, $response);
    $response->getBody()->write('Depois da requisição.');

    return $response;
});

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
