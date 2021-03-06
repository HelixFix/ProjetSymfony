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
        $recipe = ($request->get('search')); // recupere la valeur de l'input dans le formulaire
        $data = $client->request( // requete de la récupération des donnée de l'api http
            'GET',
            "https://api.spoonacular.com/recipes/search?query=$recipe&apiKey=336da2ca084c4d70a0f4f966b6d76c85"
        );


        $response = new JsonResponse();
        return $response::fromJsonString($data->getContent());
         // renvoie la réponse des donnée récuperer en format json

    }


    /**
     * @Route("/recipes",methods={"GET"} )
     *
     */
    public function getRecipes(Request $request) // methode pour récupérer les recettes de l'api aléatoire
    {

        $recipe = [];
        $client = HttpClient::create(); // création de la connection HttpClient
        $key = "?apiKey=336da2ca084c4d70a0f4f966b6d76c85"; // clef d'autorisation pour l'api spoonacular
        
        for ($i = 0; $i <= 1; $i++) {

            $data = $client->request(
                'GET',
                "https://api.spoonacular.com/recipes/random$key" //récupere les données de l'api 
            );
            // $recipe[] = $data->getContent();
            $result = json_decode($data->getContent());
            $recipe[] = $result->recipes[0];
            
        }
      
        $response = new JsonResponse();
        $response->setData($recipe);
        return $response;
        // ::fromJsonString($data->getContent()); // renvoie les données récuperer en format json


    }


    // /*********************EN CONSTRUCTION */
    // /**
    //  * @Route("/recipes/1003464", name="show" )
    //  *
    //  */
//     public function show(Request $request): Response// Permet d'afficher la page show
//     {   
        
//         $key = "?apiKey=336da2ca084c4d70a0f4f966b6d76c85";
//         $client = HttpClient::create();
//        // $show = ($request->get('show')); // recupere l'id de la recette
//         $data = $client->request( // requete de la récupération des donnée de l'api http
//             'GET',
//             "https://api.spoonacular.com/recipes/716429/information$key"
//         );
//     //     $result = json_decode($data->getContent());
//     //    dd($result);

       
        
//         //dd($result);
//         $response = new JsonResponse();
        
//         //$response->setData($info);
       
//       return $response::fromJsonString($data->getContent()); // renvoie la réponse des donnée récuperer en format json
//     //    dd($data->getContent());

//         return new Response($this->twig->render('home/show.html.twig')); // Charge show.html.twig
      

//     }
};
