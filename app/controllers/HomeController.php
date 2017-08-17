<?php
namespace App\Controller;

use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class HomeController extends Controller
{
    public function home(Request $request, Response $response, $args)
    {
        // Get containers
        $logger = $this->container->get('logger');
        $renderer = $this->container->get('renderer');

        // Sample log message
        $logger->info("Slim-Skeleton '/' route");
        // Render index view
        return $renderer->render($response, 'index.phtml', $args);
        return $response;
    }
}
