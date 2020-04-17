<?php

namespace App\Controller; // Doit correspondre à la structure des dossiers

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient; // Pour l'utilisation de l'API
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class HomeController
{
    /**
     * @var Environment
     */
    private $twig;

    // public function __construct(Environment $twig) // Pour un chargement automatique du service
    public function __construct($twig)
    {
        $this->twig = $twig; // Initialise l'objet twig

    }

    public function index(): Response // Permet d'afficher la page d'accueil
    {


        return new Response($this->twig->render('home/home.html.twig')); // Charge home.html.twig

    }


    /**
     * @Route("/search",methods={"GET"} )
     *
     */
    public function getSearch(Request $request)
    {
        $key ="?apiKey=336da2ca084c4d70a0f4f966b6d76c85"; 
        $client = HttpClient::create();
        
        $data = $client->request(
            'GET',
            "https://api.spoonacular.com/recipes$key/search?query=burger"
  
        );


        $response = new JsonResponse();
        return $response::fromJsonString($data->getContent());
       
    }


    /**
     * @Route("/test1",methods={"GET"} )
     *
     */
    public function getRecipes(Request $request)
    {

        $numbers= "/?number=1";
        $tags= 'tags=vegetarian,dessert';
        $client = HttpClient::create();
        $key ="?apiKey=336da2ca084c4d70a0f4f966b6d76c85"; 
        $data = $client->request(
            'GET',
            "https://api.spoonacular.com/recipes/random$key"
        );
        
        $response = new JsonResponse();
        return $response::fromJsonString($data->getContent());
       

    }
    
};
