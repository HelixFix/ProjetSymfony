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

        $client = HttpClient::create(['headers' => [
            'X-RapidAPI-Host' => "spoonacular-recipe-food-nutrition-v1.p.rapidapi.com",
            'X-RapidAPI-Key' => "fccf95e500mshf21a0964dad01cap1031e9jsn32f91aef5eee",
            
        ]]);
        
        $data = $client->request(
            'GET',
            "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/search?query=burger"
  
        );


        $response = new JsonResponse();
        return $response::fromJsonString($data->getContent());
       
    }


    /**
     * @Route("/",methods={"GET"} )
     *
     */
    public function getRecipes()
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
