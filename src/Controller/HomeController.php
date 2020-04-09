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

    public function index() : Response // Permet d'afficher la page d'accueil
    {
        // return new Response('Salut les gens');

        return new Response($this->twig->render('home/home.html.twig')); // Charge home.html.twig
       
    }


    /**
     * @Route("/recipes/search", name="search")
     *
     */
    public function getSearch(Request $request){

        $client = HttpClient::create();
        $data = $client->request('GET', 'https://api.spoonacular.com/recipes/search',['auth_bearer' => 'fccf95e500mshf21a0964dad01cap1031e9jsn32f91aef5eee']);
        $response = new JsonResponse();
        return $response::fromJsonString($data->getContent());
    
    }

}

