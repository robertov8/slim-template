<?php
namespace App\Controller;

use \Psr\Http\Message\RequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Model\Photo;

class PhotoController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $photos = Photo::all();
        return $response->getBody()->write($photos->toJson());
    }

    public function show(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $photos = App\Model\Photo::find($id);
        return $response->getBody()->write($photos->toJson());
    }

    public function new(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();
        $photo = new App\Model\Photo;
        $photo->nome = $data['nome'];
        $photo->descricao = $data['descricao'];
        $photo->save();
        return $response->withStatus(201)->getBody()->write($photo->toJson());
    }

    public function delete(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $photo = App\Model\Photo::find($id);
        $photo->delete();
        return $response->withStatus(200);
    }

    public function update(Request $request, Response $response, $args)
    {
        $id = $args['id'];
        $data = $request->getParsedBody();
        $photo = App\Model\Photo::find($id);
        $photo->nome = $data['nome'] ?: $photo->nome;
        $photo->descricao = $data['descricao'] ?: $photo->descricao;
        $photo->save();
        return $response->getBody()->write($photo->toJson());
    }
}
