<?php 

namespace App\Controller; // Doit correspondre à la structure des dossiers

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient; // Pour l'utilisation de l'API

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

    public function shop() : Response // Permet d'afficher la page d'accueil
    {
        // return new Response('Salut les gens');
        return new Response($this->twig->render('pages/shop.html.twig')); // Charge home.html.twig
       
    }

    public function donation() : Response // Permet d'afficher la page d'accueil
    {
        // return new Response('Salut les gens');
        return new Response($this->twig->render('pages/donation.html.twig')); // Charge home.html.twig
       
    }

    public function contact() : Response // Permet d'afficher la page d'accueil
    {
        // return new Response('Salut les gens');
        return new Response($this->twig->render('pages/contact.html.twig')); // Charge home.html.twig
       
    }

}

