<?php
namespace App\Middleware;

use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class HomeMiddleware extends Middleware
{
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $logger = $this->container->get('logger');

        $logger->info('BEFORE1');
        $response->getBody()->write('O middware sendo aplicado antes da requisição.');

        $response = $next($request, $response);

        $response->getBody()->write('Depois da requisição.');
        $logger->info('AFTER1');

        return $response;
    }
}
