<?php 

namespace App\Controller; // Doit correspondre à la structure des dossiers

use Symfony\Component\HttpFoundation\Response;

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
        return new Response($this->twig->render('pages/home.html.twig')); // Charge home.html.twig
       
    }

}

