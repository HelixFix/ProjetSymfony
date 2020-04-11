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
            //  OR
            // "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/random"
        );

        $response = new JsonResponse([

            
            'status' => 'ok',
        ]);
        $results = $response::fromJsonString($data->getContent());
        return new Response($this->twig->render('home/home.html.twig', [

            'results' => $results,
        ])); // Charge home.html.twig
    }


    /**
     * @Route("/",methods={"post"} )
     *
     */
    public function getRecipes()
    {

        $client = HttpClient::create(['headers' => [
            'X-RapidAPI-Host' => "spoonacular-recipe-food-nutrition-v1.p.rapidapi.com",
            'X-RapidAPI-Key' => "fccf95e500mshf21a0964dad01cap1031e9jsn32f91aef5eee",
           
        ]]);

        $data = $client->request(
            'GET',
            "https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/random"
        );

        $response = new JsonResponse([

           
            'status' => 'ok',
        ]);
        $response::fromJsonString($data->getContent());
        return new Response($this->twig->render('home/home.html.twig')); // Charge home.html.twig
    }
};
