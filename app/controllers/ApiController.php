<?php
namespace App\Controller;

use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class ApiController extends Controller
{
    public function __invoke(Request $request, Response $response, $args)
    {
        // Get containers
        switch ($request->getMethod()) {
            case 'GET':
                $this->getApi();
                break;

            case 'POST':
                $this->postApi();
                break;
        }

        $logger = $this->container->get('logger');
        $renderer = $this->container->get('renderer');

        // Sample log message
        $logger->info("Slim-Skeleton '/' route");
        // Render index view
        return $renderer->render($response, 'index.phtml', $args);
        return $response;
    }

    public function getApi()
    {
        var_dump('getApi');
    }

    public function postApi()
    {
        var_dump('postApi');
    }
}
