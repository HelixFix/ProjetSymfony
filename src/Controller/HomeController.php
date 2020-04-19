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
     * @Route("/searchResult",methods={"POST"} )
     *
     */
    public function getSearch(Request $request) // methode pour la recherche via le formaulaire search de App.vue
    {
        $client = HttpClient::create();
        $recipe = ($request->get('search'));// recupere la valeur du formulaire
        $data = $client->request( // requete de la récupération des donnée de l'api http
            'GET',
            "https://api.spoonacular.com/recipes/search?query=$recipe&apiKey=336da2ca084c4d70a0f4f966b6d76c85"
        );

        
        $response = new JsonResponse(); 
        return $response::fromJsonString($data->getContent()); // renvoie la réponse des donnée récuperer en format json
       
    }


    /**
     * @Route("/recipes",methods={"GET"} )
     *
     */
    public function getRecipes(Request $request) // methode pour récupérer les recettes de l'api aléatoire
    {

       
        $client = HttpClient::create(); // création de la connection HttpClient
        $key ="?apiKey=336da2ca084c4d70a0f4f966b6d76c85"; // clef d'autorisation pour l'api spoonacular
        $data = $client->request(
            'GET',
            "https://api.spoonacular.com/recipes/random$key" //récupere les données de l'api 
        );
        
        $response = new JsonResponse();
        return $response::fromJsonString($data->getContent()); // renvoie les données récuperer en format json
       

    }


    /*********************EN CONSTRUCTION */
    /**
     * @Route("/recipes/{id}",methods={"GET"} )
     *
     */
    public function getRecipeShow(Request $request, $id) // methode show pour une recette 
    {

       
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
