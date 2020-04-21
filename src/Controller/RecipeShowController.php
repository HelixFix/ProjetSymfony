<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RecipeShowController extends AbstractController
{
    /**
     * @Route("/recipes/show", name="show")
     */
    public function index(Request $request)
    {
        return $this->render('home/show.html.twig', [
            'controller_name' => 'RecipeShowController',
        ]);
    }


    /**
     * @Route("/recipeData/{id}" )
     *
     */
    public function show(Request $request, int $id) // Permet d'afficher la page show
    {
        // if ($request->isXmlHttpRequest()) {
            $client = HttpClient::create();

            $data = $client->request( // requete de la récupération des donnée de l'api http
                'GET',
                "https://api.spoonacular.com/recipes/" . $id . "/information?apiKey=336da2ca084c4d70a0f4f966b6d76c85"
            );
            $result = json_decode($data->getContent());





            $response = new JsonResponse();


            return $response::fromJsonString($data->getContent()); // renvoie la réponse des donnée récuperer en format json

        // }
    }

    /**
     * @Route("/recipes/{id}", name="show" )
     *
     */
    public function recipeShow(Request $request, int $id) // Permet d'afficher la page show
    {


        // $response = new Response();
        // $response->setContent($id);
        // return $response;
        return $this->render('home/show.html.twig', [

            'info' => $id,

        ]);
    }
};
