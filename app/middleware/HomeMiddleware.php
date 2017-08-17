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
        $response = $next($request, $response);
        $logger->info('AFTER1');

        return $response;
    }
}
